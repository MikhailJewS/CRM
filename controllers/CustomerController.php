<?php
// controllers/CustomerController.php

// Подключаем файл с функцией checkAuth()
require_once __DIR__ . '/../lib/auth.php';

class CustomerController {
    private $smarty;
    private $db;
    private $config;

    public function __construct($smarty, $db) {
        $this->smarty = $smarty;
        $this->db = $db;
    }

    public function addCustomer() {
        checkAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Логика для добавления покупателя
            $name = $_POST['name'] ?? '';
            // Сохранение в базе данных

            $this->smarty->assign('message', 'Покупатель добавлен.');
        }

        $this->smarty->display('add_customer.tpl');
    }
	
	public function index() {
		ob_clean();
		checkAuth();
		// Отображение списка поставщиков
        //checkAccess(['Администратор', 'Директор', 'Директор по закупкам', 'Снабженец']);
         // Устанавливаем данные для заголовка
        $this->smarty->assign('title', 'Покупитили');
        $this->smarty->assign('headerTitle', 'Покупатили');

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
		
		$this->smarty->display('customer.tpl');
	}
	
    public function listCustomers() {
        //checkAuth();
        $customers = []; // Получите данные о покупателях из базы данных
        $this->smarty->assign('customers', $customers);
        $this->smarty->display('customers.tpl');
    }
}
$customerController = new CustomerController($smarty, $db);
?>