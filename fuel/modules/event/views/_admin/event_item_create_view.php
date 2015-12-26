<?php echo css($this->config->item('event_item_css'), 'event')?> 
<?php echo css($this->config->item('event_upload_css'), 'event')?> 


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

 
 <div class="main_width">

    <div class="main_body">

        <div class="right_side1">

            <div class="sys_right_name"><?php echo $event->title ?></div>

            <div class="sys_right_name">Step2 請上傳圖片與輸入文字資料</div>

            <div class="add_screen">

                <?php if (isset($event_items)): ?>

                <?php if (sizeof($event_items) > 0): ?> <!-- edit -->
                    <?php $i = 1; ?>
                    <?php foreach ($event_items as $key => $value): ?>
                        
                         <div id="edit_add_block_<?php echo $i; ?>" class="main_720">

                            <div class="edit_block">

                                <div class="edit_content">

                                    第&nbsp;<input type="text" name="sortOrder_<?php echo $i; ?>" class="edit_sequence" value="<?php echo $value->sort_order ?>">&nbsp;題

                                </div>

                            </div>

                            <div class="edit_block">

                                <div class="edit_title">大標題</div>

                                <div class="edit_input"><input type="text" name="title_<?php echo $i; ?>" value="<?php echo $value->title ?>"></div>

                            </div>

                            <div class="edit_block">

                                <div class="edit_title">副標題</div>

                                <?php $sub_ary = explode(";", $value->sub_title); ?>

                                <div class="edit_input"><input type="text" name="subTitle_<?php echo $i; ?>[]" value="<?php echo $sub_ary[0] ?>"></div><span class="edit2_add_icon fa fa-plus-circle" data-num="<?php echo $i; ?>"></span>
                                <?php for ($j=1;$j<sizeof($sub_ary);$j++): ?>
                                    <div class="edit_input"><input type="text" name="subTitle_<?php echo $i; ?>[]" value="<?php echo $sub_ary[$j] ?>"></div> 
                                <?php endfor ?>
                            </div>

                        
                                <div class="edit_block">

                                    <div class="edit_title">圖片上傳</div>

                                    <input type="file" name="file_<?php echo $i; ?>" id="file_<?php echo $i; ?>" class="inputfile inputfile-6"/>

                                    <label for="file_<?php echo $i; ?>"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                                    <!-- <div class="file_desc">圖片規格：600 x 600</div> -->

                                </div>

                                <?php if (isset($value->photo_path) && "" != $value->photo_path): ?>
                                <div class="edit_block"> 
                                    <img style="max-width:350px;height:auto" src="<?php echo site_url()."assets/".$value->photo_path; ?>" />        
                                    <input type="hidden" value="<?php echo $value->photo_path; ?>" name="exist_photo_path_<?php echo $i; ?>" />       
                                </div>
                                <?php endif ?> 

                                <div class="edit_block">

                                    <div class="edit_title">裁切圖片上傳</div>

                                    <input type="file" name="sfile_<?php echo $i; ?>" id="sfile_<?php echo $i; ?>" class="inputfile inputfile-6"/>

                                    <label for="sfile_<?php echo $i; ?>"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                                    <!-- <div class="file_desc">圖片規格：600 x 600</div> -->

                                </div>

                                <?php if (isset($value->sphoto_path) && "" != $value->sphoto_path): ?>
                                <div class="edit_block"> 
                                    <img style="max-width:350px;height:auto" src="<?php echo site_url()."assets/".$value->sphoto_path; ?>" />        
                                    <input type="hidden" value="<?php echo $value->sphoto_path; ?>" name="exist_sphoto_path_<?php echo $i; ?>" />       
                                </div>
                                <?php endif ?> 

                                <div class="edit_block">

                                    <div class="edit_title">圖片遊標懸停文字</div>

                                    <div class="edit_input1"><input type="text" name="placeholder_<?php echo $i; ?>" value="<?php echo $value->placeholder ?>"></div>

                                </div>

                                <input type="hidden" value="<?php echo $value->id; ?>" name="id_<?php echo $i; ?>" />       
                              
                           

                            <div class="next_step">預覽前端頁面</div>

                        </div>
                        <?php $i++ ?>
                    <?php endforeach ?>

              

                <?php endif ?>

                  <?php else: ?><!-- add -->

                 <div id="edit_add_block_1" class="main_720">

                    <div class="edit_block">

                        <div class="edit_content">

                            第&nbsp;<input type="text" name="sortOrder_1" class="edit_sequence">&nbsp;題

                        </div>

                    </div>

                    <div class="edit_block">

                        <div class="edit_title">大標題</div>

                        <div class="edit_input"><input type="text" name="title_1"></div>

                    </div>

                    <div class="edit_block">

                        <div class="edit_title">副標題</div>

                        <div class="edit_input"><input type="text" name="subTitle_1[]"></div><span class="edit2_add_icon fa fa-plus-circle" data-num="1"></span>

                    </div>

                
                        <div class="edit_block">

                            <div class="edit_title">圖片上傳</div>

                            <input type="file" name="file_1" id="file_1" class="inputfile inputfile-6"/>

                            <label for="file_1"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                            <!-- <div class="file_desc">圖片規格：600 x 600</div> -->

                        </div>
                        <div class="edit_block">

                            <div class="edit_title">裁切圖片上傳</div>

                            <input type="file" name="sfile_1" id="sfile_1" class="inputfile inputfile-6"/>

                            <label for="sfile_1"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>

                            <!-- <div class="file_desc">圖片規格：600 x 600</div> -->

                        </div>
                        <div class="edit_block">

                            <div class="edit_title">圖片遊標懸停文字</div>

                            <div class="edit_input1"><input type="text" name="placeholder_1"></div>

                        </div>

                   
                    <input type="hidden" value="" name="id_1" />    

                    <div class="next_step">預覽前端頁面</div>

                </div>
                    
                <?php endif ?>

               

            </div>

            <div class="edit_add_block_outside">
                <input type="hidden" name="event_id" value="<?php echo $event->id ?>" >
                <input type="hidden" name="type" value="P" >
                <div class="edit_add"><span id="edit_add_icon" class="fa fa-plus-circle"></span>新增下一題</div>

                <div class="edit_submit" id="submit">送出</div>

            </div>

        </div>

    </div>

