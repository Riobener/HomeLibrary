<?php
require 'db.php';
global $dbname, $mysql;
if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['flag'] = 0;
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $confirmPass = trim($_POST['confirm-password']);

    //Проверка на занятый email.
    $query = "SELECT * FROM `users` WHERE `email`='$user'";
    $result = $mysql->query($query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['flag'] = -3;
        header('Location: ../forms/sign-up.php');
        exit();
    } else {
        //Проверка на равенство паролей.
        if ($pass == $confirmPass) {
            $pass = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, password, storage_path)
VALUES ('$user', '$pass', 'обычный пользователь')";
            //Если запрос выполнился успешно, проходим дальше на страницу авторизации.
            if ($mysql->query($sql) == true) {
                $_SESSION['flag'] = 1;
                header('Location: ../forms/sign-in.php');
                exit();
            } else {
                echo "Ошибка: " . $mysql->error;
            }
        } else {
            $_SESSION['flag'] = -1;
            header('Location: ../forms/sign-up.php');
            exit();
        }
    }

}

