<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">        
        <title><?php echo \App\Transaction\Html::get_title(); ?></title>
        <meta name="Keywords" content="<?php echo \App\Transaction\Html::get_keyword(); ?>" />
        <meta name="Description" content="<?php echo \App\Transaction\Html::get_description(); ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo HTML_ROOT . 'css/site.css'; ?>" />            
        <link rel="stylesheet" type="text/css" href="<?php echo HTML_ROOT . 'css/front.css'; ?>" />            
        <!--[if IE]>
            <link  rel="stylesheet" type="text/css" href="/css/site_ie.css" />    
        <![endif]-->            
        <link rel="shortcut icon" href="<?php echo HTML_ROOT . 'image/icon/favicon.ico'; ?>" />
        <script type="text/javascript" src="<?php echo HTML_ROOT . 'js/jquery/jquery-1.8.1.min.js'; ?>"></script>
    </head>
    <body class='zx-front-body'>	
        <div class='zx-front-header'>
            <div class='zx-front-logo'>
                <a href='/' title='baoxian.com.au'><img src="<?php echo HTML_ROOT . 'image/logo.png'; ?>" alt="baoxian.com.au logo"/></a>
                <a href='/' title='baoxian.com.au'><mark>Baoxian</mark>.com.au</a>
            </div>
            <nav class='zx-front-top-menu'>
                <ul>
                    <?php
                    if ($blog_cats) {
                        foreach ($blog_cats as $cat) {
                            $link = HTML_ROOT . 'blgcategory/show/' . $cat['id'];
                            ?>
                            <li><a href="<?php echo $link; ?>" title="<?php echo $cat['title']; ?>"><?php echo $cat['title']; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                    <li>About Us</li>
                    <li>Contact Us</li>
                </ul>
            </nav>
        </div>
        <div class="zx-front-clear-both"></div>