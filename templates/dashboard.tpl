{$header}
{$menu}
        <h1>, {$username|escape}</h1>

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
{$footer}