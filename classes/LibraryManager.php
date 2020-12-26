<?php

require_once "../php/db.php";
class LibraryManager
{
    function getCategories(){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `category`");
        while($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }
    function getBooks(){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books`");
        while($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }
}