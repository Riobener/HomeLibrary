<?php
require 'db.php';
if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['flag'] = 0;
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $confpas = trim($_POST['confirm-password']);
    global $dbname;
    if ($pass == $confpas) {
        $sql = "INSERT INTO $dbname (email, password, info)
VALUES ('$user', '$pass', 'какой-то хрычь')";
        global $mysql;
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

?>
