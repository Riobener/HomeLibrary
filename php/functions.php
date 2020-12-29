<?php
require_once "db.php";
//проверка, является ли пользователь сессии, админом.
function isAdmin($user)
{
    $mysql = dbConnect();
    $qry = $mysql->query("SELECT `level` FROM `users` WHERE `email` = '$user'");
    $totalUser = $qry->fetch_assoc();
    dbClose($mysql);
    if ($totalUser['level'] == 2) {
        return true;
    } else {
        return false;
    }
}
//проверка, является ли пользователь сессии, модератором.
function isModerator($user)
{
    $mysql = dbConnect();
    $qry = $mysql->query("SELECT `level` FROM `users` WHERE `email` = '$user'");
    $totalUser = $qry->fetch_assoc();
    dbClose($mysql);
    if ($totalUser['level'] == 1) {
        return true;
    } else {
        return false;
    }
}
//возвращает данные о пользователе. На вход подается $_SESSION['user']
function getUser($user)
{
    $mysql = dbConnect();
    $sql = $mysql->query("SELECT * FROM `users` WHERE `email` LIKE '%$user%' OR `id` LIKE '%$user%'");
    $row = $sql->fetch_assoc();
    dbclose($mysql);
    return $row;
}
//регистрирует пользователя, добавляя его пароль и email, с начальным уровнем доступа - 0.
function regUser($user, $pass)
{
    $mysql = dbConnect();
    if ($mysql->query("INSERT INTO users (email, password, level)
VALUES ('$user','$pass',0)")) {
        dbClose($mysql);
        return true;
    }
    dbClose($mysql);
    return false;
}
//проверка, существует ли такой пользователь в бд. Необходимо при регистрации.
function isUserExist($user)
{
    $mysql = dbConnect();
    $result = $mysql->query("SELECT * FROM `users` WHERE `email`='$user'");
    dbClose($mysql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
//проверка, являются ли полученные данные верными. Возвращает true, если пользователь ввел все о себе правильно.
function checkUser($user, $password)
{
    if (($user == "") || ($password == "")) return false;
    $mysql = dbConnect();
    $result = $mysql->query("SELECT `password` FROM `users` WHERE `email` = '$user'");
    $queryRes = $result->fetch_assoc();
    $hash = $queryRes['password'];
    dbClose($mysql);
    return password_verify($password, $hash);
}
//проверка, авторизован ли пользователь.
function isLoggedIn()
{
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['password'])) {
        if (checkUser($_SESSION['user'], $_SESSION['password'])) {
            return true;
        }
    }
    return false;
}
