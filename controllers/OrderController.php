<?php
// OrderController.php

class OrderController {
    private $smarty;
    private $db;
    private $config;

    public function __construct($smarty, $db) {
        $this->smarty = $smarty;
        $this->db = $db;
    }

    public function index() {ob_clean();
        // Отображение списка поставщиков
        //checkAccess(['Администратор', 'Директор', 'Директор по закупкам', 'Снабженец']);
         // Устанавливаем данные для заголовка
        $this->smarty->assign('title', 'Поставщики');
        $this->smarty->assign('headerTitle', 'Поставщики');

        // Загружаем header.tpl
        $header = $this->smarty->fetch('header.tpl');
        $menu = $this->smarty->fetch('menu.tpl');
		$footer = $this->smarty->fetch('footer.tpl');
        // Присваиваем заголовок в основной шаблон
        $this->smarty->assign('header', $header);
        $this->smarty->assign('menu', $menu);
        $this->smarty->assign('footer', $footer);
        // Основной контент страницы
        $this->smarty->assign('content', 'Here is the suppliers content.');
		$this->views();
		$this->smarty->display('suppliers.tpl');
    }

    public function view($id) {
        // Просмотр информации о поставщике
        checkAccess(['Администратор', 'Директор', 'Директор по закупкам', 'Снабженец']);
        // Код для получения и отображения информации о поставщике
    }

    public function add() {
        // Добавление нового поставщика
        checkAccess(['Администратор', 'Директор по закупкам', 'Снабженец']);
        // Код для добавления нового поставщика
    }

    public function edit($id) {
        // Редактирование информации о поставщике
        checkAccess(['Администратор', 'Директор по закупкам', 'Снабженец']);
        // Код для редактирования информации о поставщике
    }

    public function delete($id) {
        // Удаление поставщика
        checkAccess(['Администратор', 'Директор']);
        // Код для удаления поставщика
    }
	
	public function views(){
	
	}
}
$orderController = new OrderController($smarty, $db);