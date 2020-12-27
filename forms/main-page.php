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
    <title>Главная страница</title>
    <link rel="stylesheet" type="text/css" href='css/header.css'/>
    <link rel="stylesheet" type="text/css" href='css/sidebar.css'/>
    <link rel="stylesheet" type="text/css" href='css/favorites-dashboard.css'/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body{
            background: whitesmoke;
        }
        #cont {
            overflow-y: hidden;
            overflow-x: hidden;
            padding-left: 0;
            padding-right: 0;
        }

        .imageCard {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
            max-width: 150px;
            max-height: 270px;
        }

        .fullImage {
            display: block;
            margin-right: auto;
            margin-bottom: 10px;
            max-width: 250px;
            max-height: 350px;
            padding-left: 10px;
            padding-top: 10px;
        }

        .news {
            text-align: center;
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

<div id="cont" class="container-fluid  h-100">
    <?php require "header.php" ?>
    <div class="container">
        <div class="name-section" style="text-align: center">
            <h3>Новинки</h3>
        </div>
        <div class="card-group">
            <?php
            require_once "../classes/LibraryManager.php";
            require_once "../classes/FileManager.php";
            $manager = new LibraryManager();
            $fileManager = new FileManager();
            if(isset($_GET['cat'])){
                $books = $manager->getBooksByCat($_GET['cat']);
                if(!isset($books)){
                    echo '<div style="text-align: center;">
<h1>Книг нет и вообще ничего нет :(</h1>
</div>';
                }
            }else{
                $books = $manager->getBooks();
                if(!isset($books)){
                    echo '<div style="text-align: center;">
<h1>Книг нет и вообще ничего нет :(</h1>
</div>';
                }
            }
            $count = 1;
            foreach ($books as $value) {
                echo '<div class="card">
                <a href="../forms/book-page.php?book=' . $value['id'] . '">';
                echo '<img class="card-img-top imageCard" src="'.$fileManager->getImagePath($value['id']).'" alt="Card image cap">
                </a>';
                echo '<div class="card-body news">';
                echo '<h6 class="card-title">' . $value['name'] . '</h6>
                    <small><p class="card-text">' . $value['authors'] . '</p></small>
                    </div>
            </div>';
                if (($count) == 6) {
                    break;
                } else {
                    $count++;
                }
            }
            ?>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row no-gutters h-100">
            <div id="side-bar" class="col-xl-3 col-lg-3 col-5 col-sm-4 col-xxl-3">
                <?php require "sidebar.php" ?>
            </div>
            <div class="col-xl-9 col-lg-9 col-7 col-sm-8 .col-xxl-9">
                <div class="card-deck">
                    <!---->
                    <?php
                    foreach ($books as $value) {
                        $categoryName = $manager->getCategoryByID($value['categories']);
                        echo '<div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 imgCol">
                                                    <img class="card-img-top fullImage" src="'.$fileManager->getImagePath($value['id']).'">
                                                </div>
                                                <div class="col-md-8 textCol">
                                                    <div class="card-body">';

                        echo '<h3 class="card-title">' . $value['name'] . '</h3>';
                        echo '<p class="card-text mt-3"><b>Автор: </b> ' . $value['authors'] . '</p>';
                        echo '<p class="card-text"><b>Жанр: </b>' . $categoryName['name'] . '</p>';
                        echo '<p class="card-text"><small class="text-muted"">' . $value['description'] . '</small></p>';
                        echo '<a class="btn btn-success" href="../forms/book-page.php?book=' . $value['id'] . '"' . ' style="width:170px">На страницу книги</a>';
                        echo '                      
                                           </div>
                                        </div>
                                    </div>
                                </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>
<?php endif ?>
</html>
