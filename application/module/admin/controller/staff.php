<?php
namespace App\Module\Admin\Controller;

use \Zx\View\View;
use \Zx\Test\Test;
use \App\Transaction\Staff as Transaction_Staff;
class Staff extends Admin {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/admin/view/staff/';
        parent::init();
    }
  
    public function login()
    {
        //Test::object_log('$_POST', $_POST, __FILE__, __LINE__, __CLASS__, __METHOD__);
        $login = false;
        if (Transaction_Staff::staff_has_loggedin()) {
            $login = true;
        } else {
       
        if (isset($_POST['submit'])) {
            $staff_name = (isset($_POST['staff_name'])) ?  trim($_POST['staff_name']) : '';
            $staff_password = (isset($_POST['staff_password'])) ?  trim($_POST['staff_password']) : '';
            if (Transaction_Staff::verify_staff($staff_name, $staff_password)) {
                $login = true;
            }
        }
        }
        if ($login) {
                //redirect to admin home page
            header('Location: '.HTML_ROOT . 'admin/staff/home');
        } else {
            View::set_view_file($this->view_path . 'login.php');
        }
    }
    public function home()
    {
        View::set_view_file($this->view_path . 'home.php');
    }
    public function logout()
    {
        Transaction_Staff::staff_logout();
		header('Location: '.HTML_ROOT . 'admin/staff/login');
    }
    public function change_password()
    {
        
    }

}
