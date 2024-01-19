<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
</head>
<body>

<div id="login-container">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" id="bouton_valider" value="Login">
    </form>
</div>
<p class="erreur">{$erreur}</p>
</body>
</html>
