<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<?php
if ($_COOKIE['email'] == ''):
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Location: ../');
    exit();
    ?>
<?php else:
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0'); ?>
<!DOCTYPE html>
<html lang="en">
<body>
<p>
    Чтобы выйти нажмите <a href="../php/exit.php">здесь.</a>
</p>
<div style="text-align: center;">
    <img src="../media/tenor.gif" width=250/>
    <video id='vid' width="535" height="400" controls loop>
        <source src="../media/vid.mp4" type="video/mp4">
    </video>
    <img src="../media/tenor.gif" width=250/>
</div>
<?php endif ?>
</body>
</html>
