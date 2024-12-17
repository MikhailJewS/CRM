<?php
// SuppliersController.php

class SuppliersController {
    private $smarty;
    private $db;

    public function __construct($smarty, $db) {
        $this->smarty = $smarty;
        $this->db = $db;
    }

    public function index() {
        ob_clean();
        $this->smarty->assign('title', 'Поставщики');
        $this->smarty->assign('headerTitle', 'Поставщики');

        // Загружаем header.tpl, menu.tpl и footer.tpl
        $header = $this->smarty->fetch('header.tpl');
        $menu = $this->smarty->fetch('menu.tpl');
        $footer = $this->smarty->fetch('footer.tpl');
        $this->smarty->assign('header', $header);
        $this->smarty->assign('menu', $menu);
        $this->smarty->assign('footer', $footer);

        // Получение данных
        $arResult = $this->getData();

        // Передача данных в шаблон
        $this->smarty->assign('arResult', $arResult);
        $this->smarty->display('suppliers.tpl');
    }

    private function getData() {
        $arResult = [];
        $wpp = 200; // Количество записей на странице

        // Получение данных о каталогах
        $arResult["CATALOG"] = $this->getCatalogData();

        // Получение типов поставщиков
        $arResult["TYPE"] = $this->getSupplierTypes();

        // Получение стран
        $arResult["COUNTRY"] = $this->getCountries();

        // Настройки предприятия
        $arResult["PREDPR"] = $this->getEnterpriseSettings();

        // Обработка фильтров
        $filterData = $this->handleFilter($arResult);
        $arResult["SUPP"] = $this->getSuppliers($filterData, $wpp);

        return $arResult;
    }

    private function getCatalogData() {
        $strSql = "
            SELECT dc_id, dc_name, dc_plf_id 
            FROM cpbp_dict_catalog
            LEFT JOIN cpbp_pl_folders ON PLF_ID = dc_plf_id 
            ORDER BY PLF_PARENT, PLF_SORT
        ";
        $res = $this->db->query($strSql);
        $catalogData = [];
        while ($arGroup = $res->fetch_assoc()) {
            $catalogData[$arGroup['dc_id']] = $arGroup;
        }
        return $catalogData;
    }

    private function getSupplierTypes() {
        $strSql = "
            SELECT st_id, st_name, st_timestamp FROM cpbp_supplier_type
        ";
        $res = $this->db->query($strSql);
        $typeData = [];
        while ($arGroup = $res->fetch_assoc()) {
            $typeData[$arGroup['st_id']] = $arGroup;
        }
        return $typeData;
    }

    private function getCountries() {
        $strSql = "
            SELECT ic_name, ic_a2, ic_a3, ic_numeric FROM cpbp_iso_country ORDER BY ic_id
        ";
        $res = $this->db->query($strSql);
        $countryData = [];
        while ($arGroup = $res->fetch_assoc()) {
            $countryData[] = $arGroup;
        }
        return $countryData;
    }

    private function getEnterpriseSettings() {
        $strSql = "
        SELECT ID, NAME 
        FROM EnterpriseSettings 
        WHERE 'ACTIVE' = 'N'
    ";
        $res = $this->db->query($strSql);
        $enterpriseData = [];
        while ($ar_fields = $res->fetch_assoc()) {
            // Обработка полученных данных
            $enterpriseData[$ar_fields["ID"]] = $ar_fields;
        }
        return $enterpriseData;
    }
    /*private function getEnterpriseSettings() {
        $arFilter = array(
            "IBLOCK_ID" => 7,
            "ACTIVE" => "N",
        );

        $res = CIBlockElement::GetList(array("NAME" => "DESC"), $arFilter, array("ID", "NAME"));
        $enterpriseData = [];
        while ($ar_fields = $res->GetNext()) {
            if (in_array($ar_fields["ID"], ["67622", "73851", "398598", "67623"])) {
                $enterpriseData[$ar_fields["ID"]] = $ar_fields;
            }
        }
        return $enterpriseData;
    }*/

