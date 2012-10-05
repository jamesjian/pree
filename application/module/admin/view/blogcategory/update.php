<form action="<?php echo ADMIN_HTML_ROOT . 'blogcategory/update';?>" method="post">
    Title:<input type="text" name="title" size="50" value="<?php echo $cat['title'];?>"/>
    Description: <textarea cols="20" rows="10" name="description"><?php echo $cat['description'];?></textarea>
    
    <input type="hidden" name="id" value="<?php echo $cat['id'];?>" />
    <input type="submit" name="submit" value="update" />
</form>
<a href="<?php echo \Zx\Transaction\Tool::get_current_admin_page();?>" />Cancel</a>