<?php echo css($this->config->item('news_css'), 'news')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4><?php echo $view_name?></h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>"><?php echo $news_name ?>-上稿作業</a></li>
			  <?php if (isset($type_nav) && !empty($type_nav)): ?> 
			  <li><a href="<?php echo $module_uri?>?type=<?php echo $news->type ?>"><?php echo $type_nav ?></a></li>
			  <?php endif ?>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<?php echo $view_name?>
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">						 
				 		<?php if ($news_kind == 2 || $news_kind == 4 || $news_kind == 5): ?> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">欄位格式</label>
							<div class="col-sm-4">
								<select name="layout_type">									 
									<option value="0" <?php echo $news->layout_type=="0"?"selected":"" ?>>雙欄式</option>								 
									<option value="1" <?php echo $news->layout_type=="1"?"selected":"" ?>>單欄式</option>										 
								</select>
							</div>
						</div>			
						<?php else: ?>
							<input type="hidden" name="layout_type" value="" >						 	
						<?php endif ?>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">日期</label>
							<div class="col-sm-4">
								<?php 
	                             $date = explode(" ", $news->date); 
	                             $date2 = $date[0]; 

	                            ?>
								<input type="text" class="form-control date" name="date" value="<?php echo $date2; ?>" /> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">標題</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="title" value="<?php echo $news->title; ?>" /> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">內容</label>
							<div class="col-sm-8"> 
								<textarea class="form-control ckeditor" rows="3" id="content" name="content"><?php echo htmlspecialchars_decode($news->content); ?></textarea>
							</div>
						</div>	
						 
						<?php if (isset($type)): ?>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">項目</label>
							<div class="col-sm-4">
								<select name="type" id="type">
									<?php 
										if(isset($type)):
									?>	
									<?php   foreach($type as $key=>$rows):?>
												<option value="<?php echo $rows->code_id ?>" <?php if ($rows->code_id==$news->type): ?>
													selected
												<?php endif ?> ><?php echo $rows->code_name ?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>	
						<?php else: ?>
						<input type="hidden" name="type" value="0" > 
						<?php endif ?>
						<?php if ($news_kind == 3): ?>							
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Slider URL</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="frame_url" value="<?php echo $news->frame_url ?>"> 
							</div>
						</div>
						<?php else: ?>
							<input type="hidden" name="frame_url" value="" >
						<?php endif ?>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">URL</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="url" value="<?php echo $news->url ?>"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">順序<br/>
								<span style="color:#d9534f">輸入-99將不顯示於前台</span>
							</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" id="news_order" name="news_order" value="<?php echo $news->news_order ?>">
								<input type="hidden" name="news_ori_order" value="<?php echo $news->news_order ?>" /> 
								<!-- 目前已有<span id="total_count"></span>筆 -->
							</div>
						</div>					  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">圖片</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img" value=""> 
								<?php if (isset($news->img) && "" != $news->img): ?>
									<img style="max-height:350px" src="<?php echo site_url()."assets/".$news->img; ?>" />
								<?php endif ?>
								<input type="hidden" value="<?php echo $news->img; ?>" name="exist_img" />	
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">訊息類別</label>
							<div class="col-sm-4">
								<select name="news_kind" id="news_kind">
									<?php 
										if(isset($news_kind_arr)):
									?>	
									<?php   foreach($news_kind_arr as $key=>$value):?>
												<option value="<?php echo $key ?>" <?php if ($key==$news_kind): ?>
													selected
												<?php endif ?> ><?php echo $value ?></option>
										<?php endforeach;?>
									<?php endif;?>
								</select>
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">關鍵字[用,分隔  EX:ISO 20007,ISO 9001]</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="keyword" value="<?php echo $news->keyword ?>"> 
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<!-- <input type="hidden" name="type" value="0" > -->
								<input type="hidden" name="lang" value="zh-TW" >
								<button type="submit" class="btn btn-info">儲存</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>
<!-- Tab panes -->

<?php echo js($this->config->item('news_javascript'), 'news')?>
<?php echo js($this->config->item('news_ck_javascript'), 'news')?>
 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
	 
		$('.date').datepicker({dateFormat: 'yy-mm-dd'}); 

		// var config =
  //           {
  //               height: 380,
  //               width: 850,
  //               linkShowAdvancedTab: false,
  //               scayt_autoStartup: false,
  //               enterMode: Number(2),
  //               toolbar_Full: [
  //               				[ 'Styles', 'Format', 'Font', 'FontSize', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
  //               				['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList'],
  //                               ['Link', 'Unlink'], ['Undo', 'Redo', '-', 'SelectAll'], [ 'TextColor', 'BGColor' ],['Checkbox', 'Radio', 'Image' ], ['Source']
  //                             ]

  //           };
		// $( 'textarea#content' ).ckeditor(config); 

		// $("#type,#lang").change(function() {   
  //  		   $.ajax({
  //               url: '<?php echo site_url(); ?>' + 'fuel/news/get_news_order/' + $("#lang").val() + '/' +$("#type").val() ,
  //               cache: false
		//         }).done(function (data) {            
	 //                var obj = $.parseJSON(data);
	 //                if (obj != null) {	     
	 //                	// console.log(obj.total_rows);
		// 				$("#total_count").text(obj.total_rows-1);
	 //                }
		// 		});
		// 	});

		// $("#news_order").blur(function() {   
  //  		  	if ($(this).val() > $("#total_count").text()) {
  //  		  		$(this).val($("#total_count").text());
  //  		  	};
		// });

		// $("#type").trigger('change');

	});
</script>