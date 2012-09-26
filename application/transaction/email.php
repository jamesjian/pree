<?php

namespace App\Transaction;

use \App\Model\Article as Model_Article;

class Article {

    public static function create_article($arr=array())
    {
        if (count($arr)>0 && isset($arr['title'])) {
            Model_Article::create($arr);
        } else {
            
        }
    }
    

}