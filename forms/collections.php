<?php
require_once "../php/functions.php";
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');

if (!isLoggedIn()):
    header('Location: ../');
    ?>

<?php else:?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница</title>

    <link rel="stylesheet" type="text/css" href='css/header.css'/>
    <link rel="stylesheet" type="text/css" href='css/sidebar.css'/>
    <link rel="stylesheet" type="text/css" href='css/collection-dashboard.css'/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
        }

        #cont {
            overflow-y: hidden;
            overflow-x: hidden;
            padding-left: 0;
            padding-right: 0;
        }
        .list-group{
            max-height: 450px;
            overflow-y:scroll;
        }
        @media (max-height: 768px){
            .list-group{
                max-height: 300px;
                overflow-y:scroll;
            }
        }
        @media (max-height: 519px){
            .list-group{
                max-height: 200px;
                overflow-y:scroll;
            }
        }
    </style>


</head>
<body>

<div id="cont" class="container-fluid h-100">
    <?php require "header.php" ?>

    <div class="row h-100">
        <div id= "side-bar" class="col-xl-3 col-lg-3 col-5 col-sm-4 .col-xxl-3"> <?php require "sidebar.php" ?></div>
        <div class="col-xl-9 col-lg-9 col-7 col-sm-8 .col-xxl-9"><p>
            <h1>Dashboard</h1></p></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
<?php endif ?>
</html>
