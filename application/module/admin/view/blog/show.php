<?php
if ($blog) {
?>
    Title: <?php echo $blog['title'];?><br />
    Title(en): <?php echo $blog['title_en'];?><br />
    URL: <?php echo $cat['url'];?><br />
    Keyword: <?php echo $blog['keyword'];?><br />
    Keyword(en): <?php echo $blog['keyword_en'];?><br />
    Rank: <?php echo $blog['rank'];?><br />
    Status: <?php echo $blog['status'];?><br />
    Description: <?php echo $blog['description'];?><br />
    
<?php    
}//if

