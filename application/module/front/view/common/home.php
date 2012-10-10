<div class='zx-front-left'>			
    <div class='zx-front-left1'>
        <?php include FRONT_VIEW_PATH . 'templates/left_google_ads.php'; ?>
    </div>	
    <div class='zx-front-left2'>
        <?php
        if ($blogs) {
            ?>
            <nav>
                <ul>
                    <?php
                    foreach ($blogs as $blog) {
                        $read_more_link = HTML_ROOT . 'front/blog/show/' . $blog['id'];
                        ?>		
                        <li><?php
                echo $blog['title'], BR;
                //echo mb_substr($blog['content'], 0, 100, 'UTF-8');
                echo $blog['abstract'];
                echo "<a href='$read_more_link' title='$read_more_link'>Read more...</a>";
                        ?></li>
                        <?php
                    }//foreach
                    ?>
                </ul>
            </nav>
            <?php
        }//if ($blogs)

        $link_prefix = HTML_ROOT . 'blog/retrieve/';
        $link_postfix = "/$order_by/$direction";
        include ADMIN_VIEW_PATH . 'templates/pagination.php';

        include FRONT_VIEW_PATH . 'common/pagination.php';
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
        <?php
//related contents
        if ($related_blogs) {
            ?>
            <nav>
                <ul>
                    <?php
                    foreach ($related_blogs as $blog) {
                        $read_more_link = HTML_ROOT . 'front/blog/show/' . $blog['id'];
                        ?>		
                        <li><?php echo "<a href='$read_more_link'>" . $blog['title'] . "</a>";
                        ?>
                        </li>
                        <?php
                    }//foreach
                    ?>
                </ul>
            </nav>	
            <?php
        }//if ($related_blogs)
        ?>
    </div>
</div>