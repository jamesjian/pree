<?php
/**
 * in right column
 */
?>

<?php
//latest contents
if ($latest_blogs) {
    ?>
    <nav>
        <ul>
            <?php
            foreach ($latest_blogs as $blog) {
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

