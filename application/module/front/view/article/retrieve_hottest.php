<div class='zx-front-left'>			
    <div class='zx-front-left1'>
        <?php include FRONT_VIEW_PATH . 'templates/left_google_ads.php'; ?>
    </div>	
    <div class='zx-front-left2'>
        <?php
        if ($articles) {
            ?>
            <nav>
                <ul>
                    <?php
                    foreach ($articles as $article) {
                        $read_more_link = FRONT_HTML_ROOT . 'article/content/' . $article['url'];
                        ?>		
                        <li><?php
                echo $article['title'], BR;
                echo $article['abstract'];
                echo "<a href='$read_more_link'>Read more...</a>";
                ?>
                        </li>
                        <?php
                    }//foreach
                    ?>
                </ul>
            </nav>	
            <?php
        }//if ($articles)
	$link_prefix = FRONT_HTML_ROOT .'article/hottest/';			
	$link_postfix = '';			
        include FRONT_VIEW_PATH . 'template/pagination.php';
        ?>
    </div>
</div>
<div class='zx-front-right'>
    <div class='zx-front-right1'>
        <?php
        //tag cloud or search
        include FRONT_VIEW_PATH . 'templates/tag_cloud.php';
        ?>
    </div>	
    <div class='zx-front-right2'>
        <?php include FRONT_VIEW_PATH . 'templates/right_google_ads.php'; ?>
    </div>
        <div class='zx-front-right3'>
        <?php include FRONT_VIEW_PATH . 'templates/latest_articles.php'; ?>
        <?php
        $all_hottest = HTML_ROOT . 'article/hottest/';
        ?>
        <a href="<?php echo $all_hottest; ?>">All</a>
    </div>
</div>