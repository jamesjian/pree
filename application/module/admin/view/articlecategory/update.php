<form action="<?php echo HTML_ROOT . 'admin/article/create';?>" method="post">
    Title:<input type="text" name="title" size="50" value="<?php echo $article['title'];?>"/>
    Description: <textarea cols="10" rows="30" name="description"><?php echo $article['description'];?></textarea>
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
<a href="<?php echo \Zx\Transaction\Tool::get_current_admin_page();?>" />Cancel</a>