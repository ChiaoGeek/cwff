<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>后台管理中心</title>
<link href="__ROOT__/public/css/admin/reset.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/public/css/admin/system.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/jquery.min.js"></script>

<link href="__ROOT__/public/plugin/layer/skin/layer.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/public/plugin/layer/skin/layer.ext.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__ROOT__/public/plugin/layer/layer.js"></script>
<script type="text/javascript">
	
</script>
</head>
<body scroll="no">

<div class="header">
	<div class="logo lf"><a href="" target="_blank"><span class="invisible">后台管理系统</span></a></div>
    <div class="rt"><!--
    	<div class="tab_style white cut_line text-r"><a href="javascript:;" onclick="lock_screen()"><img src="statics/images/icon/lockscreen.png"> 锁屏</a><span>|</span><a href="http://www.phpcms.cn" target="_blank">官方网站</a><span>|</span><a href="http://www.phpcms.cn/license/license.php" target="_blank">授权</a><span>|</span><a href="http://bbs.phpcms.cn" target="_blank">支持论坛</a><span>|</span><a href="http://v9.help.phpcms.cn" target="_blank">帮助？</a>
        </div>
        -->
        <div class="style_but"></div>
    </div>
    <div class="col-auto" style="overflow: visible">
    	<div class="log white cut_line">您好！[管理员]<span>|</span><a href="?m=Index&a=logout">[退出]</a><span>|</span>
    		<a href="index.php?m=Index" target="_blank" id="site_homepage">站点首页</a>
    	</div>
        <ul class="nav white" id="top_menu">
        <li id="_M0" class="on top_menu"><a href="javascript:_M('0','#');" hidefocus="true" style="outline:none;">我的面板</a></li>
        <li id="_M1" class="top_menu"><a href="javascript:_M(1,'#');"  hidefocus="true" style="outline:none;">模型管理</a></li>
        <li id="_M2" class="top_menu"><a href="javascript:_M(2,'#');"  hidefocus="true" style="outline:none;">内容管理</a></li>
        <li id="_M3" class="top_menu"><a href="javascript:_M(3,'#');"  hidefocus="true" style="outline:none;">栏目管理</a></li>   
<!--        <li id="_M4" class="top_menu"><a href="javascript:_M(4,'#');"  hidefocus="true" style="outline:none;">后台成员</a></           
        <li id="_M5" class="top_menu"><a href="javascript:_M(5,'#');"  hidefocus="true" style="outline:none;">个人信息</a></li>   li>
        <!--<li class="tab_web"><a href="javascript:;"><span>默认站点</span></a></li>-->
        </ul>
    </div>
</div>
<div id="content">
	<div class="col-left left_menu">
    	<div id="leftMain">
        </div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="展开与关闭"><span class="hidden">展开</span></a>
    </div>
	<div class="col-1 lf cat-menu" id="display_center_id" style="display:none;" height="100%">
		<div class="content">
        	<iframe name="center_frame" id="center_frame" src="?m=Index&a=menu" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
        </div>
    </div>
    <div class="col-auto mr8">
        <div class="crumbs">
            <div class="shortcut cu-span">
            	<!-- <a href="#" target="right"><span>生成首页</span></a>
                <a href="#" target="right"><span>更新缓存</span></a>
                <a href="#"><span>后台地图</span></a> --></div>
        	当前位置：<span id="current_pos"></span></div>
            <div class="col-1">
                <div class="content" style="position:relative; overflow:hidden">
                    <iframe name="right" id="rightMain" src="?m=Index&a=defaultpage" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none; margin-bottom:30px" width="100%" height="auto" allowtransparency="true"></iframe>
                    <div class="fav-nav">
                        <div id="panellist"></div>
                        <div id="paneladd"><a class="panel-add" href="javascript:add_panel();"><em>添加</em></a></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript"> 
//clientHeight-0; 空白值 iframe自适应高度
function windowW(){
	if($(window).width()<980){
			$('.header').css('width',980+'px');
			$('#content').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();
$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
		$('.header').css('width','auto');
		$('#content').css('width','auto');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');
		
	}
});
window.onresize = function(){
	var heights = document.documentElement.clientHeight-150;document.getElementById('rightMain').height = heights;
	var openClose = $("#rightMain").height()+39;
	$('#center_frame').height(openClose+9);
	$("#openClose").height(openClose+30);	
}
window.onresize();
//站点下拉菜单
$(function(){
	//默认载入左侧菜单
	$("#leftMain").load("10.html");
})

//左侧开关
$("#openClose").click(function(){
	if($(this).data('clicknum')==1) {
		$("html").removeClass("on");
		$(".left_menu").removeClass("left_menu_on");
		$(this).removeClass("close");
		$(this).data('clicknum', 0);
	} else {
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
	}
	return false;
});
function _M(menuid,targetUrl) {
	//$("#leftMain").load(menuid+".html");
	switch (menuid)
		{
		case 0:
			$("#leftMain").load("?m=Index&a=adminIndex&type_link=1");
		break;
		case 1:
			//$("#leftMain").load("?m=Index&a=adminIndex&type_link=1",function(responseTxt,statusTxt,xhr){close();});	
						$("#leftMain").load("?m=Index&a=adminIndex&type_link=1",function(responseTxt,statusTxt,xhr){
							if(statusTxt == 'success'){
								//alert('success');
								close();
							}else{
								alert('error');
							}
							});
		
		break;
		case 2:
			$('#display_center_id').css('display','');	
			$("#leftMain").load("?m=Index&a=adminIndex&type_link=2");	

		break;
		case 3:
			$("#leftMain").load("?m=Index&a=adminIndex&type_link=3");			
		break;
		case 4:
			$("#leftMain").load("?m=Index&a=adminIndex&type_link=memberManage");			
		break;
		case 5:
			$("#leftMain").load("?m=Index&a=adminIndex&type_link=personInfo");			
		break;								
		default:
			$("#leftMain").load("?m=Index&a=adminIndex&type_link=personInfo");

		};
//	if(menuid!=8) {
//		$("#leftMain").load("?m=admin&c=index&a=public_menu_left&menuid="+menuid);
//	} else {
//		$("#leftMain").load("?m=admin&c=phpsso&a=public_menu_left&menuid="+menuid);
//	}
	
	//$("#rightMain").attr('src', targetUrl);
	$('.top_menu').removeClass("on");
	$('#_M'+menuid).addClass("on");
//	$.get("?m=admin&c=index&a=public_current_pos&menuid="+menuid, function(data){
//		$("#current_pos").html(data);
//	});
	//当点击顶部菜单后，隐藏中间的框架
	//$('#display_center_id').css('display','none');
	//显示左侧菜单，当点击顶部时，展开左侧
	$(".left_menu").removeClass("left_menu_on");
	$("#openClose").removeClass("close");
	$("html").removeClass("on");
	$("#openClose").data('clicknum', 0);
//	$("#current_pos").data('clicknum', 1);
}
function _MP(menuid,targetUrl) {
	$("#rightMain").attr('src', targetUrl);	//RightMain change href;
	$('.sub_menu').removeClass("on fb blue");	
	$('#_MP'+menuid).addClass("on fb blue");

/*	$.get("current_pos_"+menuid+".html", function(data){
		$("#current_pos").html(data+'<span id="current_pos_attr"></span>');
	});
*/	
	$.get("currentposition", function(data){
		$("#current_pos").html(data+'<span id="current_pos_attr"></span>');
	});

	$("#current_pos").data('clicknum', 1);
}

</script>
</body>
</html>