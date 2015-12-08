<?php
class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define('FUELIFY', FALSE);
		$this->load->library('set_meta');
		$this->load->library('comm');
		$this->load->model('code_model');
	}

	function user() 
	{
		parent::Controller();

	}

	function index()
	{	 
		$this->url_checker();
		$this->set_meta->set_meta_data();
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$case_cate	= $this->about_case_model->get_case_cate_code();

		if(isset($case_cate))
		{
			foreach ($case_cate as $key => $row) 
			{
				$sub_cate_result = $this->about_case_model->get_case_sub_cate($row->code_id);

				$all_cate[$key]['parent_cate'] 		= $row;
				$all_cate[$key]['sub_cate_result']	= $sub_cate_result;
			}
		}
		$vars['views'] = 'home';
		$vars['all_cate']	= $all_cate;
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('home', $vars);
	} 

 	function logout()
    {
       // $this->fuel_auth->logout();
		$this->load->helper('cookie');
        delete_cookie("voting_account");
        redirect(site_url());
    }

    function do_login()
    {
    	$this->load->helper('cookie');
        $this->set_meta->set_meta_data(); 
        
        $account = $this->input->post("login_mail");
        $password = $this->input->post("login_password");
        $target_url = $this->input->cookie("ytalent_target_url");

        $is_logined = $this->code_model->is_account_logged_in($account);
       
        if($is_logined)
        {
            redirect(site_url()."user/editinfo");
        }
        else
        {
            $login_result = $this->code_model->do_logged_in($account,$password);   
            
            if($login_result){
				$this->input->set_cookie("voting_account",$account, 3600);

				if(isset($target_url) && $target_url != ""){
					$this->comm->plu_redirect($target_url, 0, "登入成功");
				}else{
					if($this->code_model->is_mobile()){
						$this->comm->plu_redirect(site_url()."user/mybox", 0, "登入成功");
					}else{
						$this->comm->plu_redirect(site_url()."user/mynews", 0, "登入成功");
					}
					//$this->comm->plu_redirect(site_url()."user/mynews", 0, "登入成功");
				}

            	
            }else{

            	$this->comm->plu_redirect(site_url(), 0, "登入失敗");
            }
			
			    
        }
    }


      public function do_fb_regi(){
    	$this->load->helper('cookie');
		$this->load->model('code_model');

		$data = $this->code_model->get_fb_data();

		//print_r($data);
		//die();
		$target_url = $this->input->cookie("voting_target_url");


		if(isset($data['user_profile'])){

			$this->input->set_cookie("ytalent_account","", time()-3600);
			$mail = $data['user_profile']['id'];
			$password = $data['user_profile']['id'];
			$name = "";
			$fb_email = "";
			if(isset($data['user_profile']['name'])){
				$name = $data['user_profile']['name'];
			}
			if(isset($data['user_profile']['email'])){
				$fb_email = $data['user_profile']['email'];
			}



			$result = $this->code_model->do_register_resume($mail,$password,$name,$fb_email,$data['user_profile']['id']);
			$this->input->set_cookie("voting_account",$mail, time()+3600);
			$this->input->set_cookie("voting_fb_logout_url",$data['logout_url'], time()+3600);
			if(isset($target_url) && $target_url != ""){
				$this->comm->plu_redirect($target_url, 0, "FACEBOOK登入成功");
			}else{
				if($this->code_model->is_mobile()){
					$this->comm->plu_redirect(site_url()."user/mybox", 0, "FACEBOOK登入成功");
				}else{
					$this->comm->plu_redirect(site_url()."user/mynews", 0, "FACEBOOK登入成功");
				}
			}

		}else{
			$this->comm->plu_redirect(site_url(), 0, "FACEBOOK登入失敗");
		}
	}

	function reset_password(){
		$account = $this->input->get_post("account");

		$result = $this->code_model->reset_password($account);

		echo json_encode($result);



	}
	
}