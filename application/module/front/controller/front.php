<?php

namespace App\Module\Front\Controller;

use \Zx\Controller\Route;
use \Zx\View\View;

class Front {
    public $template_path;

    public function init() {
        $this->template_path = APPLICATION_PATH . 'module/front/view/templates/';
        View::set_template_file($this->template_path . 'template.php');
        View::set_template_var('title', 'this is front title');
        View::set_template_var('keyword', 'this is front keyword');
    }

}