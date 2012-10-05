<?php

namespace App\Model\Base;

use \Zx\Model\Mysql;
/*
CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8
*/
class Articlecategory {

    public static function get_one($id) {
        $sql = "SELECT *
            FROM article_category
            WHERE id=$id
        ";
        return Mysql::select_one($sql);
    }

    public static function get_all($where = '1', $offset = 0, $row_count = MAXIMUM_ROWS, $order_by = 'name', $direction = 'ASC') {
        $sql = "SELECT *
            FROM article_category
            WHERE $where
            ORDER BY :order_by :direction
            LIMIT $offset, $row_count
        ";
		$params = array(':order_by'=>$order_by, ':direction'=>$direction);
        return Mysql::select_all($sql, $params);
    }
  public static function get_num($where = '1') {
        $sql = "SELECT COUNT(id) AS num
            FROM article_category
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
        $sql = "INSERT INTO article_category SET " . Mysql::concat_field_name_and_value($arr);
        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE article_category SET " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=:id';
		$params = array(':id'=>$id);
        return Mysql::exec($sql, $params);
    }

    public static function delete($id) {
        $sql = "Delete FROM article_category WHERE id=:id";
		$params = array(':id'=>$id);
        return Mysql::exec($sql, $params);
    }

}