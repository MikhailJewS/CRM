<?php
// lib/auth.php

// Функция для проверки авторизации пользователя
function checkAuth() {
    // Стартуем сессию, если она еще не была запущена
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
	// Проверка времени последней активности
    $timeout_duration = 1800; // 30 минут
	
	if (isset($_SESSION['LAST_ACTIVITY']) &&
        (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        // Завершаем сессию и перенаправляем на страницу входа
        session_unset();
        session_destroy();
        header('Location: index.php?action=showLoginForm');
        exit();
    }

    // Обновляем время последней активности
    $_SESSION['LAST_ACTIVITY'] = time();
	
    // Проверяем, авторизован ли пользователь
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        // Перенаправляем на страницу входа
        header('Location: index.php?action=showLoginForm');
        exit();
    }
}

function logout() {
    // Запускаем сессию, если она еще не запущена
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Удаляем все сессионные переменные
    $_SESSION = [];

    // Если требуется удалить сессионные cookies
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Уничтожаем сессию
    session_destroy();

    // Перенаправляем пользователя на страницу входа или главную страницу
    header("Location: index.php?action=showLoginForm");
    exit();
}
?>