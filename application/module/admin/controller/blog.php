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
        \App\Transaction\Session::set_ck_upload_path('blog');
        parent::init();
    }

    public function create() {
        $success = false;
        if (isset($_POST['submit'])) {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $title_en = isset($_POST['title_en']) ? trim($_POST['title_en']) : '';
            $content = isset($_POST['content']) ? trim($_POST['content']) : '';
            $keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
            $keyword_en = isset($_POST['keyword_en']) ? trim($_POST['keyword_en']) : '';
            $url = isset($_POST['url']) ? trim($_POST['url']) : '';
            $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 1;
            $rank = isset($_POST['rank']) ? intval($_POST['rank']) : 0;
            $status = isset($_POST['status']) ? intval($_POST['status']) : 1;

            if ($title <> '') {
                $arr = array('title' => $title, 
                     'title_en'=>$title_en, 
                    'content' => $content, 
                    'keyword'=>$keyword,
                    'keyword_en'=>$keyword_en,
                    'url'=>$url, 
                    'rank'=>$rank,
                    'status'=>$status,
                    'cat_id' => $cat_id);
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
                if (isset($_POST['title_en']))
                    $arr['title_en'] = trim($_POST['title_en']);                
                if (isset($_POST['content']))
                    $arr['content'] = trim($_POST['content']);
                if (isset($_POST['keyword']))
                    $arr['keyword'] = trim($_POST['keyword']);
                if (isset($_POST['keyword_en']))
                    $arr['keyword_en'] = trim($_POST['keyword_en']);
                if (isset($_POST['url']))
                    $arr['url'] = trim($_POST['url']);                
                if (isset($_POST['cat_id']))
                    $arr['cat_id'] = intval($_POST['cat_id']);
                if (isset($_POST['rank']))
                    $arr['rank'] = intval($_POST['rank']);
                if (isset($_POST['status']))
                    $arr['status'] = intval($_POST['status']);
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
            //\Zx\Test\Test::object_log('cats', $cats, __FILE__, __LINE__, __CLASS__, __METHOD__);

            View::set_view_file($this->view_path . 'update.php');
            View::set_action_var('blog', $blog);
            View::set_action_var('cats', $cats);
        }
    }
    public function search() {
        if (isset($_POST['search']) && trim($_POST['search']) != '') {
            $link = ADMIN_HTML_ROOT . 'blog/retrieve/1/title/ASC/' . trim($_POST['search']);
        } else {
            $link = ADMIN_HTML_ROOT . 'blog/retrieve/1/title/ASC/';
        }
        header('Location: ' . $link);
    }
    /**
      /page/orderby/direction
     */
    public function retrieve() {
        \App\Transaction\Session::remember_current_admin_page();
        $current_page = isset($this->params[0]) ? intval($this->params[0]) : 1;
        $order_by = isset($this->params[1]) ? $this->params[1] : 'id';
        $direction = isset($this->params[2]) ? $this->params[2] : 'ASC';
        $search = isset($this->params[3]) ? $this->params[3]: '';
        if ($search != '') {
            $where = " b.title LIKE '%$search%' OR bc.title LIKE '%$search%'";
        } else {
            $where = '1';
        }
        $blog_list = Model_Blog::get_blogs_by_page_num($where, $current_page, $order_by, $direction);
        $num_of_records = Model_Blog::get_num_of_blogs($where);
        $num_of_pages = ceil($num_of_records / NUM_OF_RECORDS_IN_ADMIN_PAGE);
        //\Zx\Test\Test::object_log('blog_list', $blog_list, __FILE__, __LINE__, __CLASS__, __METHOD__);

        View::set_view_file($this->view_path . 'retrieve.php');
        View::set_action_var('blog_list', $blog_list);
        View::set_action_var('search', $search);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('current_page', $current_page);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

}
