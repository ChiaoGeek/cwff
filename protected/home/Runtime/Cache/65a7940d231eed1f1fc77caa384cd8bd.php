<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/home/more.css"/>
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


            <div id="more">
              <!-- ---------------------------------------------- -->
                <!-- 1 -->
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item-entry">
                  <div class="title">
                      <a title="<?php echo ($vo["title"]); ?>" href="?m=Index&a=article&id=<?php echo ($vo["id"]); ?>&article_type=<?php echo ($article_model); ?>"><?php echo ($vo["title"]); ?></a>
                  </div>
                  <div class="datetime"><?php echo ($vo["createtime"]); ?></div>
                  <div class="summary" id="note_499319754_short">
                      <div class="ll">
                          <a href="http://www.douban.com/note/499319754/">
                            <img src="__ROOT__<?php echo (substr($vo["thumb_path"], 1)); echo ($vo["thumb_name"]); ?>" width="120px" height="80px" alt="" />
                          </a>
                      </div>
                      <?php echo (sub_string(0,'utf-8',strip_tags($vo["content"]),580)); ?>......
                  </div>
                  </div><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
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