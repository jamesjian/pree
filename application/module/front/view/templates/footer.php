<nav>
Top 10 
<ul>
<?php
foreach ($top10 as $blog) {
$link = HTMLROOT . 'front/blog/show/' . $blog['id'];
?>
<li><a href="<?php echo $link;?>"><?php echo $blog['title'];?></a>
</li>
<?php
}
?>
</ul>
Latest 10
<ul>
<?php
foreach ($latest10 as $blog) {
$link = HTMLROOT . 'front/blog/show/' . $blog['id'];
?>
<li><a href="<?php echo $link;?>"><?php echo $blog['title'];?></a>
</li>
<?php
}
?>
</ul>
</nav>
        <script type="text/javascript" src="<?php echo HTML_ROOT . 'js/site.js';?>"></script>
    </body>
</html>