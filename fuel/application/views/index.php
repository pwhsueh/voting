<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->
<title><?php echo $title ?></title>
<link href="<?php echo site_url()?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />
<!--link font awesome to use the icon-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/templates/js/jqueryUI-1.11.1.js"></script>
<link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/jquery.bxslider.css" type="text/css" />
<script src="<?php echo site_url()?>assets/templates/js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="<?php echo site_url()?>assets/templates/js/autoresize.js" type="text/javascript"></script>
</head>
<style>
.fa-arrow-circle-o-right{
    font-size:20px;
    background-color:#ed1b23;
    color:#fff;
    width:50px;
    height:50px;
    line-height:50px;
    display:inline-block;
    vertical-align:middle;
    padding-left:3px;
}
</style>
<body>
<!-- 上方檔案 ↓ -->
<?php  $this->load->view('_blocks/top')?>

<div class="main">
    <div class="banner">
         <?php if (isset($banner)): ?>
            <?php $i = 1; ?>
            <?php foreach ($banner as $key => $value): ?>
                <div class="banner_slider" style="background-image:url(<?php echo site_url()."assets/$value->img" ?>);">
                    
                     <div class="banner_top">
                        <div class="banner_title"><?php echo $value->title ?></div>
                        <div class="banner_mid"><?php echo htmlspecialchars_decode($value->content) ?></div>
                        <div class="banner_link_block">
                            <a href="<?php echo $value->url ?>"><div class="banner_link">了解更多</div><div class="fa fa-arrow-circle-o-right fa-1x"></div></a>
                        </div>
                    </div>
                </div>    
                <?php $i++; ?>           
            <?php endforeach ?>
        <?php endif ?>
        <!-- <div class="banner_block1">
            <div class="banner_top">
                <div class="banner_title">溫室氣體申報怎麼做？</div>
                <div class="banner_mid">環保署訂定「溫室氣體排放量申報管理辦法」及公告「公私場所應報溫室氣體排放量之固定汙染原」，已於今年1月1日施行。</div>
                <div class="banner_link_block">
                    <a href="#"><div class="banner_link">了解更多</div><div class="fa fa-arrow-circle-o-right fa-1x"></div></a>
                </div>
            </div>
        </div>
        <div class="banner_block2">
            <div class="banner_top">
                <div class="banner_title">溫室氣體申報怎麼做？</div>
                <div class="banner_mid">環保署訂定「溫室氣體排放量申報管理辦法」及公告「公私場所應報溫室氣體排放量之固定汙染原」，已於今年1月1日施行。</div>
                <div class="banner_link_block">
                    <a href="#"><div class="banner_link">了解更多</div><div class="fa fa-arrow-circle-o-right fa-1x"></div></a>
                </div>
            </div>
        </div>
        <div class="banner_block3">
            <div class="banner_top">
                <div class="banner_title">溫室氣體申報怎麼做？</div>
                <div class="banner_mid">環保署訂定「溫室氣體排放量申報管理辦法」及公告「公私場所應報溫室氣體排放量之固定汙染原」，已於今年1月1日施行。</div>
                <div class="banner_link_block">
                    <a href="#"><div class="banner_link">了解更多</div><div class="fa fa-arrow-circle-o-right fa-1x"></div></a>
                </div>
            </div>
        </div> -->
    </div>
    <div class="main_contact main_width bg_white">
        <div class="main_width_1024">
            <div class="news_info">
                <div class="news_title">
                    <div class="new_title_config">最新消息</div>
                    <div class="under_line"></div>
                </div>
                <div class="news_contact">

                    <?php if (isset($news) ): ?>                   
                    <?php $i=1; ?>
                        <?php foreach ($news as $key => $value): ?>
                            <div class="index_news_block">
                                <div class="news_image<?php echo $i ?>">
                                    <a href="<?php echo $value->detail->url ?>">
                                    <img onload="AutoResizeImage('225','130',this);" src="<?php echo site_url()."assets/".$value->detail->img ?>"  />
                                    </a>
                                    <div class="image_title"><div style="padding-left:5px;"><?php echo $value->code_name ?></div></div>
                                 </div>
                                 <div class="news_text">
                                 <a href="<?php echo $value->detail->url ?>"><?php echo mb_substr($value->detail->title,0,40,'UTF-8') ?></a>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    <?php endif ?>

                  <!--   <div class="index_news_block">
                        <div class="news_image1">
                            <div class="image_title"><div style="padding-left:5px;">推薦閱讀</div></div>
                         </div>
                         <div class="news_text">
                         <a href="#">領導力企管敬邀：如何撰寫符合企管會要求的《企業社會責任報告書》研討會</a>
                        </div>
                    </div>
                    <div class="index_news_block">
                        <div class="news_image2">
                            <div class="image_title"><div style="padding-left:5px;">最多人瀏覽</div></div>
                        </div>
                        <div class="news_text">
                        <a href="#">ISO9001：2008內部稽核課程﹙台北班/10月﹚圓滿落幕</a>
                        </div>
                    </div>
                    <div class="index_news_block">
                        <div class="news_image3">
                            <div class="image_title"><div style="padding-left:5px;">最新條文改版</div></div>
                        </div>
                        <div class="news_text">
                        <a href="#">ISO14001：2015DIS版3大變革</a>
                        </div>
                    </div>
                    <div class="index_news_block">
                        <div class="news_image4">
                            <div class="image_title"><div style="padding-left:5px;">輔導客戶實績</div></div>
                        </div>
                        <div class="news_text">
                        <a href="#">光洋波斯特國際展覽股有限公司通過台灣檢驗科技SGS核發之ISO9001：2008認證</a>
                        </div>
                    </div>
                    <div class="index_news_block">
                        <div class="news_image5">
                            <div class="image_title"><div style="padding-left:5px;">免費研討會</div></div> 
                        </div>
                        <div class="news_text">
                        <a href="#">領導力企管敬邀：食品檢測技術＆食品安全管理系統研討會</a>
                        </div>
                    </div>
                    <div class="index_news_block">
                        <div class="news_image6">
                            <div class="image_title"><div style="padding-left:5px;">ISO 主導稽核員課程</div></div> 
                        </div>
                        <div class="news_text">
                        <a href="#">德國TUV NORD與領導力企管合作ISO9001主導稽核員IRCA國際登錄課程</a>
                        </div>
                   </div> -->
                </div>
            </div>
            <div class="news_case">
                <div class="case_title">
                    <div class="case_title_config">最新輔導實績</div>
                    <div class="under_line"></div>
                </div>
                <?php if (isset($performance)): ?>
                    <?php foreach ($performance as $key => $value): ?>
                        <div class="case_list_block">
                            <div class="list_date"><?php echo dateconvert($value->date) ?></div>
                            <!-- <div class="list_text"><a href="<?php echo site_url().'home/iso-coaching-performance?news_type='.$value->type ?>"><?php echo $value->title ?></a></div> -->
                            <div class="list_text"><a href="<?php echo site_url().'home/iso-coaching-performance-detail/'.$value->id ?>"><?php echo $value->title ?></a></div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <!-- <div class="case_list_block">
                    <div class="list_date">August 11, 2014</div>
                    <div class="list_text"><a href="#">得生製藥股份有限公司通過ISO13485：2003醫療器材品質管理系統認證</a></div>
                </div>
                <div class="case_list_block">
                    <div class="list_date">August 11, 2014</div>
                    <div class="list_text"><a href="#">得生製藥股份有限公司通過ISO13485：2003醫療器材品質管理系統認證</a></div>
                </div>
                <div class="case_list_block">
                    <div class="list_date">August 11, 2014</div>
                    <div class="list_text"><a href="#">得生製藥股份有限公司通過ISO13485：2003醫療器材品質管理系統認證</a></div>
                </div>
                <div class="case_list_block">
                    <div class="list_date">August 11, 2014</div>
                    <div class="list_text"><a href="#">得生製藥股份有限公司通過ISO13485：2003醫療器材品質管理系統認證</a></div>
                </div>
                <div class="case_list_block">
                    <div class="list_date">August 11, 2014</div>
                    <div class="list_text"><a href="#">得生製藥股份有限公司通過ISO13485：2003醫療器材品質管理系統認證</a></div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="business_case main_width">
        <div class="business_title">領導力企管創下許多全國第一。國內ISO輔導資源最充足的顧問公司，協助您取得各項ISO認證，所有ISO認證問題找領導力企管就對了！我們的專業輔導能量，創下許多同業第一。</div>
        <div class="business_icon_slider">
            <div class="business_icon">
                <div><img src="<?php echo site_url()."assets/templates/images/index/logo_1.png" ?>"></div>
                <?php //echo fuel_block("index_business_icon") ?>
            </div>
            <div class="business_icon">
                <div><img src="<?php echo site_url()."assets/templates/images/index/logo_2.png" ?>"></div>
                <?php //echo fuel_block("index_business_icon") ?>
            </div>
        </div>
</div>

<!-- 最底宣告 -->
<?php  $this->load->view('_blocks/foot')?>
</body>
</html>

<!--Script放後面加速頁面產生-->
<script type="text/javascript">
    

    //slider
    $('.banner').bxSlider({
        autoHover:true,
        auto: true,
        captions: true,
        speed:1000
    });
    $('.business_icon_slider').bxSlider({
        autoHover:true,
        auto: true,
        captions: true,
        slideWidth:1050,
        speed:1000,
        pager:false
    });
    $('.index_news_block').on({
        mouseover: function() {
            $(this).css("opacity", '1');
        },
        mouseleave: function() {
            $(this).css("opacity", '0.8');
        }
    });
</script>