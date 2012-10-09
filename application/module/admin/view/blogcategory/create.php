<form action="<?php echo ADMIN_HTML_ROOT . 'blogcategory/create';?>" method="post">
    Title:<input type="text" name="title" size="50" />
    Title(En):<input type="text" name="title_en" size="50" />
    URL:<input type="text" name="title_en" size="50" />
    Keyword:<input type="text" name="keyword" size="50" />
    Keyword(En):<input type="text" name="keyword_en" size="50" />
    Status:<input type="radio" name="status" value="1" />Active    
           <input type="radio" name="status" value="0" />Inactive        
    Description: <textarea cols="20" rows="10" name="description"></textarea>
    <input type="submit" name="submit" value="create" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page();?>" />Cancel</a>
<?php 
	include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
	echo CKEDITOR::ckHeader();
	echo CKEDITOR::ckReplaceEditor_Full('description');   