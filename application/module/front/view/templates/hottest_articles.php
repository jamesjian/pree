<?php
/**
 * in right column
 */
?>

<?php
//hottest contents
if ($top10) {
    ?>
    <nav>
        <ul>
            <?php
            foreach ($top10 as $article) {
                $read_more_link = HTML_ROOT . 'front/article/content/' . $article['url'];
                ?>		
                <li><?php echo "<a href='$read_more_link'>" . $article['title'] . "</a>";
                ?>
                </li>
                <?php
            }//foreach
            ?>
        </ul>
    </nav>	
    <?php
}//if ($related_articles)
?>
