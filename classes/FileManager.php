<?php


class FileManager
{
    function getImagePath($folderID)
    {
        $dir = $_SERVER["DOCUMENT_ROOT"] . "/HomeLibrary/storage/" . $folderID;;
        $files1 = scandir($dir);
        foreach($files1 as $value){
            if($value=='image.png'||$value=='image.jpg'){
                return  "../storage/" . $folderID."/".$value;
            }
        }
    }
    function getTextPath($folderID)
    {
        $dir = $_SERVER["DOCUMENT_ROOT"] . "/HomeLibrary/storage/" . $folderID;;
        $files1 = scandir($dir);
        foreach($files1 as $value){
            if($value=='text.txt'||$value=='image.docx'||$value=='image.fb2'){
                return $dir."/".$value;
            }
        }
    }
    function createStorage($objectID)
    {
        $filepath = $_SERVER["DOCUMENT_ROOT"] . "/HomeLibrary/storage/" . $objectID;
        if (@mkdir($filepath)) {
            return $filepath;
        } else {
            die('Не удалось создать директорию под книгу');
        }
    }

    //fileType = 1 - png,jpg. = 0 - text;
    function addFile($fileName, $path, $type)
    {
        if ($type == 0) {
            $name = 'text';
            $allowedfileExtensions = array('txt', 'doc', 'pdf');
        } else if ($type == 1) {
            $name = 'image';
            $allowedfileExtensions = array('png', 'jpg');
        }
        if (isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES[$fileName]['tmp_name'];
            $fileName = $_FILES[$fileName]['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = $name . '.' . $fileExtension;
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = $path;
                $dest_path = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $message = 'File is successfully uploaded.';
                } else {
                    $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                }
            }
        }


    }
}