  <div id="banner">
            <?php
            $url = site_url();
            for ($i = 1; $i <= 77; $i++) {
                if ($i == 7 || $i == 15 || $i == 16 || $i == 17 || $i == 18 || $i == 19 || $i == 25 || $i == 26 || $i == 27 || $i == 28 || $i == 29 || $i == 30 || $i == 31 || $i == 36 || $i == 37 || $i == 38 || $i == 39 || $i == 40 || $i == 41 || $i == 42 || $i == 48 || $i == 49 || $i == 50 || $i == 51 || $i == 52 || $i == 61 || $i == 62 || $i == 63) {
                    echo "<div class='wall'><img src='$url/assets/include/image/banner/img00.jpg'></div>";
                } else {
                    if (sizeof($rand_event_items)>0) {
                         $k = $i % sizeof($rand_event_items);
                         $item = $rand_event_items[$k];
                         // print_r($rand_event_items);
                         echo "<div class='wall'><img class='sc' src='$url/assets/$item->photo_path'></div>";
                        // switch ($k) {
                        //     case 0: 
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/$rand_event_items[0]->photo_path'></div>";
                        //         break;
                        //     case 1:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/2.jpg'></div>";
                        //         break;
                        //     case 2:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/3.jpg'></div>";
                        //         break;
                        //     case 3:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/4.jpg'></div>";
                        //         break;
                        //     case 4:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/5.jpg'></div>";
                        //         break;
                        //     case 5:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/6.jpg'></div>";
                        //         break;
                        //     case 6:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/7.jpg'></div>";
                        //         break;
                        //     case 7:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/8.jpg'></div>";
                        //         break;
                        //     case 8:
                        //         echo "<div class='wall'><img class='sc' src='$url/assets/include/image/banner/9.jpg'></div>";
                        //         break;
                        // }
                    }
                   
                }
            }
            ?>
            <div class="subject">
                <!-- <img src='<?php //echo $url ?>/assets/include/image/banner/banner_min.png'> -->
                <img src='<?php echo $url.'assets/'.$event->photo ?>'>
            </div>
        </div>
        <div id="banner_mobile">
            <img src="<?php echo $url ?>/assets/include/image/banner/banner_mobile.jpg">
            <div class="subject_mobile">
                <img src='<?php echo $url ?>/assets/include/image/banner/banner_min.png'>
            </div>
        </div>
        <div id="vote1">
            <div id="vote_title">
                <div class="main_width">
                    <div class="vote_title">立刻為心儀的作品<br> 1.<span class=" fa fa-heart"></span>投票  2.<span class="fa fa-thumbs-up"></span>按讚  3.<span class="fa fa-share"></span>分享</div>
                </div>
            </div>
            <div id="vote_top" class="main_width">
                <span class="vote_sequence">
                    <div class="sequence_text">排序方式</div>
                    <select id="sequence" name="sequence" class="sequence">
                        <option value="default" <?php echo $sort == 'default'?'selected':'' ?> >依編號</option>
                        <option value="vote" <?php echo $sort == 'vote'?'selected':'' ?>>投票數</option>
                        <option value="like" <?php echo $sort == 'like'?'selected':'' ?>>按讚數</option>
                        <option value="share" <?php echo $sort == 'share'?'selected':'' ?>>分享數</option>
                    </select>
                </span>
                <span class="vote_search">
                    <input type="input" class="search_box" id="search_box" placeholder="搜尋作品" value="<?php echo $keyword ?>" autocomplete="off">
                    <div class="vote_search_icon"><i class="fa fa-search"></i></div>
                </span>
            </div>
            <div class="main_width">
                <div id="vote_main">
                   <!--  <div class="vote_block">
                        <img src="include/image/vote/1.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>
                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/2.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/3.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/4.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/5.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/6.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/7.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div>
                    <div class="vote_block">
                        <img src="include/image/vote/8.jpg">
                        <div class="work_title">別靠過來</div>
                        <div class="work_name">姓名/周杰倫, 學校/中央國中 二年級</div>
                        <div class="work_type">
                            <div class="work_vote"><span class="fa fa-heart"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_like"><span class="fa fa-thumbs-up"></span>&nbsp;<span class="work_vote_num">12</span></div>
                            <div class="work_share"><span class="fa fa-share"></span>&nbsp;<span class="work_vote_num">12</span></div>
                        </div>

                    </div> --> 
                    <?php if (isset($event_items)): ?>
                        <?php foreach ($event_items as $key => $value): ?>
                        <div class="vote_block">
                            <a href="<?php echo site_url().'detail/'.$value->id ?>"><img src="<?php echo site_url().'assets/'.$value->photo_path ?>"></a>
                            <div class="work_title"><?php echo $value->title ?></div>
                            <div class="work_name"><?php echo str_replace(';',' ',$value->sub_title) ?></div>
                            <div class="work_type">
                                <?php if ($event->can_vote == 1): ?>
                                    <div class="work_vote" data-action="V" data-itemid="<?php echo $value->id ?>">
                                        <span class="fa fa-heart"></span>&nbsp;
                                        <?php if ($event->show_frontend == 1): ?>
                                        <span class="work_vote_num"><?php echo $value->vote ?></span>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($event->can_like == 1): ?>
                                    <div class="work_like" data-action="L" data-itemid="<?php echo $value->id ?>">
                                        <span class="fa fa-thumbs-up"></span>&nbsp;
                                        <?php if ($event->show_frontend == 1): ?>
                                        <span class="work_vote_num"><?php echo $value->like ?></span>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if ($event->can_share == 1): ?>
                                    <div class="work_share" data-action="S" data-itemid="<?php echo $value->id ?>">
                                        <span class="fa fa-share"></span>&nbsp;
                                        <?php if ($event->show_frontend == 1): ?>
                                        <span class="work_vote_num"><?php echo $value->share ?></span>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>                            
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <div class="page_main">
                   <!--  <div id="prev" class="page_arrow fa fa-angle-left"></div> -->
                    <?php
                    // for ($i = 1; $i < 11; $i++) {
                    //     if ($i == 1) {
                    //         echo "<div class='page page_choose'>$i</div>";
                    //     } else {
                    //         echo "<div class='page'>$i</div>";
                    //     }
                    // }
                    ?>
                    <!-- <div id="next" class="page_arrow fa fa-angle-right"></div> -->
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

        $("#sequence").change(function(event) {
            /* Act on the event */
            window.location = '<?php echo $current_url ?>?sort=' + $(this).val() + '&keyword=' + $("#search_box").val();
        });

        $("#search_box").blur(function(event) {
            window.location = '<?php echo $current_url ?>?keyword=' + $(this).val() + '&sort=' + $("#sequence").val();
        });

        $('#search_box').bind("enterKey",function(e){
            window.location = '<?php echo $current_url ?>?keyword=' + $(this).val() + '&sort=' + $("#sequence").val();
        });

       $('#search_box').keyup(function(e){
            if(e.keyCode == 13)
            {
                $(this).trigger("enterKey");
            }
        });

        $(".work_vote, .work_like, .work_share").click(function () {
            // var href = "login.php";
            // window.location.href = href;
            // console.log($(this).data('itemid'));
            // console.log($(this).data('action'));
            // do_action($(this).data('itemid'),$(this).data('action'));

            var postData = {//"plan_id": $("#plan_id").val(),
                "item_id": $(this).data('itemid'),
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
            $('.subject_mobile').css('top', ($('#banner_mobile img').height() * 0.4) + 'px');
            $(window).resize(function () {
                $('.subject_mobile').css('top', ($('#banner_mobile img').height() * 0.4) + 'px');
                $('.subject_mobile').css('left', ($('#banner_mobile img').width()) * 0.3 + 'px');
            });

        } else {
            var h = $('.wall img').height() * 1;
            $('.subject').css('top', (h + $('.wall img').height() * 1) + 'px');
            $(window).resize(function () {
                var h = $('.wall img').height() * 1;
                $('.subject').css('top', (h + $('.wall img').height() * 1) + 'px');
                var w = $('.wall img').width() * 3.1;
                $('.subject').css('left', (w + $('.wall img').width()) + 'px');
            });
            var subject = TweenLite.to('.subject', 1, {autoAlpha: 1, scale: 1}).delay(2.6);
            var r1 = TweenLite.to('.r1 img', 1, {autoAlpha: 1}).delay(1);
            var r2 = TweenLite.to('.r2 img', 1, {autoAlpha: 1}).delay(1.2);
            var r3 = TweenLite.to('.r3 img', 1, {autoAlpha: 1}).delay(1.4);
            var r4 = TweenLite.to('.r4 img', 1, {autoAlpha: 1}).delay(1.6);
            var r5 = TweenLite.to('.r5 img', 1, {autoAlpha: 1}).delay(1.8);
            var r6 = TweenLite.to('.r6 img', 1, {autoAlpha: 1}).delay(2.0);
            var r7 = TweenLite.to('.r7 img', 1, {autoAlpha: 1}).delay(2.1);
            var r8 = TweenLite.to('.r8 img', 1, {autoAlpha: 1}).delay(2.2);
        }


    });
</script>