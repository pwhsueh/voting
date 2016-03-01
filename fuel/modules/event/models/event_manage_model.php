<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_manage_model extends MY_Model {
	
	function __construct()
	{
		$CI =& get_instance();
		$CI->config->module_load(EVENT_FOLDER, EVENT_FOLDER);
		$tables = $CI->config->item('tables');
		parent::__construct($tables['mod_events']); // table name
	}

	public function get_total_rows($filter="")
	{
		$sql = @"SELECT COUNT(*) AS total_rows FROM mod_events $filter ";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->total_rows;
		}

		return 0;
	}

	public function get_event_list($dataStart, $dataLen, $filter)
	{
		$sql = @"SELECT *  FROM mod_events $filter ORDER BY modify_date desc LIMIT $dataStart, $dataLen";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_report_by_event($event_id,$action='V'){
		
		$sql = @"SELECT (select title from mod_event_items where mod_event_items.id = mod_items_actions.item_id) item_name,
			    item_id,count(*) as count ,action FROM mod_items_actions
				where action = '$action' AND item_id in (select id from mod_event_items where event_id = '$event_id' )
				group by item_id , action";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function get_voiting_user_count_by_event($event_id,$action='V'){
		
		$sql = @"SELECT Count(Distinct user_id) As count FROM voting.mod_items_actions
				where action = '$action' AND item_id in (select id from mod_event_items where event_id = '$event_id')";
	
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$result = $query->row()->count;

			return $result;
		}

		return 0;
	}

	public function get_voiting_user_id_detail($event_id){
		
		$sql = @"SELECT user_id,max(modify_date) as last_voting ,
(SELECT COUNT(*) FROM mod_items_actions c WHERE c.user_id=a.user_id AND c.action = 'V' AND c.item_id IN (SELECT id FROM mod_event_items WHERE event_id = ?)) vote_count,
(SELECT COUNT(*) FROM mod_items_actions c WHERE c.user_id=a.user_id AND c.action = 'L' AND c.item_id IN (SELECT id FROM mod_event_items WHERE event_id = ?)) like_count,
(SELECT COUNT(*) FROM mod_items_actions c WHERE c.user_id=a.user_id AND c.action = 'S' AND c.item_id IN (SELECT id FROM mod_event_items WHERE event_id = ?)) share_count,
(SELECT COUNT(*) FROM mod_items_actions c WHERE c.user_id=a.user_id AND c.item_id IN (SELECT id FROM mod_event_items WHERE event_id = ?)) total_count
		FROM `mod_items_actions` a left join mod_event_items b on a.item_id = b.id where b.event_Id = ?
				group by a.user_id order by total_count DESC";

		$para = array(
				$event_id,
				$event_id,
				$event_id,
				$event_id,
				$event_id
			);		
	
		$query = $this->db->query($sql,$para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}
 
	public function insert($data)
	{
		$sort_order = $this->get_max_sort();
		$sql = @"INSERT INTO mod_events (
				`type`, 
				`title`, 
				`max_item`, 
				`start_date`, 
				`deadline`, 
				`can_vote`, 
				`can_like`,
				`can_share`,
				`show_frontend`, 
				`allow_email`,
				`allow_fb`,
				`photo`,
				 spilt_file,  
				`sort_order`,
				`create_by`,
				`modify_date` )
				VALUES (?,?, ?,?, ?, ?, ?,?,?,?, ?,?, ? ,?,?, NOW())
				";
		$para = array(
				$data['type'],
				$data['title'],
				$data['max_item'],
				$data['start_date'],
				$data['deadline'],
				$data['can_vote'],
				$data['can_like'],
				$data['can_share'],
				$data['show_frontend'],
				$data['allow_email'],
				$data['allow_fb'],
				$data['photo'],
				$data['spilt_file'],
				$sort_order,
				$data['create_by']
			);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return $this->db->query("SELECT LAST_INSERT_ID() AS ID")->row()->ID;
		}

		return;
	}

	public function modify($data, $id)
	{
		$sql = @"UPDATE mod_events SET title=?, 
									  max_item=?, 
									  start_date=?, 
									  deadline=?, 
									  can_vote=?, 
									  can_like=?, 
									  can_share=?, 
									  show_frontend=?,
									  allow_email=?, 
									  allow_fb=?,
									  sort_order=?, 
									  photo=?,  
									  spilt_file=?,  
									  modify_date=NOW() 
									  WHERE id=?";
		$para = array(
				$data['title'],
				$data['max_item'],
				$data['start_date'],
				$data['deadline'],
				$data['can_vote'],
				$data['can_like'],
				$data['can_share'],
				$data['show_frontend'],
				$data['allow_email'],
				$data['allow_fb'],
				$data['sort_order'],
				$data['photo'],
				$data['spilt_file'],
				$id
			);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	} 

	public function get_event_detail($id)
	{
		$sql = @"SELECT * FROM mod_events WHERE id=? ";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$result = $query->row();

			return $result;
		}

		return;
	}

	public function get_event_item_list($event_id)
	{
		$sql = @"SELECT *  FROM mod_event_items WHERE event_id=? ORDER BY sort_order";
		$para = array(
				$event_id
		);
		$query = $this->db->query($sql,$para);

		if($query->num_rows() > 0)
		{
			$result = $query->result();

			return $result;
		}

		return;
	}

	public function insert_item($id,$event_id,$sort_order,$title,$sub_title,$photo_path,$sphoto_path,$placeholder)
	{ 
		$sql = @"INSERT INTO mod_event_items (
				`id`,
				`event_id`, 
				`sort_order`, 
				`title`, 
				`sub_title`, 
				`photo_path`,
				`sphoto_path`,
				`placeholder`)
				VALUES (?,?,?, ?, ?, ?,?,?)
				";
		$para = array(
				$id,
				$event_id,
				$sort_order,
				$title,
				$sub_title,
				$photo_path,
				$sphoto_path,
				$placeholder
		);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return $this->db->query("SELECT LAST_INSERT_ID() AS ID")->row()->ID;
		}

		return;
	}

	public function del_items($event_id)
	{
		$sql = "DELETE FROM mod_event_items WHERE event_id=?";
		$para = array($event_id);
		$success= $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function del($id)
	{
		$sql = "DELETE FROM mod_events WHERE id=?";
		$para = array($id);
		$success= $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function multi_del($ids)
	{
		$sql = "DELETE FROM mod_events WHERE id IN ($ids)";
		$success = $this->db->query($sql);

		if($success)
		{
			return true;
		}

		return;
	}

	public function multi_update_regi_type($regi_ids, $regi_type)
	{
		$sql = "UPDATE mod_register SET  regi_type = ? WHERE regi_id IN ($regi_ids)";
		$para = array($regi_type);

		$success = $this->db->query($sql, $para);

		if($success)
		{
			return true;
		}

		return;
	}

	public function get_regi_limit($id)
	{
		$sql = @"SELECT regi_limit_num FROM mod_train WHERE id=?";
		$para = array($id);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->regi_limit_num;
		}

		return 0;
	}

	public function get_max_sort()
	{
		$sql = @"SELECT IFNULL(MAX(sort_order),0) + 1 AS sort_order FROM mod_events "; 
		$query = $this->db->query($sql);

		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->sort_order;
		}

		return 1;
	}

	public function do_chk_limit($id)
	{
		$regi_limit = $this->get_regi_limit($id);
		$regi_num 	= $this->get_regi_num($id);

		if($regi_num < $regi_limit)
		{
			return true;
		}

		return false;
	}

	public function do_chk_regied($id, $account)
	{
		$sql = @"SELECT account FROM mod_register WHERE id=? AND account=?";
		$para = array($id, $account);
		$query = $this->db->query($sql, $para);

		if($query->num_rows() > 0)
		{
			return false;
		}

		return true;
	}
	
}
?>