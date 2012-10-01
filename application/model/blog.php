<?php

namespace App\Model;

use App\Model\Blog as Base_Blog;

class Blog extends Base_Blog{

    public static function get_blogs_by_cat_id_and_page_number($cat_id, $page_number)
	{
		$offset = ($page_number-1) * NUM_OF_BLOGS_IN_CAT_PAGE;
		$row_count = NUM_OF_BLOGS_IN_CAT_PAGE;
		$order_by = 'b.date_created';
		$direction = 'ASC';
		$sql = "SELECT b.*, bc.title as cat_name,
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE cat_id=:cat_id 
            LIMIT :offset, :row_count
            ORDER BY :order_by :direction
        ";
		$params = array(':where'=>$where, ':offset'=>$offset, ':row_count'=>$row_count, 
		                ':order_by'=>$order_by, ':direction'=>$direction,':cat_id'=>$cat_id,
						':page_number'=>$page_number);
        return Mysql::select_all($sql, $params);
	}
	
    public static function get_num_of_blogs_by_cat_id($cat_id)
	{
		$sql = "SELECT COUNT(*) as num
            FROM blog b
            WHERE cat_id=:cat_id 
        ";
		$params = array(':cat_id'=>$cat_id);
        $rec = Mysql::select_one($sql, $params);
		if ($rec) {
			return $rec['num'];
		} else {
			return 0;
		}
	}	
}