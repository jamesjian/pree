<?php
namespace App\Module\Error\Controller;
use \Zx\View\View;
class Index {
    public $template_path;

    public function init() {
        $this->template_path = APPLICATION_PATH . 'module/error/view/templates/';
        View::set_template_file($this->template_path . 'template.php');
        View::set_template_var('title', 'error page');
        View::set_template_var('keyword', 'error page');
    }
    public static function index()
	{
		echo "error message";
	}
	public static function page_not_exist()
	{
		echo "page does not exist";
	}
}