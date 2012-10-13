<form action="<?php echo ADMIN_HTML_ROOT . 'page/create'; ?>" method="post">
    <fieldset>
        <legend>Create a page</legend>
        <dl>      
            <dt>Title:</dt><dd><input type="text" name="title" size="50" /></dd>
            <dt> Content: </dt><dd><textarea cols="10" rows="30" name="content"></textarea></dd>
            <dt>Category:</dt><dd><select name='cat_id'>
                    <?php
                    foreach ($cats as $cat) {
                        echo "<option value='" . $cat['id'] . "'>" . $cat['title'] . '</option>';
                    }
                    ?>
                </select></dd>
            <dt></dt><dd><input type="submit" name="submit" value="create" /></dd>
        </dl>
    </fieldset>    
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page(); ?>" />Cancel</a>
<?php
include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
echo CKEDITOR::ckHeader();
echo CKEDITOR::ckReplaceEditor_Full('content');

