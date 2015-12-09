<?php
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');	
		$this->load->helper('ajax');
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
		$lang_code = $this->uri->segment(1);
		//$vars['coach_item'] = $this->core_model->get_coach_item($this->core_model->get_cate_list("COACH_TYPE"));
		/*echo "<pre>";
		print_r($vars['coach_item']);
		echo "</pre>";
		die();*/

		$vars['banner'] = $this->code_model->get_banner();
		// $vars['news'] = $this->code_model->get_home_news();
		$vars['performance'] = $this->code_model->get_home_success();

		// $performance = $this->code_model->get_code_info("NEWS_TYPE","PERFORMANCE");
		// print_r($performance);
		// die;
		$vars['performance_name'] = '';//$performance[0]->code_name;

		$iso_news_type = $this->code_model->get_iso_news_type();
		$result = array();

		foreach ($iso_news_type as $key => $value) { 	
			if ($value->code_key == 'FREE_TRAIN') {
				$free_train = $this->train_model->get_list(1);
				if (is_array($free_train) && sizeof($free_train) > 0) {
					$value->detail = (object)array('title'=>$free_train[0]->train_title,'img'=>$free_train[0]->file_path,'url'=>site_url().'iso-training-courses?type=free');
				}else{
					$value->detail =  (object)array('title'=>'','img'=>'','url'=>site_url());
				}
				$result[$value->code_id] = $value;
			}else if ($value->code_key == 'CHARGE_TRAIN') {
				$free_train = $this->train_model->get_list(0);
				if (is_array($free_train) && sizeof($free_train) > 0) {
					$value->detail = (object)array('title'=>$free_train[0]->train_title,'img'=>$free_train[0]->file_path,'url'=>site_url().'iso-training-courses?type=charge');
				}else{
					$value->detail =  (object)array('title'=>'','img'=>'','url'=>site_url());
				}
				$result[$value->code_id] = $value;
			}else{
				$detail = $this->code_model->get_iso_news_items($value->code_id);				
				if (is_array($detail) && sizeof($detail) > 0) {
					$value->detail = (object)array('title'=>$detail[0]->title,'img'=>$detail[0]->img,'url'=>site_url().'home/iso_news?news_type='.$value->code_name);//$detail[0];
				}else{
					$value->detail = (object)array('title'=>'','img'=>'','url'=>site_url());
				}
				$result[$value->code_id] = $value;
			}			
		} 
		// print_r($result);
		// die;
		$seo_data = $this->code_model->get_seo_default();
		$vars['title'] = $seo_data["title"]."-領導力企管";
		$vars['keyword'] = $seo_data["keyword"];
		$vars['news'] = $result; 
		$vars['views'] = 'index';
		$vars['base_url'] = base_url();
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

	function photo($event_id)
	{	 
		// $lang_code = $this->uri->segment(1);

		$event = $this->events_model->get_event_by_id($event_id);
		$event_items = $this->events_model->get_event_items_by_id($event_id);
		$rand_event_items = $this->events_model->get_random_event_items_by_id($event_id);
 

		$vars['event'] = $event;
		$vars['event_items'] = $event_items; 
		$vars['rand_event_items'] = $rand_event_items; 
		$vars['do_action_url'] = base_url()."home/do_action";

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

	function do_action()//action_code:(L,S,V)
	{	 
	 	if(is_ajax())
		{ 
			$post_arr = $this->input->post();
	 		$item_id = $post_arr['item_id'];
	 		$action_code = $post_arr['action_code'];
	 		
			$user_id = $this->code_model->get_logged_in_account();
			// $user_id = 」;//TODO:先寫死
			$can_vote = $this->events_model->user_can_vote($user_id,$item_id);
			if ($can_vote) {
				$sucesss = $this->events_model->insert($user_id,$action_code,$item_id);
				$result['exists'] = $sucesss?'N':'Y'; 
				$result['limit_of_vote'] = 'N'; 
			}else{
				$result['limit_of_vote'] = 'Y'; 
				$result['exists'] = 'Y';
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