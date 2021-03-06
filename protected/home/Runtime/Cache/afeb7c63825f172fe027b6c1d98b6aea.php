<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>imgshow</title>
		<style type="text/css">
			@charset "utf-8";
/* CSS Document */

* {
	margin:0;
	padding:0;
}
ul {
	list-style:none;
}
img{
	border:none;
	}
.gallery {
	position: relative;
	width: 692px;
	height: 460px;
}
.gallery_img img {
	width: 692px;
	height: 460px;
}
.gallery_img {
	position: absolute;
	top: 0px;
	left: 0px;
	width: 692px;
	height: 460px;
	overflow: hidden;
}
.gallery_img ul {
	position: relative;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-ms-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.gallery_img ul li {
	float: left;
}
.gallery_img ul li img {
	
}
.gallery ol {

	top:275px;
}
.gallery ol li {
	float: left;
	background:#ccc;
	width: 12px;
	height: 12px;
	margin-left: 5px;
	text-align: center;
	display: inherit;
	text-indent: -9999px;
	cursor: pointer;
	border-radius: 16px;
}
#imgplayer {
	height:305px;
	width:560px;
	padding-top:10px;
	position:relative;
	right:0;
	top:0;
	border:0;
	overflow:hidden
}
#imgplayer-prev, #imgplayer-next {
	position:absolute;
	width:45px;
	height:45px;
	z-index:89;
	filter:alpha(opacity=30);
	opacity:.3;
	top:130px;
	overflow:hidden;
	line-height:10
}
#imgplayer-prev {
	left:10px;
	background:url(__ROOT__/public/images/home/png24.png) no-repeat left top;
	_background:url(__ROOT__/public/images/home/png24.png) no-repeat 2px -557px
}
#imgplayer-next {
	right:10px;
	background:url(__ROOT__/public/images/home/png24.png) no-repeat left -45px;
	_background:url(__ROOT__/public/images/home/png24.png) no-repeat 2px -495px
}
#imgplayer-control a:hover {
	filter:alpha(opacity=80);
	opacity:.8
}
.imgnav-mask {
	position: absolute;
	bottom: 0;
	left: 0;
	height: 40px;
	background: #000;
	width: 100%;
	z-index: 86;
	filter: alpha(opacity=40);
	opacity: .4;
	border-radius: 10px;
}
.imgtit {
	position: absolute;
	height: 40px;
	width: 100%;
	bottom: 0;
	z-index: 87;
	background: 0;
}
.imgtit-left{
	left: 0;
	padding-left: 10px;
	text-align: left;
}
.imgtit-right{
	right:0;
	padding-right:10px;
	text-align: right;
}
.imgtit a:link, .imgtit a:visited, .imgtit a:hover, .imgtit a:active {
	display:block;
	height:40px;
	font:normal 16px/40px "微软雅黑";
	text-decoration:none;
	color:#fff;
	letter-spacing:1px
}

		</style>
	</head>
	<body>
		<div class="gallery"></div>
			<script type="text/javascript" src="__ROOT__/public/js/home/jquery.min.js"></script>

			<script src="__ROOT__/public/js/home/imgShow.js"></script>
			<script type="text/javascript">
				$(function(){
	var galleryImgArr = [{url:"#1",title:"图片1",img:"http://sandbox.runjs.cn/uploads/rs/119/4yubfdw0/1.jpg"},
						{url:"#2",title:"图片2",img:"http://sandbox.runjs.cn/uploads/rs/119/4yubfdw0/2.jpg"},
						{url:"#3",title:"图片3",img:"http://sandbox.runjs.cn/uploads/rs/119/4yubfdw0/3.jpg"},
						{url:"#4",title:"图片4",img:"http://sandbox.runjs.cn/uploads/rs/119/4yubfdw0/4.jpg"},
						{url:"#5",title:"图片5",img:"http://sandbox.runjs.cn/uploads/rs/119/4yubfdw0/5.jpg"}];
						
	var opt = {
		imgArr    : galleryImgArr,		//图片数组
		speed     : 5000,					//两次切换时间间隔
		imgSize   : {width:"692",height:"460"},//展示尺寸
		direction : "left",			//图片切换方向
		animation : "",				//图片切换动画
		titleFlag : "left",			//标题位置
		mask      : true,				//是否有标题遮罩层
		dotFlag   : "right",			//圆点提示图
		control   : "in"			   	//控制按钮
	}
    $('.gallery').gallery(opt);
})
			</script>
	</body>
</html>