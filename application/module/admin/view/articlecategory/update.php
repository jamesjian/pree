<form action="<?php echo ADMIN_HTML_ROOT . 'articlecategory/update'; ?>" method="post">
    Title:<input type="text" name="title" size="50" value="<?php echo $cat['title']; ?>"/>
    Title(En):<input type="text" name="title_en" size="50" value="<?php echo $cat['title_en']; ?>"/>
    URL:<input type="text" name="url" size="50" value="<?php echo $cat['url']; ?>"/>
    Keyword:<input type="text" name="keyword" size="50" value="<?php echo $cat['keyword']; ?>"/>
    Keyword(En):<input type="text" name="keyword_en" size="50" value="<?php echo $cat['keyword_en']; ?>"/>
    Status:
    <?php
    if ($cat['status'] == '1') {
        $active_checked = ' checked';
        $inactive_checked = '';
    } else {
        $inactive_checked = ' checked';
        $active_checked = '';
    }
    ?>
    <input type="radio" name="status" value="1" <?php echo $active_checked; ?>/>Active    
    <input type="radio" name="status" value="0"  <?php echo $inactive_checked; ?>/>Inactive        
    Description: <textarea cols="20" rows="10" name="description"><?php echo $cat['description']; ?></textarea>

    <input type="hidden" name="id" value="<?php echo $cat['id']; ?>" />
    <input type="submit" name="submit" value="update" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page(); ?>" />Cancel</a>
<?php
include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
echo CKEDITOR::ckHeader();
echo CKEDITOR::ckReplaceEditor_Full('description');
