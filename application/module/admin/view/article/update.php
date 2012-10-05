<form action="<?php echo ADMIN_HTML_ROOT . 'article/update';?>" method="post">
    Title:<input type="text" name="title" size="50" value="<?php echo $article['title'];?>"/>
    Content: <textarea cols="10" rows="30" name="content"><?php echo $article['content'];?></textarea>
    Category:<select name='cat_id'>
        <?php 
        foreach ($cats as $cat) {
            echo "<option value='" . $cat['id'] . "'";
            if ($article['cat_id'] == $cat['id']) {
                echo " selected";
            }
            ">" . $cat['title'] . '</option>';
        }
        ?>
    </select>
    <input type="hidden" name="id" value="><?php echo $article['id'];?>" />
    <input type="submit" name="submit" value="update" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page();?>" />Cancel</a>
<?php 
	include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
	echo CKEDITOR::ckHeader();
	echo CKEDITOR::ckReplaceEditor_Full('content');   