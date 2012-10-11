<form action="<?php echo ADMIN_HTML_ROOT . 'article/create';?>" method="post">
    Title:<input type="text" name="title" size="50" />
    Title(En):<input type="text" name="title_en" size="50" />
    URL:<input type="text" name="url" size="50" />
    Abstract:<input type="text" name="abstract" size="50" />
    Keyword:<input type="text" name="keyword" size="50" />
    Keyword(En):<input type="text" name="keyword_en" size="50" />    
    Rank:<input type="text" name="rank" size="50" />    
    Status:<input type="radio" name="status" value="1" />Active    
           <input type="radio" name="status" value="0" />Inactive    
    Content: <textarea cols="10" rows="30" name="content"></textarea>
    Category:<select name='cat_id'>
        <?php 
        foreach ($cats as $cat) {
            echo "<option value='" . $cat['id'] . "'>" . $cat['title'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="submit" value="create" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page();?>" />Cancel</a>
<?php 
	include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
	echo CKEDITOR::ckHeader();
	echo CKEDITOR::ckReplaceEditor_Full('content');   