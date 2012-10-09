sql:SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE  b.title LIKE '%cc% AND b.cat_name LIKE '%cc%'
            ORDER BY b.title ASC
            LIMIT 0, 3
        <span style="color:red;">file:C:\wamp\www\pree\application\model\base\blog.phpline:56class:App\Model\Base\Blogmethod:App\Model\Base\Blog::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE  b.title LIKE '%cc%' AND b.cat_name LIKE '%cc%'
            ORDER BY b.title ASC
            LIMIT 0, 3
        <span style="color:red;">file:C:\wamp\www\pree\application\model\base\blog.phpline:56class:App\Model\Base\Blogmethod:App\Model\Base\Blog::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE  b.title LIKE '%cc%' OR b.cat_name LIKE '%cc%'
            ORDER BY b.title ASC
            LIMIT 0, 3
        <span style="color:red;">file:C:\wamp\www\pree\application\model\base\blog.phpline:56class:App\Model\Base\Blogmethod:App\Model\Base\Blog::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE  b.title LIKE '%cc%' OR cat_name LIKE '%cc%'
            ORDER BY b.title ASC
            LIMIT 0, 3
        <span style="color:red;">file:C:\wamp\www\pree\application\model\base\blog.phpline:56class:App\Model\Base\Blogmethod:App\Model\Base\Blog::get_all</span><br /><br />sql:SELECT b.*, bc.title as cat_name
            FROM blog b
            LEFT JOIN blog_category bc ON b.cat_id=bc.id
            WHERE  b.title LIKE '%cc%' OR bc.title LIKE '%cc%'
            ORDER BY b.title ASC
            LIMIT 0, 3
        <span style="color:red;">file:C:\wamp\www\pree\application\model\base\blog.phpline:56class:App\Model\Base\Blogmethod:App\Model\Base\Blog::get_all</span><br /><br />lob:aaaa<span style="color:red;">file:F:\jian\wamp\www\pree\application\module\front\controller\common.phpline:37class:App\Module\Front\Controller\Commonmethod:App\Module\Front\Controller\Common::home</span><br /><br />lob:aaaa<span style="color:red;">file:F:\jian\wamp\www\pree\application\module\front\controller\common.phpline:38class:App\Module\Front\Controller\Commonmethod:App\Module\Front\Controller\Common::home</span><br /><br />lob:aaaa<span style="color:red;">file:F:\jian\wamp\www\pree\application\module\front\controller\common.phpline:38class:App\Module\Front\Controller\Commonmethod:App\Module\Front\Controller\Common::home</span><br /><br />lob:aaaa<span style="color:red;">file:F:\jian\wamp\www\pree\application\module\front\controller\common.phpline:38class:App\Module\Front\Controller\Commonmethod:App\Module\Front\Controller\Common::home</span><br /><br />lob:aaaa<span style="color:red;">file:F:\jian\wamp\www\pree\application\module\front\controller\common.phpline:38class:App\Module\Front\Controller\Commonmethod:App\Module\Front\Controller\Common::home</span><br /><br />