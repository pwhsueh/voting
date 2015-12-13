<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" /> <!-- 於手機觀看時不會自動放大 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 最佳的IE兼容模式 -->
        <meta property="og:site_name" content="滬江高中投票平台" />
        <meta property="fb:app_id" content="1398146363817437" />
        <title>滬江高中投票平台</title>
        <!--<link href="css/main.css" rel="stylesheet" type="text/css" />
        <link href="css/mobile.css" rel="stylesheet" media="only screen and (max-device-width:500px)"/>
        <!--link font awesome to use the icon-->
        <link href="<?php echo site_url()?>assets/include/css/main.css" rel="stylesheet">
        <link href="<?php echo site_url()?>assets/include/css/responsivemobilemenu.css" rel="stylesheet">
        <link href="<?php echo site_url()?>assets/include/js/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo site_url()?>assets/include/js/jquery-ui.theme.min.css" rel="stylesheet">
        <link href="<?php echo site_url()?>assets/include/css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/jquery.masonry.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/responsivemobilemenu.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/CSSPlugin.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/EasePack.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/TweenLite.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url()?>assets/include/js/imagesloaded.min.js"></script>

    <body>

<?php $this->load->view("_blocks/top")?> 
       
 <?php 
	if(isset($views)){
		$this->load->view($views);
	}
	else
	{
		define('FUELIFY', FALSE);
		echo fuel_var('body', '');
	}
?>
 
<?php $this->load->view("_blocks/foot")?> 

    </body>
</html>

<script>

    function fontResize() {

        var perc = parseInt($(window).width()) / 125;

        $('body').css('font-size', perc);

    }

    $(document).ready(function () { 
        fontResize(); 
    });



    $(window).resize(function () { 
        fontResize(); 
    });


</script>