<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="__ROOT__/public/css/home/index.css"
        />
        <link rel="stylesheet" href="__ROOT__/public/plugin/menu/css/superfish.css"
        media="screen">
        <script type="text/javascript" src="__ROOT__/public/js/home/jquery.SuperSlide.2.1.js">
        </script>
        <script src="__ROOT__/public/plugin/menu/js/jquery.js">
        </script>
        <script src="__ROOT__/public/plugin/menu/js/hoverIntent.js">
        </script>
        <script src="__ROOT__/public/plugin/menu/js/superfish.js">
        </script>
        <script type="text/javascript" src="__ROOT__/public/js/home/jquery.min.js">
        </script>
        <script src="__ROOT__/public/plugin/menu_fixed/posfixed.js">
        </script>
        <title>
            中国女性影展
        </title>
        <script>
            (function($) { //create closure so we can safely use $ as alias for jQuery
                $(document).ready(function() {
                    $('.sun').on('mouseover',
                    function() {
                        $(this).prev('a').css('color', 'black');
                    });
                    $('.sun').on('mouseleave',
                    function() {
                        $(this).prev('a').css('color', '#b2c5eb');
                        //alert(1);
                    });
                    $('.parent').on('mouseover',
                    function() {
                        $(this).children('a').css('color', 'black');
                    });
                    $('.parent').on('mouseleave',
                    function() {
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
                        distance: 0,
                        pos: 'top',
                        type: 'while',
                        hide: false
                    });
                });
            })(jQuery);
        </script>
    </head>
    
    <body>
        <!-- header start -->
        <div id="banner">
        </div>
        <div id="menu">
            <div id="menu_content">
                <?php echo ($menu); ?>
            </div>
        </div>
        <!-- header end -->
        <!-- main start -->
        <div id="main">
            <div id="blank_1">
            </div>
            <!-- mian_up start -->
            <div id="main_up">
                <div id="main_up_left">
                    <iframe src="?m=Index&a=frame_img_show" width="692px" height="460px" frameborder="no"
                    border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes">
                    </iframe>
                </div>
                <!-- main_up_right start -->
                <div id="main_up_right">
                    <div id="right_1" class="right">
                        <a href="#">
                            <img src="__ROOT__/public/images/home/r_1_6kb-2.jpg">
                        </a>
                    </div>
                    <div id="right_2" class="right">
                        <a href="#">
                            <img src="__ROOT__/public/images/home/r_2_8kb-2.jpg">
                        </a>
                    </div>
                    <div id="right_3" class="right">
                        <a href="#">
                            <img src="__ROOT__/public/images/home/r_3_8kb-2.jpg">
                        </a>
                    </div>
                    <div id="right_4" class="right">
                        <a href="#">
                            <img src="__ROOT__/public/images/home/r_4_9kb-2.jpg">
                        </a>
                    </div>
                </div>
                <!-- mian_up_right end -->
            </div>
            <!-- main_up end -->
            <div id="main_middle">
                <div id="left_3_1" class="main_middle_5">
                    1
                </div>
                <div id="left_3_3" class="main_middle_5">
                    3
                </div>
                <div id="left_3_2" class="main_middle_5">
                    2
                </div>
                <div id="right_2_1" class="main_middle_5">
                    4
                </div>
                <div id="right_2_2" class="main_middle_5">
                    5
                </div>
            </div>
            <div id="main_down">
                <div id="main_down_left">
                    <a href="#">
                        <img src="__ROOT__/public/images/home/logo.png" width="71px" height="85px">
                    </a>
                </div>
                <div id="main_down_right">
                    <div id="blank_2">
                    </div>
                    <div id="main_down_right_down">
                    </div>
                </div>
            </div>
        </div>
        <!-- main end -->
        <div id="footer">
        </div>
    </body>

</html>