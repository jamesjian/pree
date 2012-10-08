<?php

namespace App\Module\Front\Controller;

use \Zx\Controller\Route;
use \Zx\View\View;
use \Zx\Model\Blog as Model_Blog;

class Blog extends Front {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/front/view/blog/';
        parent::init();
    }

    //one blog
    public function show() {
		$blog_id = $params[0];
        $blog = Model_Blog::get_one($blog_id);
		if ($blog) {
			Model_Blog::increase_rank($blog_id);
		
        View::set_view_file($this->view_path . 'show.php');
		relate_blogs = Model_Blog::get_active_related_blogs($blog_id);
        View::set_action_var('blog', $blog);
        View::set_action_var('related_blogs', $relate_blogs);
		} else {
		
		}
    }
	/**
	retrieve blogs under a category
	front/blog/category/5/page/3, 5 is cat id, 3 is page number
	$params[0] = 5, $params[1] = 'page', $params[2] = 3;	
	*/
	public function category()
	{
		$cat_id = (isset($params[0])) ? intval($params[1]) : 1;
		$page_number = (isset($params[2])) ?  intval($params[2] : 1;  //default page 1
        $cat = Model_Blogcategory::get_one($cat_id);
        $order_by = 'date_created';
        $direction = 'DESC';		
		$blogs = Model_Blog::get_active_blogs_by_cat_id_and_page_number($cat_id, $page_number, $order_by, $direction);
		$num_of_blogs = Model_Blog::get_num_of_active_blogs_by_cat_id($cat_id);
		$num_of_pages = ceil($num_of_blogs/NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'retrieve_by_cat_id.php');
        View::set_action_var('cat', $cat);
        View::set_action_var('blogs', $blogs);
		View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);		
        View::set_action_var('num_of_pages', $num_of_pages);
	}	
	/**
	blog/latest/3, 3 is page number, if missing, 1 is default page number
	*/
	public function latest()
	{
		\Zx\Test\Test::object_log('lob', 'aaaa', __FILE__, __LINE__, __CLASS__, __METHOD__);

		$page_num = (isset($params[0])) ?  intval($params[0]) : 1;
		if ($page_num<1) $page_num = 1;
        $order_by = 'date_created';
        $direction = 'DESC';
		$blogs = Model_Blog::get_active_blogs_by_page_num($page_num, $order_by, $direction);
		$popular_blogs = Model_Blog::get_10_most_popular_blogs();
		$num_of_blogs = Model_Blog::get_num_of_active_blogs();
		$num_of_pages = ceil($num_of_blogs/NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'retrieve_latest.php');
        View::set_action_var('blogs', $blogs);
        View::set_action_var('popular_blogs', $popular_blogs);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
	}
	/**
	blog/popular/3, 3 is page number, if missing, 1 is default page number
	*/	
	public function popular()
	{
		$page_num = (isset($params[0])) ?  intval($params[0]) : 1;
		if ($page_num<1) $page_num = 1;
        $order_by = 'rank';
        $direction = 'DESC';
		$blogs = Model_Blog::get_active_blogs_by_page_num($page_num, $order_by, $direction);
		$latest_blogs = Model_Blog::get_10_latest_blogs();
		$num_of_blogs = Model_Blog::get_num_of_active_blogs();
		$num_of_pages = ceil($num_of_blogs/NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'retrieve_popular.php');
        View::set_action_var('blogs', $blogs);
        View::set_action_var('latest_blogs', $latest_blogs);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);	
	}


}
