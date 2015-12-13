
 <div class="main_width">

    <center>

        <div class="main_block">

            <!--<div class="head_path"><a href="<?= $index_url ?>">首頁</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;活動簡介</div>-->

       
            <div class="main_title">

                <div class="title_eng">Voting Rules</div>

                <div class="title_tw"><?php echo $item->title ?></div>
                <div class="title_tw"><?php echo str_replace(';',' ',$item->sub_title) ?></div>

            </div>

            <div class="icon_detail">

            <div class="work_type_detail">

                 <?php if ($event->can_vote == 1): ?>
                <div class="work_vote" data-action="V">
                    <span class="fa fa-heart"></span>&nbsp;
                    <?php if ($event->show_frontend == 1): ?>
                    <span class="work_vote_num">&nbsp;<?php echo $item->vote ?></span>
                    <?php endif ?>
                </div>
                <?php endif ?>
                <?php if ($event->can_like == 1): ?>
                <div class="work_like" data-action="L">
                    <span class="fa fa-thumbs-up"></span>&nbsp;
                    <?php if ($event->show_frontend == 1): ?>
                    <span class="work_vote_num">&nbsp;<?php echo $item->like ?></span>
                    <?php endif ?>
                </div>
                <?php endif ?>
                <?php if ($event->can_share == 1): ?>
                <div class="work_share" data-action="S">
                    <span class="fa fa-share"></span>&nbsp;
                    <?php if ($event->show_frontend == 1): ?>
                    <span class="work_vote_num">&nbsp;<?php echo $item->share ?></span>
                    <?php endif ?>
                </div>
                <?php endif ?>
            </div>

            </div>

            <div class="main_detail">

                <div class="detail_img">

                    <img src="<?php echo site_url().'assets/'.$item->photo_path ?>">

                </div>

            </div>

        </div>

    </center>

</div>
   <script>

    

    $(function () {
        
        var isMobile = false; //initiate as false
        // device detection
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
            isMobile = true;
        }
        if (isMobile == true) {
            $("#banner").hide();
            $("#banner_mobile").show();
        } else {
            $("#banner").show();
            $("#banner_mobile").hide();
        }
        $(".work_vote, .work_like, .work_share").click(function () {
            // var href = "login.php";
            // window.location.href = href;
            // console.log($(this).data('itemid'));
            // console.log($(this).data('action'));
            // do_action($(this).data('itemid'),$(this).data('action'));

            var postData = {//"plan_id": $("#plan_id").val(),
                "item_id": <?php echo $item->id ?>,
                "action_code": $(this).data('action')
            };

            // console.log(postData);

            var span = $(this).find("span:last-child");
                    

            $.ajax({
                url: '<?php echo $do_action_url ?>',
                type: 'POST',
                dataType: 'json',
                data: postData,
                success: function(data)
                {
                    console.log(data);
                    if (data.status == 1)
                    {
                         <?php if ($event->show_frontend == 1): ?>
                        if(data.exists == "N")
                        {
                            var num = parseInt(span.text()); 
                            span.text(num+1);
                        }
                        <?php endif ?>

                        window.open("<?php echo $do_fb_share_url ?>"+<?php echo $item->id ?>);
                        // $("#MerchantID").val(data.merchant_id);
                        // $("#XMLData").val(data.encode_data);
                        // $("#payment_form").attr('action', data.gateway);
                        // $("#payment_form").submit();
                        // alert('送出成功！！');
                        // location.href = '<?php echo site_url() ?>home/contactus';
                    }
                    else if(data.status == -99)
                    {
                        window.location = data.login_url;
                        // alert(data.msg);
                    }
                }
            });
        });

       

    });
    
</script>
  