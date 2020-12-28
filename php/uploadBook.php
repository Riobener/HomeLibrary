<?php
require_once "../php/db.php";
require_once "../classes/FileManager.php";
require_once "../classes/LibraryManager.php";
if (isset($_POST['submit'])) {
    $fileManager = new FileManager();
    $libraryManager = new LibraryManager();
    $books = $libraryManager->getBooks();
    $lastID = $books[0]['id'];
    $filePath = $fileManager->createStorage($lastID+1).'/';
    $fileManager->addFile('fileImage',$filePath,1);
    $fileManager->addFile('fileText',$filePath,0);

    $name = trim($_POST['name']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);

    $mysql = dbConnect();
    $sqlBook = "INSERT INTO books (name, authors, categories, description, storage)
 VALUES ('$name','$author','$category','$description','$filePath')";
    $sqlCat = "UPDATE category SET book_count = book_count + 1 WHERE id='$category'";
    $mysql->query($sqlBook);
    $mysql->query($sqlCat);
    dbClose($mysql);
    header("Location: ../forms/main-page.php");
}
?>