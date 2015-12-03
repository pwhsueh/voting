<?php echo css($this->config->item('event_css'), 'event')?> 
<style>
	h1{margin-top: 6px;}
</style>
<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>明細</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">列表</a></li>
			  <li><a href="<?php echo $reg_list?>"><?php echo $row->train_title?></a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
		 			
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司名稱</label>
							<div class="col-sm-4">
								<?php echo $row->company_name ?>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">部門&單位</label>
							<div class="col-sm-4">
								<?php echo $row->dep_name ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">姓名</label>
							<div class="col-sm-4">
								<?php echo $row->customer_name ?>
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">性別</label>
							<div class="col-sm-4">
								<?php if ($row->sex == '1'): ?>
									男性
								<?php else: ?>
									女性
								<?php endif ?>
							</div>
						</div>	  	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">電子信箱</label>
							<div class="col-sm-4">
								<?php echo $row->email ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">聯絡電話</label>
							<div class="col-sm-4">
								<?php echo $row->contact_tel ?>
							</div>
						</div>	 	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">姓名2</label>
							<div class="col-sm-4">
								<?php echo $row->customer_name2 ?>
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">性別2</label>
							<div class="col-sm-4">
								<?php if ($row->sex2 == '1'): ?>
									男性
								<?php else: ?>
									女性
								<?php endif ?>
							</div>
						</div>	  	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">電子信箱2</label>
							<div class="col-sm-4">
								<?php echo $row->email2 ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">聯絡電話2</label>
							<div class="col-sm-4">
								<?php echo $row->contact_tel2 ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">訓練名稱</label>
							<div class="col-sm-4">
								<?php echo $row->train_title ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">費用</label>
							<div class="col-sm-4">
								<?php echo $row->train_price ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">上課地點</label>
							<div class="col-sm-4">
								<?php echo $row->train_place ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">上課日期</label>
							<div class="col-sm-4">
								<?php echo $row->train_date ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">發票開立</label>
							<div class="col-sm-4">
								<?php echo $row->invoice_type ?>
							</div>
						</div>	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">發票抬頭</label>
							<div class="col-sm-4">
								<?php echo $row->invoice_title ?>
							</div>
						</div>	 	 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司統編</label>
							<div class="col-sm-4">
								<?php echo $row->company_serialno ?>
							</div>
						</div>		 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">餐盒選擇</label>
							<div class="col-sm-4"> 
								<?php if ($row->is_vegetarian == '1'): ?>
									一般
								<?php else: ?>
									素食
								<?php endif ?>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">同意條款</label>
							<div class="col-sm-4">
								<?php if ($row->is_agree == '1'): ?>
									同意
								<?php else: ?>
									不同意
								<?php endif ?>
							</div>
						</div>		 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">意見</label>
							<div class="col-sm-4">
								<?php echo $row->register_msg ?>
							</div>
						</div>		 	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">報名時間</label>
							<div class="col-sm-4">
								<?php echo $row->modi_date ?>
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
		 
		 
	});
</script>