<?php

namespace App\Transaction;

use \App\Model\User as User_Model;

class User {

    /**
     * only for admin user  group id=1
     * @param string $user_name
     * @param string $user_password
     * @return  boolean
     */
    public static function verify_admin_user($user_name, $user_password) {
        if ($user_id = User_Model::verify_admin_user($user_name, $user_password)) {
            //session
            $_SESSION['admin_user'] = array(
                'user_id' => $user_id,
                'user_name' => $user_name,
            );
            return true;
        } else {
            //error message
            return false;
        }
    }
    public static function logout_admin_user($user_id)
    {
        
    }

}