<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/login/login.html";i:1483977174;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link href="__PUBLIC__/admin/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="<?php echo url('Login/doLogin'); ?>" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="username">用户名：</label>
                        <input type="text" name="username" id="username" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="password">密码：</label>
                        <input type="password" name="password"  id="password" size="40" class="admin_input_style" />
                    </li>
                     <li>
                        <label for="code">验证码：</label>
                        <input type="text" name="code" style="display:inline; float:left;" maxlength="4"  id="code" size="10" class="admin_input_style" /><img src="<?php echo url('Login/captcha'); ?>" alt="captcha" title="看不清？点击刷新" style="display:inline; width:120px; height:40px; float:left; margin-left:10px; cursor:pointer;" onClick="this.src='<?php echo url('Login/captcha'); ?>?rand='+Math.random()" />
                    </li>
                    <li>
                        <input type="submit"  value="登录" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a  href="__ROOT__" target="_blank">返回首页</a> &copy; 2014 </p>
</div>
</body>
</html>