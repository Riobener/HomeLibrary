<?php
require "db.php";
if (isset($_POST['submit'])) {

    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    global $mysql,$dbname;
    $qry = "SELECT * FROM `$dbname` WHERE `email` = '$user' AND `password` = '$pass'";
    if ($mysql->query($qry) == true){
        header("Location: ../forms/main.php");
    }

}
?>
