<?php
if(DEBUG){echo'boot.php';}
include( CONFDIR . '/config.db.php' );
include( CONFDIR . '/config.cfg.php' );
include( DEVDIR . '/class.mysql.php' );
include( DEVDIR . '/class.mail.php' );
include( DEVDIR . '/class.functions.php' );
include( DEVDIR . '/class.controller.php' );
include( DEVDIR . '/class.init.php' );


require_once VENDOR.'autoload.php'; // Подключаем автозагрузку библиотек (PHPMailer и mPDF)

use Mpdf\Mpdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


@header( 'Content-type: text/html; charset=utf-8' );
@header( 'Last-Modified: ' . @gmdate( 'D, d M Y H:i:s', @strtotime( '-1 day' ) ) . ' GMT' );
@header( 'Cache-Control: no-store, no-cache, must-revalidate' );
@header( 'Expires: 0' );
@header( 'Pragma: no-cache' );


require MODELS.'/Price.php';

// Подключаем файл с функцией checkAuth()
require_once LIB.'/auth.php';



if (isset($_POST['logout'])) {
    logout();
}
// Подключаем файл с маршрутизацией
require DEVDIR.'/routes.php';
var_dump($_SESSION);
