<?php
namespace App\Model\Base;

use \Zx\Model\Mysql;
/*
CREATE TABLE blog (id int(11) AUTO_INCREMENT PRIMARY KEY,
title varchar(255) NOT NULL DEFAULT '',
cat_id int(11) NOT NULL DEFAULT 1,
keyword varchar(255) not null default '',
content text,
rank int(11) default 0,
status tinyint(1) not null default 1,
date_created datetime) engine=innodb default charset=utf8
*/
class Blog {

    /**
     *
     * @param int $id
     * @return 1D array or boolean when false 
     */
    public static function get_one($id) {
        $sql = "SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE b.id=:id
        ";
		$params = array(':id'=>$id);

			
        return Mysql::select_one($sql, $params);
    }    
	/**
     *
     * @param string $where
     * @return 1D array or boolean when false 
     */
    public static function get_one_by_where($where) {
        $sql = "SELECT b.*, bc.title as cat_name,
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE $where
        ";
        return Mysql::select_one($sql);
    }

	
    public static function get_all($where = '1', $offset = 0, $row_count = MAXIMUM_ROWS, $order_by = 'b.display_order', $direction = 'ASC') {
        $sql = "SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE $where
            ORDER BY $order_by $direction
            LIMIT $offset, $row_count
        ";
//\Zx\Test\Test::object_log('sql', $sql, __FILE__, __LINE__, __CLASS__, __METHOD__);
			
        return Mysql::select_all($sql);
    }

    public static function get_num($where = '1') {
        $sql = "SELECT COUNT(id) AS num
            FROM blog 
            WHERE $where
        ";
        $result = Mysql::select_one($sql);
		if ($result) {
			return $result['num'];
		} else {
			return false;
		}
    }
	
    public static function create($arr) {
        $sql = "INSERT INTO blog SET " . Mysql::concat_field_name_and_value($arr);

        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE blog SET " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=:id';
		$params = array(':id'=>$id);
		$query = Mysql::interpolateQuery($sql, $params);
      \Zx\Test\Test::object_log('query', $query, __FILE__, __LINE__, __CLASS__, __METHOD__);
					
        return Mysql::exec($sql, $params);
    }

    public static function delete($id) {
        $sql = "Delete FROM blog WHERE id=:id";
		$params = array(':id'=>$id);
        return Mysql::exec($sql, $params);
    }

}