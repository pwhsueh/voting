<link href="<?php echo site_url()?>assets/include/js/input_tel/css/intlTelInput.css" rel="stylesheet">
<link href="<?php echo site_url()?>assets/include/js/input_tel/css/prism.css" rel="stylesheet">



<div class="main_width">

    <center>
		<form method="POST" action="<?php echo $do_register_url ?>" id="register_form">
        <div class="main_block">

            <!--<div class="head_path"><a href="<?= $index_url ?>">首頁</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;登入</div>-->

            <div class="main_title">

                <div class="title_eng">Voting Introduction</div>

                <div class="title_tw">建立滬江投票系統帳戶</div>

            </div>

            <div class="main_login_detail">

                <!--<div class="login_alert"><span class="fa fa-exclamation-circle"></span>&nbsp;必需登入才能投票</div>-->

                <div class="register_text">電子郵件地址</div>

                <div class="register_input"><input type="text" name="email"></div>

                <div class="register_text">建立密碼</div>

                <div class="register_input"><input type="password" name="password" id="password"></div>

                <div class="register_text">確認密碼</div>

                <div class="register_input"><input type="password" name="confirm_password"></div>

                <div class="register_text">生日</div>

                <div class="register_input year"><input type="text" placeholder="年" name="year" onkeypress="return isNumberKey(event)" maxlength="4" aria-invalid="false"></div>

                <div class="register_input month">

                    <select class="select" name="month">

                        <option value="0">月</option>

                        <?php

                        for ($i = 1; $i <= 12; $i++) {

                            echo "<option value='" . $i . "'>" . $i . "</option>";

                        }

                        ?>

                    </select>

                </div>

                <div class="register_input day"><input type="text" placeholder="日" name="day" onkeypress="return isNumberKey(event)" maxlength="2" aria-invalid="false"></div>

                <div class="register_text">性別</div>

                <div class="register_input">

                    <select class="select" name="sex">

                        <option value="1">男</option>

                        <option value="2">女</option>

                    </select>

                </div>

                <div class="register_text">電話</div>

                <div class="register_input tel"><input id="phone" type="tel" name="phone"></div>
                <input type="hidden" name="area_code" value="886">
                <div class="register_text">輸入驗證碼</div>

                <div class="register_input pass"><input type="input" name="verificationcode"></div>
			 <?php 

                $num1 = rand(0, 9);
                $num2 = rand(0, 9);
                $num = $num1 + $num2;
             ?>
                <div class="register_input pass"><?php echo $num1 ?> + <?php echo $num2 ?></div>

                <div class="register_button" id="submit">確認送出</div>

            </div>

        </div>
        </form>
    </center>

</div>

<script type="text/javascript" src="<?php echo site_url()?>assets/include/js/input_tel/js/intlTelInput.min.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.browser.js"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.validate.min.js"></script>
<script>
 
	$.validator.methods.equal = function(value, element, param) {
        return value == param;
    };

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
		  return arg != value;
    }, "Value must not equal arg.");

    $(document).ready(function () {

    	var $form = $("#register_form");

    	$("#submit").click(function(event) {
    		/* Act on the event */
 
  			$(".area_code").val($("#phone").intlTelInput("getSelectedCountryData").dialCode)
    		$form.submit();
    	});
 

         $form.validate({
            rules: {
                email: "required",
                password : {
                    minlength : 5
                },
                confirm_password: {
                    minlength : 5,
                    equalTo : "#password"
                },
                year: "required",  
   				month: { valueNotEquals: "0" },
                day: "required",
                phone: "required",
                verificationcode: {
                    equal: <?php echo $num ?>   
                }
            },
            messages: {
                email: "請輸入電子郵件地址",
                password: "密碼至少五碼",
                confirm_password : {
                	equalTo : "請確認密碼輸入相同"
                },
                year: "請輸入生日(年)",  
                month: "請輸入生日(月)",  
                day: "請輸入生日(日)",  
                phone: "請輸入電話",  
                verificationcode: "驗證碼錯誤"
            }
        });

        $("#phone").intlTelInput({

            defaultCountry: "auto",

            geoIpLookup: function (callback) {

                $.get('http://ipinfo.io', function () {

                }, "jsonp").always(function (resp) {

                    var countryCode = (resp && resp.country) ? resp.country : "";
                    var countryData = $("#phone").intlTelInput("getSelectedCountryData"); 
                    // console.log(countryData2);
                    callback(countryCode);

                });

            },

            utilsScript: "../../lib/libphonenumber/build/utils.js" // just for formatting/placeholders etc

        });

    });


 

</script>