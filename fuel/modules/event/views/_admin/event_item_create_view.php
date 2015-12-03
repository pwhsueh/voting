<?php echo css($this->config->item('event_item_css'), 'event')?> 


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

 
 <div class="main_width">

    <div class="main_body">

        <div class="right_side1">

            <div class="sys_right_name">創漫獎網路票選活動</div>

            <div class="sys_right_name">Step2 請上傳圖片與輸入文字資料</div>

            <div class="add_screen">

                <div id="edit_add_block1" class="main_720">

                    <div class="edit_block">

                        <div class="edit_content">

                            第&nbsp;<input type="text" name="sort_order[]" class="edit_sequence">&nbsp;題

                        </div>

                    </div>

                    <div class="edit_block">

                        <div class="edit_title">大標題</div>

                        <div class="edit_input"><input type="text" name="title[]"></div>

                    </div>

                    <div class="edit_block">

                        <div class="edit_title">副標題</div>

                        <div class="edit_input"><input type="text" name="sub_title[0][]"></div><span class="edit2_add_icon fa fa-plus-circle"></span>

                    </div>

                
                        <div class="edit_block">

                            <div class="edit_title">圖片上傳</div>

                            <input type="file" name="file[]" id="file" class="inputfile inputfile-6"/>

                            <label for="file"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                            <div class="file_desc">圖片規格：600 x 600</div>

                        </div>

                        <div class="edit_block">

                            <div class="edit_title" name="placeholder[]" >圖片遊標懸停文字</div>

                            <div class="edit_input1"><input type="text"></div>

                        </div>

                   

                    <div class="next_step">預覽前端頁面</div>

                </div>

            </div>

            <div class="edit_add_block_outside">

                <div class="edit_add"><span id="edit_add_icon" class="fa fa-plus-circle"></span>新增下一題</div>

                <div class="edit_submit" id="submit">送出</div>

            </div>

        </div>

    </div>

</div>
		 
 

<?php echo js($this->config->item('event_javascript'), 'event')?>
<?php echo js($this->config->item('event_item_javascript'), 'event')?>
<?php echo js($this->config->item('event_ck_javascript'), 'event')?>
 
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	  $(document).ready(function () {

	  	$j("#submit").click(function(event) {
			$j("#form").submit();
		});

	    $(".edit2_add_icon").click(function () {

	    	 

	        $(this).parent().append("<div class='edit_input'><input type='text' name='sub_title[0][]'></div>");

	    });

	    $(".edit_add").click(function () {

	        var $div = $('div[id^="edit_add_block1"]:last');

	        var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

	        $div.clone().find("input").val("").end().prop('id', 'edit_add_block' + num).appendTo(".add_screen").hide().fadeIn(300);



	        $(".edit2_add_icon").click(function () {

	        	var $div = $('div[id^="edit_add_block1"]:last');

	        var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

	            $(this).parent().append("<div class='edit_input'><input type='text' name='sub_title['"+num+"'][]'></div>");

	        });

	    });



	});
</script>