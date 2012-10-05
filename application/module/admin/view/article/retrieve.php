<?php
include 'search.php';
$create_link = ADMIN_HTML_ROOT . 'article/create';
?>
<a href="<?php echo $create_link;?>">Create</a>
<?php
if ($article_list) {
$link_prefix = ADMIN_HTML_ROOT . "article/retrieve/$page_num/";
$link_postfix = ($direction == 'ASC')? '/DESC' : '/ASC';
$link_id = $link_prefix . 'id' . $link_postfix;
$link_title = $link_prefix . 'title' . $link_postfix;
$link_cat_name = $link_prefix . 'cat_name' . $link_postfix;
?>
<table>
<tr>
<th><a href='<?php echo $link_id;?>'>id</a></th>
<th><a href='<?php echo $link_title;?>'>title</a></th>
<th><a href='<?php echo $link_cat_name;?>'>category</a></th>
<th>delete</th>
<th>update</th>
</tr>

<?php
    foreach ($article_list as $article) {
	$article_id = $article['id'];
	$link_delete = ADMIN_HTML_ROOT . 'article/delete/' . $article_id;
	$link_update = ADMIN_HTML_ROOT . 'article/update/' . $article_id;
?>
<tr>
	<td><?php echo $article['id'];?></td>
	<td><?php echo $article['title'];?></td>
	<td><?php echo $article['cat_name'];?></td>
	<td><a href='<?php echo $link_delete;?>'>delete</a></td>
	<td><a href='<?php echo $link_update;?>'>update</a></td>
</tr>
<?php
    }
	?>
	</table>
<?php
$link_prefix = ADMIN_HTML_ROOT . 'article/retrieve/';	
$link_postfix = "$order_by/$direction";
include ADMIN_VIEW_PATH . 'templates/pagination.php';
} else {
	echo 'No record.';
}




