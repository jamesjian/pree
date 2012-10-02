<?php
if ($blog) {
echo $blog->cat_name, BR;
?>
<article>
	<header>
<?php

echo $blog->title, BR;
?>
</header>
<section>
<div>
<?php
echo $blog->description, BR;
?>
</div>
</section>
</article>
<?php
}

