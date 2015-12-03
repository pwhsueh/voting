<?php echo css($this->config->item('codekind_css'), 'codekind')?>
<section class="wrapper">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>分類管理</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">分類管理</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					新增分類
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">分類群組</label>
							<div class="col-sm-4">
								<select name="codekind_key" id="codekind_key" class="form-control">
									<?php
										if(isset($codekind_results))
										{
											foreach ($codekind_results as $key => $row) 
											{
									?>
												<option value="<?php echo $row->codekind_key?>" <?php if($codekind_key == $row->codekind_key):?> SELECTED <?php endif;?>><?php echo $row->codekind_name?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">上層分類</label>
							<div class="col-sm-4">
								<select name="parent_id" id="parent_id" class="form-control">
									<option value="-1">無</option>
									<?php
										if(isset($code_list))
										{
											foreach ($code_list as $key => $row) 
											{
									?>
												<option value="<?php echo $row->code_id?>" <?php if($code_id == $row->code_id):?> SELECTED <?php endif;?>><?php echo $row->code_name?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">分類名稱</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="code_name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Code Key</label>
							<div class="col-sm-4">
								<?php if(isset($code_key)):?>
									<input type="text" class="form-control" name="code_key" value="<?php echo $code_key.'_'.$code_key_num?>">
								<?php else:?>
									<input type="text" class="form-control" name="code_key" value="">
								<?php endif;?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Code Value1</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="code_value1" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Code Value2</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="code_value2" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Code Value3</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="code_value3" value="">
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-sm-2 col-sm-2 control-label">語言</label>
							<div class="col-md-4">
								<!-- <input type="text" class="form-control" name="lang_code" value=""> -->

								<select name="lang_code">
									<?php
										if(isset($lang)):
									?>	
									<?php   foreach($lang as $key=>$rows):?>
										<option value="<?php echo $rows->code_key ?>" ><?php echo $rows->code_name ?></option>
									<?php endforeach;?>
									<?php endif;?>
								</select>		
							</div>
						</div>
						<div class="form-group" style="display:none">
							<label class="col-sm-2 col-sm-2 control-label">圖片</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" name="img" value=""> 
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
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

<?php echo js($this->config->item('codekind_javascript'), 'codekind')?>
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {

	});
</script>