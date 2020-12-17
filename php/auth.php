<?php
require "db.php";
if (isset($_POST['submit'])) {

    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    global $mysql;
    $qry = $mysql->query("SELECT * FROM `users` WHERE `email` = '$user' AND `password` = '$pass'");
    $totalUser = $qry->fetch_assoc();

    session_start();
    if ($totalUser != null) {
        setcookie('email', $totalUser['email'], time() + 3600, '/');
        $mysql->close();
        echo $totalUser['email'];
        echo $_COOKIE['email'];
        header('Location: ../forms/main.php');
        exit();
    } else {
        $_SESSION['flag'] = -2;
        header('Location: ../forms/sign-in.php');
        exit();
    }


}
?>
