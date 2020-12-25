<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<style>
    .alert {
        width: 220px;
        margin: 0 auto;
        text-align: center;
        display: flex;
        justify-content: center;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
require_once "../php/db.php";
$mysql = dbConnect();
if ($mysql && $_SESSION['count'] == 0):
    $_SESSION['count'] = 1;
    ?>
    <div class="alert alert-primary" role="alert">
        Успешное подключение к базе данных!
    </div>

<?php elseif (!$mysql): ?>
    <div class="alert alert-danger" role="alert">
        Не удалось подключиться к базе данных!
    </div>
<?php
elseif ($_SESSION['flag'] == 1):
    $_SESSION['flag'] = 0
    ?>
    <div class="alert alert-warning" role="alert">
        Теперь вы можете войти под созданным аккаунтом!
    </div>

<?php
elseif ($_SESSION['flag'] == -1):
    $_SESSION['flag'] = 0
    ?>
    <div class="alert alert-danger" role="alert">
        Пароли не совпадают! Повторите попытку.
    </div>

<?php
elseif ($_SESSION['flag'] == -2):
    $_SESSION['flag'] = 0
    ?>
    <div class="alert alert-danger" role="alert">
        Неверный логин или пароль!
    </div>

<?php
elseif ($_SESSION['flag'] == -3):
    $_SESSION['flag'] = 0
    ?>
    <div class="alert alert-danger" role="alert">
        Такой пользователь уже существует!
    </div>
<?php endif ?>


<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.alert').fadeOut("slow");
        }, 2000);
    });
</script>

