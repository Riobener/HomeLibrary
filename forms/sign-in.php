<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="no-cache">
    <meta charset="UTF-8">
    <title>Вход</title>
</head>

<link rel="stylesheet" type="text/css" href='css/sign-in.css'/>
<body>
<?php
require 'alert.php';
?>
<?php
if (@$_COOKIE['email'] != ''):
    header('Location: main.php');
    ?>
<?php else: ?>
    <div class="signin-block">
        <form class="form-signin" action="../php/auth.php" method="post">
            <h2 class="form-signin-heading">Вход</h2>
            <div class="control-email">
                <input type="email" class="form-control" name="username" placeholder="Email Address" required=""/>
            </div>
            <div class="control-password">
                <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
            </div>
            <div class="submit-block">
                <button type="submit" name="submit" class="submit-button">Login</button>
            </div>
            <div class="signin-link">
                <a href="sign-up.php">Нету аккаунта? Зарегистрируйтесь</a>
            </div>
        </form>

    </div>
<?php endif ?>
</body>
</html>