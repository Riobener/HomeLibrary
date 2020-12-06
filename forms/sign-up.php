<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>

<link rel="stylesheet" type="text/css" href='css/sign-up.css'/>
<body>
<?php require 'alert.php'; ?>
<div class="signup-block">
    <form class="form-signup" action="../php/registration.php" method="post">
        <h2 class="form-signup-heading">Регистрация</h2>
        <div class="control-email">
            <input type="email" class="form-control" name="username" placeholder="Введите почту" required=""/>
        </div>
        <div class="control-password">
            <input type="password" class="form-control" name="password" placeholder="Придумайте пароль" required=""/>
        </div>
        <div class ="confirm-password">
            <input type="password" class="form-control" name="confirm-password" placeholder="Подтвердите пароль" required=""/>
        </div>
        <div class="submit-block">
            <button type="submit" name="submit" value = 'send message' class="submit-button">Зарегистрироваться</button>
        </div>
        <div class = "signin-link">
            <a href = "sign-in.php">Уже есть аккаунт? Войдите</a>
        </div>
    </form>
</div>


</body>
</html>