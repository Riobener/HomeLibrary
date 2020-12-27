<?php
require_once "../php/functions.php";
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');

if (!isLoggedIn()):
    header('Location: ../');
    ?>

<?php else: ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href='css/header.css'/>
    <title>Страница книги</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        #cont {
            overflow-y: hidden;
            overflow-x: hidden;
            padding-left: 0;
            padding-right: 0;
        }

        .bookPage {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .fullImage {
            display: block;
            margin-right: auto;
            margin-bottom: 10px;
            max-width: max-content;
            max-height: max-content;
            padding-left: 10px;
            padding-top: 10px;
        }

        .textCol {
            padding-left: 0;
        }

        .imgCol {
            padding-right: 0;
        }
    </style>
</head>
<body>
<div id="cont" class="container-fluid h-100">
    <?php require_once "header.php";
    echo '<div class="name-section mt-2" style="text-align: center">
            <h3>Страница книги</h3>
        </div>';
    require_once "../classes/LibraryManager.php";
    require_once "../classes/FileManager.php";
    $libManager = new LibraryManager();
    $fileManager = new FileManager();
    $book = $libManager->getBookByID($_GET['book']);
    $categoryName = $libManager->getCategoryByID($book['categories']);
    if (isset($_GET['book']) && isset($book)) {
        echo ' 
        <div class="container mt-4 bookPage">

                <div class="card-deck">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4 imgCol">
                                <img class="card-img-top fullImage" src="' . $fileManager->getImagePath($book['id']) . '">
                            </div>
                            <div class="col-md-8 textCol">
                                <div class="card-body">';
        echo '<h3 class="card-title">' . $book['name'] . '</h3>';
        echo '<p class="card-text mt-3"><b>Автор: </b> ' . $book['authors'] . '</p>';
        echo '<p class="card-text"><b>Жанр: </b>' . $categoryName['name'] . '</p>';
        echo '<p class="card-text"><small class="text-muted"">' . $book['description'] . '</small></p>';
        echo '<a class="btn btn-success p-2" href="../forms/book-page.php?book=' . $book['id'] . '"' . ' style="width:150px">Читать</a><br/>';
        echo '<a class="btn btn-success mt-2 p-2" href="../forms/book-page.php?book=' . $book['id'] . '"' . ' style="width:200px">Добавить в избранное</a><br/>';
        if(isAdmin($_SESSION['user'])||isModerator($_SESSION['user'])){
            echo '<a class="btn btn-danger p-2 mt-2" href="../forms/book-page.php?book=' . $book['id'] . '"' . ' style="width:170px">Удалить</a>';
        }
        echo '</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        ';
    } else {
        header('Location: ../forms/main-page.php');
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

<?php endif ?>
</html>
