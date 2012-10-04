<?php
namespace App\Model;

use \App\Model\Base\Articlecategory as Base_Articlecategory;
use \Zx\Model\Mysql;
class Articlecategory extends Base_Articlecategory{
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