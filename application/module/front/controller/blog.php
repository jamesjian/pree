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
        View::set_view_file($this->view_path . 'show.php');
        View::set_action_var('blog', $blog);
    }


}
