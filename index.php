<?php
session_start();
$_SESSION['count']=0;
$_SESSION['flag']=0;
header('Location: forms/sign-in.php');
?>

