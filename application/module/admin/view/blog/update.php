<form action="<?php echo ADMIN_HTML_ROOT . 'blog/update'; ?>" method="post">
    Title:<input type="text" name="title" size="50" value="<?php echo $blog['title']; ?>"/>
    Title(En):<input type="text" name="title_en" size="50" value="<?php echo $blog['title_en']; ?>"/>
    URL:<input type="text" name="url" size="50" value="<?php echo $blog['url']; ?>"/>
    Keyword:<input type="text" name="keyword" size="50" value="<?php echo $blog['keyword']; ?>"/>
    Keyword(En):<input type="text" name="keyword_en" size="50" value="<?php echo $blog['keyword_en']; ?>"/>
    Rank:<input type="text" name="rank" size="50"  value="<?php echo $blog['rank']; ?>"/>        
    Content: <textarea cols="10" rows="30" name="content"><?php echo $blog['content']; ?></textarea>
    Category:<select name='cat_id'>
        <?php
        foreach ($cats as $cat) {
            echo "<option value='" . $cat['id'] . "'";
            if ($blog['cat_id'] == $cat['id']) {
                echo " selected";
            }
            echo ">" . $cat['title'] . '</option>';
        }
        ?>
    </select>
    Status:
    <?php
    if ($blog['status'] == '1') {
        $active_checked = ' checked';
        $inactive_checked = '';
    } else {
        $inactive_checked = ' checked';
        $active_checked = '';
    }
    ?>
    <input type="radio" name="status" value="1" <?php echo $active_checked; ?>/>Active    
    <input type="radio" name="status" value="0"  <?php echo $inactive_checked; ?>/>Inactive     
    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>" />
    <input type="submit" name="submit" value="update" />
</form>
<a href="<?php echo \App\Transaction\Session::get_previous_admin_page(); ?>" />Cancel</a>
<?php
include_once(PHP_CKEDITOR_PATH . 'j_ckedit.class.php');
echo CKEDITOR::ckHeader();
echo CKEDITOR::ckReplaceEditor_Full('content');
