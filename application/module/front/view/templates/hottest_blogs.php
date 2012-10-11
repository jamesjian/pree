<?php
/**
 * in right column
 */
?>

<?php
//hottest contents
if ($hottest_blogs) {
    ?>
    <nav>
        <ul>
            <?php
            foreach ($hottest_blogs as $blog) {
                $read_more_link = HTMLROOT . 'front/blog/show/' . $blog['id'];
                ?>		
                <li><?php echo "<a href='$read_more_link'>" . $blog->title . "</a>";
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
