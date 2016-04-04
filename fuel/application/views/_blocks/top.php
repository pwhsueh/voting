 

<?php
$this->load->helper('cookie');
$this->load->model('code_model');
$account = $this->code_model->get_logged_in_account();
// $fb_data  = $this->code_model->get_fb_data();
$target_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// print_r($_SERVER);
$ary = explode("/", $_SERVER['REQUEST_URI']);
$event_id = $ary[2];
// echo $target_url ."<br>";
// echo site_url().'login'."<br>";
if ($target_url != site_url().'login') {
    $this->input->set_cookie("voting_target_url",$target_url, time()+3600);
}

?>
 <div id="header">
    <div class="main_width">
        <div class="header_title"><a href='<?php echo site_url()?>event/1'>滬江高中網路票選</a></div>
        <div class="rmm" data-menu-style='minimal'>
            <ul>
                <li><a href='<?php echo site_url()?>event/<?php echo $event_id ?>'>首頁</a></li>
                <li><a href='<?php echo site_url()?>introduction/<?php echo $event_id ?>'>活動簡介</a></li>
                <li><a href='<?php echo site_url()?>rule/<?php echo $event_id ?>'>活動規則</a></li>
                <li><a href='<?php echo site_url()?>rights/<?php echo $event_id ?>'>權利義務</a></li> 
                <?php if($account != null && $account != ""): ?>
                <li><a href='<?php echo site_url()?>logout'>登出</a></li>
                <?php else: ?>
                <li><a href='<?php echo site_url()?>login'>登入</a></li>
                <?php endif ?>
            </ul>
        </div>

    </div>
</div>