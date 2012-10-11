<form action="<?php echo ADMIN_HTML_ROOT . 'pagecategory/update';?>" method="post">
    Title:<input type="text" name="title" size="50" value="<?php echo $cat['title'];?>"/>
    Description: <textarea cols="20" rows="10" name="description"><?php echo $cat['description'];?></textarea>
    
    <input type="hidden" name="id" value="<?php echo $cat['id'];?>" />
    <input type="submit" name="submit" value="update" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page();?>" />Cancel</a>
<?php 
	include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
	echo CKEDITOR::ckHeader();
	echo CKEDITOR::ckReplaceEditor_Full('description');   