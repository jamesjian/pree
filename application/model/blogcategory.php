<?php
namespace App\Model;

use \App\Model\Base\Blogcategory as Base_Blogcategory;
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
     * get all cats order by category name
     */	
	public static function get_all_cats()
    {
		$where = "1";
        return parent::get_all($where);
    }
    /**
     * get active cats order by category name
     */	
	public static function get_all_active_cats()
    {
		$where = "status=1";
        return parent::get_all($where);
    }
    public static function get_cats_by_page_num($page_num = 1, $order_by = 'id', $direction = 'ASC') {
        $page_num = intval($page_num);
        $page_num = ($page_num > 0) ? $page_num : 1;
        switch ($order_by) {
            case 'id':
            case 'title':
                $order_by = $order_by;
                break;
            default:
                $order_by = 'title';
        }
        $direction = ($direction == 'ASC') ? 'ASC' : 'DESC';
        $where = '1';
        $start = ($page_num - 1) * NUM_OF_RECORDS_IN_ADMIN_PAGE;
        return parent::get_all($where, $start, NUM_OF_RECORDS_IN_ADMIN_PAGE, $order_by, $direction);
    }    
    public static function get_num_of_pages_of_cats() {
        return parent::get_num();
    }    
}