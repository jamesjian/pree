<?php
ob_start("ob_gzhandler");
define('PHP_ROOT', dirname(__DIR__) . '/');  
define('HTML_ROOT', '/pree/public/');  
define('LIBRARY_PATH', PHP_ROOT . 'library/');
define('SYSTEM_PATH', LIBRARY_PATH . 'zx/');
define('APPLICATION_PATH', PHP_ROOT . 'application/');
include APPLICATION_PATH . 'config/constant.php';

include SYSTEM_PATH . 'autoloader.php';

//\Zx\Test\Test::object_log('lob', $_SERVER, __FILE__, __LINE__, __CLASS__, __METHOD__);
\Zx\Controller\Application::run();
ob_end_flush();
