<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/home/article.css"/>
<link rel="stylesheet" href="__ROOT__/public/plugin/menu/css/superfish.css" media="screen">
<script type="text/javascript" src="__ROOT__/public/js/home/jquery.SuperSlide.2.1.js"></script>
<script src="__ROOT__/public/plugin/menu/js/jquery.js"></script>
<script src="__ROOT__/public/plugin/menu/js/hoverIntent.js"></script>
<script src="__ROOT__/public/plugin/menu/js/superfish.js"></script>
<script type="text/javascript" src="__ROOT__/public/js/home/jquery.min.js"></script>
<script src="__ROOT__/public/plugin/menu_fixed/posfixed.js"></script>
<title>中国女性影展</title>
  <script>

    (function($){ //create closure so we can safely use $ as alias for jQuery

      $(document).ready(function(){

           $('.sun').on('mouseover', function(){
          $(this).prev('a').css('color', 'black');
        });

        $('.sun').on('mouseleave', function(){
          $(this).prev('a').css('color','#b2c5eb');
          //alert(1);
        });

        $('.parent').on('mouseover', function(){
          $(this).children('a').css('color', 'black');
        });

        $('.parent').on('mouseleave', function(){
          $(this).children('a').css('color', '#b2c5eb');
        });
/*
        // initialise plugin
        var example = $('#example').superfish({
          //add options here if required
        });

     
        //--------------------------------- 
    */    
        $('#menu').posfixed({
    distance : 0,
    pos : 'top',
    type : 'while',
    hide : false
  });

      });

    })(jQuery);




    </script>
</head>

<body>
  <!-- header start -->
      <div id="banner"></div>
      <div id="menu"> 
        <div id="menu_content">    
            <?php echo ($menu); ?>
          </div>  
      </div>
  <!-- header end  -->

  <!-- main start -->
    <div id="main">
      <div id="content1">
        <div id="left">
            <div id="nav">
              <div id="nav_blank"></div>
              <div id="nav_content">
                <ul class="meta-single">
                    <li class="category">
                      <a href="?m=Index" rel="category tag">首页</a>
                        <?php echo ($navgation); ?>                    
            </li>
                 </ul>
              </div>
            </div>

            <div id="title">
              <h1 class="post-title"><?php echo (($value["title"])?($value["title"]):'暂时没有文章'); ?></h1>
            </div>

            <div id="article_info">
              <p>时间：<?php echo ($value["createtime"]); ?> · 点击量：<?php echo ($value["time"]); ?></p>
              <div class="bshare-custom icon-medium" style="float: right;"><a title="分享到豆瓣" class="bshare-douban"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到微信" class="bshare-weixin"></a><a title="分享到搜狐微博" class="bshare-sohuminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
            </div>

            <div id="article">
              <!-- ---------------------------------------------- -->
              
              <?php echo (($value["content"])?($value["content"]):'暂时没有文章'); ?>
              <!-- ---------------------------------------------- -->


            </div>
        </div>

        <div id="right">
          <div id="right_up">
            <a href="#"><img src="__ROOT__/public/images/home/logo1.jpg" width="180px" height="171px"></a>
          </div>
         
          <div id="words">
            <p1><br /><br /><br /><br />
            【女性导演×女性主义的电影】-中国女性影展旨在为国内女性导演提供一个影像展示平台；让喜爱女性主义电影的影迷跨越时空阻隔相互交流与学习。
            </p1>
        </div>
        </div>
        <div style="clear:both;"></div>
       
      </div>
    </div>
  <!-- main end -->

    <div id="footer"></div>


</body>
</html>