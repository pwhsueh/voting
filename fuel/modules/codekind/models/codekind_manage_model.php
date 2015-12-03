<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Codekind_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(CODEKIND_FOLDER, CODEKIND_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_codekind']); // table name
	}

	public function get_total_rows($filter="", $table_name="mod_codekind")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM ".$table_name." ".$filter;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_codekind_list($dataStart, $dataLen, $filter, $table_name='mod_codekind')
	{
		if($table_name == "mod_codekind")
		{
			$sql = @"SELECT * FROM ".$table_name." ".$filter." ORDER BY modi_time DESC LIMIT $dataStart, $dataLen";
		}
		else
		{
			$sql = @"SELECT * FROM ".$table_name." ".$filter." ORDER BY code_value3  ASC  LIMIT $dataStart, $dataLen";
		}
	// echo $sql;
	// return;
		$query = $this->db->query($sql);



		if($query->num_rows() > 0)
		{
			$new_arr = array();
			$new_result = array();
			$result = $query->result();

			if($table_name != "mod_codekind"){

				foreach ($result as $key => $value) {

					$new_result[$value->code_id] = $result[$key];
					
				}


				foreach ($result as $key => $value) {

					$value->code_key = !empty($value->code_key)?$value->code_key:"0";

					if($value->parent_id == -1){
						$new_arr[$value->code_id."_-1"] = $result[$key];
					}else{
						$ppid = "";
						if(isset($new_result[$value->parent_id]->parent_id) &&  $new_result[$value->parent_id]->parent_id != -1){
							$value->code_name = "--".$value->code_name;
							$ppid = $new_result[$value->parent_id]->parent_id."_".$value->parent_id."_";

						}else{
							$ppid = $value->parent_id."_";
						}

						$value->code_name = "--".$value->code_name;
						$new_arr[$ppid.$value->code_id."_".$value->parent_id."_".$value->code_key] = $result[$key];
					}
					
				}
				// ksort($new_arr);
			}else{
				$new_arr = $result;
			}
			



	/*	echo "<pre>";
		print_r($new_arr);
		echo "</pre>";	

		die();*/

			return $new_arr;
		}

		return;
	}

	public function set_order($id,$order)
	{
		$sql = @"UPDATE mod_code SET code_value3 = ?  WHERE code_id=? ";
		$para = array( 
			$order,
			$id
		);  
		$success = $this->db->query($sql, $para); 
		if($success)
		{
			return true;
		} 
		return; 
	} 



	public function get_code_detail_by_parent_id($parent_id)
	{
		$sql = @"SELECT * FROM mod_code WHERE parent_id=? ";
		$para = array($parent_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;

	}

	public function get_series_menu($codekind_key,$lang_code,$parent_id=-1){
        $sql = @"select * from mod_code where codekind_key = '$codekind_key' and parent_id = $parent_id and lang_code = '$lang_code' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

	public function get_code_list_for_other_mod($codekind_key,$single_node=true)
	{
		if($single_node){
			$sql = @"SELECT * FROM mod_code WHERE codekind_key=? AND parent_id=-1 ORDER BY parent_id,code_value1";
		}else{
			$sql = @"SELECT * FROM mod_code WHERE codekind_key=? ORDER BY parent_id,code_value1 ";
		}
		
		$para = array($codekind_key);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();
			$parent_arr = array();

			foreach ($result as $key => $value) {
			
				$parent_arr[$value->parent_id] = 1;

			}

			$result_new = $this->remove_parent($this->bind_node($result),$parent_arr);
			return $result_new;
		}
		return;

	}

	public function bind_node($result){
		$new_arr = array();
		$parent_arr = array();
		foreach ($result as $key => $value) {

				$new_arr[$value->code_id] = $value;
			
		}
		foreach ($new_arr as $key => $value) {

				if(isset($new_arr[$value->parent_id])){
					$new_arr[$key]->code_name = $new_arr[$value->parent_id]->code_name .">>". $new_arr[$key]->code_name;
				    $pid = $new_arr[$value->parent_id]->parent_id;	
					$new_arr[$key]->parent_id = $pid;
					$new_arr = $this->bind_node($new_arr);
				}
		}	
		return $new_arr;
	}

	public function remove_parent($new_arr,$result){
		foreach ($result as $key => $value) {
			if(isset($new_arr[$key])){
				unset($new_arr[$key]);
			}
		}
		return $new_arr;
	}

	public function get_codekind_list_for_other_mod()
	{
		$sql = @"SELECT * FROM mod_codekind ORDER BY code_value1,code_id";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;

	}

	public function get_codekind_detail($codekind_id)
	{
		$sql = @"SELECT * FROM mod_codekind WHERE codekind_id=?";
		$para = array($codekind_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	}

	public function get_code_detail($code_id)
	{
		$sql = @"SELECT * FROM mod_code WHERE code_id=?";
		$para = array($code_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;		
	}

	public function insert($insert_data)
	{
		$sql = @"INSERT INTO mod_codekind (
											codekind_name, 
											codekind_key, 
											codekind_desc, 
											codekind_value1, 
											codekind_value2,
											codekind_value3,
											modi_time,
											lang_code
										) 
				VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)";
		$para = array(
				$insert_data['codekind_name'],
				$insert_data['codekind_key'],
				$insert_data['codekind_desc'],
				$insert_data['codekind_value1'],
				$insert_data['codekind_value2'],
				$insert_data['codekind_value3'],
				$insert_data['lang_code']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function update($codekind_id, $update_data)
	{
		$sql = @"UPDATE mod_codekind SET codekind_name 	= ?,
										codekind_key 	= ?,
										codekind_desc 	= ?,
										codekind_value1 = ?,
										codekind_value2	= ?,
										codekind_value3	= ?,
										modi_time		= NOW(),
										lang_code		= ?
				WHERE codekind_id = ?";
		$para = array(
				$update_data['codekind_name'],
				$update_data['codekind_key'],
				$update_data['codekind_desc'],
				$update_data['codekind_value1'],
				$update_data['codekind_value2'],
				$update_data['codekind_value3'],
				$update_data['lang_code'],
				$codekind_id
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function code_insert($insert_data)
	{
		$sql = @"INSERT INTO mod_code (
											codekind_key,
											code_name, 
											code_key,
											code_value1, 
											code_value2,
											code_value3,
											parent_id,
											modi_time,
											lang_code,
											img
										) 
				VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?,?)";
		$para = array(
				$insert_data['codekind_key'],
				$insert_data['code_name'],
				$insert_data['code_key'],
				$insert_data['code_value1'],
				$insert_data['code_value2'],
				$insert_data['code_value3'],
				$insert_data['parent_id'],
				$insert_data['lang_code'],
				$insert_data['img']
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function code_update($code_id, $update_data)
	{
		$sql = @"UPDATE mod_code SET 	codekind_key 	= ?,
										code_name 		= ?,
										code_key 		= ?,
										code_value1 	= ?,
										code_value2		= ?,
										code_value3		= ?,
										parent_id	 	= ?,
										modi_time		= NOW(),
										lang_code		= ?,
										img             = ?
				WHERE code_id = ?";
		$para = array(
				$update_data['codekind_key'],
				$update_data['code_name'],
				$update_data['code_key'],
				$update_data['code_value1'],
				$update_data['code_value2'],
				$update_data['code_value3'],
				$update_data['parent_id'],
				$update_data['lang_code'],
				$update_data['img'],
				$code_id
			);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function code_del($code_id)
	{
		$sql = @"DELETE FROM mod_code WHERE code_id = ?";
		$para = array($code_id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function del($codekind_id)
	{
		$sql = @"DELETE FROM mod_codekind WHERE codekind_id = ?";
		$para = array($codekind_id);
		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function get_codekind_name($codekind_key)
	{
		$sql = @"SELECT codekind_name FROM mod_codekind WHERE codekind_key=?";
		$para = array($codekind_key);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return isset($row->codekind_name)?$row->codekind_name:"";
		}

		return;
	}

	public function get_code_name($code_id)
	{
		$sql = @"SELECT code_name FROM mod_code WHERE code_id=?";
		$para = array($code_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return isset($row->code_name)?$row->code_name:"";
		}

		return;		
	}

	public function get_code_key($code_id)
	{
		$this->db->select('code_key');
		$query = $this->db->get_where('mod_code', array('code_id' => $code_id));

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->code_key;
		}

		return;
	}

	public function get_code_child_key_num($code_id)
	{
		$sql = @"SELECT COUNT(*) AS cnt FROM mod_code WHERE parent_id=?";
		$para = array($code_id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			$num = (int)$row->cnt + 1;
			$tmp = str_pad($num,4,'0',STR_PAD_LEFT);

			return $tmp;
		}

		return;
	}
	
}