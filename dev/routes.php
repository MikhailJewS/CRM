<?php
// routes.php

function router_clean($string)
{
    return strtolower(preg_replace(['/^https?:\/\//', '/^www\./'], '', $string));
}

// Подключение контроллеров
require_once CONTROLLERS . '/AuthController.php';
require_once CONTROLLERS . '/CustomerController.php';
require_once CONTROLLERS . '/SuppliersController.php';
require_once CONTROLLERS . '/OrderController.php';
require_once CONTROLLERS . '/PriceController.php';

// Проверка наличия действия
$action = $action ?? 'showLoginForm'; // Действие по умолчанию

// Массив маршрутов
$routes = [
    // Авторизация
    'showLoginForm' => [$authController, 'showLoginForm'],
    'login' => [$authController, 'login'],
    'showRegisterForm' => [$authController, 'showRegisterForm'],
    'register' => [$authController, 'register'],
    'showConfirmForm' => [$authController, 'showConfirmForm'],
    'confirmCode' => [$authController, 'confirmCode'],
    'dashboard' => [$authController, 'dashboard'],

    // Поставщики
    'suppliers' => [$suppliersController, 'index'],
    'supplierView' => [$suppliersController, 'view'],
    'supplierAdd' => [$suppliersController, 'add'],
    'supplierEdit' => [$suppliersController, 'edit'],
    'supplierDelete' => [$suppliersController, 'delete'],

    // Покупатели
    'customers' => [$customerController, 'index'],
    'customerView' => [$customerController, 'view'],
    'customerAdd' => [$customerController, 'add'],
    'customerEdit' => [$customerController, 'edit'],
    'customerDelete' => [$customerController, 'delete'],

    // Прайс
    'price' => [$priceController, 'index'],

    // Заказы
    'orders' => [$orderController, 'index'],
    'orderView' => [$orderController, 'view'],
    'orderAdd' => [$orderController, 'add'],
    'orderEdit' => [$orderController, 'edit'],
    'orderDelete' => [$orderController, 'delete'],

    // Дополнительные действия
    'sendContract' => [$customerController, 'sendContract'],
    'sendInvoice' => [$orderController, 'sendInvoice'],
    'sendSpecification' => [$orderController, 'sendSpecification'],

    // Выход из системы
    'logout' => 'logout',
];

// Обработка маршрутов
if (array_key_exists($action, $routes)) {
    $route = $routes[$action];

    if (is_array($route)) {
        // Проверка наличия параметра id
        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            $route[0]->{$route[1]}((int)$id);
        } else {
            $route[0]->{$route[1]}();
        }
    } elseif ($route === 'logout') {
        logout(); // Вызов функции logout
    }
} else {
    http_response_code(404);
    echo "404 Not Found";
}
