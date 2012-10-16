<?php
define('PHP_ROOT', dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR);  
//echo PHP_ROOT;
/*
  F:\jian\wamp\www\pree\
  /home1/huarend1/public_html/baoxiancom/
 * 
 */
include PHP_ROOT . 'application/config/constant.php';
//echo PHP_ROOT;
include SYSTEM_PATH . 'autoloader.php';
$a = \App\Model\Article::get_one(1);
var_dump($a);
$description = 'this is a description';
\Zx\Test\Test::object_log('$description', $description, __FILE__, __LINE__, __CLASS__, __METHOD__);    
\Zx\Test\Test::object_log('$description', $a['title'], __FILE__, __LINE__, __CLASS__, __METHOD__);    
require LIBRARY_PATH . 'Swift-4.2.1/lib/swift_required.php';