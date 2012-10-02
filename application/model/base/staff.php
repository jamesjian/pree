<?php

namespace App\Model\Base;

use \Zx\Model\Mysql;

class Staff {

    public static function get_one($id) {
        $sql = "SELECT *
            FROM staff
            WHERE id=$id
        ";
        return Mysql::select_one($sql);
    }

    public static function get_all($where = '1', $offset = 0, $row_count = 999999, $order_by = 'a.id', $direction = 'ASC') {
        $sql = "SELECT *
            FROM staff
            WHERE :where
            LIMIT :offset, :row_count
            ORDER BY :order_by :direction
        ";
		$params = array(':where'=>$where, ':offset'=>$offset, ':row_count'=>$row_count, 
		                ':order_by'=>$order_by, ':direction'=>$direction);		
        return Mysql::select_all($sql);
    }

    public static function create($arr) {
        $sql = "INSERT INTO staff SET " . Mysql::concat_field_name_and_value($arr);
        return Mysql::insert($sql);
    }

    public static function update($id, $arr) {
        $sql = "UPDATE article staff " . Mysql::concat_field_name_and_value($arr) .
                ' WHERE id=$id';
        return Mysql::exec($sql);
    }

    public static function delete($id) {
        $sql = "Delete FROM staff WHERE id=$id";
        return Mysql::exec($sql);
    }

}