<?php

namespace App\Module\Front\Controller;

use \Zx\Controller\Route;
use \Zx\View\View;

class Common extends Front {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/front/view/common/';
        parent::init();
    }
	public function contact_us(){
		$submitted = false;
        if (isset($_POST['submit'])) {
            $email = (isset($_POST['email'])) ?  trim($_POST['email']) : '';
            $name = (isset($_POST['name'])) ?  trim($_POST['name']) : '';
            $phone = (isset($_POST['phone'])) ?  trim($_POST['phone']) : '';
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
}
