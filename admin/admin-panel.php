<?php
require_once "../php/functions.php";
if(!isLoggedIn()){
    header('Location: ../');
}else{
    if(isAdmin($_SESSION['user'])){
        echo "Добро пожаловать!";
    }else{
        header('Location: ../');
    }
}

