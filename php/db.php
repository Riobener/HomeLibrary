<?php
$servername = "localhost"; // локалхост
$username = "root"; // имя пользователя
$password = ""; // пароль если существует
$dbname = "mysuperdnb";
@$mysql = mysqli_connect($servername, $username, $password, $dbname);
