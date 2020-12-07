<?php
require "auth.php";
global $totalUser;
setcookie('email', $totalUser['email'], time() - 3600, '/');
header("Location: ../");
?>