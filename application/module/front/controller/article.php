<?php

namespace App\Module\Front\Controller;

use \Zx\Controller\Route;
use \Zx\View\View;
use \App\Model\Article as Model_Article;

/**
 * homepage: /=>/front/article/latest/page/1
 * latest: /front/article/latest/page/3
 * most popular:/front/article/most_popular/page/3
 * article under category: /front/articlecategory/retrieve/$category_id_3/category_name.php
 * one: /front/article/content/$id/$article_url
 * keyword: /front/article/keyword/$keyword_3
 */
class Article extends Front {

    public $view_path;

    public function init() {
        $this->view_path = APPLICATION_PATH . 'module/front/view/article/';
        parent::init();
    }

    //one article
    public function content() {
        $article_id = $params[0];
        $article = Model_Article::get_one($article_id);
        if ($article) {
            Transaction_Html::set_title($article['title']);
            Transaction_Html::set_keyword($article['keyword'] . ',' . $article['keyword_en']);
            Transaction_Html::set_description($article['title']);
            Model_Article::increase_rank($article_id);

            View::set_view_file($this->view_path . 'show.php');
            $relate_articles = Model_Article::get_10_active_related_articles($article_id);
            View::set_action_var('article', $article);
            View::set_action_var('related_articles', $relate_articles);
        } else {
            
        }
    }

    /**
     * front/article/keyword/$keyword_3, 3 is page number
     */
    public function keyword() {
        $keyword = (isset($this->params[0])) ? $this->params[0] : '';
        if ($keyword == '') {
            //goto homepage
        } else {
            $arr = explode('_', $keyword);
            if (isset($arr[0]) && $arr[0] != '')
                $keyword = $arr[0];
            if (isset($arr[1]) && is_numeric($arr[1]))
                $page_num = intval($arr[1]);
            else
                $page_num = 1;
            $relate_articles = Model_Article::get_();
        }
    }

    /**
      retrieve articles under a category
      front/article/category/5/page/3, 5 is cat id, 3 is page number
      $params[0] = 5, $params[1] = 'page', $params[2] = 3;
     */
    public function category() {
        $cat_id = (isset($params[0])) ? intval($params[1]) : 1;
        $page_number = (isset($params[2])) ? intval($params[2]) : 1;  //default page 1
        $cat = Model_Articlecategory::get_one($cat_id);
        if ($cat) {
            Transaction_Html::set_title($cat['title']);
            Transaction_Html::set_keyword($cat['keyword'] . ',' . $cat['keyword_en']);
            Transaction_Html::set_description($cat['title']);
        }
        $order_by = 'date_created';
        $direction = 'DESC';
        $articles = Model_Article::get_active_articles_by_cat_id_and_page_number($cat_id, $page_number, $order_by, $direction);
        $num_of_articles = Model_Article::get_num_of_active_articles_by_cat_id($cat_id);
        $num_of_pages = ceil($num_of_articles / NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'retrieve_by_cat_id.php');
        View::set_action_var('cat', $cat);
        View::set_action_var('articles', $articles);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

    /**
      article/latest/3, 3 is page number, if missing, 1 is default page number
     * including home page
     */
    public function latest() {
        \Zx\Test\Test::object_log('lob', 'aaaa', __FILE__, __LINE__, __CLASS__, __METHOD__);
        Transaction_Html::set_title('latest');
        Transaction_Html::set_keyword('latest');
        Transaction_Html::set_description('latest');
        $page_num = (isset($params[0])) ? intval($params[0]) : 1;
        if ($page_num < 1)
            $page_num = 1;
        $order_by = 'date_created';
        $direction = 'DESC';
        $articles = Model_Article::get_active_articles_by_page_num($page_num, $order_by, $direction);
        $popular_articles = Model_Article::get_10_most_popular_articles();
        $num_of_articles = Model_Article::get_num_of_active_articles();
        $num_of_pages = ceil($num_of_articles / NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'retrieve_latest.php');
        View::set_action_var('articles', $articles);
        View::set_action_var('popular_articles', $popular_articles);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

    /**
      article/most_popular/3, 3 is page number, if missing, 1 is default page number
     */
    public function most_popular() {
        Transaction_Html::set_title('popular');
        Transaction_Html::set_keyword('popular');
        Transaction_Html::set_description('popular');
        $page_num = (isset($params[0])) ? intval($params[0]) : 1;
        if ($page_num < 1)
            $page_num = 1;
        $order_by = 'rank';
        $direction = 'DESC';
        $articles = Model_Article::get_active_articles_by_page_num($page_num, $order_by, $direction);
        $latest_articles = Model_Article::get_10_latest_articles();
        $num_of_articles = Model_Article::get_num_of_active_articles();
        $num_of_pages = ceil($num_of_articles / NUM_OF_BLOGS_IN_CAT_PAGE);
        View::set_view_file($this->view_path . 'retrieve_popular.php');
        View::set_action_var('articles', $articles);
        View::set_action_var('latest_articles', $latest_articles);
        View::set_action_var('order_by', $order_by);
        View::set_action_var('direction', $direction);
        View::set_action_var('page_num', $page_num);
        View::set_action_var('num_of_pages', $num_of_pages);
    }

}
