this is article list header
<?php
if ($article_list <> null) {
    foreach ($article_list as $article) {
        echo $article['session_id'] . '  ' . $article['session_data'] . '  ' . $article['expires'] . '<br />';
    }
}

?>
<a href="#" id="test">Test</a>
<div id="test_div"></div>


this is article list footer
