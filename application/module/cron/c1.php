<?php

/*
  /home1/huarend1/public_html/baoxiancom/application/module/cron/c1.php
 * 
 */
include 'cron_head.php';

$description = Article::backup_sql();
$backup_path = PHP_ROOT . 'upload/backup/';
$file = $backup_path . 'article_' . date('Y-m-d') . '.php'; 
file_put_contents($file, $description);
//\Zx\Test\Test::object_log('$description', $description, __FILE__, __LINE__, __CLASS__, __METHOD__);      
$message = Swift_Message::newInstance();
$message->setSubject('article backup')
        ->setFrom(array(MAIL_USER => 'baoxian.com.au'))
        ->setTo(array('james.jian.hang@gmail.com'))
        //->setBody($description, 'text/html')  //use this to send text to email box
        ->attach(Swift_Attachment::fromPath($file));  //use this to send attachment to email box
Swiftmail::send_email($message);

