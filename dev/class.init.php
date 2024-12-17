<?php
define( 'HTTP_HOME_URL', $cfg['siteurl'] );
define( 'TIMEZONE', ($cfg['timezone'] * 60) );
define( 'TPLDIR', HTTP_HOME_URL."/templates/{$cfg["template"]}" );
require MODELS.'/User.php';
/*** ==============================
 * Подключение к базе данных
 * ==============================
 */
$db = new db( DBHOST, DBUSER, DBPASS, DBNAME, true );
/**
 * ==============================
 * Загрузка интерфейса
 * ==============================
 */
if ( isset($_COOKIE['lang']) and in_array($_COOKIE['lang'], array('ru', 'en')) ) {
    $l2cfg['lang'] = $_COOKIE['lang'];
    if ( $_COOKIE['lang'] == 'en' and file_exists(ROOT_DIR.'templates'.DS.$cfg['template'].'_en') ) {
        $cfg['template'] .= '_en';
    }
}
require_once ROOT_DIR.'lang'.DS.$cfg["lang"].'.php';
// Инициализация объекта пользователя
global $User;
$User = new User($db); // или как вы инициализируете объект пользователя

require_once LIB.'smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;
$smarty->assign('USER', $User); // Передаем $USER как глобальную переменную
$smarty->debugging = true;
$smarty->caching = false;
$smarty->cache_lifetime = 1;




/**
 * ==============================
 * Сайт отключен
 * ==============================
 */
if ( $cfg["offline"]["enable"] and !Functions::isAdmin() ) {
    echo ( "<html>\n<head>\n<title>{$l2cfg["title"]}</title>\n<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>\n</head>\n<body style='background:#ddfec6;'>\n<div align='center' style='padding-top: 200px;'>\n\t<div style='width: 500px; padding: 5px; background: #d95757; text-align: justify; border: 1px solid #000;'>{$l2cfg["offline"]["reason"]}</div>\n</div>\n</body>\n</html>\n<!-- 2008-2012 © STRESS WEB, http://stressweb.ru -->\n<!-- {version R13} -->" );
    exit;
}


/***==============================
 * Установка переменныйх
 * ===============================
 */
 $smarty->assign('USER', $User); // Передаем объект $USER в шаблон
 
$action = isset( $_REQUEST['action'] ) ? strval( $_REQUEST['action'] ):'showLoginForm';
$app = isset( $_REQUEST['f'] ) ? strval( $_REQUEST['f'] ):'';
$page = isset( $_REQUEST["page"] ) ? abs( intval($_REQUEST["page"]) ):1;