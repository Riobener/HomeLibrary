<?php
require_once "../php/db.php";
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);

    $mysql = dbConnect();
    $sql = "INSERT INTO books (name, authors, categories, description)
 VALUES ('$name','$author','$category','$description')";
    $mysql->query($sql);
    dbClose($mysql);
} else {
    echo "Вход не сработал";
}
?>