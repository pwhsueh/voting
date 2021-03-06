<?php echo css($this->config->item('event_css'), 'event')?> 
<?php echo css($this->config->item('event_upload_css'), 'event')?> 
<style>
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
 
		    <div class="main_width">

            <div class="main_body">

                <div class="right_side1">
 

                    <div class="sys_right_name">Step1 請選擇前端使用者，可以執行的功能有哪些？</div>

                    <div class="main_720">

                    	<div class="edit_block">

                            <div class="edit_title">投票名稱</div>

                            <div class="edit_content">
 
                            	<input type="text"   name="title">
                            </div>

                        </div>

                        <div class="edit_block">

                            <div class="edit_title">投票型態</div>

                            <div class="edit_content">

                                最多可選&nbsp;<input type="text" class="edit_sequence" name="max_item">&nbsp;個項目

                            </div>

                        </div>

                        <div class="edit_block">

                            <div class="edit_title">上線時間（EX:2015-12-20 00:00）</div>

                            <div class="edit_content">
 
                                <input type="text" class="date"  name="start_date" >
                            </div>

                        </div>

                        <div class="edit_block">

                            <div class="edit_title">截止時間（EX:2016-01-15 23:59）</div>

                            <div class="edit_content">
 
                                <input type="text"  class="date" name="deadline">
                            </div>

                        </div>

                        <div class="edit_block">

                            <div class="edit_title">前端使用者登入方式</div>

                            <div class="edit_content">

                                <div class="edit_checkbox"><input name="allow_email" value="1" type="checkbox" id="checkbox-1-1" class="regular-checkbox" /><label for="checkbox-1-1"></label></div>

                                <div class="edit_check_text">允許前端使用者，透過E-Mail登入</div><br>

                                <div class="edit_checkbox"><input name="allow_fb" value="1" type="checkbox" id="checkbox-1-2" class="regular-checkbox" /><label for="checkbox-1-2"></label></div>

                                <div class="edit_check_text">允許前端使用者，透過Facebook登入</div>

                            </div>

                        </div>

                        <?php if ($type == 'P'): ?>

                        <div class="edit_block">

                            <div class="edit_title">前端登入者可執行的動作</div>

                            <div class="edit_content">

                                <div class="edit_checkbox"><input name="can_vote" value="1"  type="checkbox" id="checkbox-2-1" class="regular-checkbox" /><label for="checkbox-2-1"></label></div>

                                <div class="edit_check_text">投票</div>

                                <div class="edit_check_text">前端是否統計數字顯示</div>

                                <div class="edit_checkbox"><input type="radio" name="show_frontend"  id="radio-1-1" name="radio-1-set" class="regular-radio" checked /><label for="radio-1-1"></label></div>

                                <div class="edit_check_text">是</div>

                                <div class="edit_checkbox"><input type="radio" name="show_frontend"  id="radio-1-2" name="radio-1-set" class="regular-radio" checked /><label for="radio-1-2"></label></div>

                                <div class="edit_check_text">否</div><br>

                                <div class="edit_checkbox"><input type="checkbox" value="1" name="can_like" id="checkbox-2-2" class="regular-checkbox" /><label for="checkbox-2-2"></label></div>

                                <div class="edit_check_text">按讚</div><br>

                                <div class="edit_checkbox"><input type="checkbox" value="1" name="can_share" id="checkbox-2-3" class="regular-checkbox" /><label for="checkbox-2-3"></label></div>

                                <div class="edit_check_text">分享</div>

                            </div>

                        </div>

						<div class="edit_block">

                            <div class="edit_title">圖片上傳（說明：請上傳1M以下圖片）</div>

                            <input type="file" id="file" name="file" class="inputfile inputfile-6"//>

                            <label for="file"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                            <!-- <div class="file_desc">圖片規格：600 x 600</div> -->

                        </div>

                        

                         <div class="edit_block" style="display:none">

                            <div class="edit_title">裁切圖片上傳</div>

                            <input type="file" id="spilt_file" name="spilt_file" class="inputfile inputfile-6"//>

                            <label for="spilt_file"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                            <!-- <div class="file_desc">圖片規格：600 x 600</div> -->
                      

                        </div>


                            
                        <?php endif ?>

                        <?php if ($type == 'T'): ?>
                            <input type="hidden" value="Y" name="can_vote" />
                        <?php endif ?>
                       
                      

                        <input type="hidden" name="type" value="<?php echo $type ?>" /><!-- 圖文版 -->
                        <div class="next_step" id="submit">下一步</div>

                    </div>



                </div>

            </div>

        </div>
		 
 

<?php echo js($this->config->item('event_javascript'), 'event')?>
<?php echo js($this->config->item('event_item_javascript'), 'event')?>
 
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	$j(document).ready(function($) {
        // $('.date').datepicker({dateFormat: 'yy-mm-dd'}); 
		$j("#submit").click(function(event) {
			$j("#form").submit();
		});
 

		$j("form").submit(function(event) {
			 
		});
		 
	});
</script>