<?php
namespace App\Transaction;

use \App\Model\Blog as Model_Blog;
use \App\Model\Blogcategory as Model_Blogcategory;

class Tool{
	public static function generate_sitemap(){
		$str = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
		<url>
      <loc>http://www.baoxian.com.au/</loc>
      <lastmod>' .date('Y-m-d'). '</lastmod>
      <changefreq>daily</changefreq>
      <priority>1</priority>
   </url>
		';
	
		$link_prefix = "http://www.baoxian.com.au/blogcategory/show/";
		foreach ($cats as $cat) {
		   $cat_str = '<url>
      <loc>'.$link_prefix . $cat['id'] . '</loc>
      <lastmod>'. $cat['date_created'] . '</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
   </url>';
   $str .= $cat_str;
	}
	$link_prefix = "http://www.baoxian.com.au/blog/show/";
		foreach ($blogs as $blog) {
		   $blog_str = '<url>
      <loc>'.$link_prefix . $blog['id'] . '</loc>
      <lastmod>'. $blog['date_created'] . '</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
   </url>';
   $str .= $blog_str;
	}
		$str .= '</urlset>';
		file_put_contents(PHP_ROOT . 'sitemap.xml', $str);
		return true;
}