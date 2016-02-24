<?php echo css($this->config->item('event_css'), 'event') ?> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
.DateStart{color: #4679bd;}
.DateEnd{color: #d9534f;}
.EventTitle
{
    overflow : hidden;
    text-overflow : ellipsis;
    white-space : nowrap;
    width: 340px;
}
div#fuel_notification {
        height: 0px;
        border-bottom: 1px solid #ccc;
        background-color: #ecf1f5;
        text-overflow: ellipsis;
        overflow: hidden;
        position: relative;
}

div#fuel_left_panel {
        width:201px;
        top:0px;
}
</style>
        <div class="right_block">
                    <div class="icon_block">
                        <div class="function_icon icon1">
                            <div class="fa fa-eye"></div>
                            <div class="icon_desc">投票者資訊</div>
                        </div>
                        <div class="function_icon icon2">
                            <div class="fa fa-align-left"></div>
                            <div class="icon_desc">投票結果</div>
                        </div>
                        <div class="function_icon icon3">
                            <div class="fa fa-pencil-square-o"></div>
                            <div class="icon_desc">編輯</div>    
                        </div>
                        <div class="function_icon icon4">
                            <div class="fa fa-trash"></div>
                            <div class="icon_desc">刪除</div>    
                        </div>
                    </div>
                </div>
        <div class="main_width">
            <div class="main_body">
                
                <div class="right_side">
                    <div class="list_block">
                        <div class="list_title0">
                            <label class="label_check c_on" for="checkbox-01">
                                <input type="checkbox" id="select-all"/>
                            </label>
                        </div>
                        <div class="list_title1">名稱</div>
                        <div class="list_title2">排序</div>
                        <div class="list_title3">版型</div>
                        <div class="list_title4">擁有者</div>
                        <div class="list_title5">最後修改日期</div>
                    </div>
<?php
if (isset($results)) {
    foreach ($results as $row) {
        ?>
                            <div class="list_block list_data">
                                <div class="list_title1 list_text"><a href="<?php echo $edit_url . $row->id ?>" title="<?php echo $row->title ?>"><?php echo $row->title ?></a></div>
                                <div class="list_title2 list_text"><input type="text" class="list_sequence" value="<?php echo $row->sort_order?>"></div>
                                <div class="list_title3 list_text"><?php if ($row->type == 'P'): ?>
							圖片版	
							<?php else: ?>
							文字版
							<?php endif ?></div>
                                <div class="list_title4 list_text"><?php echo $row->create_by ?></div>
                                <div class="list_title5 list_text"><?php echo $row->modify_date ?></div>
                            </div>
        <?php
    }
} else {
    ?>
                            <div class="list_title1 list_text">No results.</div>
    <?php
}
?>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $.fn.clickToggle = function(func1, func2) {
            var funcs = [func1, func2];
            this.data('toggleclicked', 0);
            this.click(function() {
                var data = $(this).data();
                var tc = data.toggleclicked;
                $.proxy(funcs[tc], this)();
                data.toggleclicked = (tc + 1) % 2;
            });
            return this;
        };

        $(".left_side").click(function() {
            $(".list_block").removeClass("list_data_choose");
            $(".function_icon").removeClass("function_icon_choose");
            $(".icon_block").fadeOut(100);
            $(".icon_desc").fadeOut(100);
        });

        $(".list_title1.list_text").click(function() {
            $(".list_block").removeClass("list_data_choose");
            $(this).parent().addClass("list_data_choose");
            $(".icon_block").fadeIn(300);
        });
        $(".list_title1.list_text").dblclick(function() {
            window.open("sys_edit1.php");
        });


        $(".add_button").clickToggle(function() {
            $(this).addClass("add_button_click");
            $(".add_type").fadeIn(300);
        }, function() {
            $(this).removeClass("add_button_click");
            $(".add_type").fadeOut(100);
        });
        $(".add_type1").hover(function() {
            $(".add_type1").removeClass("add_type1_hover");
            $(this).addClass("add_type1_hover");
        });
        $(".function_icon")
                .mouseenter(function() {
            $(this).addClass("function_icon_choose");
            $(this).children('.icon_desc').fadeIn(300);
        })
                .mouseleave(function() {
            $(this).removeClass("function_icon_choose");
            $(this).children('.icon_desc').fadeOut(100);
        });


        $(".icon1").click(function() {
            window.open("sys_data.php");
        });
        $(".icon2").click(function() {
            window.open("sys_result.php");
        });
        $(".icon3").click(function() {
            window.open("sys_edit1.php");
        });
        $(".photo_add").click(function() {
            window.open("sys_edit1.php?type=photo");
        });
        $(".font_add").click(function() {
            window.open("sys_edit1.php?type=font");
        });
        
        //原本Ｄ
        
    });
</script>