    private function handleFilter(&$arResult) {
        $filterData = [];

        // Инициализация FILTER_VALUES
        if (!isset($arResult["FILTER_VALUES"])) {
            $arResult["FILTER_VALUES"] = [];
        }

        // Проверяем, установлен ли фильтр
        if (isset($_POST["SETFILTER"]) && $_POST["SETFILTER"] === 'Y') {
            // Обработка фильтров
            foreach ($_POST["subFilter"]["input"] as $fkey => $fvalue) {
                if (stripos($fkey, 'su_') !== FALSE && strlen($fvalue) > 0) {
                    $filterData[$fkey] = $fvalue;
                    $arResult["FILTER_VALUES"][$fkey] = $fvalue; // Сохранение значений фильтров
                }
            }
        }

        return $filterData;
    }

    private function getSuppliers($filterData, $wpp) {
        $a_join = $s_join = $where_s = '';
        // Построение SQL-запроса для фильтрации
        if (!empty($filterData)) {
            if (isset($filterData['su_name'])) {
                $where_s .= " AND (su_name LIKE '%" . $this->db->real_escape_string($filterData['su_name']) . "%' OR su_shortname LIKE '%" . $this->db->real_escape_string($filterData['su_name']) . "%')";
            }
            // Добавьте другие условия фильтрации по необходимости...
        }

        $strSql = "
            SELECT COUNT(*) AS cnt_id
            FROM cpbp_supplier
            WHERE 1=1 " . $where_s;

        $res = $this->db->query($strSql);
        $arGroup = $res->fetch_assoc();
        $arResult['FINALNUMS1'] = $arGroup['cnt_id'];

        // Пагинация
        $pageNum = isset($_GET['PAGE']) ? intval($_GET['PAGE']) : 1;
        $posSQL = $wpp * ($pageNum - 1);
        $limitSQL = " LIMIT " . $posSQL . ", " . $wpp;

        $strSql = "
            SELECT DISTINCT su_id, su_name, su_shortname, su_fullname, su_inn, su_st_id
            FROM cpbp_supplier
            WHERE 1=1 " . $where_s . "
            ORDER BY su_id DESC" . $limitSQL;

        $res = $this->db->query($strSql);
        $suppliersData = [];
        while ($arGroup = $res->fetch_assoc()) {
            $suppliersData[$arGroup['su_id']] = $arGroup;
            // Получение агентов и каталогов
            $suppliersData[$arGroup['su_id']]['AGENT'] = $this->getSupplierAgents($arGroup['su_id']);
            $suppliersData[$arGroup['su_id']]['CATALOG'] = $this->getSupplierCatalogs($arGroup['su_id']);
        }
        return $suppliersData;
    }

    private function getSupplierAgents($supplierId) {
        $strSql = "
            SELECT sa_id, sa_name, sa_phone, sa_email 
            FROM cpbp_supplier_agent WHERE sa_su_id = " . intval($supplierId);
        $res = $this->db->query($strSql);
        $agentsData = [];
        while ($arGroup = $res->fetch_assoc()) {
            $agentsData[$arGroup['sa_id']] = $arGroup;
        }
        return $agentsData;
    }

    private function getSupplierCatalogs($supplierId) {
        $strSql = "
            SELECT ss_dc_id, dc_name
            FROM cpbp_supplier_sections 
            INNER JOIN cpbp_dict_catalog ON ss_dc_id = dc_id
            WHERE ss_su_id = " . intval($supplierId);
        $res = $this->db->query($strSql);
        $catalogsData = [];
        while ($arGroup = $res->fetch_assoc()) {
            $catalogsData[$arGroup['ss_dc_id']] = $arGroup;
        }
        return $catalogsData;
    }
}
$suppliersController = new SuppliersController($smarty, $db);