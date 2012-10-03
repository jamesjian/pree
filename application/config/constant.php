<?php
//general 
define('FRONT_VIEW_PATH', APPLICATION_PATH . 'module/front/view/');
define('ADMIN_VIEW_PATH', APPLICATION_PATH . 'module/admin/view/');
define('FRONT_HTML_ROOT', HTML_ROOT . 'front/');
define('ADMIN_HTML_ROOT', HTML_ROOT . 'admin/');


define('BR', '<br />');
define('LOG_FILE',PHP_ROOT . 'public/test/my_log.php');
define('MAXIMUM_ROWS',999999);
define('URL_PREFIX', HTML_ROOT); 


define('NUM_OF_RECORDS_IN_ADMIN_PAGE', 30); 
define('NUM_OF_BLOGS_IN_CAT_PAGE', 30); 
define('NUM_OF_ITEMS_IN_PAGINATION', 11); //use odd number


//namespace related
define('APP_NAMESPACE','App');
define('CONTROLLER_NAMESPACE','Controller');
define('MODEL_NAMESPACE','Model');
define('VIEW_NAMESPACE','View');
define('FRONT_NAMESPACE','Front');
define('MEMBER_NAMESPACE','Mem');
define('ADMIN_NAMESPACE','Admin');

//database related
define('DBNAME','z2');
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');