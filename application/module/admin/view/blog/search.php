<?php
$link_search = ADMIN_HTML_ROOT . 'blog/search';
?>
<form action="<?php echo $link_search;?>" method="post">
Keyword:<input type="text" name="search" value="<?php echo $search;?>" />
<input type="submit" name="submit" value="Search" />
</form>
<a href="<?php echo ADMIN_HTML_ROOT . 'blog/retrieve/1/title/ASC';?>">All records</a>
