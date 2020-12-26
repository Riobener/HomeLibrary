<?php
require_once "db.php";
function isAdmin($user)
{
    $mysql = dbConnect();
    $qry = $mysql->query("SELECT `level` FROM `users` WHERE `email` = '$user'");
    $totalUser = $qry->fetch_assoc();
    dbClose($mysql);
    if($totalUser['level']==2){
        return true;
    }
    else{
        return false;
    }
}
function isModerator($user){
    $mysql = dbConnect();
    $qry = $mysql->query("SELECT `level` FROM `users` WHERE `email` = '$user'");
    $totalUser = $qry->fetch_assoc();
    dbClose($mysql);
    if($totalUser['level']==1){
        return true;
    }
    else{
        return false;
    }
}

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
