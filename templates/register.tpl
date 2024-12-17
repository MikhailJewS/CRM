<!-- views/templates/register.tpl -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> <!-- Подключите стили -->
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>

        <!-- Вывод сообщения об ошибке -->
        {if $error}
            <div class="error-message">
                <p>{$error}</p>
            </div>
        {/if}

        <!-- Форма регистрации -->
        <form action="index.php?action=register" method="post">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>