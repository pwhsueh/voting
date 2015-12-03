<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width; initial-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->

<title><?php echo $title; ?></title>

<link href="<?php echo site_url() ?>assets/templates/css/main.css" rel="stylesheet" type="text/css" />

<!--link font awesome to use the icon-->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo site_url() ?>assets/templates/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo site_url() ?>assets/templates/js/jqueryUI-1.11.1.js"></script>

<script src="<?php echo site_url() ?>assets/templates/js/autoresize.js" type="text/javascript"></script>

</head>

<body>

<!-- 上方檔案 ↓ -->

<?php $this->load->view('_blocks/top') ?>



<div class="main main_width">

    <div class="page_banner" style="background-image:url(<?php echo site_url() ?>assets/templates/images/banner_about.jpg);"></div>
    <!--<div><img src="<?php echo site_url() ?>assets/templates/images/b4/b4_1_banner.jpg"></div>-->

    <div class="main_width_1024">

        <div class="ci_title">最新消息</div>

        <div class='b4_1_main'>

            <div class='b4_1_choose'>

              <!--   <div id="contact1" class='b4_1_tag tag_click'>推薦閱讀</div>

                <div id="contact2" class='b4_1_tag'>最多人瀏覽</div>

                <div id="contact3" class='b4_1_tag'>最新條文改版</div>

                <div id="contact4" class='b4_1_tag'>輔導客戶實績</div>

                <div id="contact5" class='b4_1_tag'>免費研討會</div>

                <div id="contact6" class='b4_1_tag'>ISO主導稽核員課程</div> -->
<?php if (isset($news)): ?>
    <?php $i = 1; ?>
    <?php foreach ($news as $key => $value): ?>
                                <div id="contact<?php echo $i ?>" class='b4_1_tag <?php echo isset($news_type) && $key == $news_type ? "tag_click" : "" ?>'><?php echo $key ?></div>
        <?php $i++; ?>
    <?php endforeach ?>
<?php endif ?>

            </div>

<?php if (isset($news)): ?>   
    <?php $i = 1; ?>           
    <?php foreach ($news as $key => $value): ?>
                            <div class="b4_1_contact contact<?php echo $i ?>" <?php echo isset($news_type) && $key == $news_type ? "" : "style='display:none;'" ?>>
        <?php if (isset($value)): ?>   
            <?php foreach ($value as $key1 => $value1): ?>
                                                <div class='b4_1_list'>
                                                    <div class='b4_1_list_left'>
                                                        <div class="b4_1_list_left_icon fa fa-file-text-o"></div>
                                                        <div class="b4_1_list_left_text"><?php echo $value1->title ?></div>
                                                        <div class="fa fa-external-link" style="display:none;"></div>
                                                    </div>
                                                    <div class='b4_1_list_right'>
                <?php $date = date_create($value1->date) ?>
                                                        <div class='b4_1_list_right_date'><?php echo date_format($date, "Y/m/d") ?></div>
                                                        <!--<div class='b4_1_list_right_icon fa fa-plus'></div>-->
                                                    </div>
                                                </div>
                                                <div class='list_slider' style="<?php echo isset($news_id) && $news_id > 0 && $news_id == $value1->id ? '' : 'display:none;' ?> ">
                                                    <br>
                                                    <?php if (isset($value1->img) && !empty($value1->img)): ?>
                                                            <center><img class="list_slider_img" src="<?php echo site_url() . 'assets/' . $value1->img ?>" /></center>
                <?php endif ?>
                <?php echo htmlspecialchars_decode($value1->content) ?>
                                                    <br><br>
                                                </div>
            <?php endforeach ?> 
        <?php endif ?> 
        <?php $i++; ?>                     
                            </div>                  
    <?php endforeach ?>
<?php endif ?> 
        </div>

    </div>

</div>



<!-- 最底宣告 -->

<?php $this->load->view('_blocks/foot') ?>

</body>

</html>

<script type="text/javascript">

    $(".b4_1_tag").click(function() {

        $(".b4_1_tag").each(function() {

            $(this).removeClass('tag_click');

        });

        $(this).addClass('tag_click');



        $(".b4_1_contact").hide();

        $("." + $(this).attr('id')).show();

    });

    $('.b4_1_list').on({
        mouseover: function() {

            $(this).addClass("b4_1_list_mouseover");
        },
        mouseleave: function() {

            $(this).removeClass("b4_1_list_mouseover");

        }

    });

    $('.b4_1_list_right_icon, .b4_1_list_left_text').click(function() {

        var $target = $(this).parents(".b4_1_list");

        if ($target.next().filter(".list_slider").attr("id") !== 'open') {

            $target.next().filter(".list_slider").slideDown();

            $target.find(".b4_1_list_right_icon").removeClass("fa-plus").addClass("fa-minus");

            $target.find(".fa-external-link").show();

            $target.find(".b4_1_list_left_text").addClass("b4_1_list_left_text_click");

            $target.addClass("b4_1_list_click");


            $target.find(".b4_1_list_right_date").addClass("b4_1_list_right_date_click");

            $target.next().filter(".list_slider").attr('id', 'open');

        } else {

            $target.next().filter(".list_slider").slideUp();

            $target.find(".b4_1_list_right_icon").removeClass("fa-minus").addClass("fa-plus");

            $target.find(".fa-external-link").hide();

            $target.find(".b4_1_list_left_text").removeClass("b4_1_list_left_text_click");

            $target.removeClass("b4_1_list_click");

            $target.find(".b4_1_list_right_date").removeClass("b4_1_list_right_date_click");

            $target.next().filter(".list_slider").removeAttr("id");

        }

    });
    
    $(".list_slider_img").each(function() {
        $(this).wrap("<div class='b3_d_text_img'></div>");
    });
</script>