<?php

namespace App\Module\Admin\Controller;

use \App\Model\Blog as Model_Blog;
use \App\Model\Blogcategory as Model_Blogcategory;
use \App\Transaction\Tool as Transaction_Tool;
use \Zx\View\View;
use \Zx\Test\Test;

class Tool extends Admin {

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/admin/view/tool/';
        parent::init();
    }
	public function sitemap(){
		Transaction_Tool::generate_sitemap();
		View::set_view_file($this->view_path . 'sitemap_result.php');
	}
}
