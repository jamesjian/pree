<?php
namespace App\Model;

use \Zx\Model\Base\Blogcategory as Base_Blogcategory;
use \Zx\Model\Mysql;
class Blogcategory extends Base_Blogcategory{
    /**
     * get active cats order by category name
     */
    public static function get_cats()
    {
        return parent::get_all();
    }    
    /**
     * get active cats order by category name
     */	
	public static function get_all_cats()
    {
		$where = "status=1";
        return parent::get_all($where);
    }
}