	<div class='zx-front-footer'>
            <nav class='zx-front-bottom-menu'>
                <ul>
                    <?php
                    if ($article_cats) {
                        foreach ($article_cats as $cat) {
                            $link = HTML_ROOT . 'articlecategory/retrieve/' . $cat['id'];
                            ?>
                            <li><a href="<?php echo $link; ?>" title="<?php echo $cat['title']; ?>"><?php echo $cat['title']; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                    <li><a href="<?php echo HTML_ROOT . 'about_us';?>">About Us</a></li>
                    <li><a href="<?php echo HTML_ROOT . 'contact_us';?>">Contact Us</a></li>
                </ul>
            </nav>            
	</div>
        <script type="text/javascript" src="<?php echo HTML_ROOT . 'js/site.js';?>"></script>
    </body>
</html>	