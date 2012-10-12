<?php
if ($cat) {
	echo $cat->name;
	$cat_id = $cat['id'];


	if ($blogs) {
	?>
	<nav>
	<ul>
	<?php
		foreach ($blogs as $blog) {
			$read_more_link = HTMLROOT . 'front/blog/show/' . $blog['id'];
	?>		
		<li><?php	echo $blog->title;
			echo "<a href='$read_more_link'>Read more...</a>";
			?>
		</li>
	<?php	
		}//foreach
	?>
	</ul>
	</nav>	
	<?php
	}//if ($blogs)
	$link_prefix = HTMLROOT . 'front/blogcategory/show/' . $cat_id . '/page/';	
	//first
	if ($current_page != 1 && $num_of_pages>NUM_OF_ITEMS_IN_PAGINATION) {
		$link = $link_prefix . '1';
		echo "<a href='$link'>First</a>";
	}
	//prev
	if ($current_page != 1) {
		$link = $link_prefix . ($current_page - 1);
		echo "<a href='$link'>Prev</a>";
	}			
	//middle
	if ($num_of_pages<=NUM_OF_ITEMS_IN_PAGINATION) {
		//display all page numbers
		for ($i=1; $i<=$num_of_pages; $i++) {
			$link = $link_prefix . $i;
			echo "<a href='$link'>$i</a>";			
		}
	} else {
		//display page numbers around current page
		$difference = intval((NUM_OF_ITEMS_IN_PAGINATION-1) / 2);
		if (($current_page - $difference)<0) {
			$start = 1;
		} else {
			$start = $current_page - $difference;
		}
		if (($current_page + $difference)>$num_of_pages) {
			$end = $num_of_pages;
		} else {
			$end = $current_page + $difference;
		}		
		for ($i=$start; $i<=$end; $i++) {
			$link = $link_prefix . $i;
			echo "<a href='$link'>$i</a>";			
		}
	}
	//next
	if ($current_page != $num_of_pages) {
		$link = $link_prefix . ($current_page+1);
		echo "<a href='$link'>Next</a>";
	}		
	//last
	if ($current_page != $num_of_pages && $num_of_pages>NUM_OF_ITEMS_IN_PAGINATION) {
		$link = $link_prefix . $num_of_pages;
		echo "<a href='$link'>Last</a>";
	}	
}//if ($cat)
 else {
   echo 'no category';
 }
