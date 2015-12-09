 <div class="main_width">

            <center>
                <form method="POST" action="<?php echo $do_login_url ?>" id="login_form">
                <div class="main_block">

                    <!--<div class="head_path"><a href="<?= $index_url ?>">首頁</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;登入</div>-->

                    <div class="main_title">

                        <div class="title_eng">Voting Introduction</div>

                        <div class="title_tw">請登入後投票</div>

                    </div>

                    <div class="main_login_detail">

                        <!--<div class="login_alert"><span class="fa fa-exclamation-circle"></span>&nbsp;必需登入才能投票</div>-->

                        <div class="facebook_login">Facebook登入&nbsp;<span class="fa fa-thumbs-o-up"></span></div>

                        <div class="login_email"><input type="input" name="login_mail" class="login_email_search" placeholder="E-mail" autocomplete="off"></div>

                        <div class="login_password"><input type="password" name="login_password" class="login_password_search" placeholder="密碼" autocomplete="off"></div>

                        <div class="remember_block">

                            <div class="remember_me"><input type="checkbox" value="remember" class="remember_me_check"><div class="remember_me_text">記得我</div></div>

                            <div class="forget_password">忘記密碼</div>

                        </div>

                        <div class="login_button" id="submit">登入</div>

                        

                        <div class="register_button" id="go_register">註冊新帳號並登入</div>

                    </div>

                </div>
                </form>
            </center>

        </div>
<script>
 
    

    $(document).ready(function () {

        var $form = $("#login_form");

        $("#submit").click(function(event) {
            /* Act on the event */
  
            $form.submit();
        });

        $("#go_register").click(function(event) {
            window.location = "<?php echo site_url().'register' ?>";
        });
  

    });


 

</script>