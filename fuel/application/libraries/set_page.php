<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Set_page {

    public function set_config($target_url, $total_rows, $page_num, $per_page)
    {
		$config = array();

		if (count($_GET) > 0) 
		{
			$config['suffix'] = '?' . http_build_query($_GET, '', "&");
		}
		else
		{
			$config['suffix'] = "";
		}	
		$config['base_url'] = $target_url;
		$config['total_rows'] = $total_rows;
		
		$config['per_page'] = $per_page;
		$config['first_link'] = "&laquo;";
		$config['first_url']	= $target_url."1".$config['suffix'];
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_page'] = $page_num;

		return $config;
    }

}