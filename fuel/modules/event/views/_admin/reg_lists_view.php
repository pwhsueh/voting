<?php echo css($this->config->item('event_css'), 'event')?>
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
</style>

<section class="main-content">
<section class="wrapper" style="margin:0px">
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">列表</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<!-- <div class="row notify" style="display:none">
		<div class="alert alert-success" role="alert">
			<span>刪除成功</span>
		</div>
	</div> -->

	<!-- <div class="row">
		<div class="col-lg-12">
			<div class="form-horizontal tasi-form">
				<div class="form-group">
					<div class="col-sm-2">
						<select class="form-control" name="search_type">
							<option value="0" <?php echo $search_type=="0"?"selected":"" ?>>課程名稱</option>
							<option value="1" <?php echo $search_type=="1"?"selected":"" ?>>費用</option>
							<option value="2" <?php echo $search_type=="2"?"selected":"" ?>>地點</option>
						</select>
					</div>
					<div class="col-sm-4">
						<div class="input-group date event_start_date">
						  <input type="text" class="form-control" size="16" name="search_txt" id="search_txt" placeholder="Search..." value="<?php echo $search_txt ?>">
						    <span class="input-group-btn">
						    <button type="button" class="btn btn-warning date-set isearch" style="height:34px;"><i class="glyphicon glyphicon-search"></i></button>
						    </span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button class="btn btn-info" type="button" onClick="aHover('<?php echo $create_url;?>')">新增訓練</button>
					<button type="button" class="btn btn-danger del-all" style="height:34px;"><i class="glyphicon glyphicon-trash"></i></button>
				</div>
			</div>
	    </div>
	</div>  -->

	 

	<div class="row">
		<section class="panel">
			<div class="alert alert-success" role="alert">
				<strong>共 <?php echo $total_rows;?> 筆</strong>
			</div>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th>公司名稱</th>
						<th>部門&單位</th>
						<th>姓名</th>
						<th>電子信箱</th>
						<th>聯絡電話</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					if(isset($results))
					{
						foreach($results as $row)
						{
				?>
					<tr>
						<td><?php echo $row->company_name?></td>
						<td>
							<?php echo $row->dep_name ?>
						</td>
						<td>
							<?php echo $row->customer_name ?>
						</td>
						<td>
							<?php echo $row->email ?>
						</td>
						<td>
							<?php echo $row->contact_tel ?>
						</td>
						<td>
							<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $reg_detail_url.$row->id?>')">明細</button> 
						</td>
					</tr>
				<?php
						}
					}
					else
					{
				?>
					<tr>
						<td colspan="6">No results.</td>
					</tr>
				<?php
					}
				?>

				</tobdy>
			</table>
		</section>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php echo $page_jump?>
	  </ul>
	</div>
</section>
</section>
<!-- Button trigger modal -->
<!-- <div class="modal fade bs-example-modal-sm" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">刪除確認</h4>
			</div>
			<div class="modal-body">
				<p>您確定要刪除嗎？</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary do-del">Yes</button>
				<button type="button" class="btn btn-primary do-del-all">Yes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div> --><!-- /.modal -->
<?php echo js($this->config->item('event_javascript'), 'event')?>
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}
	function aHoverBlank(url)
	{
		window.open(url);
	}

	$j("document").ready(function($) {

		 
	});

	 
	function update_page()
	{
		location.reload();
	}
</script>