<?php
include 'search.php';
?>

<?php
if ($cat_list) {

$link_title = HTML_ROOT . 'admin/blogcategory/retrieve/';
?>
<table>
<tr>
<th><a href='<?php echo $link_title;?>'>title</a></th>
<th>action</th>
</tr>
<?php
    foreach ($cat_list as $cat) {
	$cat_id = $cat['id'];
	$link_delete = HTML_ROOT . 'admin/blogcategory/delete/' . $cat_id;
	$link_update = HTML_ROOT . 'admin/blogcategory/update/' . $cat_id;
?>
<tr>
<td><?php echo $article['title'];?></tr>
<td><a href='<?php echo link_delete;?>'>delete</a></td>
<td><a href='<?php echo link_update;?>'>update</a></td>
</tr>
<?php
    }
	?>
	</table>
<?php
}





