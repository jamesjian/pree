<?php

namespace App\Model\Base;

use \Zx\Model\Mysql;
/*
CREATE TABLE article_category (id int(11) AUTO INCREMENT PRIMARY KEY,
title varchar(255) NOT NULL DEFAULT '',
description text,
status tinyint(1) not null default 1,
date_created datetime) engine=innodb default charset=utf8
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
            WHERE :where
            ORDER BY :order_by :direction
            LIMIT :offset, :row_count
        ";
		$params = array(':where'=>$where, ':offset'=>$offset, ':row_count'=>$row_count, 
		                ':order_by'=>$order_by, ':direction'=>$direction);
        return Mysql::select_all($sql, $params);
    }

    public static function create($arr) {
        $sql = "INSERT INTO article_category SET " . Mysql::concat_field_name_and_value($arr);
        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE article_category SET " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=$id';
        return Mysql::exec($sql);
    }

    public static function delete($id) {
        $sql = "Delete FROM article_category WHERE id=$id";
        return Mysql::exec($sql);
    }

}