<?php


class FileManager
{
    public function getExtension($path)
    {
        return pathinfo($path,PATHINFO_EXTENSION);
    }

    public function createUserStorage($userID){
        $filepath = $_SERVER["DOCUMENT_ROOT"]."/HomeLibrary/storage/".$userID;
        if(mkdir($filepath)){
            return $filepath;
        }else{
            die('Не удалось создать директорию под пользователя');
        }

    }
}