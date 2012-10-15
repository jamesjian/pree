<?php

namespace App\Module\Cron\Controller;

use \App\Transaction\Article as Transaction_Article;
use \Zx\View\View;
//use \Zx\Test\Test;

class Article extends Cron {

    public $list_page = '';
    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/cron/view/article/';
        parent::init();
    }
    public function backup() {
       Transaction_Article::backup();
        View::set_view_file($this->view_path . 'backup_result.php');
    }
    

}
