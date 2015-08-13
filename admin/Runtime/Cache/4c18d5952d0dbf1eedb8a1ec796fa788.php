<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<!-- login&index page -->
<html lang="zh-CN">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>融媒体中心招新|后台管理|登录</title>
<!--     <link href="__PUBLIC__/css/index.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='__PUBLIC__/css/jquery-ui.css'>
    <link rel='stylesheet prefetch' href='__PUBLIC__/css/bootstrap.min.css'>
    <link rel="stylesheet" href="__PUBLIC__/css/style.css" media="screen" type="text/css" />
    <script src="__PUBLIC__/js/modernizr.js"></script>
</head>

   <!--  <div class="container">
        <form class="form-signin" id="form" method="POST" action="<?php echo U('Index/handleLogin');?>">
            <h2>融媒体中心招新后台管理</h2>
            <input type="text" name="name" id="name" class="form-control" placeholder="用户名" required/>
            <input type="password" name="password" id="password" class="form-control" placeholder="密码" required/>
            <input class="btn btn-lg btn-primary btn-block" id="btnLogin" type="button" value="登录"/>
        </form>
    </div> -->
    <body class="login-page">
<div class="login-form">
        <div class="login-content" style="color:white;"><h3>融媒体中心招新|后台管理</h3></div>
        <div class="login-content">

          

            <form method="post" role="form" id="form_login">

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>

                        <input type="text" class="form-control" name="name" id="name" placeholder="Username" autocomplete="off" />
                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </div>

                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login" id="btnLogin">
                        <i class="fa fa-sign-in"></i>
                        Login In
                    </button>
                </div>



            
            </form>



    </div>
 </div>

    <script src="__PUBLIC__/js/jquery-1.11.3.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $("#btnLogin").click(function(){
        var name = $("#name").val();
        var password = $("#password").val();
        $.post("<?php echo U('Index/handleLogin');?>",{"name":name,"password":password},function(back){
            if (back.status == 0) {
                window.location.href="<?php echo U('Index/view');?>";
            }
            else if(back.status == 1){
                alert("用户名或密码错误，请重试");
                window.location.reload();
            }
            else{
                alert("未知错误，请联系管理员！");
                window.location.reload();
            }
        });
    });
    </script>
</body>
</html>