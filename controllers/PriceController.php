
<?php
// PriceController.php

class PriceController {
    private $smarty;
    private $db;
    private $config;

    public function __construct($smarty, $db) {
        $this->smarty = $smarty;
        $this->db = $db;
    }

	// Показать форму добавления цены
    public function showAddPriceForm() {
        $this->smarty->display('add_price.tpl');
    }
	
	// Сохранить новую цену
    public function savePrice() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $amount = $_POST['amount'];

            if (!empty($product_id) && !empty($amount)) {
                // Логика добавления цены в базу данных
                $query = "INSERT INTO prices (product_id, amount) VALUES ('" . $this->db->safe($product_id) . "', " . (float)$amount . ")";
                $this->db->query($query);
                header('Location: /prices/'); // Перенаправление после успешного добавления
                exit();
            } else {
                // Передача ошибки в шаблон
                $this->smarty->assign('error', 'Введите все поля!');
            }
        }
        $this->showAddPriceForm();
    }
	
	// Показать список цен
    public function index() {
        // Получение списка цен из базы данных
        $query = "SELECT p.*, pr.name AS product_name FROM prices p JOIN products pr ON p.product_id = pr.id";
        $prices = $this->db->fetchAll($this->db->query($query));
        // Устанавливаем данные для заголовка
        $this->smarty->assign('title', 'Прайс');
        $this->smarty->assign('headerTitle', 'Прайс');

        // Загружаем header.tpl
        $header = $this->smarty->fetch('header.tpl');
        $menu = $this->smarty->fetch('menu.tpl');
		$footer = $this->smarty->fetch('footer.tpl');
        // Присваиваем заголовок в основной шаблон
        $this->smarty->assign('header', $header);
        $this->smarty->assign('menu', $menu);
        $this->smarty->assign('footer', $footer);
        $this->smarty->assign('prices', $prices);
        $this->smarty->display('prices.tpl');
    }
	
	// Редактировать цену
    public function editPrice($id) {
        // Получение цены по ID
        $query = "SELECT * FROM prices WHERE id = " . (int)$id;
        $price = $this->db->fetch($this->db->query($query));

        if ($price) {
            $this->smarty->assign('price', $price);
            $this->smarty->display('edit_price.tpl');
        } else {
            // Если цена не найдена, перенаправление
            header('Location: /prices/');
            exit();
        }
    }

    // Обновить цену
    public function updatePrice() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $amount = $_POST['amount'];

            // Логика обновления цены в базе данных
            $query = "UPDATE prices SET amount = " . (float)$amount . " WHERE id = " . (int)$id;
            $this->db->query($query);
            header('Location: /prices/');
            exit();
        }
    }

    // Удалить цену
    public function deletePrice($id) {
        $query = "DELETE FROM prices WHERE id = " . (int)$id;
        $this->db->query($query);
        header('Location: /prices/');
        exit();
    }
	
	
}
$priceController = new PriceController($smarty, $db);
    /*public function index() {ob_clean();
        // Отображение списка поставщиков
        //checkAccess(['Администратор', 'Директор', 'Директор по закупкам', 'Снабженец']);
         // Устанавливаем данные для заголовка
        $this->smarty->assign('title', 'Прайс');
        $this->smarty->assign('headerTitle', 'Прайс');

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
	
}*/
