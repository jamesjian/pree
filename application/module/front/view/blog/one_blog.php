<?php
/**
 * left ads                     tag cloud
 *  blog                        right ads
 * related blogs                latest
 *                              hottest
 */
?>
<div class='zx-front-left'>			
    <div class='zx-front-left1'>
        <?php include FRONT_VIEW_PATH . 'templates/left_google_ads.php'; ?>
    </div>	
    <div class='zx-front-left2'>
        <?php
        if ($blog) {
            echo $blog->cat_name, BR;
            ?>
            <article>
                <header>
                    <?php
                    echo $blog->title, BR;
                    ?>
                </header>
                <section>
                    <div>
                        <?php
                        echo $blog->description, BR;
                        ?>
                    </div>
                </section>
            </article>
            <?php
        }
        ?>
    </div>

</div>
<div class='zx-front-right'>
    <div class='zx-front-right1'>
        <?php include FRONT_VIEW_PATH . 'templates/tag_cloud.php'; ?>
    </div>	
    <div class="zx-front-right2">
        <?php
        //related blogs
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
        ?>
    </div>    
    <div class='zx-front-right3'>
        <?php include FRONT_VIEW_PATH . 'templates/right_google_ads.php'; ?>
    </div>
    <div class='zx-front-right4'>
        <?php include FRONT_VIEW_PATH . 'templates/latest_blogs.php'; ?>
    </div>
    <div class='zx-front-right5'>
        <?php include FRONT_VIEW_PATH . 'templates/hottest_blogs.php'; ?>
    </div>
</div>
