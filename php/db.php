<?php
//возращает соединение с базой данных.
function dbConnect(){
        return new mysqli("localhost", "root", "", "mysuperdnb");
}
//закрывает соединение с базой данных.
function dbClose($mysqli){
    $mysqli->close();
}

