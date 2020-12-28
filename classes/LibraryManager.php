<?php

require_once "../php/db.php";
require_once "../php/functions.php";

class LibraryManager
{
    function getCategories()
    {
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `category` ORDER BY `name`ASC");
        while ($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }

    function getAllFavoriteID($user)
    {
        $userInfo = getUser($user);
        $userID = $userInfo['id'];
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `favorite` WHERE `userID`='$userID'");
        while ($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        if(isset($allRows)){
            return $allRows;
        }else{
            return null;
        }
    }

    function checkFavorite($user, $bookID)
    {
        $userInfo = getUser($user);
        $userID = $userInfo['id'];
        //echo'<br>'.$userID;
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `favorite` WHERE `userID`='$userID'");
        while ($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        if (isset($allRows)) {
            foreach ($allRows as $value) {
                if ($bookID == $value['bookID']) {
                    return true;
                }
            }
        }
        return false;
    }

    function getCategoryByID($catID)
    {
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `category` WHERE `id` = '$catID'");
        $row = $sql->fetch_assoc();
        dbclose($mysql);
        return $row;
    }

    function getBookByID($bookID)
    {
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` WHERE `id` = '$bookID'");
        $row = $sql->fetch_assoc();
        dbclose($mysql);
        return $row;
    }

    function findBook($searchField)
    {
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` WHERE `name` LIKE '%$searchField%' 
OR `authors` LIKE '%$searchField%' OR `description` LIKE '%$searchField%'");
        $row = $sql->fetch_assoc();
        dbclose($mysql);
        return $row;
    }
    function getFavoriteBooksByID($idString){
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` WHERE `id` IN ($idString) ORDER BY `id`ASC");
        while ($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbClose($mysql);
        return $allRows;
    }
    function getBooks()
    {
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books` ORDER BY `id`DESC");
        while ($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }

    function getBooksByCat($categoryID)
    {
        $mysql = dbConnect();
        $sql = $mysql->query("SELECT * FROM `books`WHERE categories='$categoryID'ORDER BY `id`DESC");
        while ($row = $sql->fetch_assoc()) {
            $allRows[] = $row;
        }
        dbclose($mysql);
        return $allRows;
    }
    function deleteBook($bookID){
        $mysql = dbConnect();
        $sqlBook = "DELETE FROM `books` WHERE `id`='$bookID'";
        $mysql->query($sqlBook);
        dbclose($mysql);
    }

    function simpleFb2ShowParser($filePath)
    {
        //Читаем файл.
        //Создаем XML документ
        $doc = new DOMDocument();
        //Отключаем проверку ошибок
        $doc->strictErrorChecking = false;
        $doc->recover = true;
        //Загружаем содержимое файла и выводим на экран
        $load = $doc->load($filePath, LIBXML_NOERROR);
        $section = $doc->getElementsByTagName('section');
        $section_count = count($section);
        for ($i = 1; $i < $section_count; $i++) {
            $stringXML = $doc->saveXML($section->item($i));
            echo $stringXML;
        }
    }


}