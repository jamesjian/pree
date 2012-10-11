<?php

namespace App\Transaction;

use \App\Model\Page as Model_Page;
use \Zx\Message\Message;

class Page {

    public static function create_page($arr=array())
    {
        if (count($arr)>0 && isset($arr['title'])) {
            if (Model_Page::create($arr)) {
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
    
    public static function update_page($id, $arr)
    {
		//      \Zx\Test\Test::object_log('arr', $arr, __FILE__, __LINE__, __CLASS__, __METHOD__);
	
        if (count($arr)>0 && (isset($arr['title']) || isset($arr['content']) || isset($arr['cat_id']))) {
            if (Model_Page::update($id, $arr)) {
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
    public static function delete_page($id)
    {
        if (Model_Page::delete($id)) {
                Message::set_success_message('success');
                return true;
            } else {
                Message::set_error_message('fail');
                return false;
            }
    }

    
}