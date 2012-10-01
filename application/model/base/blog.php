<?php
namespbce App\Model\Base;

use \Zx\Model\Mysql;
/*
CREATE TABLE blog (id int(11) AUTO INCREMENT PRIMARY KEY,
title varchar(255) NOT NULL DEFAULT '',
cat_id int(11) NOT NULL DEFAULT 1,
keyword varchar(255) not null default '',
content text,
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
        $sql = "SELECT b.*, bc.title as cat_name,
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
            WHERE :where
        ";
		$params = array(':where'=>$where);
        return Mysql::select_one($sql, $params);
    }

	
    public static function get_all($where = '1', $offset = 0, $row_count = MAXIMUM_ROWS, $order_by = 'b.display_order', $direction = 'ASC') {
        $sql = "SELECT b.*, bc.title as cat_name,
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE :where
            LIMIT :offset, :row_count
            ORDER BY :order_by :direction
        ";
		$params = array(':where'=>$where, ':offset'=>$offset, ':row_count'=>$row_count, 
		                ':order_by'=>$order_by, ':direction'=>$direction);
        return Mysql::select_all($sql, $params);
    }

    public static function create($arr) {
        $sql = "INSERT INTO blog SET " . Mysql::concat_field_name_and_value($arr);
        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE blog SET " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=:id';
		$params = array(':id'=>$id);
        return Mysql::exec($sql, $params);
    }

    public static function delete($id) {
        $sql = "Delete FROM blog WHERE id=:id";
		$params = array(':id'=>$id);
        return Mysql::exec($sql, $params);
    }

}