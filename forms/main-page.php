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
        .textCol{
            padding-left: 0;
        }
        .imgCol{
            padding-right: 0;
        }

    </style>
</head>
<body>

<div id="cont" class="container-fluid h-100">
    <?php require "header.php" ?>
    <div class="container">
        <div class="name-section" style="text-align: center">
            <h3>Новинки</h3>
        </div>
        <div class="card-group">
            <div class="card ">
                <a href="#">
                    <img class="card-img-top imageCard" src="../icons/book.jpg" alt="Card image cap">
                </a>
                <div class="card-body news">
                    <h6 class="card-title">Название</h6>
                    <p class="card-text">Автор</p>
                </div>
            </div>
            <div class="card ">
                <a href="#">
                    <img class="card-img-top imageCard" src="../icons/book.jpg" alt="Card image cap">
                </a>
                <div class="card-body news">
                    <h6 class="card-title">Название</h6>
                    <p class="card-text">Автор</p>
                </div>
            </div>
            <div class="card ">
                <a href="#">
                    <img class="card-img-top imageCard" src="../icons/book.jpg" alt="Card image cap">
                </a>
                <div class="card-body news">
                    <h6 class="card-title">Название</h6>
                    <p class="card-text">Автор</p>
                </div>
            </div>
            <div class="card ">
                <a href="#">
                    <img class="card-img-top imageCard" src="../icons/book.jpg" alt="Card image cap">
                </a>
                <div class="card-body news">
                    <h6 class="card-title">Название</h6>
                    <p class="card-text">Автор</p>
                </div>
            </div>
            <div class="card ">
                <a href="#">
                    <img class="card-img-top imageCard" src="../icons/book.jpg" alt="Card image cap">
                </a>
                <div class="card-body news">
                    <h6 class="card-title">Название</h6>
                    <p class="card-text">Автор</p>
                </div>
            </div>
            <div class="card ">
                <a href="#">
                    <img class="card-img-top imageCard" src="../icons/book.jpg" alt="Card image cap">
                </a>
                <div class="card-body news">
                    <h6 class="card-title">Название</h6>
                    <p class="card-text">Автор</p>
                </div>
            </div>

        </div>
    </div>
    <div class="container mt-4">
        <div class="row h-100">
            <div id="side-bar" class="col-xl-3 col-lg-3 col-5 col-sm-4 col-xxl-3">
                <?php require "sidebar.php" ?>
            </div>

            <div class="col-xl-9 col-lg-9 col-7 col-sm-8 .col-xxl-9">
                <div class="card-deck">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4 imgCol">
                                <img class="card-img-top fullImage" src="../icons/book.jpg">
                            </div>
                            <div class="col-md-8 textCol">
                                <div class="card-body">
                                    <h3 class="card-title">Название</h3>
                                    <p class="card-text">Автор</p>
                                    <p class="card-text"><small class="text-muted">Описание</small></p>
                                    <a class="btn btn-success p-1"href="#" style="width:120px"> Читать</a>
                                    <a class="btn btn-success p-1"href="#" style="width:200px"> Добавить в избранное</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
