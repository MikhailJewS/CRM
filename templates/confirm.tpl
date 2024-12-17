<!-- views/templates/confirm.tpl -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Email</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .confirm-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
    }
    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <div class="confirm-container">
        <h1>Email Confirmation</h1>

        <!-- Вывод сообщения об ошибке, если оно есть -->
        {if $error}
            <div class="error-message">
                <p>{$error}</p>
            </div>
        {/if}

        <!-- Вывод сообщения об успешной отправке, если оно есть -->
        {if $message}
            <div class="success-message">
                <p>{$message}</p>
            </div>
        {/if}
    </div>
</body>
</html>
<!-- views/templates/confirm.tpl -->

<html>
<head>
    <title>Confirm Email</title>
</head>
<body>
	<form method="post" action="/verify-code">
		<label for="code">Введите код, отправленный на почту:</label>
		<input type="text" id="code" name="code" required>
		
		<button type="submit">Проверить</button>
	</form>
    {if $error}
        <p style="color:red;">{$error}</p>
    {/if}
    
    {if $message}
        <p>{$message}</p>
    {/if}
</body>
</html>