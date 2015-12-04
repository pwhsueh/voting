<?php
class Events_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_event_by_id($event_id){
        $sql = @"select * from mod_events where id = $event_id";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->row();

            return $result;
        }
    } 

    public function get_event_items_by_id($event_id){
        $sql = @"select * 
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='L') AS 'like'
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='V') AS 'vote'
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='S') AS 'share'
                from mod_event_items a where event_id = $event_id";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function get_random_event_items_by_id($event_id,$count=10){
        $sql = @"SELECT * FROM voting.mod_event_items where event_id =? ORDER BY RAND() LIMIT $count";
        $para = array(
                    $event_id
                );
        $query = $this->db->query($sql,$para);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function insert($user_id,$action_code,$item_id){
        $exits = $this->get_action($user_id,$action_code,$item_id);
        if (!$exits) {
            $sql = @" INSERT INTO mod_items_actions (item_id,action,user_id,modify_date) VALUES (?,?,?,NOW()) ";
            $para = array(
                    $item_id,
                    $action_code, 
                    $user_id
                );
            $success = $this->db->query($sql, $para); 
            if($success)
            {
                return true;
            } 
        }
        return false;
    }

     public function get_action($user_id,$action_code,$item_id){
        $sql = @"select * from mod_items_actions where user_id = ? AND action = ? AND item_id = ?";
        $para = array(
                $user_id,
                $action_code, 
                $item_id
            );
        $query = $this->db->query($sql,$para);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        { 
            return true;
        }else{
            return false;
        }
    } 

}