<?php
/**
 * in right column
 */
?>

<?php
//latest contents
if ($latest10) {
    ?>
    <nav>
        <ul>
            <?php
            foreach ($latest10 as $article) {
                $read_more_link = HTML_ROOT . 'front/article/show/' . $article['id'];
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

