<?php
//copy the following contants from index.php
define('PHP_ROOT', dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR);  
define('HTML_ROOT', '/pree/public/');  
include PHP_ROOT . 'application/config/constant.php';

include SYSTEM_PATH . 'autoloader.php';
      //\Zx\Test\Test::object_log('lob', 'test', __FILE__, __LINE__, __CLASS__, __METHOD__);

$ck_upload_path = \App\Transaction\Session::get_ck_upload_path();
include_once('j_ckedit.class.php');
$upload_dir = 'upload' .DIRECTORY_SEPARATOR .$ck_upload_path . DIRECTORY_SEPARATOR;
echo CKEDITOR::ckFile($upload_dir);
