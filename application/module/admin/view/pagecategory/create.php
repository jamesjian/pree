<form action="<?php echo ADMIN_HTML_ROOT . 'pagecategory/create';?>" method="post">
    Title:<input type="text" name="title" size="50" />
    Description: <textarea cols="20" rows="10" name="description"></textarea>
    <input type="submit" name="submit" value="create" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page();?>" />Cancel</a>
<?php 
	include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
	echo CKEDITOR::ckHeader();
	echo CKEDITOR::ckReplaceEditor_Full('description');   