<?php

namespace App\Transaction;

use \App\Model\Articlecategory as Model_Articlecategory;
use \App\Model\Article as Model_Article;
use \Zx\Message\Message;

class Articlecategory {

    public static function create_cat($arr = array()) {
        if (count($arr) > 0 && isset($arr['title'])) {
            if (Model_Articlecategory::create($arr)) {
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
        \Zx\Test\Test::object_log('arr', $arr, __FILE__, __LINE__, __CLASS__, __METHOD__);

        if (count($arr) > 0 && (isset($arr['title']) || isset($arr['description']))) {
            if (Model_Articlecategory::update($id, $arr)) {
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
/**
 *
 * @param string $id category id
 * @return boolean 
 */
    public static function delete_cat($id) {
        if (Model_Article::exist_article_under_cat($id)) {
            Message::set_error_message('There is an article under this category, it cannot be deleted.');
        } else {
            $cat = Model_Articlecategory::get_one($id);
            if ($cat) {
            if ( Model_Articlecategory::delete($id)) {
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