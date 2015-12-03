<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Contact_manage extends Fuel_base_controller {
	public $view_location = 'contact';
	public $nav_selected = 'contact/manage';
	public $module_name = 'contact manage';
	public $module_uri = 'fuel/contact/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('contact');
		$this->load->module_model(CONTACT_FOLDER, 'contact_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('comm');
	}
	
	function lists($dataStart=0)
	{
		$base_url = base_url();

		$search_name = $this->input->get_post("search_name");
		$search_email = $this->input->get_post("search_email"); 
		$search_topic = $this->input->get_post("search_topic"); 
		
		$filter = " WHERE 1=1  "; 
 
		if ($search_name != "") {
			$filter .= " AND name like '%$search_name%'"; 
			$this->session->set_userdata('search_name', $search_name);
		}else{
			if (!isset($search_name) ) {
				$search_name = $this->session->userdata('search_name'); 
				if ($search_name != "") {
					$search_name = $search_name;
					$filter .= " AND name like '%$search_name%'"; 
				} 
			}else{
				$this->session->set_userdata('search_name', "");
			}					
		}


		if ($search_email != "") {
			$filter .= " AND email like '%$search_email%'"; 
			$this->session->set_userdata('search_email', $search_email);
		}else{
			if (!isset($search_email) ) {
				$search_email = $this->session->userdata('search_email'); 
				if ($search_email != "") {
					$search_email = $search_email;
					$filter .= " AND email like '%$search_email%'"; 
				} 
			}else{
				$this->session->set_userdata('search_email', "");
			}					
		}


		if ($search_topic != "" && $search_topic != "all") {
			// echo $search_com_name."11";
			$filter .= " AND inquiry_topic = '$search_topic'"; 
			$this->session->set_userdata('search_topic', $search_topic);
		}else{
			// echo $search_com_name."22";
			if (!isset($search_topic) ) {
			// echo $search_com_name."33";
				$search_topic = $this->session->userdata('search_topic'); 
				if (  $search_topic != "all") {
			// echo $search_com_name."44";
					$search_topic = $search_topic;
					$filter .= " AND inquiry_topic = '$search_topic'"; 
				} 
			}else{
			// echo $search_com_name."55";
				$this->session->set_userdata('search_com_name', "");
			}					
		}

		// echo $search_com_name."11".$filter;

		$vars['search_name'] = $search_name;
		$vars['search_email'] = $search_email;
		$vars['search_topic'] = $search_topic;

		$vars['topic'] = $this->contact_manage_model->get_topic();
		$vars['coor_unit'] = $this->contact_manage_model->get_coor_unit();

		
		$target_url = $base_url.'fuel/contact/lists/';

		$total_rows = $this->contact_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config);

		$results = $this->contact_manage_model->get_contact_list($dataStart, $dataLen,$filter); 

		$vars['form_action'] = $base_url.'fuel/contact/lists';
		$vars['export_action'] = $base_url.'fuel/contact/export_excel';
		$vars['form_method'] = 'POST'; 
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['results'] = $results;
		$vars['page_jump'] = $this->pagination->create_links(); 
		$vars['detail_url'] = $base_url.'fuel/contact/detail/';   
		$vars['total_rows'] = $total_rows;
		$vars['search_url'] = $base_url.'fuel/contact/lists'; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/contact_lists_view', $vars);

	}  
 
	function detail($id)
	{
		$row;
		if(isset($id))
		{
			$row = $this->contact_manage_model->get_contact_by_id($id);
		}else{
			$this->comm->plu_redirect($module_uri, 0, "找不到聯絡資訊");
			die();
		}
		$base_url = base_url();
 
        $vars['row'] = $row; 

	 
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	
		// module_uri
	 	$vars["module_uri"] = $base_url.'fuel/contact/lists';
		$vars["row"] = $row;
		$vars["view_name"] = "聯絡資訊";
		$this->fuel->admin->render('_admin/contact_detail_view', $vars);
	}

	function export_excel(){
		$this->load->library('excel');
		$post_ary = $this->input->post();
		$search_name            = $post_ary["search_name"];
		$search_email          = $post_ary["search_email"];
		$search_com_name   = $post_ary["search_com_name"];
		$search_topic        = $post_ary["search_topic"];

		$filter = " WHERE 1=1  "; 
 
	// 	$search_name = $this->session->userdata('search_name'); 
	// 	if ($search_name != "") {
	// 		$search_name = $search_name;
	// 		$filter .= " AND contact_person like '%$search_name%'"; 
	// 	} 

		if ($search_name != "") {
			$filter .= " AND contact_person like '%$search_name%' ";
			$this->session->set_userdata('search_name', $search_name);
		}else{
			if (!isset($search_name) ) {
				$search_name = $this->session->userdata('search_name'); 
				if ($search_name != "") {
					$search_name = $search_name;
					$filter .= " AND contact_person like '%$search_name%' ";
				} 
			}else{
				$this->session->set_userdata('search_name', "");
			}					
		}


	// 	$search_email = $this->session->userdata('search_email'); 
	// 	if ($search_email != "") {
	// 		$search_email = $search_email;
	// 		$filter .= " AND email like '%$search_email%'"; 
	// 	} 

		if ($search_email != "") {
			$filter .= " AND email like '%$search_email%' ";
			$this->session->set_userdata('search_email', $search_email);
		}else{
			if (!isset($search_email) ) {
				$search_email = $this->session->userdata('search_email'); 
				if ($search_email != "") {
					$search_email = $search_email;
					$filter .= " AND email like '%$search_email%' ";
				} 
			}else{
				$this->session->set_userdata('search_email', "");
			}					
		}

	// 	$search_com_name = $this->session->userdata('search_com_name'); 
	// 	if ($search_com_name != "") {
	// 		$search_com_name = $search_com_name;
	// 		$filter .= " AND com_name like '%$search_com_name%'"; 
	// 	} 

		if ($search_com_name != "") {
			$filter .= " AND com_name like '%$search_com_name%'";
			$this->session->set_userdata('search_com_name', $search_com_name);
		}else{
			if (!isset($search_com_name) ) {
				$search_com_name = $this->session->userdata('search_com_name'); 
				if ($search_com_name != "") {
					$search_com_name = $search_com_name;
					$filter .= " AND com_name like '%$search_com_name%'";
				} 
			}else{
				$this->session->set_userdata('search_com_name', "");
			}					
		}

	// 	$search_topic = $this->session->userdata('search_topic'); 
	// 	if (  $search_topic != "all") {
	// // echo $search_com_name."44";
	// 		$search_topic = $search_topic;
	// 		$filter .= " AND country = '$search_topic'"; 
	// 	} 

		if ($search_topic != "all") {
			$filter .= "  AND country = '$search_topic'";
			$this->session->set_userdata('search_topic', $search_topic);
		}else{
			if (!isset($search_topic) ) {
				$search_topic = $this->session->userdata('search_topic'); 
				if ($search_topic != "all") {
					$search_topic = $search_topic;
					$filter .= "  AND country = '$search_topic'";
				} 
			}else{
				$this->session->set_userdata('search_topic', "");
			}					
		}

		// echo $filter;
		// die;

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
									 ->setLastModifiedBy("Maarten Balliauw")
									 ->setTitle("Office 2007 XLSX Test Document")
									 ->setSubject("Office 2007 XLSX Test Document")
									 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
									 ->setKeywords("office 2007 openxml php")
									 ->setCategory("Test result file");

		$col_name = array("公司名稱","地址","聯絡人","國家","電話","傳真","電子郵箱","公司類型","員工","工程師/技術員","人數","銷售型","T","R","銷售渠道","國家","國際市場-其他","你是怎麼知道新駿？","你是怎麼知道新駿？-其他","有興趣產品","評論");
		$value = $this->contact_manage_model->get_export_list($filter);
		$title = "Resume Data Export";
		$file_name = "export_data";
		
		// Add some data
		$row_num = 1;
		$col_num = "A";
		foreach($col_name as $cols){
			
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($col_num++.$row_num, "$cols");
		}
		/*foreach($col_name as $cols){
			
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($col_num++.$row_num, "$cols");
		}*/
		foreach($value as $rows){
			$row_num++;
			$col_num = "A";
			foreach($rows as $key => $val ){
				// if ($col_num=="D") {
				// 	echo $key."<br/>";
				// }
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($col_num++.$row_num, $val);		
			}
		}
		// die;
		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle($title);


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		//flush();
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$file_name.'.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}

}