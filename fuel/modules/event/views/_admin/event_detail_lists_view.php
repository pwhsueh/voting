<?php echo css($this->config->item('event_list_css'), 'event')?>
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

<section class="main-content">
<section class="wrapper" style="margin:0px">
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：列表</li>
			</ul>
		</div>
	</div>
	  
	 
	<div class="row">
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
				 
				</div>
			</div>
	    </div>
	</div> 

	<div class="row">
		<section class="panel">
			<div class="alert alert-success" role="alert">
				<strong><?php echo $view_name ?> 共 <?php echo sizeof($results);?> 組帳號參與活動</strong>
			</div>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr> 
						<th style="width:40%">帳號</th>
						<th style="width:10%">投票數</th>
						<th style="width:10%">按讚數</th>
						<th style="width:10%">分享數</th>
						<th style="width:10%">總數</th>
						<th style="width:20%">最近一次投票時間</th>
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
					 
						<td>
							<a target="_BLANK" href='<?php echo 'https://www.facebook.com/'.$row->user_id ?>'><?php echo $row->user_id ?></a>
						</td>
						<td>
							<?php echo $row->vote_count ?>
						</td>
						<td>
							<?php echo $row->like_count ?>
						</td>
						<td>
							<?php echo $row->share_count ?>
						</td>
						<td>
							<?php echo $row->total_count ?>
						</td>
						<td>
							<?php echo $row->last_voting ?>
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
 
</section>
</section>
 
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