<form action="<?php echo ADMIN_HTML_ROOT . 'articlecategory/update'; ?>" method="post">
    <fieldset>
        <legend>Create an article category</legend>
        <dl>
            <dt>    
            Title:<input type="text" name="title" size="50" value="<?php echo $cat['title']; ?>"/></dd>
            <dt>Title(En):</dt><dd><input type="text" name="title_en" size="50" value="<?php echo $cat['title_en']; ?>"/></dd>
            <dt>URL:</dt><dd><input type="text" name="url" size="50" value="<?php echo $cat['url']; ?>"/></dd>
            <dt>Keyword:</dt><dd><input type="text" name="keyword" size="50" value="<?php echo $cat['keyword']; ?>"/></dd>
            <dt>Keyword(En):</dt><dd><input type="text" name="keyword_en" size="50" value="<?php echo $cat['keyword_en']; ?>"/></dd>
            <dt>Display Order(smaller, more important):</dt><dd><input type="text" name="display_order" size="50"  value="<?php echo $cat['display_order']; ?>"/></dd>
            
            <dt>Status:
            <?php
            if ($cat['status'] == '1') {
                $active_checked = ' checked';
                $inactive_checked = '';
            } else {
                $inactive_checked = ' checked';
                $active_checked = '';
            }
            ?></dt><dd>
                <input type="radio" name="status" value="1" <?php echo $active_checked; ?>/>Active    
                <input type="radio" name="status" value="0"  <?php echo $inactive_checked; ?>/>Inactive      </dd>  
            <dt>Description: </dt><dd><textarea cols="20" rows="10" name="description"><?php echo $cat['description']; ?></textarea></dd>

            <dt><input type="hidden" name="id" value="<?php echo $cat['id']; ?>" /></dt><dd>
                <input type="submit" name="submit" value="update" /></dd>
        </dl></fieldset>
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page(); ?>" />Cancel</a>
<?php
include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
echo CKEDITOR::ckHeader();
echo CKEDITOR::ckReplaceEditor_Full('description');
