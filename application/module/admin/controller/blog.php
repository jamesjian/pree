<?php

namespace App\Module\Admin\Controller;

use \App\Model\Blog as Model_Blog;
use \App\Model\Blogcategory as Model_Blogcategory;
use \App\Transaction\Blog as Transaction_Blog;
use \Zx\View\View;
use \Zx\Test\Test;

class Blog extends Admin {

    

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/admin/view/blog/';
        parent::init();
    }

    public function create() {
        $success = false;
        if (isset($_POST['submit'])) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $content = isset($_POST['content']) ? trim($_POST['content']) : '';
            $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 1;

            if ($title <> '') {
                $arr = array('title' => $title, 'content' => $content, 'cat_id' => $cat_id);
                if (Transaction_Blog::create_blog($arr)) {
                    $success = true;
                }
            }
        }
        if ($success) {
            header('Location: ' . ADMIN_HTML_ROOT . 'blog/retrieve/1/title/ASC');
        } else {
            $cats = Model_Blogcategory::get_all_cats();
            View::set_view_file($this->view_path . 'create.php');
            View::set_action_var('cats', $cats);
        }
    }

    public function delete() {
        $id = $this->params[0];
        Transaction_Blog::delete_blog($id);
        header('Location: ' . ADMIN_HTML_ROOT . 'blog/retrieve/1/title/ASC');
    }

    public function update() {
        $success = false;
        if (isset($_POST['submit']) && isset($_POST['id'])) {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
		      \Zx\Test\Test::object_log('id', $id, __FILE__, __LINE__, __CLASS__, __METHOD__);
			$arr = array();
            if ($id <> 0) {
                if (isset($_POST['title']))
                    $arr['title'] = trim($_POST['title']);
                if (isset($_POST['content']))
                    $arr['content'] = trim($_POST['content']);
				if (isset($_POST['cat_id']))
                    $arr['cat_id'] = intval($_POST['cat_id']);
                if (Transaction_Blog::update_blog($id, $arr)) {
                    $success = true;
                }
            }
        }
        if ($success) {
            header('Location: ' . ADMIN_HTML_ROOT . 'blog/retrieve/1/title/ASC');
        } else {
            if (!isset($id)) {
                $id = $this->params[0];
            }
            $blog = Model_Blog::get_one($id);
			
            $cats = Model_Blogcategory::get_cats();
      \Zx\Test\Test::object_log('cats', $cats, __FILE__, __LINE__, __CLASS__, __METHOD__);
			
            View::set_view_file($this->view_path . 'update.php');
            View::set_action_var('blog', $blog);
            View::set_action_var('cats', $cats);
        }
    }
	/**
	/page/orderby/direction
	*/
    public function retrieve() {
        $page_num = isset($this->params[0]) ?  intval($this->params[0]) : 1;
        $order_by = isset($this->params[1]) ? $this->params[1]: 'id';
        $direction = isset($this->params[2]) ?  $this->params[2]: 'ASC';
		$blog_list = Model_Blog::get_blogs_by_page_num($page_num, $order_by, $direction);
		$num_of_pages = Model_Blog::get_num_of_pages_of_blogs();
        View::set_view_file($this->view_path . 'retrieve.php');
        View::set_action_var('blog_list', $blog_list);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

}
