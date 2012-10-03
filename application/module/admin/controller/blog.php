<?php

namespace App\Module\Admin\Controller;

use \App\Model\Blog as Model_Blog;
use \App\Model\Blogcategory as Model_Blogcategory;
use \App\Transaction\Blog as Transaction_Blog;

class Blog extends Admin {

    

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/admin/view/blog/';
        parent::init();
    }

    public function create() {
        $success = false;
        if (isset($_POST['submit'])) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            $blog_cat_id = isset($_POST['blog_cat_id']) ? intval($_POST['blog_cat_id']) : 1;

            if ($title <> '') {
                $arr = array('title' => $title, 'description' => $description, 'blog_cat_id' => $blog_cat_id);
                if (Transaction_Blog::create_blog($arr)) {
                    $success = true;
                }
            }
        }
        if ($success) {
            header('Location: ' . HTML_ROOT . 'admin/blog/retrieve');
        } else {
            $blog_cats = Model_Blogcategory::get_all_cats();
            View::set_view_file($this->view_path . 'create.php');
            View::set_action_var('$blog_cats', $blog_cats);
        }
    }

    public function delete() {
        $params = Route::get_params();
        if (isset($params[0])) {
            $id = $params[0];
            Transaction_Blog::delete_blog();
        } else {
            Message::set_error_message('no blog');
        }
        header('Location:' . HTML_ROOT . 'admin/blog/list_blog');
    }

    public function update() {
        $success = false;
        if (isset($_POST['submit']) && isset($_POST['id'])) {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            if ($id <> 0) {
                if (isset($_POST['title']))
                    $arr['title'] = trim($_POST['title']);
                if (isset($_POST['description']))
                    $arr['description'] = trim($_POST['description']);
                if (Transaction_Blog::update_blog($id, $arr)) {
                    $success = true;
                }
            }
        }
        if ($success) {
            header('Location: ' . HTML_ROOT . 'admin/blog/list_blog');
        } else {
            if (!isset($id)) {
                $params = Route::get_params();
                $id = $params[0];
            }
            $blog = Model_Blog::get_one($id);
            $blog_cats = Model_Blogcategory::get_cats();
            View::set_view_file($this->view_path . 'update.php');
            View::set_action_var('blog', $blog);
            View::set_action_var('blog_cats', $blog_cats);
        }
    }
	/**
	/page/orderby/direction
	*/
    public function retrieve() {
        $page_num = isset($this->params[0]) ?  intval($params[0]) : 1;
        $order_by = isset($this->params[1]) ? $params[1]: 'id';
        $direction = isset($this->params[2]) ?  $params[2]: 'ASC';
		$blog_list = Model_Blog::get_blogs($page_num, $order_by, $direction);
        View::set_view_file($this->view_path . 'retrieve.php');
        View::set_action_var('blog_list', $blog_list);
    }

}
