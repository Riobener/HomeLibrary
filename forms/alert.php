<script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
</script>
<link rel="stylesheet" type="text/css" href='css/alert.css'/>
<?php
require "../php/db.php";
global $mysql;
session_start();
if ($mysql && $_SESSION['count'] == 0):
    $_SESSION['count']++;
    ?>
    <div class="alert success">
        <strong>Успешное подключение к базе данных!</strong>
    </div>
<?php elseif (!$mysql): ?>
    <div class="alert danger">
        <strong>Не удалось подключиться к базе данных!</strong>
    </div>
<?php
elseif ($_SESSION['flag'] == 1):
    $_SESSION['flag'] = 0
    ?>
    <div class="alert accountcreate">
        <strong>Теперь вы можете войти под своей почтой и паролем!</strong>
    </div>
<?php
elseif ($_SESSION['flag'] == -1):
    $_SESSION['flag'] = 0
    ?>
    <div class="alert errorpass">
        <strong>Пароли не совпадают! Введите данные еще раз</strong>
    </div>
<?php endif ?>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.alert').fadeOut("slow");
        }, 2000);
    });
</script>

