<?php echo css($this->config->item('event_css'), 'event')?> 
<style>
	h1{margin-top: 6px;}
</style>
<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>修改</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">列表 </a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
		 			<span style="color:#d9534f">* 為必填欄位</span>
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>課程名稱</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="train_title" value="<?php echo $result->train_title?>"> 
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">
								<span style="color:#d9534f">*</span>開課日期<br/>
								<span style="color:#d9534f">若有1個以上的開課日期，請使用半形逗點分開。舉例：2015-1-1,2015-5-30</span>
							</label>
							<div class="col-sm-4">
								<textarea class="form-control" rows="3" name="train_date" id="train_date"><?php echo $result->train_date ?></textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>費用</label>
							<div class="col-sm-4">							 
								<input type="radio" name="is_free" value="1" <?php echo $result->is_free=="1"?"checked":"" ?>>免費
								<input type="radio" name="is_free" value="0" <?php echo $result->is_free=="0"?"checked":"" ?>>付費
								<input type="text" name="train_price" value="<?php echo $result->train_price?>">
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課時間[起]</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="train_time_s" value="<?php echo $result->train_time_s?>" id="train_time_s"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課時間[迄]</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="train_time_e" value="<?php echo $result->train_time_e?>" id="train_time_e"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課天數</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" name="train_days" value="<?php echo $result->train_days?>" id="train_days"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課時數</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" name="train_hours" value="<?php echo $result->train_hours?>" id="train_hours"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課地點[全稱]<br/>
								<span style="color:#d9534f">若有1個以上的開課地點，請使用半形逗點分開。舉例：臺北xxxxxx,高雄xxxxxx</span>
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="train_place" value="<?php echo $result->train_place?>" id="train_place"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課地點[簡稱]</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="train_place_s" value="<?php echo $result->train_place_s?>" id="train_place_s"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>正取</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="qualify" value="<?php echo $result->qualify?>" id="qualify"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>備取</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="waiting_list" value="<?php echo $result->waiting_list?>" id="waiting_list"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>主辦單位</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="host_unit" value="<?php echo $result->host_unit?>" id="host_unit"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>合作單位</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="coll_unit" value="<?php echo $result->coll_unit?>" id="coll_unit"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><span style="color:#d9534f">*</span>上課通知</label>
							<div class="col-sm-4">
								<?php 
								// print_r($result);
								// die;
									$date = date_create($result->notify_date);
									
									// $date = date_create($news->date);
         //            echo date_format($date, 'Y-m-d')
								 ?>
								<input type="text" class="form-control" size="16" name="notify_date" id="notify_date" value="<?php echo date_format($date, 'Y-m-d') ?>"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">圖片</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="file" value=""> 
								<?php if (isset($result->file_path) && "" != $result->file_path): ?>
									<img style="max-height:350px" src="<?php echo site_url()."assets/".$result->file_path; ?>" />
								<?php endif ?>
								<input type="hidden" value="<?php echo $result->file_path; ?>" name="exist_file" />	
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">訓練簡介</label>
							<div class="col-sm-8">
								 <textarea class="form-control ckeditor" rows="3" name="train_detail" id="train_detail"><?php echo htmlspecialchars_decode($result->train_detail) ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">順序<br/>
								<span style="color:#d9534f">-99:隱藏</span>
								<span style="color:#d9534f">-98:歷史課程</span>
							</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" id="train_order" name="train_order" value="<?php echo $result->train_order ?>" >
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info">修改</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>

<?php echo js($this->config->item('event_javascript'), 'event')?>
<?php echo js($this->config->item('event_ck_javascript'), 'event')?>
 
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	$j(document).ready(function($) {
		 
		$j("#notify_date").datetimepicker({
		    format: "yyyy-mm-dd",
		    autoclose: true
		}).on('changeDate', function(ev){
			console.log(ev);
		}); 

		// $j(".event_start_date").datetimepicker({
		//     format: "yyyy-m-d hh:ii",
		//     autoclose: true
		// }).on('changeDate', function(ev){
		// 	console.log(ev);
		// });

		// $j(".event_end_date").datetimepicker({
		//     format: "yyyy-m-d hh:ii",
		//     autoclose: true
		// });

		// $j(".regi_start_date").datetimepicker({
		//     format: "yyyy-m-d hh:ii",
		//     autoclose: true
		    
		// });

		// $(".regi_end_date").datetimepicker({
		//     format: "yyyy-m-d hh:ii",
		//     autoclose: true
		// });

		// $("#uploadBtn").change(function(){
		// 	$("#uploadFile").val($(this).val());
		// });

		// $("#uploadBtn2").change(function(){
		// 	$("#uploadFile2").val($(this).val());
		// });

		$("form").submit(function(event) {
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