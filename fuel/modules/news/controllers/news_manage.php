<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class News_manage extends Fuel_base_controller {
	public $view_location = 'news';
	public $nav_selected = 'news/manage';
	public $module_name = 'news manage';
	public $module_uri = 'fuel/news/lists';
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('news/manage');
		$this->load->module_model(NEWS_FOLDER, 'news_manage_model');
		$this->load->module_model(CODEKIND_FOLDER, 'codekind_manage_model');
		$this->load->helper('ajax');
		$this->load->library('pagination');
		$this->load->library('set_page');
		$this->load->library('session');
	}
	
	function lists($news_kind=0,$dataStart=0)//news_kind 0=>最新消息 1=>CI設計 2=>ISO輔導項目3=>ISO小學堂
	{
		$base_url = base_url();

		$news_name = $this->news_name_by_kind($news_kind);

		$search_keyword = $this->input->get_post('search_keyword'); 
		$search_type = ''; 
		$news_type = $this->input->get_post('type');
		
		$filter = " WHERE news_kind = '$news_kind' "; 

		if ($search_keyword != "") {
			$filter .= " AND (title like '%$search_keyword%' || content like '%$search_keyword%') "; 
			$this->session->set_userdata('search_keyword', $search_keyword);
		}else{
			if (!isset($search_keyword) ) {
				$search_keyword = $this->session->userdata('search_keyword'); 
				if ($search_keyword != "") {
					$search_keyword = $search_keyword;
					$filter .= " AND (title like '%$search_keyword%' || content like '%$search_keyword%') "; 
				} 
			}else{
				$this->session->set_userdata('search_keyword', "");
			}					
		}
		$vars['type_nav'] = "";
		if ($news_kind == 3 || $news_kind == 2 || $news_kind == 0 || $news_kind == 4 || $news_kind == 5) {
		

			// $search_type = $this->input->get_post('search_type'); 

			// if ($search_type != "") {
			// 	$filter .= " AND type = '$search_type' "; 
			// 	$this->session->set_userdata('search_type', $search_type);
			// }else{
			// 	if (!isset($search_type) ) {
			// 		$search_type = $this->session->userdata('search_type'); 
			// 		if ($search_type != "") {
			// 			$search_type = $search_type;
			// 			$filter .= " AND type = '$search_type' "; 
			// 		} 
			// 	}else{
			// 		$this->session->set_userdata('search_type', "");
			// 	}					
			// }
			// $vars['search_type'] = $search_type;

			if (isset($news_type) && !empty($news_type)) {
				$filter .= " AND type = '$news_type' "; 

				$vars['type_nav'] = " >> ".$this->codekind_manage_model->get_code_detail($news_type)->code_name;
			}
		}

		if ($news_kind == 2 || $news_kind == 3|| $news_kind == 5) {
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("COACH_TYPE");
			$vars['type'] = $type;
		}else if($news_kind == 0){
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("HOME_TYPE");
			$vars['type'] = $type;
		}else if($news_kind == 4 ){
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWS_TYPE");
			$vars['type'] = $type;
		}

		// print_r($filter);

		$target_url = $base_url."fuel/news/lists/$news_kind/";

		$total_rows = $this->news_manage_model->get_total_rows($filter);
		$config = $this->set_page->set_config($target_url, $total_rows, $dataStart, 20);
		$dataLen = $config['per_page'];
		$this->pagination->initialize($config); 

		$results = $this->news_manage_model->get_news_list($dataStart, $dataLen,$filter);
		$vars['news_kind'] = $news_kind;
		$vars['news_name'] = $news_name;
		$vars['target_url'] = $target_url;
		$vars['search_keyword'] = $search_keyword;
		$vars['total_rows'] = $total_rows; 
		$vars['form_action'] = $base_url."fuel/news/lists/$news_kind";
		$vars['form_method'] = 'POST';
		$vars['url_save_order'] = $base_url."fuel/news/do_save_order";		
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);

		$vars['page_jump'] = $this->pagination->create_links();
		$vars['create_url'] = $base_url."fuel/news/create/$news_kind?type=$news_type";
		$vars['edit_url'] = $base_url.'fuel/news/edit/';
		$vars['del_url'] = $base_url.'fuel/news/del/';
		$vars['multi_del_url'] = $base_url.'fuel/news/do_multi_del';
		$vars['results'] = $results;
		$vars['total_rows'] = $total_rows; 
		$vars['CI'] = & get_instance();

		$this->fuel->admin->render('_admin/news_lists_view', $vars);

	}

 
	function create($news_kind=0)
	{
		$news_name = $this->news_name_by_kind($news_kind);
		$news_type = $this->input->get_post('type');
		// $total_rows = $this->news_manage_model->get_total_rows(" WHERE 1=1 ");

		// $vars['news_order'] = $total_rows + 1;
		$vars['news_type'] = $news_type;
		$vars['now'] = date("Y-m-d");
		$vars['news_name'] = $news_name;
		$vars['news_kind'] = $news_kind;
		$vars['form_action'] = base_url().'fuel/news/do_create';
		$vars['form_method'] = 'POST';
		$vars['order'] = $this->news_manage_model->get_max_order($news_kind);
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);		

		$vars['module_uri'] = base_url().$this->module_uri.'/'.$news_kind;
		$vars['view_name'] = "新增";

		if ($news_kind == 2 || $news_kind == 3 || $news_kind == 5) {
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("COACH_TYPE");
			$vars['type'] = $type;
		}else if($news_kind == 0){
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("HOME_TYPE");
			$vars['type'] = $type;
		}else if($news_kind == 4){
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWS_TYPE");
			$vars['type'] = $type;
		}
		

		// $lang = $this->codekind_manage_model->get_code_list_for_other_mod("LANG_CODE");
		// $vars['lang'] = $lang;
 

		$this->fuel->admin->render("_admin/news_create_view", $vars);
	}

	function do_create()
	{
		$post_arr = $this->input->post();		
		$news_kind = $post_arr['news_kind'];
		$root_path = assets_server_path('news_img/'.$post_arr['news_kind'].'/');
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		}
		 
		$post_arr["content"] = htmlspecialchars($post_arr["content"]);	
		$module_uri = base_url().$this->module_uri.'/'.$news_kind;
		 
		$post_arr = $this->input->post();
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '9999';
		$config['max_width']  = '*';
		$config['max_height']  = '*';

		$this->load->library('upload',$config); 

	 	// $name = 'news_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 

        if ($this->upload->do_upload('img'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = 'news_img/'.$post_arr['news_kind']."/".$data["upload_data"]["file_name"];
			
		 
		} else{ 
			 $post_arr["img"] = '';				 
		} 

		//調整順序
		$lang = $post_arr["lang"];
		$type = $post_arr["type"];
		$total_rows = $this->news_manage_model->get_total_rows(" WHERE 1=1 AND lang='$lang' AND type='$type' ");
		if ($post_arr['news_order'] > $total_rows + 1) {
			$post_arr['news_order'] = $total_rows + 1;
		}else if($post_arr['news_order'] < 1){
			$post_arr['news_order'] = 1;
		}else{
			$this->news_manage_model->did_insert_order_modify($post_arr['news_order'],$post_arr);
		}

		 
		$success = $this->news_manage_model->insert($post_arr);
			// $success = true;
		if($success)
		{
			$this->plu_redirect($module_uri, 0, "新增成功");
			die();
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "新增失敗");
			die();
		}
		return;
	}

	function get_news_order($lang,$type)
	{ 
		$total_rows = $this->news_manage_model->get_total_rows(" WHERE 1=1 AND lang='$lang' AND type='$type' ");
		// echo $total_rows;
		// die;
		$result = array();
		if(is_ajax())
		{
			$result['total_rows'] = $total_rows +1;
			echo json_encode($result);
		}
	}
	 
	function edit($id)
	{ 
		$news;
		if(isset($id))
		{
			$news = $this->news_manage_model->get_news_detail($id);
		} 

		if(!isset($id) || !isset($news))
		{
			$this->plu_redirect(base_url().'fuel/news/lists', 0, "找不到資料");
			die;
		}

		$news_kind = $news->news_kind;
	    $news_name = $this->news_name_by_kind($news_kind);

		if ($news_kind == 2 || $news_kind == 3 || $news_kind == 5) {
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("COACH_TYPE");
			$vars['type'] = $type;
		}else if($news_kind == 0){
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("HOME_TYPE");
			$vars['type'] = $type;
		}else if($news_kind == 4){
			$type = $this->codekind_manage_model->get_code_list_for_other_mod("NEWS_TYPE");
			$vars['type'] = $type;
		}

		$vars['type_nav'] = "";
		if ($news_kind == 3 || $news_kind == 2 || $news_kind == 0 || $news_kind == 4) {			 
			$vars['type_nav'] = $this->codekind_manage_model->get_code_detail($news->type)->code_name;			 
		}
		// print_r($vars['type_nav']);
		// die;

		$vars["news_kind_arr"] = array("0"=>"首頁","1"=>"CI設計","2"=>"輔導項目","3"=>"ISO小學堂","4"=>"最新消息","5"=>"輔導實績");

		$vars['news_name'] = $news_name;
		$vars['news_kind'] = $news_kind;
		$vars['form_action'] = base_url()."fuel/news/do_edit/$id";
		$vars['form_method'] = 'POST';
		$crumbs = array($this->module_uri => $this->module_name);
		$this->fuel->admin->set_titlebar($crumbs);	

	    $vars['news'] = $news; 
		$vars['module_uri'] = base_url().$this->module_uri.'/'.$news_kind;
	 
		$vars["view_name"] = "修改";
		$this->fuel->admin->render('_admin/news_edit_view', $vars);
	}

	function do_edit($id)
	{ 
		$post_arr = $this->input->post();
		$news_kind = $post_arr['news_kind'];
		
		$root_path = assets_server_path("news_img/$news_kind/");
		if (!file_exists($root_path)) {
		    mkdir($root_path, 0777, true);
		} 

		$post_arr["content"] = htmlspecialchars($post_arr["content"]);	
		 
		$post_arr = $this->input->post();
		$config['upload_path'] = $root_path;
		$config['allowed_types'] = 'png|jpg';
		$config['max_size']	= '9999';
		$config['max_width']  = '*';
		$config['max_height']  = '*';

		$this->load->library('upload',$config); 

	 	// $name = 'news_img/'.$post_arr['type']."/".$post_arr['title'].".png"; 

        if ($this->upload->do_upload('img'))
		{
			$data = array('upload_data'=>$this->upload->data()); 
			$post_arr["img"] = "news_img/$news_kind/".$data["upload_data"]["file_name"];
		 
		} else{ 
			$post_arr["img"] = $post_arr["exist_img"];				 
		} 

		$post_arr["id"] = $id;

		$module_uri = base_url().'fuel/news/edit/'.$id;
		//調整順序 
		// if ($post_arr['news_ori_order'] != $post_arr['news_order']) {
		// 	$ori_obj = $this->news_manage_model->get_order($post_arr);
		// 	if (isset($ori_obj)) {
		// 		$ori_id = $ori_obj->id;
		// 		$this->news_manage_model->update_order($post_arr['news_order'],$id);
		// 		$this->news_manage_model->update_order($post_arr['news_ori_order'],$ori_id);
		// 	}
		// } 

		// print_r($post_arr);

		$success = $this->news_manage_model->update($post_arr); 

		if($success)
		{
			$this->plu_redirect($module_uri, 0, "更新成功");
			die();
		}
		else
		{
			$this->plu_redirect($module_uri, 0, "更新失敗");
			die();
		}
		return;
	} 

	function do_save_order(){
		// $post_arr = $this->input->post();
  //       $order_ary = array();
		// foreach ($post_arr as $key => $value) {			
		// 	 if(strpos($key,"order_")>-1){
  //               $order_ary[str_replace("order_","",$key)] = $value;
  //           }
		// }

		// foreach ($order_ary as $key => $value) {
		// 	$this->news_manage_model->set_order($key,$value);
		// }
		$ids = $this->input->get_post("ids");
		foreach ($ids as $key => $value) {
			$this->news_manage_model->set_order($key,$value);
		}

		$result = array();

		$result['status'] = 1;


		if(is_ajax())
		{
			echo json_encode($result);
		}
		// print_r($order_ary);
		// die;
	}

	function do_multi_del(){
		$result = array();

		$ids = $this->input->get_post("ids");


		if($ids)
		{
			// $im_ids = implode(",", $ids);
			// $result['im_ids'] = $im_ids;
			foreach ($ids as $key) {
				$this->do_del($key);
			}
			$success = true;
			// $success = $this->news_manage_model->do_multi_del($im_ids);
		}
		else
		{
			$success = false;
		}



		if(isset($success))
		{
			$result['status'] = 1;
		}
		else
		{
			$result['status'] = $ids;
		}


		if(is_ajax())
		{
			echo json_encode($result);
		}
	} 

	function do_del($id)
	{
		$response = array();
		if(!empty($id))
		{
			$record = $this->news_manage_model->get_news_detail($id);
			if (isset($record)) {
				$success = $this->news_manage_model->del($id);
				$this->news_manage_model->delete_order($record); 
				if($success)
				{
					$response['status'] = 1;
				}
				else
				{
					$response['status'] = -1;
				}
			}else{
				$response['status'] = -1;
			} 
		}
		else
		{
			$response['status'] = -1;
		}

		echo json_encode($response);
	}

	function news_name_by_kind($news_kind){
		$news_name = '';
		switch ($news_kind) {
			case '0':
				$news_name = '首頁';
				break;
			case '1':
				$news_name = 'CI設計';
				break;
			case '2':
				$news_name = 'ISO輔導項目';
				break;
			case '3':
				$news_name = 'ISO小學堂';
				break;
			case '4':
				$news_name = '最新消息';
				break;
			case '5':
				$news_name = '輔導實績';
				break;
		}
		return $news_name;
	}

	function plu_redirect($url, $delay, $msg)
	{
	    if( isset($msg) )
	    {
	        $this->notify($msg);
	    }

	    echo "<meta http-equiv='Refresh' content='$delay; url=$url'>";
	}

	function notify($msg)
	{
	    $msg = addslashes($msg);
	    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	    echo "<script type='text/javascript'>alert('$msg')</script>\n";
	    echo "<noscript>$msg</noscript>\n";
	    return;
	}

}