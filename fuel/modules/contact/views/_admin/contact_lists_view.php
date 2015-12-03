<?php echo css($this->config->item('contact_css'), 'contact')?>

 
	 
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：聯絡列表</li>
			</ul>
		</div>
	</div> 
	<div class="row" style="">
 
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px">
				<div class="form-group">				
				    <label class="col-sm-4 control-label" >
						聯絡人
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_name" value='<?php echo $search_name ?>' />
				    </div>
				       <label class="col-sm-4 control-label" >
						電子信箱
					</label>
				    <div class="col-sm-8">
				        <input type="text" name="search_email" value='<?php echo $search_email ?>' />
				    </div>
				    <label class="col-sm-4 control-label" >
						詢價主旨
					</label>
				    <div class="col-sm-8">
				        <select style="width:50%" name="search_topic" >
				        	<option value="all">ALL</option>
						 	<?php if (isset($topic)): ?>
						 		<?php foreach ($topic as $key => $rows): ?>
						 			<option value="<?php echo $rows->code_id ?>" 
						 				<?php if ($search_topic == $rows->code_id ): ?>
						 					selected
						 				<?php endif ?>
						 			 ><?php echo $rows->code_name ?></option>
						 		<?php endforeach ?>
						 	<?php endif ?>
						</select>
				    </div> 
				 
				</div>
			</div>  
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button type="submit" class="btn btn-warning">搜尋</button> 
					<!-- <button type="button" id="btnExport" class="btn btn-danger">匯出</button> -->
				</div>
			</div>
	    </div>
	</div>  
 
	<div class="row">
		<div class="col-md-12 sheader"> 
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr> 
						<th>編號</th>
						<th>聯絡人</th>
						<th>電子信箱</th>
						<th>詢價主旨</th>
						<th>填寫日期</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($results)): ?>
						<?php foreach ($results as $key => $rows): ?>
							<tr>						
								<td><a href="<?php echo $detail_url.$rows->id?>"><?php echo $rows->id?></a></td>
								<td><?php echo $rows->name?></td>
								<td><?php echo $rows->email?></td> 
								<td><?php echo $rows->inquiry_topic?></td>
								<td><?php echo $rows->modi_date?></td> 
								<td>
									<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $detail_url.$rows->id?>')">明細</button>
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td colspan="6">No results.</td>
						</tr>
					<?php endif ?>
					
				</tobdy>
			</table>
		</div>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php echo $page_jump?>
	  </ul>
	</div>
 
<?php echo js($this->config->item('contact_javascript'), 'contact')?>

<script>
	var $j = jQuery.noConflict(true);

	function aHover(url)
	{
		location.href = url;
	}

	// $j("document").ready(function($) {
	// 	$("#btnExport").click(function(){

	// 		$("#form").attr('action', '<?php echo $export_action ?>');

	// 		$("#form").submit();

	// 		$("#form").attr('action', '<?php echo $form_action ?>');

	//  	});
	// });

	 
</script>