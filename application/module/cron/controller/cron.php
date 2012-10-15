<?php

namespace App\Module\Cron\Controller;

//this is the base class of cron classes
use \Zx\Controller\Route;
use \Zx\View\View;
use \App\Transaction\Staff as Transaction_Staff;

class Cron {

    public $template_path;
    public $view_path = '';
    public $params = array();

    public function init() {
        $this->params = Route::get_params();
        $this->template_path = APPLICATION_PATH . 'module/cron/view/templates/';
        View::set_template_file($this->template_path . 'template.php');
    }

}