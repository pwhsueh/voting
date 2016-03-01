<?php 
header("Cache-Control: private, must-revalidate, max-age=0");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // A date in the past

 ?>

         <div id="banner2">
             
            <img src="<?php echo site_url().'assets/'.$event->photo ?>">
            <div class="subject">
                <img src='<?php echo site_url().'assets/'.$event->spilt_file ?>'>
            </div>
        </div>
        
        <div id="vote2">
            <div id="vote_title">
                <div class="main_width">
                    <div class="vote_title">請登錄後，點選<span class=" fa fa-heart"></span>投票</div>
                </div>
            </div>
            <div id="vote_top" class="main_width">
                <span class="vote_search">
                    <input type="input" class="search_box" id="search_box"  placeholder="Search" value="<?php echo $keyword ?>" autocomplete="off">
                    <div class="vote_search_icon"><i class="fa fa-search"></i></div>
                </span>
            </div>
            <div class="main_width">
                <div class="vote_list_main">

                    <?php if (isset($event_items)): ?>
                        <?php $i = 1; ?>
                        <?php foreach ($event_items as $key => $value): ?>

                         <div class="list_block">
                            <div class="list_num"><?php echo $i++; ?>.</div>
                            <div class="list_text"><?php echo $value->title ?></div>
                            <div class="list_icon" data-action="V" data-itemid="<?php echo $value->id ?>">
                                <span class=" fa fa-heart"></span>
                            </div>
                        </div>

                                           
                        <?php endforeach ?>
                    <?php endif ?>

                   
                    
                </div>
            </div>

        </div>

        <div id="foot"></div>

        <script>

   function do_action(item_id,action_code){

        var url = '<?php echo $do_action_url ?>';

        var postData = {//"plan_id": $("#plan_id").val(),
            "item_id": item_id,
            "action_code": action_code
        };

        console.log(postData);

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: postData,
            success: function(data)
            {
                // console.log(data);
                if (data.status == 1)
                {
                    // $("#MerchantID").val(data.merchant_id);
                    // $("#XMLData").val(data.encode_data);
                    // $("#payment_form").attr('action', data.gateway);
                    // $("#payment_form").submit();
                    // alert('送出成功！！');
                    // location.href = '<?php echo site_url() ?>home/contactus';
                }
                else
                {
              
                    // alert(data.msg);
                }
            }
        });
   }

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

        

        $("#search_box").blur(function(event) {
            window.location = '<?php echo $current_url ?>?keyword=' + $(this).val();
        });

        $('#search_box').bind("enterKey",function(e){
            window.location = '<?php echo $current_url ?>?keyword=' + $(this).val();
        });

       $('#search_box').keyup(function(e){
            if(e.keyCode == 13)
            {
                $(this).trigger("enterKey");
            }
        });

        $(".list_icon").click(function () {
            // var href = "login.php";
            // window.location.href = href;
            // console.log($(this).data('itemid'));
            // console.log($(this).data('action'));
            // do_action($(this).data('itemid'),$(this).data('action'));

            var thisId = $(this).data('itemid'); 

            var postData = {//"plan_id": $("#plan_id").val(),
                "item_id": $(this).data('itemid'),
                "action_code": $(this).data('action'),
                "start" : '<?php echo uri_safe_encode($event->start_date) ?>',
                "deadline" : '<?php echo uri_safe_encode($event->deadline) ?>'
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
                        

                        var action_name = '投票';
                                            

                        if (data.limit_of_vote == 'Y') {
                            alert('已超過最多可以'+action_name+'的項目');
                        }else{
                            if (data.exists == 'Y') {
                                alert('此項目今日已經' + action_name+'了');
                            }else{
                                if (postData.action_code == 'S') {
                                    window.open("<?php echo $do_fb_share_url ?>"+thisId);
                                }
                            }
                        }
                        // $("#MerchantID").val(data.merchant_id);
                        // $("#XMLData").val(data.encode_data);
                        // $("#payment_form").attr('action', data.gateway);
                        // $("#payment_form").submit();
                        // alert('送出成功！！');
                        // location.href = '<?php echo site_url() ?>home/contactus';
                    }
                    else if(data.status == -97)
                    {
                        alert('投票尚未開始,感謝您的支持');
                    }
                    else if(data.status == -98)
                    {
                        alert('投票截止時間已到,感謝您的支持');
                    }
                    else if(data.status == -99)
                    {
                        window.location = data.login_url;
                        // alert(data.msg);
                    }
                }
            });
        });

        var $container = $('#vote_main');
        $container.imagesLoaded(function () {
            $('#vote_main').masonry({
                itemSelector: '.vote_block',
                columnWidth: '.vote_block',
                isFitWidth: true,
                gutter: 10
            });
        });
        $(".page").click(function () {
            $(".page").removeClass("page_choose");
            $(this).addClass("page_choose");
        });
        /*
         $(".vote_block img").click(function() {
         if ($(this).parent().hasClass('not_choose')) {
         $(".vote_block_choose").hide();
         $(".vote_block").removeClass("not_choose");
         $(".vote_block").addClass("not_choose");
         $(this).parent().removeClass("not_choose");
         $(this).parent().find(".vote_block_choose").show();
         $(".vote_block").css("z-index", "0");
         $(this).parent().css("z-index", "2");
         $(this).parent().css("opacity", "1");
         } else {
         $(".vote_block_choose").hide();
         $(this).parent().addClass("not_choose");
         }
         
         });
         */
        $(".sc").hover(
                function () {
                    $(this).addClass('sc_hover');
                },
                function () {
                    $(this).removeClass('sc_hover');
                }
        );

        $('.wall').each(function () {
            $(this).addClass('r' + Math.floor(Math.random() * 8 + 1));
        });

        // $(".fa-heart").click(function(event) {
        //      Act on the event 
        //     console.log($(this).data('itemId'));
        // });

    });
    $(window).load(function () {
        var isMobile = false; //initiate as false
        // device detection
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
            isMobile = true;
        }
        if (isMobile == true) {
            $('.subject_mobile').css('top', ($('#banner_mobile img').height() * 0.3) + 'px');
            $(window).resize(function () {
                $('.subject_mobile').css('top', ($('#banner_mobile img').height() * 0.3) + 'px');
                $('.subject_mobile').css('left', ($('#banner_mobile img').width()) * 0.3 + 'px');
            });

        } else {
            $('.wall').height($('.wall').width()*0.5625);
            var h = $('.wall').height() * 1;
            $('.subject').css('top', (h + $('.wall').height() * 1.4) + 'px');
            $(window).resize(function () {
                $('.wall').height($('.wall').width()*0.5625);
                var h = $('.wall').height() * 1;
                $('.subject').css('top', (h + $('.wall').height() * 1.4) + 'px');
                var w = $('.wall').width() * 3.1;
                $('.subject').css('left', (w + $('.wall').width()) + 'px');
            });
            var subject = TweenLite.to('.subject', 1, {autoAlpha: 1, scale: 1}).delay(2.6);
            var r1 = TweenLite.to('.r1', 1, {autoAlpha: 1}).delay(1);
            var r2 = TweenLite.to('.r2', 1, {autoAlpha: 1}).delay(1.2);
            var r3 = TweenLite.to('.r3', 1, {autoAlpha: 1}).delay(1.4);
            var r4 = TweenLite.to('.r4', 1, {autoAlpha: 1}).delay(1.6);
            var r5 = TweenLite.to('.r5', 1, {autoAlpha: 1}).delay(1.8);
            var r6 = TweenLite.to('.r6', 1, {autoAlpha: 1}).delay(2.0);
            var r7 = TweenLite.to('.r7', 1, {autoAlpha: 1}).delay(2.1);
            var r8 = TweenLite.to('.r8', 1, {autoAlpha: 1}).delay(2.2);
        }


    });
</script>