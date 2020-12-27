<?php

require_once "../php/db.php";
class LibraryManager
{
    function getCategories(){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `category` ORDER BY `name`ASC");
        while($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }
    function getCategoryByID($catID){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `category` WHERE `id` = '$catID'");
        $row = $sql->fetch_assoc();
        dbclose($mysql);
        return $row;
    }
    function getBookByID($bookID){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` WHERE `id` = '$bookID'");
        $row = $sql->fetch_assoc();
        dbclose($mysql);
        return $row;
    }
    function findBook($searchField){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` WHERE `name` LIKE '%$searchField%' 
OR `authors` LIKE '%$searchField%' OR `description` LIKE '%$searchField%'");
        $row = $sql->fetch_assoc();
        dbclose($mysql);
        return $row;
    }

    function getBooks(){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` ORDER BY `id`DESC");
        while($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }
    function getBooksByCat($categoryID){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books`WHERE categories='$categoryID'ORDER BY `id`DESC");
        while($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }


}