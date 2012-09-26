<?php

namespace App\Model\Base;

use \Zx\Model\Mysql;

class Article {

    /**
     *
     * @param int $id
     * @return 1D array or boolean when false 
     */
    public static function get_one($id) {
        $sql = "SELECT a.*, ac.title as cat_name,
            FROM article a
            LEFT JOIN article_category ac ON a.cat_id=ac.id
            WHERE a.id=$id
        ";
        return Mysql::select_one($sql);
    }


    public static function get_all($offset = 0, $row_count = MAXIMUM_ROWS, $order_by = 'a.id', $direction = 'ASC', $where = '1') {
        $sql = "SELECT a.*, ac.title as cat_name,
            FROM article a
            LEFT JOIN article_category ac ON a.cat_id=ac.id
            WHERE $where
            LIMIT $offset, $row_count
            ORDER BY $order_by $direction
        ";
        return Mysql::select_all($sql);
    }

    public static function create($arr) {
        $sql = "INSERT INTO article SET " . Mysql::concat_field_name_and_value($arr);
        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE article SET " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=$id';
        return Mysql::exec($sql);
    }

    public static function delete($id) {
        $sql = "Delete FROM article WHERE id=$id";
        return Mysql::exec($sql);
    }

}