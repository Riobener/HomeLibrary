<?php
require_once "../php/db.php";
require_once "../classes/FileManager.php";
require_once "../classes/LibraryManager.php";

if (isset($_POST['submit'])) {
    session_start();
    $mysql = dbConnect();
    $info = trim($_POST['user']);
    $user = getUser($info);
    if(isset($user)){
        $userID = $user['id'];
        $sqlBook = "DELETE FROM `users` WHERE `id`='$userID'";
        $mysql->query($sqlBook);
        dbclose($mysql);
        $_SESSION['flag'] = 4;
        header('Location: ../admin/admin-panel.php');
    }else{
        $_SESSION['flag'] = -4;
        header('Location: ../admin/admin-panel.php');
    }
}
