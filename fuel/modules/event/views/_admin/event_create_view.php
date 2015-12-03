<?php echo css($this->config->item('event_css'), 'event')?> 

 
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

                            <div class="edit_title">前端使用者登入方式</div>

                            <div class="edit_content">

                                <div class="edit_checkbox"><input type="checkbox" id="checkbox-1-1" class="regular-checkbox" /><label for="checkbox-1-1"></label></div>

                                <div class="edit_check_text">允許前端使用者，透過E-Mail登入</div><br>

                                <div class="edit_checkbox"><input type="checkbox" id="checkbox-1-2" class="regular-checkbox" /><label for="checkbox-1-2"></label></div>

                                <div class="edit_check_text">允許前端使用者，透過E-Mail登入</div>

                            </div>

                        </div>

                        <div class="edit_block">

                            <div class="edit_title">前端登入者可執行的動作</div>

                            <div class="edit_content">

                                <div class="edit_checkbox"><input name="can_vote"  type="checkbox" id="checkbox-2-1" class="regular-checkbox" /><label for="checkbox-2-1"></label></div>

                                <div class="edit_check_text">投票</div>

                                <div class="edit_check_text">前端是否統計數字顯示</div>

                                <div class="edit_checkbox"><input type="radio" name="show_frontend"  id="radio-1-1" name="radio-1-set" class="regular-radio" checked /><label for="radio-1-1"></label></div>

                                <div class="edit_check_text">是</div>

                                <div class="edit_checkbox"><input type="radio" name="show_frontend"  id="radio-1-2" name="radio-1-set" class="regular-radio" checked /><label for="radio-1-2"></label></div>

                                <div class="edit_check_text">否</div><br>

                                <div class="edit_checkbox"><input type="checkbox"  name="can_like" id="checkbox-2-2" class="regular-checkbox" /><label for="checkbox-2-2"></label></div>

                                <div class="edit_check_text">按讚</div><br>

                                <div class="edit_checkbox"><input type="checkbox"  name="can_share" id="checkbox-2-3" class="regular-checkbox" /><label for="checkbox-2-3"></label></div>

                                <div class="edit_check_text">分享</div>

                            </div>

                        </div>
                        <input type="hidden" name="type" value="P" /><!-- 圖文版 -->
                        <div class="next_step" id="submit">下一步</div>

                    </div>



                </div>

            </div>

        </div>
		 
 

<?php echo js($this->config->item('event_javascript'), 'event')?>
<?php echo js($this->config->item('event_ck_javascript'), 'event')?>
 
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	$j(document).ready(function($) {

		$j("#submit").click(function(event) {
			$j("#form").submit();
		});

		$j("#train_time_s").timepicker({
		    timeFormat: 'H:mm'
		});

		$('#train_time_e').timepicker({
			timeFormat: 'H:mm' 
		}); 

		$j("#notify_date").datetimepicker({
		    format: "yyyy-mm-dd",
		    autoclose: true
		}).on('changeDate', function(ev){
			console.log(ev);
		}); 

		$j("form").submit(function(event) {
			$(".msg").remove();


			
			if($j("#train_title").val() == "")
			{
				$j("#train_title").parent().after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}

			if($j("#train_price").val() == "")
			{
				$j("#train_price").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}
			// console.log($j("#train_detail").val());
			// if($j("#train_detail").val() == "")
			// {
			// 	$j("#train_detail").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

			// 	return false;
			// }

			if($j("#train_place").val() == "")
			{
				$j("#train_place").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}

			if($j("#train_place_s").val() == "")
			{
				$j("#train_place_s").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}

			if($j("#train_days").val() == "")
			{
				$j("#train_days").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}

			if($j("#train_time_s").val() == "")
			{
				$j("#train_time_s").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}	

			if($j("#train_time_e").val() == "")
			{
				$j("#train_time_e").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}	

			if($j("#train_hours").val() == "")
			{
				$j("#train_hours").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}	

			if($j("#qualify").val() == "")
			{
				$j("#qualify").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}	

			if($j("#waiting_list").val() == "")
			{
				$j("#waiting_list").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}	

			if($j("#host_unit").val() == "")
			{
				$j("#host_unit").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}	

			if($j("#coll_unit").val() == "")
			{
				$j("#coll_unit").parents('.col-sm-4').after("<div class='col-sm-2 msg'><span style='color:red;'>必填</span></div>");

				return false;
			}		
		});
		 
	});
</script>