<?php
session_start();
if ($_COOKIE['email'] == "") {
    $_SESSION['count'] = 0;
    $_SESSION['flag'] = 0;
    header('Location: forms/sign-in.php');
} else {
    header('Location: forms/main.php');
}



