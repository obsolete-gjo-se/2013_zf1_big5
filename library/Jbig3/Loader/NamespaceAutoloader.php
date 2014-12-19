<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 07.05.13
 * Time: 13:13
 * To change this template use File | Settings | File Templates.
 */
namespace Jbig3\Loader;
class NamespaceAutoloader
{

    const FILE_EXTENSION = '.php';

    public static function autoload($className)
    {

        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $filePath = PROJECT_PATH . $className . NamespaceAutoloader::FILE_EXTENSION;
        include_once($filePath);

    }

    /*
     * als Beispiel für einen zweiten Loader - muss noch angepasst werden
     */

    public static function libraryLoader($className)
    {

        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $filePath = PROJECT_ROOT . $className . NamespaceAutoloader::FILE_EXTENSION;
        include_once($filePath);

    }
}
