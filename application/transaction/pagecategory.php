<?php

namespace App\Transaction;

use \App\Model\Pagecategory as Model_Pagecategory;
use \App\Model\Page as Model_Page;
use \Zx\Message\Message;

class Pagecategory {

    public static function create_cat($arr = array()) {
        if (count($arr) > 0 && isset($arr['title'])) {
            if (Model_Pagecategory::create($arr)) {
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

    public static function update_cat($id, $arr) {
        //\Zx\Test\Test::object_log('arr', $arr, __FILE__, __LINE__, __CLASS__, __METHOD__);

        if (count($arr) > 0 && (isset($arr['title']) || isset($arr['description']))) {
            if (Model_Pagecategory::update($id, $arr)) {
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

    public static function delete_cat($id) {
        if (Model_Page::exist_page_under_cat($id)) {
            Message::set_error_message('There is an page under this category, it cannot be deleted.');
        } else {
            $cat = Model_Pagecategory::get_one($id);
            if ($cat) {
                if (Model_Pagecategory::delete($id)) {
                    Message::set_success_message('success');
                    return true;
                } else {
                    Message::set_error_message('fail');
                    return false;
                }
            } else {
                Message::set_error_message('The cat does not exist');
                return false;
            }
        }
    }

}