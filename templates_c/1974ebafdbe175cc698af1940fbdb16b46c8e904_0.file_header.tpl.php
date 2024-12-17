<?php
/* Smarty version 5.4.0, created on 2024-11-27 20:02:46
  from 'file:header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674750b64c74b3_67066439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1974ebafdbe175cc698af1940fbdb16b46c8e904' => 
    array (
      0 => 'header.tpl',
      1 => 1726212292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674750b64c74b3_67066439 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\AppServ\\www\\templates';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head class="loading" lang="en" data-textdirection="ltr">
  <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title><?php echo $_smarty_tpl->getValue('title');?>
</title>
  <?php echo '<script'; ?>
 type="text/javascript" src="templates/js/jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/js/jquery-ui.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/js/jquery.cookie.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/js/function.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="templates/js/js/call.js"><?php echo '</script'; ?>
>
	<link href="templates/js/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" href="templates/js/oktell/oktell-panel.css" />
  <link rel="apple-touch-icon" href="images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/templates/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/templates/css/components.css">
    <link rel="stylesheet" type="text/css" href="/templates/css/pages/page-auth.css">
	<link rel="apple-touch-icon" href="/euscu/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/eusc/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">	
    <link rel="stylesheet" type="text/css" href="/euscu/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/euscu/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/euscu/css/components.css">
    <link rel="stylesheet" type="text/css" href="/euscu/css/core/menu/menu-types/horizontal-menu.css">
	<link rel="stylesheet" type="text/css" href="/euscu/css/core/menu/menu-types/horizontal-menu.min.css">
	<!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/themes/semi-dark-layout.min.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/plugins/extensions/ext-component-toastr.min.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/assets/css/style.css">
    <!-- END: Custom CSS-->
	
	<!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/plugins/extensions/ext-component-toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/euscu/app-assets/css/pages/app-invoice-list.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/euscu/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<body class="pace-done horizontal-layout horizontal-menu footer-static menu-expanded navbar-static" data-open="hover" data-menu="horizontal-menu" data-col=""><?php }
}
