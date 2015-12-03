<?php 
//link the controller to the nav link

$route[FUEL_ROUTE.'news/lists'] 			= NEWS_FOLDER.'/news_manage/lists';
$route[FUEL_ROUTE.'news/lists/(:num)'] 			= NEWS_FOLDER.'/news_manage/lists/$1';
$route[FUEL_ROUTE.'news/lists/(:num)/(:num)'] 	= NEWS_FOLDER.'/news_manage/lists/$1/$2';
// $route[FUEL_ROUTE.'news/lists/(:num)/(:num)/(:num)'] 	= NEWS_FOLDER.'/news_manage/lists/$1/$2/$3';
$route[FUEL_ROUTE.'news/create/(:num)'] 			= NEWS_FOLDER.'/news_manage/create/$1';
$route[FUEL_ROUTE.'news/edit/(:num)'] 		= NEWS_FOLDER.'/news_manage/edit/$1';
$route[FUEL_ROUTE.'news/del/(:num)'] 		= NEWS_FOLDER.'/news_manage/do_del/$1';
$route[FUEL_ROUTE.'news/do_create'] 		= NEWS_FOLDER.'/news_manage/do_create';
$route[FUEL_ROUTE.'news/do_edit/(:num)'] 	= NEWS_FOLDER.'/news_manage/do_edit/$1';
$route[FUEL_ROUTE.'news/do_multi_del'] 		= NEWS_FOLDER.'/news_manage/do_multi_del'; 
$route[FUEL_ROUTE.'news/do_save_order'] 		= NEWS_FOLDER.'/news_manage/do_save_order'; 
$route[FUEL_ROUTE.'news/get_news_order/(:any)/(:any)'] 		= NEWS_FOLDER.'/news_manage/get_news_order/$1/$2';

 