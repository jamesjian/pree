<?php
include 'search.php';
$create_link = ADMIN_HTML_ROOT . 'blog/create';
?>
<a href="<?php echo $create_link;?>">Create</a>
<?php
if ($blog_list) {
$link_prefix = ADMIN_HTML_ROOT . "blog/retrieve/$current_page/";
$next_direction = ($direction == 'ASC') ? 'DESC' : 'ASC';  //change direction
$link_postfix =  "/$next_direction/$search";
$link_id = $link_prefix . 'id' . $link_postfix;
$link_title = $link_prefix . 'title' . $link_postfix;
$link_title_en = $link_prefix . 'title_en' . $link_postfix;
$link_rank = $link_prefix . 'rank' . $link_postfix;
$link_cat_name = $link_prefix . 'cat_name' . $link_postfix;
$link_status = $link_prefix . 'status' . $link_postfix;
$direction_img = ($direction == 'ASC') ? HTML_ROOT . 'image/icon/up.png' : 
                                         HTML_ROOT . 'image/icon/down.png'; 
?>
<table>
<tr>
<th><a href='<?php echo $link_id;?>'>id</a><img src="<?php echo $direction_img;?>" /></th>
<th><a href='<?php echo $link_title;?>'>title</a><img src="<?php echo $direction_img;?>" /></th>
<th><a href='<?php echo $link_title_en;?>'>title(En)</a><img src="<?php echo $direction_img;?>" /></th>
<th><a href='<?php echo $link_rank;?>'>rank</a><img src="<?php echo $direction_img;?>" /></th>
<th><a href='<?php echo $link_cat_name;?>'>category</a><img src="<?php echo $direction_img;?>" /></th>
<th><a href='<?php echo $link_status;?>'>status</a><img src="<?php echo $direction_img;?>" /></th>
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
	<td><?php echo $blog['title_en'];?></td>
	<td><?php echo $blog['rank'];?></td>
	<td><?php echo $blog['cat_name'];?></td>
        <td><?php echo $blog['status'];?></td>
	<td><a href='<?php echo $link_delete;?>'>delete</a></td>
	<td><a href='<?php echo $link_update;?>'>update</a></td>
</tr>
<?php
    }
	?>
	</table>
<?php
$link_prefix = ADMIN_HTML_ROOT . 'blog/retrieve/';	
$link_postfix = "/$order_by/$direction/$search";
include ADMIN_VIEW_PATH . 'templates/pagination.php';
} else {
	echo 'No record.';
}




