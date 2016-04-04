<?php 
//link the controller to the nav link


$route[FUEL_ROUTE.'event/lists'] 			= EVENT_FOLDER.'/event_manage/lists';
$route[FUEL_ROUTE.'event/lists/(:num)'] 	= EVENT_FOLDER.'/event_manage/lists/$1';
$route[FUEL_ROUTE.'event/report/(:num)'] 	= EVENT_FOLDER.'/event_manage/report/$1';
$route[FUEL_ROUTE.'event/create'] 			= EVENT_FOLDER.'/event_manage/create';
$route[FUEL_ROUTE.'event/edit'] 			= EVENT_FOLDER.'/event_manage/edit';
$route[FUEL_ROUTE.'event/del'] 				= EVENT_FOLDER.'/event_manage/do_del';
$route[FUEL_ROUTE.'event/do_create'] 		= EVENT_FOLDER.'/event_manage/do_create';
$route[FUEL_ROUTE.'event/do_edit'] 			= EVENT_FOLDER.'/event_manage/do_edit';
$route[FUEL_ROUTE.'event/do_multi_del'] 	= EVENT_FOLDER.'/event_manage/do_multi_del';
$route[FUEL_ROUTE.'event/status/(:num)']	= EVENT_FOLDER.'/event_manage/event_status/$1';
$route[FUEL_ROUTE.'event/update/regitype']	= EVENT_FOLDER.'/event_manage/do_batch_regi_type';
$route[FUEL_ROUTE.'event/item/(:num)']	    = EVENT_FOLDER.'/event_manage/item_create/$1';
$route[FUEL_ROUTE.'event/item/(:num)/(:num)']	= EVENT_FOLDER.'/event_manage/item_edit/$1/$2';
$route[FUEL_ROUTE.'event/do_item_create'] 		= EVENT_FOLDER.'/event_manage/do_item_create';
$route[FUEL_ROUTE.'event/detail/list/(:num)'] 	= EVENT_FOLDER.'/event_manage/detail_lists/$1';
$route[FUEL_ROUTE.'event/item_detail/list/(:num)/(:num)'] 	= EVENT_FOLDER.'/event_manage/item_detail_lists/$1/$2';

$route[FUEL_ROUTE.'event_info/edit/(:num)']     = EVENT_FOLDER.'/event_manage/edit_info/$1';
$route[FUEL_ROUTE.'event_info/do_edit']     = EVENT_FOLDER.'/event_manage/do_edit_info';

$route[FUEL_ROUTE.'reg/lists'] 			        = EVENT_FOLDER.'/event_manage/reg_lists';
$route[FUEL_ROUTE.'reg/lists/(:num)/(:num)'] 	= EVENT_FOLDER.'/event_manage/reg_lists/$1/$2';
$route[FUEL_ROUTE.'reg/detail/(:num)'] 	        = EVENT_FOLDER.'/event_manage/reg_detail/$1';

 ?>