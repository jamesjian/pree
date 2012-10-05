<?php

namespace App\Module\Admin\Controller;

use \App\Model\Article as Model_Article;
use \App\Model\Articlecategory as Model_Articlecategory;
use \App\Transaction\Article as Transaction_Article;
use \Zx\View\View;
use \Zx\Test\Test;

class Article extends Admin {

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/admin/view/article/';
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
                if (Transaction_Article::create_article($arr)) {
                    $success = true;
                }
            }
        }
        if ($success) {
            header('Location: ' . ADMIN_HTML_ROOT . 'article/retrieve/1/title/ASC');
        } else {
            $cats = Model_Articlecategory::get_all_cats();
            View::set_view_file($this->view_path . 'create.php');
            View::set_action_var('cats', $cats);
        }
    }

    public function delete() {
        $id = $this->params[0];
        Transaction_Article::delete_article($id);
        header('Location: ' . ADMIN_HTML_ROOT . 'article/retrieve/1/title/ASC');
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
                if (Transaction_Article::update_article($id, $arr)) {
                    $success = true;
                }
            }
        }
        if ($success) {
            header('Location: ' . ADMIN_HTML_ROOT . 'article/retrieve/1/title/ASC');
        } else {
            if (!isset($id)) {
                $id = $this->params[0];
            }
            $article = Model_Article::get_one($id);
			
            $cats = Model_Articlecategory::get_all_cats();
      \Zx\Test\Test::object_log('cats', $cats, __FILE__, __LINE__, __CLASS__, __METHOD__);
			
            View::set_view_file($this->view_path . 'update.php');
            View::set_action_var('article', $article);
            View::set_action_var('cats', $cats);
        }
    }
	/**
	/page/orderby/direction
	*/
    public function retrieve() {
			\App\Transaction\Session::remember_current_admin_page();
        $page_num = isset($this->params[0]) ?  intval($this->params[0]) : 1;
        $order_by = isset($this->params[1]) ? $this->params[1]: 'id';
        $direction = isset($this->params[2]) ?  $this->params[2]: 'ASC';
		$article_list = Model_Article::get_articles_by_page_num($page_num, $order_by, $direction);
		$num_of_pages = Model_Article::get_num_of_pages_of_articles();
        View::set_view_file($this->view_path . 'retrieve.php');
        View::set_action_var('article_list', $article_list);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

}
