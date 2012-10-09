<?php

namespace App\Module\Front\Controller;

//this is the base class of front classes
use \Zx\Controller\Route;
use \Zx\View\View;
use \App\Model\Blog as Model_Blog;
use \App\Model\Blogcategory as Model_Blogcategory;

class Front {

    public $template_path = '';
    public $view_path = '';
    public $params = array();

    public function init() {
        $this->params = Route::get_params();
        $top10 = Model_Blog::get_top10();
        $latest10 = Model_Blog::get_latest10();
        $blog_cats = Model_Blogcategory::get_all_active_cats();
        $this->template_path = APPLICATION_PATH . 'module/front/view/templates/';
        View::set_template_file($this->template_path . 'template.php');
        View::set_template_var('blog_cats', $blog_cats);
        View::set_template_var('top10', $top10);
        View::set_template_var('latest10', $latest10);
    }

}