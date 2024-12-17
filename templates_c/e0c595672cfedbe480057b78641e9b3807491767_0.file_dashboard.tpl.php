<?php
/* Smarty version 5.4.0, created on 2024-11-28 17:01:56
  from 'file:dashboard.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674877d4271fa9_89905977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0c595672cfedbe480057b78641e9b3807491767' => 
    array (
      0 => 'dashboard.tpl',
      1 => 1732649630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674877d4271fa9_89905977 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\AppServ\\www\\templates';
echo $_smarty_tpl->getValue('header');?>

<?php echo $_smarty_tpl->getValue('menu');?>

        <h1>, <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('username'), ENT_QUOTES, 'UTF-8', true);?>
</h1>

        <!-- Меню пользователя -->
        <nav aria-label="User menu">
            <ul>
                <li><a href="index.php?action=addCustomer">Добавить покупателя</a></li>
                <li><a href="index.php?action=addSupplier">Добавить поставщика</a></li>
                <li><a href="index.php?action=addOrder">Добавить заказ</a></li>
                <li><a href="index.php?action=addShipment">Добавить отгрузку</a></li>
                <li><a href="index.php?action=addReceipt">Добавить поступление</a></li>
                <li><a href="index.php?action=settings">Настройки</a></li>
                <li><a href="index.php?action=logout">Выход</a></li>
            </ul>
        </nav>

        <!-- Горизонтальное меню -->
        <nav aria-label="Main menu">
            <ul>
                <li><a href="index.php?action=customers">Покупатели</a></li>
                <li><a href="index.php?action=suppliers">Поставщики</a></li>
                <li><a href="index.php?action=price">Прайс</a></li>
                <li><a href="index.php?action=orders">Заказы</a></li>
                <li><a href="index.php?action=shipmentSchedule">График отгрузок</a></li>
                <li><a href="index.php?action=receipts">Поступления</a></li>
                <li><a href="index.php?action=bonus">Премия</a></li>
            </ul>
        </nav>
    </div>
<?php echo $_smarty_tpl->getValue('footer');
}
}
