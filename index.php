<?php
ob_start("ob_gzhandler");
define('PHP_ROOT', __DIR__ . DIRECTORY_SEPARATOR);  
define('URL_PREFIX', '/pree/'); 
define('HTML_ROOT', 'http://' . $_SERVER['SERVER_NAME'] .URL_PREFIX);  
include PHP_ROOT . 'application/config/constant.php';

include SYSTEM_PATH . 'autoloader.php';

//\Zx\Test\Test::object_log('lob', $_SERVER, __FILE__, __LINE__, __CLASS__, __METHOD__);
\Zx\Controller\Application::run();
ob_end_flush();