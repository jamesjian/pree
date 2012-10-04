<?php

namespace App\Transaction;

use \App\Model\Blogcategory as Model_Blogcategory;
use \Zx\Message\Message;

class Blogcategory {

    public static function create_cat($arr=array())
    {
        if (count($arr)>0 && isset($arr['title'])) {
            if (Model_Blogcategory::create($arr)) {
                Message::set_success_message('success');
                return true;
            } else {
                Message::set_error_message('fail');
                return false;
            }
        } else {
            Message::set_error_message('wrong info');
            return false;
        }
    }
    
    public static function update_cat($id, $arr)
    {
		      \Zx\Test\Test::object_log('arr', $arr, __FILE__, __LINE__, __CLASS__, __METHOD__);
	
        if (count($arr)>0 && (isset($arr['title']) || isset($arr['description']))) {
            if (Model_Blogcategory::update($id, $arr)) {
                Message::set_success_message('success');
                return true;
            } else {
                Message::set_error_message('fail');
                return false;
            }
        } else {
            Message::set_error_message('wrong info');
            return false;
        }        
    }
    public static function delete_cat($id)
    {
        if (Model_Blogcategory::delete($id)) {
                Message::set_success_message('success');
                return true;
            } else {
                Message::set_error_message('fail');
                return false;
            }
    }

    
}