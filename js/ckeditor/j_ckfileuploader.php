<?php
//copy the following contants from index.php
define('PHP_ROOT', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR);  

include PHP_ROOT . 'application/config/constant.php';

include SYSTEM_PATH . 'autoloader.php';

$ck_upload_path = \App\Transaction\Session::get_ck_upload_path();
include_once('j_ckedit.class.php');
$upload_dir = 'upload/'  .$ck_upload_path;
echo CKEDITOR::ckFile($upload_dir);
