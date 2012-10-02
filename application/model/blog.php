<?php
namespace App\Model;

use \Zx\Model\Base\Blog as Base_Blog;
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
}