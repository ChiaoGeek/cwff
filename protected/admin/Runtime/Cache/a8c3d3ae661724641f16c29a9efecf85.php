<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
            <h3 class="f14"><span class="switchs cu on" title="栏目管理"></span>栏目管理</h3>
            <ul>
                <li id="_MP1" class="sub_menu">
                	<a href="javascript:_MP('1','?m=Index&a=m3_sub1');" hidefocus="true" style="outline:none;">栏目管理</a></li>
            </ul>
			<script type="text/javascript">
            $(".switchs").each(function(i){
                var ul = $(this).parent().next();
                $(this).click(
                function(){
                    if(ul.is(':visible')){
                        ul.hide();
                        $(this).removeClass('on');
                            }else{
                        ul.show();
                        $(this).addClass('on');
                    }
                })
            });
            </script>
</body>
</html>