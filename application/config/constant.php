<?php
define('LIBRARY_PATH','../library/');
define('SYSTEM_PATH','../library/zx/');
define('APPLICATION_PATH','../application/');
define('FRONT_VIEW_PATH', APPLICATION_PATH . 'module/front/view/');
define('ADMIN_VIEW_PATH', APPLICATION_PATH . 'module/admin/view/');
define('PHP_ROOT', dirname(dirname(__DIR__)) . '/');  //relative to current folder
define('HTML_ROOT', '/z2/public/');  //relative to current folder
define('BR', '<br />');
define('LOG_FILE',PHP_ROOT . 'public/test/my_log.php');
define('MAXIMUM_ROWS',999999);
define('URL_PREFIX', '/z2/public/'); 
define('NUM_OF_BLOGS_IN_CAT_PAGE', 30); 
define('NUM_OF_ITEMS_IN_PAGINATION', 11); //use odd number

include 'namespace.php';