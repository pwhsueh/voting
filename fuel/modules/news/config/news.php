<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['news'] = array(
'news/lists/0'		=> '首頁',
'news/lists/1'		=> 'CI設計',
'news/lists/2'		=> 'ISO輔導項目',
'news/lists/3'		=> 'ISO小學堂',
'news/lists/4'		=> '最新消息',
'news/lists/5'		=> '輔導實績',
// 'news/lists/4?type=93'		=> '最新消息-輔導實績'
);

// deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['crawleruse_db_table_settings'] = TRUE;

// the cache folder to hold blog cache files
$config['news'] = 'news';

$config['tables']['mod_news'] = 'mod_news';


$config['news_javascript'] = array(
    site_url().'assets/admin_js/jquery.js',
    site_url().'assets/admin_js/bootstrap.min.js', 
	site_url().'assets/admin_js/jquery-ui.min.js',
);

$config['news_ck_javascript'] = array(
    site_url().'assets/admin_js/ckeditor/ckeditor.js',
	site_url().'assets/admin_js/ckfinder/ckfinder.js'
);

$config['news_css'] = array(
	site_url().'assets/admin_css/bootstrap.min.css',
	site_url().'assets/admin_css/style.css',
	site_url().'assets/admin_css/style-responsive.css'
	// site_url().'assets/admin_css/datepicker.css'
);

?>