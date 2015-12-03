<?php echo css($this->config->item('news_css'), 'news')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>新增</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>"><?php echo $news_name ?>-上稿作業</a></li>
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
									<option value="0">雙欄式</option>								 
									<option value="1">單欄式</option>										 
								</select>
							</div>
						</div>		
						<?php else: ?>
							<input type="hidden" name="layout_type" value="" >				 	
						<?php endif ?>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">日期</label>
							<div class="col-sm-4">
								<input type="text" class="form-control date" name="date" value="<?php echo $now ?>"> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">標題</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="title" value=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">內容</label>
							<div class="col-sm-8"> 
								<textarea class="form-control ckeditor" id="content" rows="3" name="content"></textarea>
							</div>
						</div>	
							
						<?php if (isset($type)): ?>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">類別</label>
							<div class="col-sm-4">
								<select name="type" id="type">
									 
									<?php   foreach($type as $key=>$rows):?>
												<option value="<?php echo $rows->code_id ?>" <?php if ($rows->code_id == $news_type): ?>
													selected
												<?php endif ?>><?php echo $rows->code_name ?></option>
										<?php endforeach;?>
									
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
								<input type="text" class="form-control" name="frame_url" value=""> 
							</div>
						</div>
						<?php else: ?>
							<input type="hidden" name="frame_url" value="" >
						<?php endif ?>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">URL</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="url" value=""> 
							</div>
						</div>				
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">順序<br/>
								<span style="color:#d9534f">輸入-99將不顯示於前台</span>
							</label>
							<div class="col-sm-4"> 
								<input type="text" class="form-control" id="news_order" name="news_order" value="<?php echo $order ?>" > 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">圖片</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img" value=""> 
							</div>
						</div>						  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">關鍵字[用,分隔  EX:ISO 20007,ISO 9001]</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="keyword" value=""> 
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<!-- <input type="hidden" name="type" value="0" > -->
								<input type="hidden" name="lang" value="zh-TW" >
								<input type="hidden" name="news_kind" value="<?php echo $news_kind ?>" >
								<button type="submit" class="btn btn-info">新增</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>

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
		// 				$("#news_order").val(obj.total_rows);
	 //                }
		// 		});
		// 	});

		// $("#type").trigger('change');

	});
</script>