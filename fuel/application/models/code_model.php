<?php
class Code_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_code($codekind_key,$lang_code,$parent_id=-1,$filter=""){
        $sql = @"select * from mod_code where codekind_key = '$codekind_key' 
        and parent_id = $parent_id and lang_code = '$lang_code' $filter order by code_value3, code_value1 , code_id";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_seo_default(){
        $var["title"] = "國內ISO輔導資源最充足的顧問公司，協助您取得各項ISO認證，所有ISO認證問題找領導力企管就對了";
        $var["keyword"] = "ISO 9001,ISO 27001";

        return $var;
    } 

    public function get_series_info($code_id){
        $sql = @"select * from mod_code where code_id = '$code_id'  ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_series_sub_detail($parent_id){
        $sql = @"select * from mod_code where parent_id  = '$parent_id' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_code_info($codekind_key,$code_key){
        $sql = @"select * from mod_code where codekind_key='$codekind_key' and code_key='$code_key' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    } 

    function is_account_logged_in($account){
        //$this->load->helper('cookie');
        $cookie = $this->input->cookie("voting_account",TRUE);

        //print_r($cookie);
      // print_r($this->input->cookie());
       // die();
        if(isset($cookie) && !empty($cookie) && $cookie == $account){
            return true;
        }else{
            delete_cookie("voting_account");
            return false;
        }
    }

    function get_logged_in_account(){
        //$this->load->helper('cookie');
        $cookie = $this->input->cookie("voting_account",TRUE);

        //print_r($cookie);
      // print_r($this->input->cookie());
       // die();
        if(isset($cookie) && !empty($cookie)){
            return $cookie;
        }else{
            //delete_cookie("ytalent_account");
            return null;
        }
    }

    public function get_mod_members($email){
        $sql = @"SELECT * FROM mod_members WHERE email = ?"; 

        $para = array(
                $email
        );
        $query = $this->db->query($sql, $para);

        if($query)
        {
             $result = $query->row();

            return $result;
        }

        return;
    }

    public function do_logged_in($email,$password){

        $sql = @" SELECT * FROM mod_members WHERE email = ? AND password = ? LIMIT 1";
        $para = array(
            $email,
            $password
        );

        $res_1 = $this->db->query($sql, $para);

        if($res_1->num_rows() > 0)
        {

            return true;
        }else{
            return false;
        }
    }

    public function insert_mod_members($insert_data){
        $sql = @"INSERT INTO mod_members (
                                            email, 
                                            birthday,   
                                            password,
                                            sex,
                                            phone,
                                            area_code,
                                            create_date                                         
                                        ) 
                VALUES ( ?, ?, ?, ?, ?,?, NOW())"; 

        $para = array(
                $insert_data['email'], 
                $insert_data['birthday'],
                $insert_data['password'],
                $insert_data['sex'],  
                $insert_data['phone'],
                $insert_data['area_code']
            );
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }
 

}