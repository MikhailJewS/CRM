<?php
//index.php
	ob_clean();
	// Установите время жизни сессии (например, 30 минут = 1800 секунд)
	ini_set('session.gc_maxlifetime', 18000);
	// Установите время жизни cookie сессии (тоже 30 минут)
	session_set_cookie_params(18000);
	session_start();
	error_reporting(E_ALL);
	define( 'DEBUG', true);
	define( 'DS', DIRECTORY_SEPARATOR );
	define( 'ROOT_DIR', realpath( dirname( __FILE__ ) ) . DS );
	define( 'LIB', ROOT_DIR . 'lib' . DS );
	define( 'CONTROLLERS', ROOT_DIR . 'controllers' . DS );
	define( 'MODELS', ROOT_DIR . 'models' . DS );
	define( 'CONFDIR', ROOT_DIR . 'config' . DS );
	define( 'DEVDIR', ROOT_DIR . 'dev' . DS );
	define( 'MODULEDIR', ROOT_DIR . 'module' . DS );
	define( 'VENDOR', ROOT_DIR . 'vendor' . DS );
	require( DEVDIR . 'boot.php' );
