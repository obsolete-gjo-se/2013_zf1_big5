<?php
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(__DIR__ . '/../../application'));
defined('PROJECT_ROOT') || define('PROJECT_ROOT', realpath(__DIR__ . '/../..'));

defined('LIBRARY') || define('LIBRARY', realpath(__DIR__ . '/../../library'));


defined('TEST_FIXTURES') || define('TEST_FIXTURES', realpath(__DIR__ . '/../../tests/fixtures'));

defined('APPLICATION_ENV') || define('APPLICATION_ENV', 
        (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Autoloader includieren:
//include_once(LIBRARY . '/Jbig3/Loader/NamespaceAutoloader.php');
//
//// es können beliebig viele Loader registriert werden:
//spl_autoload_register(array('Jbig3\Loader\NamespaceAutoloader', 'autoload'));
//spl_autoload_register(array('Jbig3\Loader\NamespaceAutoloader', 'libraryLoader'));

set_include_path(
        implode(PATH_SEPARATOR, 
                array(
                    LIBRARY, 
                    get_include_path(),
                    TEST_FIXTURES                    
                )));

require_once 'Zend/Application.php';