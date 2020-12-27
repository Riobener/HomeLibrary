<?php
require_once "../classes/FileManager.php";
require_once "../classes/LibraryManager.php";
if (isset($_GET['searchingField'])) {
    $info = $_GET['searchingField'];
    $libraryManager = new LibraryManager();
    $searchResult = $libraryManager->findBook($info);
    echo $searchResult['id'];
    if(isset($searchResult)){
        header("Location: ../forms/book-page.php?book=".$searchResult['id']);
    }else{
        header("Location: ../forms/main-page.php");
    }
}