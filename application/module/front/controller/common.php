<?php

namespace App\Module\Front\Controller;

use \Zx\Controller\Route;
use \App\Model\Blog as Model_Blog;
use \App\Model\Blogcategory as Model_Blogcategory;
use \Zx\View\View;

class Common extends Front {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/front/view/common/';
        parent::init();
    }

    public function contact_us() {
        $submitted = false;
        if (isset($_POST['submit'])) {
            $email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
            $name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $phone = (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
            if (Transaction_Email::send_contact_us_email($email, $name, $phone)) {
                $submitted = true;
            }
        }
        if ($submitted) {
            View::set_view_file($this->view_path . 'contact_us_result.php');
        } else {
            View::set_view_file($this->view_path . 'contact_us.php');
        }
    }

    public function home() {
        \Zx\Test\Test::object_log('lob', 'aaaa', __FILE__, __LINE__, __CLASS__, __METHOD__);
        Transaction_Html::set_title('home');
        Transaction_Html::set_keyword('home');
        Transaction_Html::set_description('home');
        $page_num = 1;
        $order_by = 'date_created';
        $direction = 'DESC';
        $blogs = Model_Blog::get_active_blogs_by_page_num($page_num, $order_by, $direction);
        $related_blogs = Model_Blog::get_10_active_related_blogs(1);
        $num_of_blogs = Model_Blog::get_num_of_pages_of_active_blogs();
        $num_of_pages = ceil($num_of_blogs / NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'home.php');
        View::set_action_var('blogs', $blogs);
        View::set_action_var('related_blogs', $related_blogs);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

}
