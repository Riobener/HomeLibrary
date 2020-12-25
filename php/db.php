<?php
function dbConnect(){
        return new mysqli("localhost", "root", "", "mysuperdnb");
}
function dbClose($mysqli){
    $mysqli->close();
}

