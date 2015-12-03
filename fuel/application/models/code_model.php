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

    public function get_news($news_kind,$type,$filter="",$orderby=""){
        $sql = @"select * from mod_news where
        news_kind = '$news_kind'
        AND ('$type' = '-1' || type='0' || type='$type' || type IN (SELECT  code_id FROM mod_code WHERE code_key = '$type'))
        AND news_order <> '-99'
        $filter 
        order by date DESC $orderby ";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_extension_news($news_kind,$filter="",$orderby="",$limit=""){
        $sql = @"select * from mod_news where
        news_kind = '$news_kind'
        $filter 
        order by date DESC $orderby $limit ";
        $query = $this->db->query($sql);
        // echo $sql;
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            /*echo "<pre>";
            echo print_r($result);
            echo "</pre>";*/
            return $result;
        }
    }

    public function get_serach_news($keyword){
        $keyword = str_replace(' ', '', $keyword);
        $sql = @"select * from mod_news where ( replace(`title`,' ','') LIKE '%$keyword%' OR replace(`content`,' ','') LIKE '%$keyword%')
        AND news_order <> '-99'
        order by news_order ASC , date DESC $orderby ";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_random_ci(){
        return $this->get_random_news(1,9);
    }

    public function get_random_all_news(){
        return $this->get_random_news('',5);
    }

    public function get_random_coach(){
        return $this->get_random_news(2,5);
        // return $this->get_news(2,$type);
    }
    public function get_random_coach_by_type($type){
        return $this->get_random_news(2,5,$type);
        // return $this->get_news(2,$type);
    }
    public  function get_recommand_news($page_size='5'){
        //RECOMMEND
        return $this->get_news(4,'RECOMMEND','',' limit 0,'.$page_size);
    }

    public function get_coach_by_type($type,$kind=2){
        $sql = @"select * from mod_news where type='$type' and news_kind = '$kind'
         AND news_order <> '-99'
        order by news_order ASC , date DESC $orderby ";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_random_news($news_kind,$limit,$type=null){
        $filter = ' news_kind in (1,2,3) ';
        if (isset($news_kind) && $news_kind != '') {
            $filter = " news_kind='$news_kind' ";
        }
        if (isset($type) && $type != '') {
            $filter .= " AND type='$type' ";
        }
        $sql = @" select * from mod_news WHERE 1=1  AND news_order <> '-99' AND $filter ORDER BY RAND() LIMIT $limit ";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_series_menu($codekind_key,$lang_code,$parent_id=-1){
        // $sql = @"select * from mod_code where codekind_key = '$codekind_key' and parent_id = $parent_id and lang_code = '$lang_code' ";
        // $query = $this->db->query($sql);
        // //echo $sql;exit;
        // if($query->num_rows() > 0)
        // {
        //     $result = $query->result();

        //     return $result;
        // }
        return $this->get_code($codekind_key,$lang_code,$parent_id);
    }

    public function get_news_by_id($id){
        $sql = @"select * from mod_news where id = '$id' ";
        $query = $this->db->query($sql);
        // echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->row();

            return $result;
        }
    }

    public function get_home_success($filter="",$orderby=""){
        return $this->get_news(5,'-1',$filter," limit 0,5");
    }

    public function get_banner($filter="",$orderby=""){
        return $this->get_news(0,'BANNER',$filter,$orderby);
    }

    public function get_home_news($filter="",$orderby=""){
        return $this->get_news(0,'HOME_NEWS',$filter,$orderby);
    }

    public function get_ci_news($filter="",$orderby=""){
        return $this->get_news(1,0,$filter,$orderby);
    }

    public function get_iso_class_news($type,$filter="",$orderby=""){
        return $this->get_news(3,$type,$filter,$orderby);
    }

    public function get_iso_coach_news($type,$filter="",$orderby=""){
        return $this->get_news(2,$type,$filter,$orderby);
    }

    public function get_iso_coach_type(){
        return $this->get_code('COACH_TYPE','zh-TW');
    }

    public function get_iso_news_items($type,$filter="",$orderby=""){
        return $this->get_news(4,$type,$filter,$orderby);
    }

    public function get_iso_succcase_items($type,$filter="",$orderby=""){
        return $this->get_news(5,$type,$filter,$orderby);
    }

    public function get_iso_news_type(){
        return $this->get_code('NEWS_TYPE','zh-TW');
    }

    public function get_country(){
        return $this->get_code('COUNTRY','zh-TW');
    }

    public function get_coor_unit(){
        return $this->get_code('COOR_UNIT','zh-TW');
    }

    public function get_inquiry_topic(){
        return $this->get_code('INQUIRY_TOPIC','zh-TW');
    }

    public function get_country_info($code_id){
        $sql = @"select * from mod_country 
        where  country_id like '%;$code_id;%'   ";
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
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

    public function get_news_list($type,$lang){
        $sql = @"select * from mod_news where type='$type' and lang='$lang'  AND news_order <> '-99' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_products_list($serial_key){
        $sql = @"select * from mod_products where serial_key  = '$serial_key' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function get_product($id){
        $sql = @"select * from mod_products where id  = '$id' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_support($type_code_key,$lang_code){
        $sql = @"select * from mod_code where code_key='$type_code_key' and lang_code = '$lang_code'  ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $row = $query->row();

            return $row;
        }
    }

    public function get_support_list($type){ 
        $sql = @"select * from mod_sup where type = '$type' ";
        $query = $this->db->query($sql);
        //echo $sql;exit;
        if($query->num_rows() > 0)
        {
            $result = $query->result();

            return $result;
        }
    }

    public function update_news_viewcount($id){
        $sql = @"UPDATE mod_news SET view_count = view_count +1 WHERE id=? "; 

        $para = array($id);
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }

    public function insert_mod_contact($insert_data){
        $sql = @"INSERT INTO mod_contact (
                                            name, 
                                            email, 
                                            inquiry_topic,   
                                            coor_unit,
                                            msg,
                                            modi_date                                         
                                        ) 
                VALUES ( ?, ?, ?, ?, ?, NOW())"; 

        $para = array(
                $insert_data['name'], 
                $insert_data['email'],
                $insert_data['inquiry_topic'],
                $insert_data['coor_unit'],  
                $insert_data['msg'],
            );
        $success = $this->db->query($sql, $para);

        if($success)
        {
            return true;
        }

        return;
    }
 

}