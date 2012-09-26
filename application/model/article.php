<?php
namespace App\Model;

use \Zx\Model\Base\Article as Base_Article;
use \Zx\Model\Mysql;

class Article extends Base_Article{

    /**
     * 
     * @param int $id
     * @return string or boolean when false
     */
    public static function get_title_by_id($id)
    {
        $article = parent::get_one($id);
        if ($article) {
            return $article['title'];
        } else {
            return false;
        }
    }
    /**
     * only one record or false
     * @return 1D array or false
     */
    public static function get_about_us()
    {
        $sql = "SELECT a.*, ac.title as cat_name,
            FROM article a
            LEFT JOIN article_category ac ON a.cat_id=ac.id
            WHERE ac.name='about us'
        ";
        return Mysql::select_one($sql);
    }
    /**
     * only one record or false
     * @return 1D array or false
     */
    public static function get_term_condition()
    {
        $sql = "SELECT a.*, ac.title as cat_name,
            FROM article a
            LEFT JOIN article_category ac ON a.cat_id=ac.id
            WHERE ac.name='term & condition'
        ";
        return Mysql::select_one($sql);
    }
    /**
     * multiple record or false
     * @return 2D array or false
     */
    public static function get_faqs()
    {
        $sql = "SELECT a.*, ac.title as cat_name,
            FROM article a
            LEFT JOIN article_category ac ON a.cat_id=ac.id
            WHERE ac.name='faq'
        ";
        return Mysql::select_all($sql);
    }
}