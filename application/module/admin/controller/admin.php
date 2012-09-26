<?php

namespace App\Module\Admin\Controller;

use \Zx\Controller\Route;
use \Zx\View\View;

class Admin {
    public $template_path;

    public function init() {
        $this->template_path = APPLICATION_PATH . 'module/admin/view/templates/';
        View::set_template_file($this->template_path . 'template.php');
        View::set_template_var('title', 'this is admin title');
        View::set_template_var('keyword', 'this is admin keyword');
    }

}