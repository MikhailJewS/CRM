<!-- views/templates/add_customer.tpl -->

<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <h1>Добавить покупателя</h1>

    {if $message}
        <p>{$message}</p>
    {/if}

    <form method="post" action="index.php?action=addCustomer">
        <label for="name">Имя покупателя:</label>
        <input type="text" name="name" required>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>