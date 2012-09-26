<?php

namespace Zx\Message;

class Message {

    public static function init_message(){
        $_SESSION['success_message'] = '';
        $_SESSION['error_message'] = '';
    }
    public static function set_error_message($message='') {
        $_SESSION['error_message'] = $message;
    }
        
    public static function get_error_message()
    {
        return $_SESSION['error_message'];
    }
    
    public static function set_success_message($message) {
        $_SESSION['success_message'] = $message;
    }
        
    public static function get_success_message()
    {
        return $_SESSION['success_message'];
    }
    public static function show_message()
    {
        if ($_SESSION['error_message'] != '') {
            echo '<span class="error_message">' . $_SESSION['error_message'] . '</span>';
        }  else {
            if ($_SESSION['success_message'] != '') {
                echo '<span class="success_message">' . $_SESSION['success_message'] . '</span>';
            }
        }
        
        self::init_message();
    }
    
    

}