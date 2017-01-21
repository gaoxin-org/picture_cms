<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/Users/sunxuegao/dev_soft/www/picture_cms/application/index/view/index/index.html";i:1484835064;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/index/view/public/header.html";i:1484458172;s:83:"/Users/sunxuegao/dev_soft/www/picture_cms/application/index/view/public/footer.html";i:1484459568;}*/ ?>
﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,minimal-ui,maximum-scale=1.0,user-scalable=no"/>
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes" />
<title><?php echo $seo['title']; ?></title>
<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
<meta name="description" content="<?php echo $seo['description']; ?>">
<link href="__PUBLIC__/2016/css/common.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/2016/css/layout.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="zheaderposition">
  <div class="zheadercont">
    <div class="web clearfix">
      <div class="wwheadrightbox">
        <div class="wheadrighttop clearfix">
          <a class="wwphnavicon" href="javascript:;"></a>
          <a class="wwsearchph" href="javascript:;"></a>
          
          <!--搜索start-->
          <div class="wwsearch hidden-sm">
            <div class="wwsearchcon">
            <form action="__ROOT__/index.php/Search/index.html" method="get">
              <input class="wwsearchtext" name="q" type="text" value="" />
              <input class="wwsearchbut" type="submit" value="" />
              </form>
            </div>
          </div>
          <!--搜索 end-->
         
        </div>
        <!-- 头部栏目 start-->
        <div class="wwnav clearfix">
          <ul class="clearfix">
            <li>
              <h3 class="yjchan">
                <a href="__ROOT__/">首页</a>
              </h3>
            </li>
           
           <?php if(is_array($categorys) || $categorys instanceof \think\Collection): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
            <li>
              <h3 class="yjchan">
                <a href="<?php echo $ca['url']; ?>"><?php echo $ca['catname']; ?></a>
                <span></span>
              </h3>
              <div class="wwnavlist">
                <?php if(is_array($ca['sub']) || $ca['sub'] instanceof \think\Collection): $i = 0; $__LIST__ = $ca['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                <div class="wwnavdrop">
                  <h4><a href="<?php echo $sub['url']; ?>"><?php echo $sub['catname']; ?></a></h4>   
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
           
            
          </ul>
        </div>
        <!-- 头部栏目 end-->
      </div>
      <a class="wwlogo" href="__ROOT__">
        <img src="__PUBLIC__/2016/picture/logo.jpg" />
      </a>
     
    </div>
  </div>
</div>


    <!--轮播图start-->
    <!-- <div class="wwindexbanner swiper-container-horizontal">
        <ul class="swiper-wrapper clearfix">
            
            <li class="swiper-slide" mod-img="__PUBLIC__/2016/picture/banner1.jpg" pc-img="__PUBLIC__/2016/picture/banner1.jpg"><a href="javascript:;">
                <img src="__PUBLIC__/2016/picture/banner1.jpg" /></a></li>
            
            <li class="swiper-slide" mod-img="__PUBLIC__/2016/picture/banner2.jpg" pc-img="__PUBLIC__/2016/picture/banner2.jpg"><a href="javascript:;">
                <img src="__PUBLIC__/2016/picture/banner2.jpg" /></a></li>
            
            <li class="swiper-slide" mod-img="__PUBLIC__/2016/picture/banner3.jpg" pc-img="__PUBLIC__/2016/picture/banner3.jpg"><a href="javascript:;">
                <img src="__PUBLIC__/2016/picture/banner3.jpg" /></a></li>
            
            <li class="swiper-slide" mod-img="__PUBLIC__/2016/picture/banner4.jpg" pc-img="__PUBLIC__/2016/picture/banner4.jpg"><a href="javascript:;">
                <img src="__PUBLIC__/2016/picture/banner4.jpg" /></a></li>
            
            <li class="swiper-slide" mod-img="__PUBLIC__/2016/picture/banner5.jpg" pc-img="__PUBLIC__/2016/picture/banner5.jpg"><a href="javascript:;">
                <img src="__PUBLIC__/2016/picture/banner5.jpg" /></a></li>
            
        </ul> -->
        <div class="wwindexbannerbtn"></div>
    </div>
    <!--轮播图end-->


    <!--content-->
    <div class="wwmain">
        <div class="wwmaincon">
        <?php if(is_array($indexCate) || $indexCate instanceof \think\Collection): $i = 0; $__LIST__ = $indexCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
            <div class="wwindexnews indexpos">
                <div class="web">
                    <h3 class="wwindextit"><a href="<?php echo $ca['url']; ?>"><?php echo $ca['p_name']; ?></a></h3>
                    <ul class="clearfix">
                        
                       <?php if(is_array($ca['sub']) || $ca['sub'] instanceof \think\Collection): $i = 0; $__LIST__ = $ca['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?>
                        <li class="col-sm-6 col-lg-3">
                            <a href="<?php echo $info['url']; ?>">
                                <span><img src="<?php echo $info['thumb']; ?>" height="220" /></span>
                                <h4><?php echo $info['title']; ?></h4>
                                <p><?php echo $info['description']; ?></p>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </ul>
                    <p class="wwindexnewmore"><a href="/index.php/Category/show/catid/<?php echo $ca['subid'][0]; ?>">了解更多</a></p>
                </div>
            </div>
          <?php endforeach; endif; else: echo "" ;endif; ?>
            
        </div>
    </div>



    <!--content-->

    
<!--footer-->

<div class="footer">
  <div class="commonweb footerWeb">
    <ul class="clearfix yj_chan" id="wwfootone">
      
      <?php if(is_array($categorys) || $categorys instanceof \think\Collection): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
      <li class="li1">
        <h3>
          <a href="<?php echo $ca['url']; ?>"><?php echo $ca['catname']; ?></a>
          <em></em>
        </h3>
        <ul class="wwfootdrop er_chan" id="wwfoottwo">
        <?php if(is_array($ca['sub']) || $ca['sub'] instanceof \think\Collection): $i = 0; $__LIST__ = $ca['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
          <li> <h4><a href="<?php echo $sub['url']; ?>"><?php echo $sub['catname']; ?></a></h4></li>
         <?php endforeach; endif; else: echo "" ;endif; ?> 
        </ul>
      </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>

      <!-- <li class="li2">
        <p>扫描二维码，关注我们</p>
        <p class="code-img">
          <img src="__PUBLIC__/2016/picture/wqp_img10.jpg">
        </p>
        <p class="tel">
          客服热线：<a href="tel:10086">10086</a>
        </p>
      </li> -->
    </ul>
  </div>
</div>

<div class="footerBottom">
  <div class="commonweb clearfix">
    <div class="footer-text">
      <a href="javascript:;">联系我们</a>|<a href="javascript:;">网站地图</a>|<a href="javascript:;">关于我们</a>
    </div>
    <p class="footer-right">
      © 2016 版权所有
    </p>
  </div>
</div>



<!---footer end-->
<script src="__PUBLIC__/2016/js/jquery-1.12.2.min.js"></script>
<script src="__PUBLIC__/2016/js/idangerous.swiper.min.js"></script>
<script src="__PUBLIC__/2016/js/layout.js"></script>

<div class="rightmenu">
	<?php if(is_array($indexCate) || $indexCate instanceof \think\Collection): $i = 0; $__LIST__ = $indexCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
        <div class="ico-box ico0<?php echo $i; ?> wwico-box">
            <a href="javascript:;" class="ico-cont ico-cont0<?php echo $i; ?>"><?php echo $ca['p_name']; ?></a>
        </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- <div class="ico-box ico02 wwico-box">
            <a href="javascript:;" class="ico-cont ico-cont02">关于我们</a>
        </div>
        <div class="ico-box ico03 wwico-box">
            <a href="javascript:;" class="ico-cont ico-cont03">产品展示</a>
        </div>
        <div class="ico-box ico04 wwico-box">
            <a href="javascript:;" class="ico-cont ico-cont04">形象展示</a>
        </div>
        <div class="ico-box ico05 wwico-box">
            <a href="javascript:;" class="ico-cont ico-cont05">企业文化</a>
        </div> -->
        <div class="ico-box ico06 backtop"></div>
</div>
 <script>
       
		$(function () {


    //-------- 导航 --------


    //-------- 判断分辨率 --------

    $(window).resize(function () {

    })

    $(window).load(function () {
        positioncont2();
        $(window).resize(function () {
            positioncont2();
        })
    })

    function positioncont2() {

        var overflowwid2 = $("body").css("overflow", "hidden").width();
        var windowwid2 = $("body").removeAttr("style").width();
        var scrollwid2 = overflowwid2 - windowwid2;
		
		if (windowwid2 + scrollwid2 > 991) {
            $('.rightmenuin').addClass('rightmenuins')
			$('.rightmenu').show();
        }
        else {
            $('.rightmenuin').removeClass('rightmenuins')
			$('.rightmenu').hide();
        };
		
		
	}
	
	})	
    </script>
</body>
</html>
