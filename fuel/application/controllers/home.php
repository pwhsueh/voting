<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');
		$this->load->library('set_meta');	
		$this->load->helper('ajax');
		$this->load->helper('convert');
		$this->load->library('email');
		$this->load->model('events_model');  
		$this->load->helper('cookie');
	}

	function home() 
	{
		parent::Controller(); 
	} 


	function index()
	{	
		$vars['views'] = 'index';
		$vars['base_url'] = base_url();
		$vars['layout'] = 'none';
		$page_init = array('location' => 'index');

		$this->fuel->pages->render("index", $vars);
	 
	} 

	function introduction(){  
	 
		$vars['views'] = 'introduction';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'introduction');

		$this->fuel->pages->render("introduction", $vars);
	}

	function rights(){  
	 
		$vars['views'] = 'rights';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'rights');

		$this->fuel->pages->render("rights", $vars);
	}

	function rule(){  
	 
		$vars['views'] = 'rule';
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'rule');

		$this->fuel->pages->render("rule", $vars);
	}

	function event($event_id)
	{
		$event = $this->events_model->get_event_by_id($event_id);
		if ($event->type == 'P') {
			$this->photo($event_id);
		}else{
			$this->text($event_id);
		}
	}

	function photo($event_id)
	{	 
		// $lang_code = $this->uri->segment(1);


		$get_arr = $this->input->get();
		$sort = 'default';
		$keyword = '';
		if (isset($get_arr) && isset($get_arr['sort'])) {
			$sort = $get_arr['sort'];
		}
		if (isset($get_arr) && isset($get_arr['keyword'])) {
			$keyword = $get_arr['keyword'];
		}
	 // print_r($sort);
		// die;

		$event = $this->events_model->get_event_by_id($event_id);
		$event_items = $this->events_model->get_event_items($event_id,$keyword,$sort);
		$rand_event_items = $this->events_model->get_random_event_items_by_id($event_id,99);
 

		$vars['event'] = $event;
		$vars['event_items'] = $event_items; 
		$vars['rand_event_items'] = $rand_event_items; 
		$vars['do_action_url'] = base_url()."home/do_action";
		$vars['do_fb_share_url'] = "http://www.facebook.com/sharer/sharer.php?u=".base_url()."detail/";
		$vars['current_url'] = base_url()."event/".$event_id;
		$vars['sort'] = $sort;
		$vars['keyword'] = $keyword;

		// $seo_data = $this->code_model->get_seo_default();
		
		
		// $vars['keyword'] = $seo_data["keyword"];
		// $vars['image'] = site_url().'assets/'.$train->file_path;
		// $vars['url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		// $vars['description'] = mb_substr( strip_tags($train->train_detail), 0, 150 );


		// $vars['train_statues'] = $train_statues;
		$vars['views'] = 'event_photo';
		// $seo_data = $this->code_model->get_seo_default();
		// $vars['title'] = $train->train_title."-領導力企管";
		// $vars['keyword'] = $seo_data["keyword"];
		// $vars['interest_news'] = $this->code_model->get_random_all_news();
		// $vars['recommend_news'] = $this->code_model->get_extension_news("4"," AND type='139'",""," LIMIT 0,5");
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'event_photo');
		$this->fuel->pages->render("event_photo", $vars);
	}

	function text($event_id)
	{	 
		// $lang_code = $this->uri->segment(1);


		$get_arr = $this->input->get();
		 
		$keyword = '';
	 
		if (isset($get_arr) && isset($get_arr['keyword'])) {
			$keyword = $get_arr['keyword'];
		}
	 // print_r($sort);
		// die;

		$event = $this->events_model->get_event_by_id($event_id);
		$event_items = $this->events_model->get_event_items($event_id,$keyword,'default');
		// $rand_event_items = $this->events_model->get_random_event_items_by_id($event_id,99);
 

		$vars['event'] = $event;
		$vars['event_items'] = $event_items; 
		// $vars['rand_event_items'] = $rand_event_items; 
		$vars['do_action_url'] = base_url()."home/do_action";
		$vars['do_fb_share_url'] = "http://www.facebook.com/sharer/sharer.php?u=".base_url()."detail/";
		$vars['current_url'] = base_url()."event/".$event_id;
		$vars['keyword'] = $keyword;

		// $seo_data = $this->code_model->get_seo_default();
		
		
		// $vars['keyword'] = $seo_data["keyword"];
		// $vars['image'] = site_url().'assets/'.$train->file_path;
		// $vars['url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		// $vars['description'] = mb_substr( strip_tags($train->train_detail), 0, 150 );


		// $vars['train_statues'] = $train_statues;
		$vars['views'] = 'event_text';
		// $seo_data = $this->code_model->get_seo_default();
		// $vars['title'] = $train->train_title."-領導力企管";
		// $vars['keyword'] = $seo_data["keyword"];
		// $vars['interest_news'] = $this->code_model->get_random_all_news();
		// $vars['recommend_news'] = $this->code_model->get_extension_news("4"," AND type='139'",""," LIMIT 0,5");
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'event_text');
		$this->fuel->pages->render("event_text", $vars);
	}

	function item($item_id)
	{	 
		// $lang_code = $this->uri->segment(1);
		$item = $this->events_model->get_event_item($item_id);
		// print_r($item_id);
		// print_r($item->event_id);
		$event = $this->events_model->get_event_by_id($item->event_id); 
 		$this->set_meta->set_meta_data($item_id,"event_photo");
		// print_r($event);
		// die;

		$vars['event'] = $event;
		$vars['item'] = $item;  
		$vars['do_action_url'] = base_url()."home/do_action";

		// $seo_data = $this->code_model->get_seo_default();
		$vars['do_fb_share_url'] = "http://www.facebook.com/sharer/sharer.php?u=".base_url()."detail/";
		
		// $vars['keyword'] = $seo_data["keyword"];
		// $vars['image'] = site_url().'assets/'.$train->file_path;
		// $vars['url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		// $vars['description'] = mb_substr( strip_tags($train->train_detail), 0, 150 );


		// $vars['train_statues'] = $train_statues;
		$vars['views'] = 'detail';
		// $seo_data = $this->code_model->get_seo_default();
		// $vars['title'] = $train->train_title."-領導力企管";
		// $vars['keyword'] = $seo_data["keyword"];
		// $vars['interest_news'] = $this->code_model->get_random_all_news();
		// $vars['recommend_news'] = $this->code_model->get_extension_news("4"," AND type='139'",""," LIMIT 0,5");
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'detail');
		$this->fuel->pages->render("detail", $vars);
	}

	function do_action()//action_code:(L,S,V)
	{	 
	 	if(is_ajax())
		{ 
			// $result['status'] = -98; 
			// echo json_encode($result);
			// die;
			$post_arr = $this->input->post();
			$now = datetime_now(false);

			$start = date(uri_safe_decode($post_arr['start']));
			$deadline = date(uri_safe_decode($post_arr['deadline']));

			// $result['now'] = $now;  
			// $result['start'] = $start; 
			// $result['deadline'] = $deadline; 
			// $result['test1'] = $now>=$start; 
			// $result['test2'] = $now<$deadline; 
			// $result['test3'] = $now<$start; 
			// $result['test4'] = $now>$deadline; 
			// echo json_encode($result);
			// die;

			if ($now<$start) {
				$result['status'] = -97; 
				echo json_encode($result);
				die;
			}
			if ($now>$deadline) {
				$result['status'] = -98; 
				echo json_encode($result);
				die;
			}

	 		$item_id = $post_arr['item_id'];
	 		$action_code = $post_arr['action_code'];

	 		$this->load->helper('cookie'); 
	        $target_url = $this->input->cookie("voting_target_url");
	        if(!isset($target_url) || $target_url == ""){
				$target_url = site_url();
			}
	 		
			$user_id = $this->code_model->get_logged_in_account(); 
			if ($user_id == null || $user_id == "") {
				$result['status'] = -99; 
				$result['login_url'] = site_url().'login'; 
				echo json_encode($result);
				die;
			}

			$is_fb = !filter_var($user_id, FILTER_VALIDATE_EMAIL);
			//fb 登入才能分享&讚
			if (!$is_fb && ($action_code == 'S' || $action_code == 'L')) {
				$result['forbidden'] = 'Y';
			}else{
				$result['forbidden'] = 'N';
				// $result['user_id'] = $user_id; 
				// echo json_encode($result);
				// die;
				// $user_id = 」;//TODO:先寫死
				$can_vote = $this->events_model->user_can_action($user_id,$item_id,$action_code);
				if ($can_vote) {
					$sucesss = $this->events_model->insert($user_id,$action_code,$item_id);
					$result['exists'] = $sucesss?'N':'Y'; 
					$result['limit_of_vote'] = 'N'; 
				}else{
					$result['limit_of_vote'] = 'Y'; 
					$result['exists'] = 'Y';
				}
			}
			
			
			$result['status'] = 1; 
			echo json_encode($result);
		}
		else
		{
			// redirect(site_url(), 'refresh');
			$result['status'] = -1;
			$result['msg'] = "發生錯誤,請再試一次";
			echo json_encode($result);
		}

		die();
	}
	 
}