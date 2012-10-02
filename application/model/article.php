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
        $where = "ac.name='about us'";
        return parent::get_one_by_where($where);
    }
    /**
     * only one record or false
     * @return 1D array or false
     */
    public static function get_term_condition()
    {
        $where = "ac.name='term & condition'";
        return parent::get_one_by_where($where);	
    }
    /**
     * multiple record or false
     * @return 2D array or false
     */
    public static function get_faqs()
    {
        $where = "ac.name='faq'";
        return parent::get_all($where);		
    }
}