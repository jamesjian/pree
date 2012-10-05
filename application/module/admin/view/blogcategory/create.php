<form action="<?php echo ADMIN_HTML_ROOT . 'blogcategory/create';?>" method="post">
    Title:<input type="text" name="title" size="50" />
    Description: <textarea cols="20" rows="10" name="description"></textarea>
    <input type="submit" name="submit" value="create" />
</form>
<a href="<?php echo \Zx\Transaction\Tool::get_current_admin_page();?>" />Cancel</a>