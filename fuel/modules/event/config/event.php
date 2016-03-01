<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/

$config['nav']['event'] = array(
	'event/lists?type=P'		=> '圖片版',
	'event/lists?type=T'		=> '文字版'
);

// deterines whether to use this configuration below or the database for controlling the blogs behavior
$config['crawleruse_db_table_settings'] = TRUE;

// the cache folder to hold blog cache files
$config['event'] = 'event';

$config['tables']['mod_events'] = 'mod_events';


$config['event_javascript'] = array(
    site_url().'assets/admin_js/jquery.js',
    site_url().'assets/admin_js/bootstrap.min.js',
    site_url().'assets/admin_css/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
    site_url().'assets/admin_js/jquery.timepicker.min.js',
    
	site_url().'assets/admin_js/jquery-ui.min.js',
    // "ckeditor.js",
    // "adapters/jquery.js",
    // "jquery.numeric.min.js"
);

$config['event_item_javascript'] = array(
    site_url().'assets/admin_Include/js/CustomFileInputs/js/custom-file-input.js'
);



$config['event_ck_javascript'] = array(
    site_url().'assets/admin_js/ckeditor/ckeditor.js',
	site_url().'assets/admin_js/ckfinder/ckfinder.js'
);

$config['event_list_css'] = array(
	site_url().'assets/admin_css/bootstrap.min.css',
	site_url().'assets/admin_css/style.css',
	site_url().'assets/admin_css/style-responsive.css',
	site_url().'assets/admin_css/bootstrap-datetimepicker/css/datetimepicker.css',
	site_url().'assets/admin_css/jquery.timepicker.min.css'
	
	// site_url().'assets/admin_css/font-awesome/css/font-awesome.css'
	// site_url().'assets/admin_css/datepicker.css'
);

$config['event_css'] = array(
	// site_url().'assets/admin_css/bootstrap.min.css',
	// site_url().'assets/admin_css/style.css',
	// site_url().'assets/admin_css/style-responsive.css',
	// site_url().'assets/admin_css/bootstrap-datetimepicker/css/datetimepicker.css',
	// site_url().'assets/admin_css/jquery.timepicker.min.css',
	site_url().'assets/admin_Include/css/main.css',
	site_url().'assets/admin_Include/css/style2.css'
	
	// site_url().'assets/admin_css/font-awesome/css/font-awesome.css'
	// site_url().'assets/admin_css/datepicker.css'
);

$config['event_item_css'] = array(
	site_url().'assets/admin_Include/css/main.css',
	site_url().'assets/admin_Include/css/style2.css'
);

$config['event_upload_css'] = array(
	site_url().'assets/admin_Include/js/CustomFileInputs/css/normalize.css',
	site_url().'assets/admin_Include/js/CustomFileInputs/css/demo.css',
	site_url().'assets/admin_Include/js/CustomFileInputs/css/component.css'
);


?>