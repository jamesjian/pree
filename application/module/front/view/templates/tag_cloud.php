<?php

foreach ($tags as $tag) {
    $link = HTML_ROOT . 'front/article/keyword/' . $tag;
?>
<a href="<?php echo $link;?>" class="zx-front-tag"><?php echo $tag;?></a>
<?php
}