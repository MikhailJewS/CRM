<?php
// controllers/AuthController.php

require_once 'services/MailService.php'; // Подключаем файл с классом MailService

class AuthController {
    private $smarty;
    private $userModel;
    private $config;

    public function __construct($smarty, $db) {
        $this->smarty = $smarty;
        $this->userModel = new User($db);
		
    }
    // Генерация токена CSRF
    private function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    // Проверка токена CSRF
    private function validateCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

	// Отображение формы входа
    public function showLoginForm() {ob_clean();
        
		$this->smarty->assign('title', 'Вход в систму');
        $this->smarty->assign('headerTitle', 'Вход в систму');
        $this->smarty->assign('csrf_token', $this->generateCsrfToken()); // Добавляем токен CSRF
        // Загружаем header.tpl
        $header = $this->smarty->fetch('headerauth.tpl');
        // Присваиваем заголовок в основной шаблон
        $this->smarty->assign('header', $header);
		$this->smarty->display('login.tpl');
    }

    // Обработка входа с логином и паролем
    public function login() {ob_clean();
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $csrfToken = $_POST['csrf_token'] ?? '';

        // Проверка токена CSRF
        if (!$this->validateCsrfToken($csrfToken)) {
            $this->smarty->assign('error', htmlspecialchars('Неверный CSRF токен'));
            $this->smarty->display('login.tpl');
            return;
        }
		
        // Проверка наличия пользователя и пароля
        if ($this->userModel->verifyUser($username, $password)) {
            // Генерация кода подтверждения
            $confirmationCode = rand(100000, 999999);
            $_SESSION['code'] = $confirmationCode;
            $_SESSION['username'] = $username;
            // Отправка кода подтверждения на email
            $userEmail = $this->userModel->getUserEmail($username);
            $this->sendConfirmationCode($userEmail, $confirmationCode);
            // Переход на страницу подтверждения кода
            header("Location: index.php?action=showConfirmForm");
        } else {
			
            $this->smarty->assign('error', htmlspecialchars('Неверный логин или пароль'));
            $this->smarty->display('login.tpl');
        }
    }

    // Отображение формы подтверждения кода
    public function showConfirmForm() {
		ob_clean();
		
		$this->smarty->assign('title', 'Вход в систму');
        $this->smarty->assign('headerTitle', 'Вход в систму');

        // Загружаем header.tpl
        $header = $this->smarty->fetch('headerauth.tpl');

        // Присваиваем заголовок в основной шаблон
        $this->smarty->assign('header', $header);
        $this->smarty->display('confirm_code.tpl');
    }

    // Обработка подтверждения кода
    public function confirmCode() {ob_clean();
        $enteredCode = $_POST['code'] ?? '';

        if ($enteredCode == $_SESSION['code']) {
			session_regenerate_id(true); // Обновляет ID сессии, предотвращая угон сессии
            $_SESSION['authenticated'] = true;
            unset($_SESSION['code']); // Удаляем код после успешного входа
            header("Location: index.php?action=dashboard");
        } else {
            $this->smarty->assign('error', 'Invalid confirmation code');
            $this->smarty->display('confirm_code.tpl');
        }
    }

    // Отображение главной страницы после авторизации
    public function dashboard() {
		ob_clean();
        checkAuth(); // Проверка авторизации
		$this->smarty->assign('title', 'Главная страница');
        $this->smarty->assign('headerTitle', 'Главная страница');
        // Загружаем header.tpl
        $header = $this->smarty->fetch('header.tpl');
		$menu = $this->smarty->fetch('menu.tpl');
		$footer = $this->smarty->fetch('footer.tpl');
        // Присваиваем заголовок в основной шаблон
        $this->smarty->assign('header', $header);
        $this->smarty->assign('menu', $menu);
        $this->smarty->assign('footer', $footer);
		
        $this->smarty->assign('username', $_SESSION['username']);
        $this->smarty->display('dashboard.tpl');
    }

    // Отправка кода подтверждения на email
    private function sendConfirmationCode($email, $code) {
        $subject = 'Your confirmation code';
        $message = 'Your confirmation code is: ' . $code;
        $headers = 'From: ' . $this->config['email_from'];
		$smtpConfig = $this->userModel->getSmtpSettingsByCompanyId(1);
		print_r($smtpConfig);
        $mailService = new MailService($smtpConfig);
		try {
                $subject = "Код - ". $code;
                $body = "<h1>Код </h1><p>".$code."</p>";
                $mailService->sendMail($email, $subject, $body);
            } catch (Exception $e) {
                $this->smarty->assign('error', 'код отправлен, but email sending failed: ' . $e->getMessage());
            }
		
	}
	
	// Отображение формы регистрации
    public function showRegisterForm() {
        $this->smarty->display('register.tpl');
    }

    // Обработка регистрации
    public function register() {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        // Проверка на заполненность полей
        if (empty($login) || empty($password) || empty($email)) {
            $this->smarty->assign('error', 'All fields are required');
            $this->smarty->display('register.tpl');
            return;
        }

        // Попытка зарегистрировать пользователя
        if ($this->userModel->registerUser($login, $password, $email)) {
            header("Location: index.php?action=showLoginForm");
        } else {
            $this->smarty->assign('error', 'Registration failed. User may already exist.');
            $this->smarty->display('register.tpl');
        }
    }
	
}
$authController = new AuthController($smarty, $db);
?>