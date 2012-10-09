<?php
if ($cat) {
?>
    Title: <?php echo $cat['title'];?><br />
    Title(en): <?php echo $cat['title_en'];?><br />
    URL: <?php echo $cat['url'];?><br />
    Keyword: <?php echo $cat['keyword'];?><br />
    Keyword(en): <?php echo $cat['keyword_en'];?><br />
    Status: <?php echo $blog['status'];?><br />
    Description: <?php echo $cat['description'];?><br />
    
<?php    
}//if

