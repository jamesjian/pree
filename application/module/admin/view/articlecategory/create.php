<form action="<?php echo ADMIN_HTML_ROOT . 'articlecategory/create'; ?>" method="post">
    <fieldset>
        <legend>Create an article category</legend>

        <dl>
            <dt>Title:</dt><dd><input type="text" name="title" size="50" /></dd>
            <dt>Title(En):</dt><dd><input type="text" name="title_en" size="50" /></dd>
            <dt>URL:</dt><dd><input type="text" name="url" size="50" /></dd>
            <dt>Keyword:</dt><dd><input type="text" name="keyword" size="50" /></dd>
            <dt>Keyword(En):</dt><dd><input type="text" name="keyword_en" size="50" /></dd>
            <dt> Display Order(smaller, more important):</dt><dd><input type="text" name="display_order" size="50" /></dd>
            <dt>Status:</dt><dd><input type="radio" name="status" value="1" />Active    
                <input type="radio" name="status" value="0" />Inactive       </dd> 
            <dt> Description: </dt><dd><textarea cols="20" rows="10" name="description"></textarea></dd>
            <dt></dt><dd><input type="submit" name="submit" value="create" /></dd>
        </dl>
    </fieldset>
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page(); ?>" />Cancel</a>
<?php
include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
echo CKEDITOR::ckHeader();
echo CKEDITOR::ckReplaceEditor_Full('description');
