<?php

namespace Zx\Model;

class Mysql {

    protected static $dbh;

    public static function connect_db() {
        if (isset(self::$dbh)) {
            return self::$dbh;
        } else {
            $dsn = 'mysql:dbname=' . DBNAME . ';host=' . DBHOST;
            try {
                self::$dbh = new \PDO($dsn, DBUSER, DBPASS);
                return self::$dbh;
            } catch (\PDOException $e) {
                echo 'Db connection failed' . $e->getMessage();
            }
        }
    }

    /**
     * 
     * @param string $sql INSERT INTO session SET session_id=:id, session_data=:data, expires=:time
     * @param array $params array(':id' => $id, ':data' => $data, ':time' => $time)
     * @return int
     */
    public static function insert($sql, $params = array()) {
        //\Zx\Test\Test::object_log('$sql', $sql, __FILE__, __LINE__, __CLASS__, __METHOD__);
        //\Zx\Test\Test::object_log('$params', $params, __FILE__, __LINE__, __CLASS__, __METHOD__);
        $dbh = self::connect_db();
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
        return $dbh->lastInsertId();
    }

    /**
     * only for update and delete
     * @param string $sql 
     * @param array $params 
     * @return number of rows affected by the last SQL statement
     */
    public static function exec($sql, $params = array()) {
        //\Zx\Test\Test::object_log('$sql', $sql, __FILE__, __LINE__, __CLASS__, __METHOD__);
        //\Zx\Test\Test::object_log('$params', $params, __FILE__, __LINE__, __CLASS__, __METHOD__);
        $dbh = self::connect_db();
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
        return $sth->rowCount();
    }

    /**
     * 
     * @param string $sql  SELECT session_data FROM session WHERE session_id=:id AND expires>:time
     * @param array $params  array(':id' => $id, ':time' => $time)
     * @return 2D array or boolean when false
     */
    public static function select_all($sql, $params = array()) {
        $dbh = self::connect_db();
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
        $r = $sth->fetchAll();
        return $r;
    }

    /**
     * 
     * @param string $sql  SELECT session_data FROM session WHERE session_id=:id AND expires>:time
     * @param array $params  array(':id' => $id, ':time' => $time)
     * @return 1D array or boolean when false
     */
    public static function select_one($sql, $params = array()) {
        $dbh = self::connect_db();
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
        $r = $sth->fetch();
        return $r;
    }

    /**
     * 
     * @param array $arr array('title'=>'value', 'description'=>'value',....)
     * @return string
     */
    public static function concat_field_name_and_value($arr) {
        $q = '';
        foreach ($arr as $field_name => $field_value) {
            $q = "`$field_name`='$field_value',";
        }
        $q = substr($q, 0, -1);  //remove last ','
        return $q;
    }

}