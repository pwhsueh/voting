 
<?php echo css($this->config->item('contact_css'), 'contact')?>

<section class="wrapper">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>聯絡明細</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">列表</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			 
			<section class="panel">
				<header class="panel-heading">
					明細
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">  
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">姓名或公司名</label>
							<div class="col-sm-4">
								<?php echo $row->name ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">電子郵件</label>
							<div class="col-sm-4">
								<?php echo $row->email ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">詢價主旨</label>
							<div class="col-sm-4">
								<?php echo $row->inquiry_topic ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">配合的驗證機構</label>
							<div class="col-sm-4">
								<?php echo $row->coor_unit ?>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">留言內容</label>
							<div class="col-sm-4">
								<?php echo htmlspecialchars_decode($row->msg) ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">填寫日期</label>
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
     
     