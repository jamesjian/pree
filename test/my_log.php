sql:SELECT b.*, bc.title as cat_name
            FROM article b
            LEFT JOIN article_category bc ON b.cat_id=bc.id
            WHERE b.status=1
            ORDER BY b.date_created DESC
            LIMIT 0, 999999
        <span style="color:red;">file:F:\jian\wamp\www\pree\application\model\base\article.phpline:62class:App\Model\Base\Articlemethod:App\Model\Base\Article::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM article b
            LEFT JOIN article_category bc ON b.cat_id=bc.id
            WHERE b.status=1
            ORDER BY b.date_created DESC
            LIMIT 0, 999999
        <span style="color:red;">file:F:\jian\wamp\www\pree\application\model\base\article.phpline:62class:App\Model\Base\Articlemethod:App\Model\Base\Article::get_all</span><br /><br />