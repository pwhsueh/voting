<?php
class Evetns extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('core_model');  
		$this->load->model('events_model');  
		$this->load->model('code_model');  
		$this->load->library('comm');		
		$this->load->helper('ajax');
		$this->load->library('email');
	} 

	function index()
	{	
		// $lang_code = $this->uri->segment(1);
		$type = $this->input->get_post("type");
		// echo $type;
		if (isset($type) && !empty($type)) {
			if ($type == 'charge') {
				$vars['charge_train'] = $this->train_model->get_list(0);
			}else if ($type == 'free') {
				$vars['free_train'] = $this->train_model->get_list(1);
			}			 
		}else{
			$vars['free_train'] = $this->train_model->get_list(1);
			$vars['charge_train'] = $this->train_model->get_list(0);
		}	
		$vars['his_train'] = $this->train_model->get_his_list();	

		//print_r($vars['free_train']);
		//die();
		$vars['views'] = 'iso_train';
		$vars['type'] = $type;
		$seo_data = $this->code_model->get_seo_default();
		$vars['title'] = "ISO教育訓練-".$seo_data["title"]."-領導力企管";
		$vars['keyword'] = $seo_data["keyword"];
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train');
		$this->fuel->pages->render("iso_train", $vars);
	}

	function photo()
	{	
		echo 'hi';
		die;
		// $lang_code = $this->uri->segment(1);

		// $event = $this->events_model->get_event_by_id($event_id);
 

		// $vars['event'] = $event;

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

	function register()
	{	
		// $lang_code = $this->uri->segment(1);
		$train_id = $this->input->get_post("train_id");
		$train = $this->train_model->get_train_by_id($train_id);

		if (!isset($train)) {
			$this->comm->plu_redirect(site_url(), 0, "找不到資料");
			die;
		}

		$train_statues ='';

		if ($train->reg_count >= $train->qualify + $train->waiting_list) {
			$train_statues = '報名額滿';
		}

		if ($train_statues <> '') {
			$this->comm->plu_redirect(site_url(), 0, $train_statues);
			die;
		}
		// $train = $this->train_model->get_train_by_id($id);

		// if (!isset($train)) {
		// 	$this->comm->plu_redirect(site_url(), 0, "找不到課程資料");
		// 	die;
		// }
		// $vars['train'] = $train;
		// $vars['all_train'] = $this->train_model->get_list(-1);
		$vars['train'] = $train;
		$vars['register_url'] = base_url()."train/do_register";
		$vars['views'] = 'iso_train_register';
		$seo_data = $this->code_model->get_seo_default();
		$vars['title'] = "線上報名".$seo_data["title"];
		$vars['keyword'] = $seo_data["keyword"];
		$vars['base_url'] = base_url();
		$page_init = array('location' => 'iso_train_register');
		$this->fuel->pages->render("iso_train_register", $vars);
	}

	function do_register()
	{
		if(is_ajax())
		// if(true)
		{ 
			// $train_id 				= $this->input->get_post("train_id");
			// $company_name 			= $this->input->get_post("company_name");
			// $dep 			        = $this->input->get_post("dep");
			// $name 					= $this->input->get_post("name");
			// $sex 				    = $this->input->get_post("sex");
			// $mail 			        = $this->input->get_post("mail");
			// $phone 			        = $this->input->get_post("phone");
			// $price 			        = $this->input->get_post("price");
			// $datepicker 			= $this->input->get_post("datepicker");
			// $invoice 			    = $this->input->get_post("invoice");
			// $invoice_title 			= $this->input->get_post("invoice_title");
			// $Uniform	            = $this->input->get_post("Uniform");
			// $lunch_box           	= $this->input->get_post("lunch_box");
			// $agree               	= $this->input->get_post("agree");
			// $register_msg           = $this->input->get_post("register_msg");
			$post_arr = $this->input->post();
		    $this->train_model->insert_mod_register($post_arr);

		    $company_name = $post_arr['company_name'];
		    $dep = $post_arr['dep'];
		    $name = $post_arr['name'];
		    $sex = $post_arr['sex'];
		    if ($sex == '1') {
	 			$sex = '先生';
	 		}else{
	 			$sex = '小姐';
	 		}
		    $mail = $post_arr['mail'];
	        $name2 = $post_arr['name2'];
		    $sex2 = $post_arr['sex2'];
		    if ($sex2 == '1') {
	 			$sex2 = '先生';
	 		}else{
	 			$sex2 = '小姐';
	 		}
		    $mail2 = $post_arr['mail2'];
		    $phone = $post_arr['phone'];
		    $phone2 = $post_arr['phone2'];
		    $train_id = $post_arr['train_id'];
		    $price = $post_arr['price'];
		    $place = $post_arr['place'];
		    $datepicker = $post_arr['datepicker'];
		    $invoice = $post_arr['invoice'];
		    if ($invoice == '1') {
	 			$invoice = '二聯式';
	 		}else{
	 			$invoice = '三聯式';
	 		}
		    $invoice_title = $post_arr['invoice_title'];
		    $Uniform = $post_arr['Uniform'];
		    $lunch_box = $post_arr['lunch_box'];
		    if ($lunch_box == '1') {
	 			$lunch_box = '一般';
	 		}else{
	 			$lunch_box = '素食';
	 		}
		    $agree = $post_arr['agree'];
		    $register_msg = $post_arr['register_msg'];
		    $train = $this->train_model->get_train_by_id($train_id);

		    $content = '';

		    $train_statues = '';

			if ($train->reg_count >= $train->qualify + $train->waiting_list) {
				$train_statues = '報名額滿';
			}else if ($train->reg_count >= $train->qualify) {
				$train_statues = '後補登記';
			}else{
				$train_statues = '線上報名';
			}

			if ($train_statues == '後補登記') {
	    		$content = '我們已經收到您的候補登記。將於開課前 5 個工作天，以 E-mail通知您是否取得候補席次。';
	    	}else{
	    		if ($train->is_free) {		    	 
		    		$content = '我們已經收到您的線上報名，並將於研討會前7個工作天，E-mail上課通知。';		    	    	
			    }else{
			    	$content = '我們已經收到您的線上報名，本課程並將於開課前7個工作天，E-mail通知是否開課成功。待您收到開課成功訊息，再進行繳費作業，謝謝。';
			    }
	    	}


		   

		    // $subject = "$company_name-$name-$train->train_title-$train->train_date"; //信件標題 
		    $subject = "$company_name-$name-$train->train_title-$place"; //信件標題 
		    $url = site_url();
			$image_url = $url.'assets/templates/images/mail/logo.png';
		    $msg = "
								
				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<meta name='viewport' content='width=device-width; initial-scale=1.0' /> <!-- 於手機觀看時不會自動放大 -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <!-- 最佳的IE兼容模式 -->
				</head>
				<body style='margin: 0px auto;text-align:center;background-color:#f1f1f1;'>
				<div style='margin: 0px auto;text-align:left;width:600px;background-color:#f1f1f1;'>
				    <div style='padding:30px 0 10px 0;'>
				        <img src='$image_url'>
				        <div style='font-size:12px;display:inline-block;float:right;line-height:50px;padding-right:5px;'><a href='http://a-wei.lionfree.net/leadership/index.php' style='color:black;text-decoration: none;'>回領導力官網</a></div>
				    </div>
				    <div style='background-color:#fff;padding:20px 50px 20px 50px;'>
				        <!--<div style='margin: 0px auto;text-align:center;'><img src='http://a-wei.lionfree.net/leadership/images/mail/head.jpg'></div>-->
				        <div style='font-size:14px;line-height:26px;'>你好：<br>$content</div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>公司名稱：</div><div style='font-size:14px;display:inline-block;'>$company_name</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>部門單位：</div><div style='font-size:14px;display:inline-block;'>$dep</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>姓名：</div><div style='font-size:14px;display:inline-block;'>$name $sex</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>電子信箱：</div><div style='font-size:14px;display:inline-block;'>$mail</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>連絡電話：</div><div style='font-size:14px;display:inline-block;'>$phone</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>餐盒選擇：</div><div style='font-size:14px;display:inline-block;'>$lunch_box</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>發票開立：</div><div style='font-size:14px;display:inline-block;'>$invoice</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>發票抬頭：</div><div style='font-size:14px;display:inline-block;'>$invoice_title</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>統一編號：</div><div style='font-size:14px;display:inline-block;'>$Uniform</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>課程名稱：</div><div style='font-size:14px;display:inline-block;'>$train->train_title</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>課程費用：</div><div style='font-size:14px;display:inline-block;'>$train->train_price</div>
				        </div>
				        
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>上課天數：</div><div style='font-size:14px;display:inline-block;'>$train->train_days </div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>上課時數：</div><div style='font-size:14px;display:inline-block;'>$train->train_hours </div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>上課時間：</div><div style='font-size:14px;display:inline-block;'>$train->train_time_s~$train->train_time_e</div>
				        </div>
				       
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>留言內容：</div><div style='font-size:14px;display:inline-block;'>$register_msg</div>
				        </div>
				    </div>
				    <div style='background-color:#fafafa;padding:20px 0 20px 50px;border-top:solid 2px #f1f1f1;'>
				        <div style='font-size:14px;margin-bottom:10px;'>若你還有其它問題，歡迎來信或來電洽詢。</div>
				        <div style='font-size:14px;margin-bottom:10px;'>全省免費諮詢電話 0800-222-007</div>
				        <div style='font-size:14px;margin-bottom:10px;'>E-Mail：Service@isoleader.com.tw</div>
				        <div style='margin-top:30px;font-size:14px;'>領導力企管客服部 敬上</div>
				    </div>
				</div>
				</body>
				</html>


			";

			$msg2 = $msg;

			if (isset($mail2) && !empty($mail2) ) {
				$msg2 = "
								
				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<meta name='viewport' content='width=device-width; initial-scale=1.0' /> <!-- 於手機觀看時不會自動放大 -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <!-- 最佳的IE兼容模式 -->
				</head>
				<body style='margin: 0px auto;text-align:center;background-color:#f1f1f1;'>
				<div style='margin: 0px auto;text-align:left;width:600px;background-color:#f1f1f1;'>
				    <div style='padding:30px 0 10px 0;'>
				        <img src='$image_url'>
				        <div style='font-size:12px;display:inline-block;float:right;line-height:50px;padding-right:5px;'><a href='http://a-wei.lionfree.net/leadership/index.php' style='color:black;text-decoration: none;'>回領導力官網</a></div>
				    </div>
				    <div style='background-color:#fff;padding:20px 50px 20px 50px;'>
				        <!--<div style='margin: 0px auto;text-align:center;'><img src='http://a-wei.lionfree.net/leadership/images/mail/head.jpg'></div>-->
				        <div style='font-size:14px;line-height:26px;'>你好：<br>$content</div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>公司名稱：</div><div style='font-size:14px;display:inline-block;'>$company_name</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>部門單位：</div><div style='font-size:14px;display:inline-block;'>$dep</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>姓名：</div><div style='font-size:14px;display:inline-block;'>$name $sex</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>電子信箱：</div><div style='font-size:14px;display:inline-block;'>$mail</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>連絡電話：</div><div style='font-size:14px;display:inline-block;'>$phone</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>第2位姓名：</div><div style='font-size:14px;display:inline-block;'>$name2 $sex2</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>第2位電子信箱：</div><div style='font-size:14px;display:inline-block;'>$mail2</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>第2位連絡電話：</div><div style='font-size:14px;display:inline-block;'>$phone2</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>餐盒選擇：</div><div style='font-size:14px;display:inline-block;'>$lunch_box</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>發票開立：</div><div style='font-size:14px;display:inline-block;'>$invoice</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>發票抬頭：</div><div style='font-size:14px;display:inline-block;'>$invoice_title</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>統一編號：</div><div style='font-size:14px;display:inline-block;'>$Uniform</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>課程名稱：</div><div style='font-size:14px;display:inline-block;'>$train->train_title</div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>課程費用：</div><div style='font-size:14px;display:inline-block;'>$train->train_price</div>
				        </div>
				       
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>上課天數：</div><div style='font-size:14px;display:inline-block;'>$train->train_days </div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>上課時數：</div><div style='font-size:14px;display:inline-block;'>$train->train_hours </div>
				        </div>
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>上課時間：</div><div style='font-size:14px;display:inline-block;'>$train->train_time_s~$train->train_time_e</div>
				        </div>
				        
				        <div style='line-height:26px;'>
				            <div style='vertical-align:top;font-size:14px;margin-right:5px;display:inline-block;'>留言內容：</div><div style='font-size:14px;display:inline-block;'>$register_msg</div>
				        </div>
				    </div>
				    <div style='background-color:#fafafa;padding:20px 0 20px 50px;border-top:solid 2px #f1f1f1;'>
				        <div style='font-size:14px;margin-bottom:10px;'>若你還有其它問題，歡迎來信或來電洽詢。</div>
				        <div style='font-size:14px;margin-bottom:10px;'>全省免費諮詢電話 0800-222-007</div>
				        <div style='font-size:14px;margin-bottom:10px;'>E-Mail：Service@isoleader.com.tw</div>
				        <div style='margin-top:30px;font-size:14px;'>領導力企管客服部 敬上</div>
				    </div>
				</div>
				</body>
				</html>


			";
			}

			


			$managers = $this->code_model->get_code("ISO_EMAIL_GROUP","zh-TW");

			if (isset($managers)) {
				foreach ($managers as $row) {
					$m_email = $row->code_value1; 
					$this->email->from('service@isoleader.com.tw', 'Leadership');
					$this->email->to($m_email); 
					$this->email->subject($subject);
					// $this->email->message(fuel_block('contact_content'));
					$this->email->message($msg2); 
					$success = $this->email->send();
					
				}
			}

			$this->email->from('service@isoleader.com.tw', 'Leadership');
			$this->email->to($mail); 
			$this->email->subject($subject); 
			$this->email->message($msg2);
			$success = $this->email->send();

			if (isset($mail2) && !empty($mail2) ) {
				$this->email->from('service@isoleader.com.tw', 'Leadership');
				$this->email->to($mail2); 
				$this->email->subject($subject); 
				$this->email->message($msg2);
				$success = $this->email->send();
			}

			$result['status'] = 1; 
			echo json_encode($result);
		}
		else
		{
			// redirect(site_url(), 'refresh');
			$result['status'] = -1;
			$result['msg'] = "報名發生錯誤,請再試一次";
			echo json_encode($result);
		}

		die();
	}
	 
	
}