<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/tag/index.html";i:1483977174;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/public/header.html";i:1484838068;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/webuploader/css/webuploader.css">
    <script type="text/javascript" src="__PUBLIC__/admin/js/jquery-1.10.2.min.js"></script>
    
    <script type="text/javascript">
      function selectall(name) {
	if($("#check_box").prop('checked')== true) {
		$("input[name='"+name+"']").each(function() {
  			$(this).prop('checked',true);
			
		});
	} else {
		$("input[name='"+name+"']").each(function() {
  			$(this).removeAttr("checked");
		});
	}
   } 
      </script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo"><a href="<?php echo url('Index/index'); ?>" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="__ROOT__" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="<?php echo url('Admin/password'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('Common/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                    	<li><a href="<?php echo url('Scrollpicture/index'); ?>"><i class="icon-font">&#xe005;</i>轮播图管理</a></li>
                        <li><a href="<?php echo url('Article/index'); ?>"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="<?php echo url('Category/index'); ?>"><i class="icon-font">&#xe005;</i>栏目管理</a></li>
                        <li><a href="<?php echo url('Tag/index'); ?>"><i class="icon-font">&#xe005;</i>TAG管理</a></li>
                        <li><a href="<?php echo url('Attachment/index'); ?>"><i class="icon-font">&#xe005;</i>附件管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo url('System/set'); ?>"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="<?php echo url('Common/cache'); ?>"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->



<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">TAG管理</span></div>
        </div>
       
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a  onclick="myform.action='<?php echo url('Tag/delete'); ?>';myform.submit();" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" id="check_box" onclick="selectall('tagid[]');" type="checkbox"></th>
                            <th>TAG</th>
                            <th width="100">点击</th>
                            <th width="100">文章</th>
                            <th width="100">操作</th>
                        </tr>
                       <?php if(is_array($tag_list) || $tag_list instanceof \think\Collection): if( count($tag_list)==0 ) : echo "" ;else: foreach($tag_list as $key=>$vo): ?>
                        <tr>
                            <td class="tc"><input name="tagid[]" value="<?php echo $vo['tagid']; ?>" type="checkbox"></td>
                            <td><a href="__ROOT__/index.php/Tag/show.html?tag=<?php echo urlencode($vo['tag']); ?>" target="_blank"><?php echo $vo['tag']; ?></a></td>
                            <td align="center"><?php echo $vo['hits']; ?></td>
                            <td align="center"><?php echo $vo['count']; ?></td>
                            <td align="center">
                                <a class="link-del" href="<?php echo url('Tag/delete',['tagid'=>$vo['tagid']]); ?>">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                       
                    </table>
                    <tr><td colspan="3"><?php echo $page; ?></td></tr>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
  
</div>
</body>
</html>