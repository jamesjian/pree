<?php
namespace App\Model;

use \App\Model\Base\Blog as Base_Blog;
use \Zx\Model\Mysql;
class Blog extends Base_Blog{
    /**
     * get active cats order by category name
     */
    public static function get_active_blogs_by_page_num($page_num=1, $order_by = 'b.display_order', $direction = 'ASC')
    {
		$where = ' b.status=1 ';
		$offset = ($page_num-1) * NUM_OF_BLOGS_IN_CAT_PAGE;
        return parent::get_all($where, $offset, NUM_OF_BLOGS_IN_CAT_PAGE, $order_by, $direction);
    }    
	public static function get_active_blogs_by_cat_id_and_page_num($cat_id, $page_num=1, $order_by = 'b.display_order', $direction = 'ASC')
	{
		$where = ' b.status=1 AND b.cat_id=' . $cat_id;
		$offset = ($page_num-1) * NUM_OF_BLOGS_IN_CAT_PAGE;
        return parent::get_all($where, $offset, NUM_OF_BLOGS_IN_CAT_PAGE, $order_by, $direction);
	}
	public static function get_blogs_by_page_num($page_num=1, $order_by = 'display_order', $direction = 'ASC')
	{
		$page_num = intval($page_num);
		$page_num = ($page_num > 0) ? $page_num : 1;
		switch ($order_by) {
			case 'id':
			case 'title':
			case 'display_order':
			case 'date_created':
			case 'cat_id':
				$order_by = 'b.'.$order_by;
				break;
			default: 
				$order_by = 'b.date_created';
		}
        $direction = ($direction == 'ASC') ?  'ASC' : 'DESC';
		$where = '1';
		$start = ($page_num-1) * NUM_OF_RECORDS_IN_ADMIN_PAGE;
        return parent::get_all($where, $start, NUM_OF_RECORDS_IN_ADMIN_PAGE, $order_by, $direction);
	}	
	public static function get_num_of_pages_of_blogs()
	{
		return parent::get_num();
	}
    /**
     * get active cats order by category name
     */	
	public static function get_all_blogs()
    {
        return parent::get_all();
    }
	public static function increase_rank($blog_id)
	{
		$sql = 'UPDATE blog SET rank=rank+1 WHERE id=:id';
		$params = array(':id'=>$blog_id);
		return Mysql::exec($sql, $params);
	}
	public static function get_top10()
	{
		$where = ' b.status=1';
        return parent::get_all($where, 0, 10, 'b.rank', 'DESC');
		
	}
	public static function get_latest10()
	{
		$where = ' b.status=1';
        return parent::get_all($where, 0, 10, 'b.date_created', 'DESC');	
	}
}