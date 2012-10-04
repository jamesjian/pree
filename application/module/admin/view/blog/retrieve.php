<?php
include 'search.php';
$create_link = ADMIN_HTML_ROOT . 'blog/create';
?>
<a href="<?php echo $create_link;?>">Create</a>
<?php
if ($blog_list) {
$link_prefix = ADMIN_HTML_ROOT . "admin/blog/retrieve/$page_num/";
$link_postfix = ($direction == 'ASC')? '/DESC' : '/ASC';
$link_id = $link_prefix . 'id' . $link_postfix;
$link_title = $link_prefix . 'title' . $link_postfix;
$link_rank = $link_prefix . 'rank' . $link_postfix;
?>
<table>
<tr>
<th><a href='<?php echo $link_id;?>'>id</a></th>
<th><a href='<?php echo $link_title;?>'>title</a></th>
<th><a href='<?php echo $link_rank;?>'>title</a></th>
<th>delete</th>
<th>update</th>
</tr>

<?php
    foreach ($blog_list as $blog) {
	$blog_id = $blog['id'];
	$link_delete = ADMIN_HTML_ROOT . 'blog/delete/' . $blog_id;
	$link_update = ADMIN_HTML_ROOT . 'blog/update/' . $blog_id;
?>
<tr>
	<td><?php echo $blog['id'];?></td>
	<td><?php echo $blog['title'];?></td>
	<td><?php echo $blog['rank'];?></td>
	<td><a href='<?php echo $link_delete;?>'>delete</a></td>
	<td><a href='<?php echo $link_update;?>'>update</a></td>
</tr>
<?php
    }
	?>
	</table>
<?php
$link_prefix = ADMIN_HTML_ROOT . 'blog/retrieve/';	
$link_postfix = "$order_by/$direction";
include ADMIN_VIEW_PATH . 'templates/pagination.php';
} else {
	echo 'No record.';
}




