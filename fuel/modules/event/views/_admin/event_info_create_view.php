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


<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>編輯活動明細</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">投票活動</a></li>
			  <li><a href="<?php echo $event_uri?>"><?php echo $event->title ?></a></li>
			  <li class="active">活動簡介、規則、權利</li>
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
							<label class="col-sm-2 col-sm-2 control-label">活動簡介</label>
							<div class="col-sm-8"> 
								<textarea class="form-control ckeditor" id="introduction" rows="10" name="introduction">
									<?php echo htmlspecialchars_decode($event->introduction) ?>
								</textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">權利義務</label>
							<div class="col-sm-8"> 
								<textarea class="form-control ckeditor" id="rights" rows="10" name="rights">
									<?php echo htmlspecialchars_decode($event->rights) ?>
								</textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">活動規則</label>
							<div class="col-sm-8"> 
								<textarea class="form-control ckeditor" id="rule" rows="10" name="rule">
									<?php echo htmlspecialchars_decode($event->rule) ?>
								</textarea>
							</div>
						</div>	
						 	
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<!-- <input type="hidden" name="type" value="0" > -->
								<input type="hidden" name="lang" value="zh-TW" >
								<input type="hidden" name="id" value="<?php echo $event->id ?>" >
								
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

<?php echo js($this->config->item('event_javascript'), 'event')?>
<?php echo js($this->config->item('event_ck_javascript'), 'event')?>

 
<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
	 
		// $('.date').datepicker({dateFormat: 'yy-mm-dd'}); 

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
		// $( 'textarea#introduction' ).ckeditor(config); 
		// $( 'textarea#rights' ).ckeditor(config); 
		// $( 'textarea#rule' ).ckeditor(config); 

		// $("#type,#lang").change(function() {   
  //  		   $.ajax({
  //               url: '<?php echo site_url(); ?>' + 'fuel/event/get_event_order/' + $("#lang").val() + '/' +$("#type").val() ,
  //               cache: false
		//         }).done(function (data) {            
	 //                var obj = $.parseJSON(data);
	 //                if (obj != null) {	     
		// 				$("#event_order").val(obj.total_rows);
	 //                }
		// 		});
		// 	});

		// $("#type").trigger('change');

	});
</script>