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
        <link rel="shortcut icon" href="<?php echo HTML_ROOT . 'image/icon/favicon.ico?v3'; ?>" />
        <script type="text/javascript" src="<?php echo HTML_ROOT . 'js/jquery/jquery-1.8.1.min.js'; ?>"></script>
    </head>
    <body class='zx-front-body'>	
        <div class='zx-front-header'>
            <div class='zx-front-logo'>
                <a href='<?php echo HTML_ROOT; ?>' title='baoxian.com.au'>PREENET.com</a>

            </div>
            <nav class='zx-front-top-menu'>
                <ul>
                    <li><a href="<?php echo HTML_ROOT; ?>" title="homepage">Home</a></li>
                    <?php
                    if ($article_cats) {
                        $current_l1_menu = \App\Transaction\Session::get_front_current_l1_menu();
                        foreach ($article_cats as $cat) {
                            $link = HTML_ROOT . 'front/article/category/' . $cat['title'];
                            if ($current_l1_menu == $cat['title']) {
                                $active_class = ' class="zx-front-active-menu"';
                            } else {
                                $active_class = '';
                            }
                            ?>
                            <li <?php echo $active_class; ?>><a href="<?php echo $link; ?>" title="<?php echo $cat['title']; ?>"><?php echo $cat['title']; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="zx-front-clear-both"></div>