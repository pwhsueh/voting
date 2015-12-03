<?php
class Events_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_event_by_id($event_id){
        // -99 : 隱藏
        // -98：變成歷史課程 , 出現在front-end iso 教育訓練網 list最下方
        $sql = @"select * from mod_events where id = $event_id";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    public function get_event_items_by_id($event_id){
        // -99 : 隱藏
        // -98：變成歷史課程 , 出現在front-end iso 教育訓練網 list最下方
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

    public function insert($user_id,$action_code,$item_id){
        $sql = @" INSERT INTO mod_register (item_id,action,user_id) VALUES (?,?,?) ";
        $para = array(
                $item_id,
                $action_code, 
                $user_id
            );
        $success = $this->db->query($sql, $para); 
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->row();

            return $result;
        }
    }

    public function insert_mod_register($insert_data){
        $sql = @"INSERT INTO mod_register (
                                            company_name, 
                                            dep_name,
                                            customer_name, 
                                            sex,   
                                            email,
                                            contact_tel,
                                            customer_name2, 
                                            sex2,   
                                            email2,
                                            contact_tel2,
                                            train_id,
                                            train_price,
                                            train_place,
                                            train_date,
                                            invoice_type,
                                            invoice_title,
                                            company_serialno,
                                            is_vegetarian,
                                            is_agree,
                                            register_msg,
                                            modi_date

                                        ) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())"; 

        $para = array(
                $insert_data['company_name'], 
                $insert_data['dep'],
                $insert_data['name'],
                $insert_data['sex'],  
                $insert_data['mail'],
                $insert_data['phone'],
                $insert_data['name2'],
                $insert_data['sex2'],  
                $insert_data['mail2'],
                $insert_data['phone2'],
                $insert_data['train_id'],
                $insert_data['price'],
                $insert_data['place'],
                $insert_data['datepicker'],
                $insert_data['invoice'],
                $insert_data['invoice_title'],
                $insert_data['Uniform'],
                $insert_data['lunch_box'],
                $insert_data['agree'],
                $insert_data['register_msg']
            );
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }
 

}