<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/category/edit.html";i:1483977174;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/Public/header.html";i:1483977174;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/public/upload.html";i:1483977174;s:84:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/public/ueditor.html";i:1483977174;}*/ ?>
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

<style>
.admin_tab{background:#f8f8f8;overflow:hidden;border:1px #d2d2d2 solid;margin-bottom:8px;}
.admin_tab li{float:left;height:40px;line-height:40px;border-right:1px #f2f2f2 solid;}
.admin_tab li:last-child{border:none;}
.admin_tab li a{display:block;padding:0 20px;color:#333;font-size:12px;cursor:pointer;}
.admin_tab li a.active{background:white;font-weight:bold;border-top:1px #428bca solid;color:#428bca;}
.admin_tab_cont{display:none;margin:5px 0;overflow:hidden;}
</style>
<script type="text/javascript">
$(function(){
 $(".admin_tab li a").click(function(){
		  var liindex = $(".admin_tab li a").index(this);
		  $(this).addClass("active").parent().siblings().find("a").removeClass("active");
		  $(".admin_tab_cont").eq(liindex).fadeIn(150).siblings(".admin_tab_cont").hide();
		 });
		 
	})
</script>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><span>编辑栏目</span><span class="crumb-step">&gt;</span><span class="crumb-name"><?php echo $detail['catname']; ?></span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">

                <form action="<?php echo url('Category/update'); ?>" method="post"  id="form" enctype="multipart/form-data">
                    <input type="hidden" name="catid" value="<?php echo $detail['catid']; ?>" />
                    <ul class="admin_tab">
                    <li><a class="active">常规选项</a></li>
                    <li><a>高级选项</a></li>
                    </ul>
                    <div class="admin_tab_cont" style="display:block;">
                    
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120">上级栏目：</th>
                            <td>
                                 <select name="pid">
                                    <option value="0">顶级栏目</option>
                                    <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"0,8");if($vo['level']>= $_RANGE_VAR_[0] && $vo['level']<= $_RANGE_VAR_[1]):?><option value="<?php echo $vo['catid']; ?>" <?php if($vo['catid'] == $detail['pid']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat("└─",$vo['level']); ?><?php echo $vo['catname']; ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th>栏目名称：</th>
                                <td>
                                    <input class="common-text "  name="catname" size="50"  value="<?php echo $detail['catname']; ?>"  type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th>隐藏栏目：</th>
                                <td><input type="radio" name="ishidden" <?php if($detail['ishidden'] == 1): ?>checked="checked"<?php endif; ?> value="1" >隐藏&nbsp;&nbsp;&nbsp; <input type="radio" name="ishidden" value="0" <?php if($detail['ishidden'] == 0): ?>checked="checked"<?php endif; ?> >显示  </td>
                            </tr>
                             <tr>
                                <th>封面图片：</th>
                                <td>
                                  <div style=" margin-top:10px;">
                                    <div id="uploadimg">
                                        <div id="fileList" class="uploader-list" style="width: 100%; overflow: hidden;"></div>
                                        <div id="imgPicker">选择图片</div>
                                    </div>
                                   </div>
                                   <input id="select_picture" hidden="hidden" type="text" value="<?php echo $detail['thumb']; ?>" name="thumb"/>
                                   <script type="text/javascript" src="__PUBLIC__/webuploader/js/webuploader.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/webuploader/js/upload.js"></script>
<script>
var uploader = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: '__PUBLIC__/webuploader/js/Uploader.swf',

    // 文件接收服务端。
    server: '<?php echo url("Upload/picture"); ?>',

    pick: '#imgPicker',

    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    }
});

// 当有文件添加进来的时候
uploader.on( 'fileQueued', function( file ) {
    var $list = $("#fileList"),
        $li = $(
            '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
                '<div class="info">' + file.name + '</div>' +
            '</div>'
            ),
        $img = $li.find('img');


    $list.append( $li );

    
    uploader.makeThumb( file, function( error, src ) {
        if ( error ) {
            $img.replaceWith('<span>不能预览</span>');
            return;
        }
       
        $img.attr( 'src', src );
    }, 100, 100 );
});

uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress span');

    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<p class="progress"><span></span></p>')
                .appendTo( $li )
                .find('span');
    }

    $percent.css( 'width', percentage * 100 + '%' );
});

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
uploader.on( 'uploadSuccess', function( file,msg) {
	$('#select_picture').val(msg.path);
    $( '#'+file.id ).addClass('upload-state-done');
});

// 文件上传失败，显示上传出错。
uploader.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
        $error = $('<div class="error"></div>').appendTo( $li );
    }

    $error.text('上传失败');
});

// 完成上传完了，成功或者失败，先删除进度条。
uploader.on( 'uploadComplete', function( file) {
    $( '#'+file.id ).find('.progress').remove();
});

</script>
                                </td>
                            </tr>

                             <?php if(!(empty($detail['thumb']) || ($detail['thumb'] instanceof \think\Collection && $detail['thumb']->isEmpty()))): ?> 
                            <tr>
                                <th></th>
                                <td><a href="<?php echo $detail['thumb']; ?>" target="_blank"><img src="<?php echo $detail['thumb']; ?>" style="max-width:800px; max-height:100px;" /></a></td>
                            </tr>
                             <?php endif; ?>
                             <tr>
                                <th>栏目属性：</th>
                                <td><input type="radio" name="ispart" value="0" <?php if($detail['ispart'] == 0): ?>checked="checked"<?php endif; ?> >最终列表（允许发表文档） <input type="radio" name="ispart" value="1" <?php if($detail['ispart'] == 1): ?>checked="checked"<?php endif; ?> >频道封面（不允许发表文档） </td>
                            </tr>
                              <tr>
                                <th>封面模板：</th>
                                <td>
                                    <input class="common-text"  name="category" size="50"   value="<?php echo $detail['category']; ?>"    type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>列表模板：</th>
                                <td>
                                    <input class="common-text"  name="list" size="50"   value="<?php echo $detail['list']; ?>"    type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>文章模板：</th>
                                <td>
                                    <input class="common-text"  name="show" size="50"  value="<?php echo $detail['show']; ?>"  type="text">
                                </td>
                            </tr>
                        </tbody>
                        
                        </table>
                         
                    </div>
                    
                    
                     <div class="admin_tab_cont">
                    
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                                <th>关键词：</th>
                                <td>
                                    <input class="common-text "  name="keywords" value="<?php echo $detail['keywords']; ?>" size="110"  type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>描述：</th>
                                <td><textarea name="description" class="common-textarea"  style="width:800px; height:100px;"><?php echo $detail['description']; ?></textarea></td>
                            </tr>
                            
                            <tr>
                                <th>内容：</th>
                                <td style="padding-top:10px;"><script type="text/plain" id="myEditor"  style=" width:805px;height:200px;"><?php echo $detail['content']; ?></script></td>
                            </tr>
                            <link href="__PUBLIC__/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">      
var um = UM.getEditor('myEditor',{ 
		 UEDITOR_HOME_URL: "__PUBLIC__/ueditor/",
		 imageUrl: "<?php echo url('Upload/ueditor'); ?>",             
		 imagePath: "__ROOT__/",
		 textarea: 'content' });
</script>

                         
                         
                        </tbody>
                        
                        </table>
                    
                    </div>
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                        
                        </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>