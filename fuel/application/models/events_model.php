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

    public function get_event_items($event_id,$keyword,$sort='default'){
        $sql = @"select * 
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='L') AS 'like'
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='V') AS 'vote'
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='S') AS 'share'
                from mod_event_items a where event_id = $event_id ";

        if ($keyword != '') {
            $sql .= " AND (title like '%$keyword%' OR sub_title like '%$keyword%' )";
        }

        if ($sort == 'like') {
            $sql .= " ORDER BY (SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='L') DESC ";
        }else if ($sort == 'share') {
            $sql .= " ORDER BY (SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='V') DESC";
        }else if ($sort == 'share') {
            $sql .= " ORDER BY (SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='S') DESC";
        }else{
            $sql .= " ORDER BY a.sort_order ";
        } 

        

        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function get_event_item($item_id){
        $sql = @"select * 
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='L') AS 'like'
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='V') AS 'vote'
                ,(SELECT COUNT(b.action) FROM mod_items_actions b where b.item_id = a.id and b.action='S') AS 'share'
                from mod_event_items a where id = $item_id";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->row();

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

    public function user_can_vote($user_id,$item_id){
        $sql = @"select IFNULL(c.max_item,0) as max_item ,count(c.id) as now_vote from mod_items_actions a 
                left join mod_event_items b on a.item_id = b.id  
                left join mod_events c on b.event_id = c.id
                where a.user_id = ? and a.action = 'V' and b.id = ?
                group by a.user_id,c.id ";
        $para = array(
                $user_id,
                $item_id
            );
        $query = $this->db->query($sql,$para);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        { 
            return $query->row()->max_item >= $query->row()->now_vote;
        }else{
            return true;
        }
    } 

    public function get_event_max_item($item_id){
        $sql = @"select b.max_item from mod_event_items a left join mod_events b on a.event_id = b.id  
                 where a.id = ? ";
        $para = array(
                $item_id
            );
        $query = $this->db->query($sql,$para);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        { 
            return $query->row()->max_item;
        }else{
            return 0;
        }
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