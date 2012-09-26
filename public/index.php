<?php
ob_start("ob_gzhandler");

include '../application/config/constant.php';

include SYSTEM_PATH . 'autoloader.php';

include APPLICATION_PATH . 'config/mysql.php';
//\Zx\Test\Test::object_log('lob', $_SERVER, __FILE__, __LINE__, __CLASS__, __METHOD__);
\Zx\Controller\Application::run();
ob_end_flush();
