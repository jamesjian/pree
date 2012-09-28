<?php

namespace App\Module\Front\Controller;

use \Zx\Controller\Route;
use \Zx\View\View;
use \Zx\Model\Blogcategory as Model_Blogcategory;

class Articlecategory extends Front {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/front/view/blogcategory/';
        parent::init();
    }

    //one blog category
    public function show() {
		$cat_id = $params[0];
        $cat = Model_Blogcategory::get_one($cat_id);
        View::set_view_file($this->view_path . 'show.php');
        View::set_action_var('cat', $cat);
    }
}