</div>
		 
 

<?php echo js($this->config->item('event_javascript'), 'event')?>
<?php echo js($this->config->item('event_item_javascript'), 'event')?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>]
<script id="form-template" type="text/x-handlebars-template">
 <div id="edit_add_block_{{this.Num}}" class="main_720">
    <div class="edit_block">
        <div class="edit_content">
            第&nbsp;<input type="text" name="sortOrder_{{this.Num}}" class="edit_sequence">&nbsp;題
        </div>
    </div>
    <div class="edit_block">
        <div class="edit_title">大標題</div>
        <div class="edit_input"><input type="text" name="title_{{this.Num}}"></div>
    </div>
    <div class="edit_block">
        <div class="edit_title">副標題</div>
        <div class="edit_input"><input type="text" name="subTitle_{{this.Num}}[]"></div><span class="edit2_add_icon fa fa-plus-circle" data-num="{{this.Num}}"></span>
    </div>
        <div class="edit_block">
            <div class="edit_title">圖片上傳</div>
            <input type="file" name="file_{{this.Num}}" id="file_{{this.Num}}" class="inputfile inputfile-6"/>
            <label for="file_{{this.Num}}"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>
            <!-- <div class="file_desc">圖片規格：600 x 600</div> -->
        </div>
        <div class="edit_block">
            <div class="edit_title">裁切圖片上傳</div>
            <input type="file" name="sfile_{{this.Num}}" id="sfile_{{this.Num}}" class="inputfile inputfile-6"/>
            <label for="sfile_{{this.Num}}"><span></span><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></strong></label>
            <!-- <div class="file_desc">圖片規格：600 x 600</div> -->
        </div>
        <div class="edit_block">
            <div class="edit_title">圖片遊標懸停文字</div>
            <div class="edit_input1"><input type="text" name="placeholder_{{this.Num}}" ></div>
        </div>

        <input type="hidden" value="" name="id_{{this.Num}}" />    
    <div class="next_step">預覽前端頁面</div>
</div>
</script>
 
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	  $(document).ready(function () {

	  	$j("#submit").click(function(event) {
			$j("#form").submit();
		});

	    $(".edit2_add_icon").click(function () { 
            var num = parseInt($(this).data('num'));
            $(this).parent().append("<div class='edit_input'><input type='text' name='subTitle_"+num+"[]'></div>");

	    });

	    $(".edit_add").click(function () {

	        // var $div = $('div[id^="edit_add_block_1"]:last');

            var $addScreenDiv = $('.add_screen');

	        var num = $addScreenDiv.children().length+1;//parseInt($div.prop("id").match(/\d+/g), 10) + 1;

            // console.log($addScreenDiv.children().length);

            var source   = $("#form-template").html();

            var template = Handlebars.compile(source);
            var context = {Num: num};
            var html    = template(context);

            $addScreenDiv.append(html);

	        // $div.clone().find("input").val("").end().prop('id', 'edit_add_block' + num).appendTo(".add_screen").hide().fadeIn(300);



	        $(".edit2_add_icon").click(function () {

	        	// var $div = $('div[id^="edit_add_block_1"]:last');

    	        // var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
                var num = parseInt($(this).data('num'));

	            $(this).parent().append("<div class='edit_input'><input type='text' name='subTitle_"+num+"[]'></div>");

	        });

	    });



	});
</script>