<?php
class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		define('FUELIFY', FALSE); 
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
		fuel_set_var('page_id', "1");
		$all_cate = array();

		$case_cate	= '';

		 
		$vars['views'] = 'home';
		$vars['all_cate']	= $all_cate;
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'home');
		$this->fuel->pages->render('home', $vars);
	} 

	function register()
	{	   
		$vars['do_register_url'] = site_url()."doRegister";
		$vars['views'] = 'register'; 
		$page_init = array('location' => 'register');
		$this->fuel->pages->render('register', $vars);
	} 

	function do_register()
	{	   
		$post_arr = $this->input->post();
		// print_r($post_arr);
		// die;
		$post_arr['birthday'] = $post_arr['year'].'/'.$post_arr['month'].'/'.$post_arr['day'];
		$member = $this->code_model->get_mod_members($post_arr['email']);
		if ($member) {
			$this->comm->plu_redirect(site_url()."register", 0, "帳號已存在");
		}else{
			$member = $this->code_model->insert_mod_members($post_arr);
			$this->comm->plu_redirect(site_url(), 0, "註冊成功");
		}
	} 

 	function logout()
    {
       // $this->fuel_auth->logout();
		$this->load->helper('cookie');
        delete_cookie("voting_account");
        $target_url = $this->input->cookie("voting_target_url");
        if(isset($target_url) && $target_url != ""){
			$this->comm->plu_redirect($target_url, 0, "登出成功");
		}else{
			// $this->comm->plu_redirect(site_url(), 0, "登入成功");
        	redirect(site_url());
			//$this->comm->plu_redirect(site_url()."user/mynews", 0, "登入成功");
		}
    }

    function login()
	{	   
		$vars['do_login_url'] = site_url()."doLogin";
		$vars['views'] = 'login'; 
		$fb_data	= $this->code_model->get_fb_data();
		$vars['fb_data'] = $fb_data;
		$page_init = array('location' => 'login');
		$this->fuel->pages->render('login', $vars);
	} 

    function do_login()
    {
    	$this->load->helper('cookie'); 
        
        $account = $this->input->post("login_mail");
        $password = $this->input->post("login_password");
        $target_url = $this->input->cookie("voting_target_url");

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
					$this->comm->plu_redirect(site_url(), 0, "登入成功");
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

			$this->input->set_cookie("voting_account","", time()-3600);
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
			//insert fb data
			$insert_data['email'] = $mail;
            $insert_data['birthday'] = isset($data['user_profile']['birthday'])?$data['user_profile']['birthday']:"2000/01/01";
            $insert_data['password'] = $password;
            $insert_data['sex'] = $data['user_profile']['gender'];
            $insert_data['phone'] = "";
            $insert_data['area_code'] = "1";

			//$result = $this->code_model->do_register_resume($mail,$password,$name,$fb_email,$data['user_profile']['id']);
			if( !$this->code_model->do_logged_in($mail,$password) ){
				$result = $this->code_model->insert_mod_members($insert_data);
			}
			
			$this->input->set_cookie("voting_account",$mail, time()+3600);
			$this->input->set_cookie("voting_fb_logout_url",$data['logout_url'], time()+3600);
			if(isset($target_url) && $target_url != ""){
				$this->comm->plu_redirect($target_url, 0, "FACEBOOK登入成功");
			}else{
				$this->comm->plu_redirect(site_url()."", 0, "FACEBOOK登入成功");
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