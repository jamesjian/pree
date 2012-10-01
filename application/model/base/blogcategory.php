<?php

namespace App\Model\Base;

use \Zx\Model\Mysql;
/*
CREATE TABLE blog_category (id int(11) AUTO INCREMENT PRIMARY KEY,
title varchar(255) NOT NULL DEFAULT '',
description text,
status tinyint(1) not null default 1,
date_created datetime) engine=innodb default charset=utf8
*/
class Blogcategory {

    public static function get_one($id) {
        $sql = "SELECT *
            FROM blog_category
            WHERE id=$id
        ";
        return Mysql::select_one($sql);
    }

    public static function get_all($offset = 0, $row_count = MAXIMUM_ROWS, $order_by = 'name', $direction = 'ASC', $where = '1') {
        $sql = "SELECT *
            FROM blog_category
            WHERE $where
            LIMIT $offset, $row_count
            ORDER BY $order_by $direction
        ";
        return Mysql::select_all($sql);
    }

    public static function create($arr) {
        $sql = "INSERT INTO blog_category SET " . Mysql::concat_field_name_and_value($arr);
        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE blog_category SET " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=$id';
        return Mysql::exec($sql);
    }

    public static function delete($id) {
        $sql = "Delete FROM blog_category WHERE id=$id";
        return Mysql::exec($sql);
    }

}