<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery.sticky.js"></script>
<style>
.main_width{
    backgorund-color:#fafafa;
}
.top{
    margin: 0px auto;
    text-align:center;
}
.top_width_1024{
    width:1024px;
    margin: 0px auto;
    text-align:left;
    border-bottom:solid 1px #ff9a9a;
    padding:24px 0 20px 0;
    font-size:10px;
}
.top_menu{
    font-size:13px;
    color:#4e4e4e;
    padding:0px 12px 0px 10px;
}
.top_menu a:hover{
    color:red;
}
#menu{
    padding-left:10px;
}
.main_title{
    width:1024px;
    margin: 0px auto;
    text-align:left;
    display:inline-block;
    padding:20px 0 0 0;
}
.search .fa{
    padding-right:2px;
}
.search{
    color:#b5b5b5;
    height:25px;
    line-height:25px;
    vertical-align: middle;
    float:right;
    width:250px;
    padding:5px;
    border:solid 1px #ccc;
    border-radius: 2px;
    -moz-border-radius: 2px; 
    -webkit-border-radius: 2px;
    margin-top:-10px;
}
.top_title{
    margin: 0px auto;
    align:center;
    z-index: 1; 
    background-color:#fafafa;
}
.top_title li{
    font-size:14px;
    color:#202020;
}
.logo{
    background-image:url("<?php echo site_url()?>assets/templates/images/logo.png");
    height:44px;
    width:216px;
    display:inline-block;
    background-repeat:no-repeat;
}
.menu{
    display:inline-block;
    vertical-align:top;
    padding:14px 0 0 0;

}
.sticky-wrapper{
    background-color:#fafafa;
}
.top_title_menu{
    padding:0 15px 0 0;
    display:inline-block;
    height:50px;
    position:relative;

}
.top_title_menu a:hover{
    color:#ed1b23;
}
.top_title_menu ul {
    font-size:14px;
    -moz-border-radius: 2px; 
    -webkit-border-radius: 2px;
    height:auto;
    border:solid 1px #ccc;
    position: absolute;
    top:20px;
    display:none;
    background-color:#FeFeFe;
    z-index:1;
    padding:0 20px 30px 0 ;
    width:310px;
}
.top_title_menu ul li{
    padding:20px 0 0 20px;
}
.top_title_scroll{
    -webkit-box-shadow: 0 1px 10px gray;
    -moz-box-shadow: 0 1px 10px gray;
    box-shadow: 0 1px 10px gray;
    border-top:solid 1px red;
    height:80px;
}
.top_title_scroll .top_title_menu ul {
    top:28px;
}
.second_menu{
    margin-top:30px;
}
.arrow_t_int{
    width:0px;
    height:0px;
    border-width:10px;
    border-style:solid;
    border-color:transparent transparent #333 transparent ;
    position:absolute;
    top:-20px;
    left:20px;
}

.arrow_t_out{
    width:0px;
    height:0px;
    border-width:10px;
    border-style:solid;
    border-color:transparent transparent #fff transparent ;
    position:absolute;
    top:-20px;
    left:20px;
}
/*
::-webkit-search-cancel-button{
    -webkit-appearance: none;
}
::-webkit-search-cancel-button:after {
    content: '';
    display: block;
    width: 14px;
    height: 10px;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAn0lEQVR42u3UMQrDMBBEUZ9WfQqDmm22EaTyjRMHAlM5K+Y7lb0wnUZPIKHlnutOa+25Z4D++MRBX98MD1V/trSppLKHqj9TTBWKcoUqffbUcbBBEhTjBOV4ja4l4OIAZThEOV6jHO8ARXD+gPPvKMABinGOrnu6gTNUawrcQKNCAQ7QeTxORzle3+sDfjJpPCqhJh7GixZq4rHcc9l5A9qZ+WeBhgEuAAAAAElFTkSuQmCC);
    background-repeat: no-repeat;
    background-size: 12px;
    background-position: top left;
}
*/
</style>
<div class="top main_width">
    <div class="top_width_1024">
    <span class='top_menu' style="padding-left:0;"><a href="<?php echo site_url()?>aboutus">關於我們</a></span>| 
    <!--
    <span class='top_menu'><a href="<?php echo site_url()?>home/ci_design">CI設計</a></span>| 
-->
    <span class='top_menu'><a href="<?php echo site_url()?>home/iso-coaching-performance?news_type=品質管理">輔導實績</a></span>|
    <span class='top_menu'><a href="<?php echo site_url()?>iso-training-courses">ISO教育訓練</a></span>|  
    <span class='top_menu'><a href="<?php echo site_url()?>home/iso-coaching">ISO輔導項目</a></span>| 
    <span class='top_menu'><a href="http://www.isoleader.com.tw/phpBB3/" onclick="window.open(this.href);
            return false;">討論區</a></span>| 
            <!--
    <span class='top_menu'><a href="<?php echo site_url()?>home/iso_class">ISO小學堂</a></span>| 
-->
    <span class='top_menu'><a href="<?php echo site_url()?>home/iso_news">最新消息</a></span>| 
    <span class='top_menu'><a href="<?php echo site_url()?>home/contactus"><font color="#4285f4">與我們聯絡</font></a></span>
    <span class="search" ><input type="input" id="search_box" style="height:15px;width:230px; background-color:#fafafa;" placeholder="關鍵字搜尋" autocomplete="off"><span class="fa fa-search"> </span></span>
    </div>
</div>
<div class="top main_width">
<div id="sticky" class="top_title main_width">
    <div class="main_title">
        <a href="<?php echo site_url() ?>"><div class="logo"></div></a>
        <div class="menu">
            <ul id="menu">
                <?php

                $menu_data = $this->core_model->get_coach_item($this->core_model->get_cate_list("COACH_TYPE"));

                //print_r($menu_data);
                //die();
                foreach ($menu_data as $key => $value) {
                    if(isset($menu_data[$key]->coach_data) && sizeof($menu_data[$key]->coach_data) > 0)
                    {
                ?>
                <li class="top_title_menu"><a href="<?php echo site_url()."home/iso-coaching-list/".$value->code_id ?>"><?php echo $value->code_name ?></a>
                    <ul class="second_menu">
                        <span class="arrow_t_int"></span>
                        <span class="arrow_t_out"></span>
                        <?php 
                      
                        foreach ($menu_data[$key]->coach_data as $c_key => $c_value) {
                            // print_r($c_value);
                        ?>
                        <li><a href="<?php echo site_url().'home/'.news_kind_controller($c_value->news_kind).'/'.$c_value->id ?>"><?php echo $c_value->title ?></a></li>
                        <?php 
                        } 
                        ?>
                    </ul>
                </li>

                <?php 
            }
                } 

                ?>
            </ul>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
        $('.top_title_menu').on({
            mouseover: function() {
                $('ul', this).fadeIn(100);
            },
            mouseleave: function() {
                $('ul', this).fadeOut(100);
            }
        });
        $(".top_title").sticky({topSpacing: 0, center: true, className: "top_title_scroll"});

        $("#search_box").keypress(function(e) {
            code = (e.keyCode ? e.keyCode : e.which);

            var kw = $("#search_box").val();
            //if enter key is pressed
            if (code == 13) {
                //click the button and go to page
               window.location = "<?php echo site_url()?>home/search_result/"+encodeURI(kw);
            }
        });
</script>
