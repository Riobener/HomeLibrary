<?php


class FileManager
{
    public static function getExtension($path)
    {
        return pathinfo($path,PATHINFO_EXTENSION);
    }

    public static function copyDirectory($src,$dst,$options=array())
    {
        $fileTypes=array();
        $exclude=array();
        $level=-1;
        extract($options);
        if(!is_dir($dst))
            self::mkdir($dst,$options,true);

        self::copyDirectoryRecursive($src,$dst,'',$fileTypes,$exclude,$level,$options);
    }

    public static function removeDirectory($directory)
    {
        $items=glob($directory.DIRECTORY_SEPARATOR.'{,.}*',GLOB_MARK | GLOB_BRACE);
        foreach($items as $item)
        {
            if(basename($item)=='.' || basename($item)=='..')
                continue;
            if(substr($item,-1)==DIRECTORY_SEPARATOR)
                self::removeDirectory($item);
            else
                unlink($item);
        }
        if(is_dir($directory))
            rmdir($directory);
    }
}