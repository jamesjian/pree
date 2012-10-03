<!DOCTYPE html>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">        
        <title><?php echo $title; ?></title>
        <meta name="keywords" content="<?php echo $keyword; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo HTML_ROOT . '/css/site.css'; ?>" />            
        <link rel="stylesheet" type="text/css" href="<?php echo HTML_ROOT . '/css/admin.css'; ?>" />            
        <!--[if IE]>
            <link  rel="stylesheet" type="text/css" href="/css/admin_ie.css" />    
        <![endif]-->            
<link rel="shortcut icon" href="<?php echo HTML_ROOT .'/image/icon/favicon.ico';?>" />
    </head>
    <body>
	<nav>
	<ul>
	<li>
	<?php 
	$link = ADMIN_HTML_ROOT . 'blog/retrieve';?>
	<a href="<?php echo $link;?>">Blog</a>	
	</li>
	</ul>
	</nav>
	
        <?php
        echo $content;
        ?>

        <script type="text/javascript" src="<?php echo HTML_ROOT . 'js/jquery/jquery-1.8.1.min.js';?>"></script>
        <script type="text/javascript" src="<?php echo HTML_ROOT . 'js/admin.js';?>"></script>
    </body>
</html>