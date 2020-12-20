<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
if ($_COOKIE['email'] == ''):
    header('Location: ../');
    exit();
    ?>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>

    <link rel="stylesheet" type="text/css" href='css/header.css'/>
    <link rel="stylesheet" type="text/css" href='css/sidebar.css'/>
    <link rel="stylesheet" type="text/css" href='css/main-content.css'/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>


</head>
<body>
    <?php require "header.php" ?>
    <?php require "sidebar.php" ?>
    <div id="main-content">
        <p><h1>Здесь будет контент (Бог, дай мне сил)</h1></p>
    </div>

</body>
</html>
