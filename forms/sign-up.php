<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href='css/sign-up.css'/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<?php
if (@$_COOKIE['email'] != ''):
    header('Location: main.php');
    ?>
<?php else: ?>
    <div class="signup-block">

        <img class = "logoImage" src="../icons/mainLogo.png"/>
        <form class="form-signup" action="../php/registration.php" method="post">
            <?php
            require 'alert.php';
            ?>
            <h2 class="form-signup-heading">Регистрация</h2>
            <div class="control-email">
                <input type="email" class="form-control" name="username" placeholder="Введите почту" required=""/>
            </div>
            <div class="control-password">
                <input type="password" class="form-control" name="password" placeholder="Придумайте пароль"
                       required=""/>
            </div>
            <div class="confirm-password">
                <input type="password" class="form-control" name="confirm-password" placeholder="Подтвердите пароль"
                       required=""/>
            </div>
            <div class="submit-block">
                <button type="submit" name="submit" value='send message' class="btn btn-primary">Зарегистрироваться
                </button>
            </div>
            <div class="signin-link">
                <a href="sign-in.php">Уже есть аккаунт? Войти</a>
            </div>
        </form>
    </div>
    <img class = "bookShelf" src="../icons/bookShelf.png"/>
<?php endif ?>
</body>
</html>