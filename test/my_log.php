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
        <span style="color:red;">file:F:\jian\wamp\www\pree\application\model\base\article.phpline:62class:App\Model\Base\Articlemethod:App\Model\Base\Article::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM article b
            LEFT JOIN article_category bc ON b.cat_id=bc.id
            WHERE  b.status=1
            ORDER BY b.rank DESC
            LIMIT 0, 10
        <span style="color:red;">file:F:\jian\wamp\www\pree\application\model\base\article.phpline:62class:App\Model\Base\Articlemethod:App\Model\Base\Article::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM article b
            LEFT JOIN article_category bc ON b.cat_id=bc.id
            WHERE  b.status=1
            ORDER BY b.date_created DESC
            LIMIT 0, 10
        <span style="color:red;">file:F:\jian\wamp\www\pree\application\model\base\article.phpline:62class:App\Model\Base\Articlemethod:App\Model\Base\Article::get_all</span><br /><br />$sql:SELECT * FROM article_category WHERE title='澳洲保险常识'<span style="color:red;">file:F:\jian\wamp\www\pree\application\model\articlecategory.phpline:64class:App\Model\Articlecategorymethod:App\Model\Articlecategory::exist_cat_title</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM article b
            LEFT JOIN article_category bc ON b.cat_id=bc.id
            WHERE  b.status=1 AND b.cat_id=1
            ORDER BY date_created DESC
            LIMIT 0, 20
        <span style="color:red;">file:F:\jian\wamp\www\pree\application\model\base\article.phpline:62class:App\Model\Base\Articlemethod:App\Model\Base\Article::get_all</span><br /><br />