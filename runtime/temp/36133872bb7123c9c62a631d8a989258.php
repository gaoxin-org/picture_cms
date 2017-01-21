<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/article/edit.html";i:1483977174;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/public/header.html";i:1483977174;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/public/upload.html";i:1483977174;s:84:"/Users/sunxuegao/dev_soft/www/picture_cms/application/admin/view/public/ueditor.html";i:1483977174;}*/ ?>
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

<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo url('Index/index'); ?>">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="<?php echo url('Article/index'); ?>">文章管理</a><span class="crumb-step">&gt;</span><span>修改文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo url('Article/update'); ?>" method="post" id="myform" name="myform" enctype="multipart/form-data" >
                 <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
                    <table class="insert-tab" width="100%">
                        <tbody>
                         <tr>
                                <th>栏目：</th>
                                <td>
                                    <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <input name="catid" onClick="chooseOne(this)" <?php if($vo['catid'] == $result['catid']): ?>checked="checked"<?php endif; ?> value="<?php echo $vo['catid']; ?>" type="checkbox">&nbsp;<?php echo $vo['catname']; endforeach; endif; else: echo "" ;endif; ?>
                                    </td>
                            </tr>
                                 <script>
                                 function chooseOne(catid){ 
								//先取得同name的chekcBox的集合物件 
								var obj = document.getElementsByName("catid"); 
								for (i=0; i<obj.length; i++){ 
								//判斷obj集合中的i元素是否為cb，若否則表示未被點選 
								if (obj[i]!=catid) obj[i].checked = false; 
								//若要至少勾選一個的話，則把上面那行else拿掉，換用下面那行 
								else obj[i].checked = true; 
								} 
								} 
                                 
                                 </script>
                            <tr>
                                <th>标题：</th>
                                <td>
                                    <input class="common-text" id="title" name="title" style=" width:800px;" onBlur="$.post('<?php echo url('Article/get_keywords'); ?>?number=3&sid='+Math.random()*5, {data:$('#title').val()}, function(data){if(data && $('#keywords').val()=='') $('#keywords').val(data); })"  value="<?php echo $result['title']; ?>" type="text">
                                </td>
                            </tr>
                             <tr>
                                <th>关键词：</th>
                                <td>
                                    <input class="common-text" id="keywords" name="keywords" style=" width:400px;"  value="<?php echo $result['keywords']; ?>" type="text">多关键词之间用空格或者“,”隔开
                                </td>
                            </tr>
                                <tr>
                                <th>缩略图：</th>
                                <td>
                                 <div style="margin-top:10px;">
                                    <div id="uploadimg">
                                        <div id="fileList" class="uploader-list" style="width: 100%; overflow: hidden;"></div>
                                        <div id="imgPicker">选择图片</div>
                                    </div>
                                </div>
                                <input id="select_picture" hidden="hidden" type="text" value="<?php echo $result['thumb']; ?>" name="thumb"/>
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
                            <?php if(!(empty($result['thumb']) || ($result['thumb'] instanceof \think\Collection && $result['thumb']->isEmpty()))): ?>
                              <tr>
                               <th></th>
                              <td><img src="<?php echo $result['thumb']; ?>" style="max-width:400px; max-height:100px;" /></td>
                              </tr>
                              <?php endif; ?>
                               <tr>
                                <th>描述：</th>
                                <td><textarea name="description" class="common-textarea" id="description"  style="width:800px; height:100px;"><?php echo $result['description']; ?></textarea></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td style="padding-top:10px;"><script type="text/plain" id="myEditor"  style=" width:805px;height:200px;"><?php echo $result['content']; ?></script></td>
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

                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10"  value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
