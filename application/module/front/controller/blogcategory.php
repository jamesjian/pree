<?php
namespace App\Module\Front\Controller;

use \Zx\Model\Blogcategory as Model_Blogcategory;
use \Zx\Model\Blog as Model_Blog;

class Blogcategory extends Front {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/front/view/blogcategory/';
        parent::init();
    }

    /**
	show one blog category and all blogs under this category
	front/blogcategory/show/5/page/3, 5 is cat id, 3 is page number
	$params[0] = 5, $params[1] = 'page', $params[2] = 3;
	*/
    public function show() {
		$cat_id = $params[0];
		$page_number = $params[2];
        $cat = Model_Blogcategory::get_one($cat_id);
		$blogs = Model_Blog::get_blogs_by_cat_id_and_page_number($cat_id, $page_number);
		$num_of_blogs = Model_Blog::get_num_of_blogs_by_cat_id($cat_id);
		$num_of_pages = ceil($num_of_blogs/NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'show.php');
        View::set_action_var('cat', $cat);
        View::set_action_var('blogs', $blogs);
        View::set_action_var('current_page', $current_page);
        View::set_action_var('num_of_pages', $num_of_pages);
    }
}
