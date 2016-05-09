/**
 *	澶у皬鍙彉/鎺у埗鎸夐挳鍙€�/鏍囬浣嶇疆鍙€�/鍦嗙偣鍙缃�
 *	Version锛�1.0
 *	鍙傛暟锛�
 *	{
 *		imgArr    : galleryImgArr,				//鍥剧墖鏁扮粍 蹇呴€�
 *		speed     : 3000,							//涓ゆ鍒囨崲鏃堕棿闂撮殧榛樿3s
 *		imgSize   : {width:"500",height:"300"},   //灞曠ず灏哄 蹇呴€�
 *		direction : "left",			//鍥剧墖鍒囨崲鏂瑰悜 left||right  榛樿left
 *		animation : "",				//鍥剧墖鍒囨崲鍔ㄧ敾
 *		titleFlag : "left",			//鏍囬浣嶇疆 left||right||"" 榛樿left绌哄垯鏃犳爣棰�
 *		mask      : true,				//鏍囬閬僵灞� true||false    榛樿true
 *		dotFlag   : "right",			//鍦嗙偣鎻愮ず鍥句綅缃� left||right||center||"" 榛樿right绌哄垯鏃犲渾鐐规彁绀�
 *		control   : "in"			   	//鎺у埗鎸夐挳浣嶇疆 in||out||""   榛樿in ""鍒欐棤鎺у埗鎸夐挳
 *	}
 *	浣跨敤鏂规硶锛�
 *	$(function(){
 *		$('.gallery').gallery();
 *		});
 **/
;(function($){
	'use strict';
	$.gallery = function(options,element){//鍏ㄥ眬鍏叡鍑芥暟
		this.$el = $(element);
		this._init( options );
	};
	$.gallery.defaults = {
		imgArr    :[],
		speed     :3000,
		imgSize   : {width:"500",height:"300"},
		direction : "left",
		animation : "",
		titleFlag : "left",
		mask      : true,
		dotFlag   : "right",
		control   : "in"
	};
	$.gallery.prototype = {
		_init:function(options){
			this.options = $.extend( false, {}, $.gallery.defaults, options );//鍚堝苟榛樿鍙傛暟
			//console.log(this.options);
			this.totalImg = this.options.imgArr.length;
			this.index = -1;		//褰撳墠鍥剧墖绱㈠紩
			this._createEle();	//鍒涘缓鍏冪礌
			this._bindEvent();  //缁戝畾鎺у埗鎸夐挳click浜嬩欢鍜屽渾鐐规彁绀篽over浜嬩欢
			this._initLayout(); //鏍规嵁options搴旂敤鏍峰紡鍛堢幇鍥剧墖杞挱澶栬
			this.autoPlay();	//鑷姩鎾斁
		},
		_createEle:function(){//鍒涘缓鍥剧墖杞挱瀹瑰櫒閲岀殑鍏冪礌
			var gallery_img="",imgtit="",control="",li='',mask="",ol="";
			//鍥剧墖鍒楄〃
			for(var i = 0;i<this.totalImg;i++){
				li+='<li><a href="'+this.options.imgArr[i].url+'"><img src="'+this.options.imgArr[i].img+'" alt="'+this.options.imgArr[i].alt+'"/></a></li>'
			}
			gallery_img = $('<div class="gallery_img"/>').append($('<ul/>').append(li));
			//鏍囬
			if(this.options.titleFlag){
				imgtit = $('<div class="imgtit" id="imgTitle"/>').append('<a href="'+this.options.imgArr[0].url+'" target="_blank">'+this.options.imgArr[0].title+'</a>');
			}
			//鏍囬閬僵灞�
			if(this.options.mask){mask = '<div class="imgnav-mask"></div>'}
			//鍒涘缓宸﹀彸鎸夐挳
			if(this.options.control){
				control = $('<div id="imgplayer-control"/>')
			.append('<a href="javascript:void(0);"  id="imgplayer-prev"></a><a href="javascript:void(0);"  id="imgplayer-next"></a>');
			}
			//鍒涘缓鍦嗙偣
			if(this.options.dotFlag){
				for(var i=0;i<this.totalImg;i++){
						ol+='<li>'+i+'</li>';
				};
				ol = $('<ol id="dotOl">').append(ol)
			}
			this.$el.append(gallery_img,mask,imgtit,control,ol);
		},
		_bindEvent:function(){//缁戝畾鎺у埗鎸夐挳click浜嬩欢鍜屽渾鐐规彁绀篽over浜嬩欢浠ュ強瀹瑰櫒mouseenter mouseleave浜嬩欢
			var self = this;
			//mouseenter mouseleave
			this.$el.mouseenter(function(){
					clearTimeout(self.autoTime);
				}).mouseleave(function(){
						self.autoTime=setTimeout(function(){self.autoPlay()},1000);
					});
			//鍓嶄竴骞呭浘
			$("#imgplayer-prev").click(function(){
					self.index>0?self.index--:self.index=self.totalImg-1;
					self._playAction();	
				});
			//鍚庝竴骞呭浘
			$("#imgplayer-next").click(function(){
					self.index<self.totalImg-1?self.index++:self.index=0;
					self._playAction();					
				});
			if(this.options.dotFlag){
				$("#dotOl li").hover(function(event){
						clearTimeout(self.autoTime);
						self.index = $(event.target).index();
						self._playAction();

				});
			}
		},
		_playAction:function(){
			var self = this;
			this.$el.find('ul').width(this.options['imgSize'].width*this.totalImg);	
			this.$el.find('ul').css({"left":-(this.options['imgSize'].width*this.index)});
			this.$el.find('ol li').addClass(function(_index,_cur){
				if(self.index==_index){
					$("#imgTitle>a").text(self.options.imgArr[_index].title);
					$("#imgTitle>a").attr('href',self.options.imgArr[_index].url);
					$(this).css({'background':'#F00'});
				}else{
					$(this).css({'background':'#ccc'});
				}
			});			
		},
		_initLayout:function(){	
			//鍦嗙偣鎻愮ず浣嶇疆鍜屾爣棰樹綅缃� 鍚堢悊浣嶇疆缁勫悎
			//{dotFlag:left,titleFlag:right}||
			//{dotFlag:right,titleFlag:left}||
			//{dotFlag:right,titleFlag:""}||
			//{dotFlag:left,titleFlag:""}||
			//{dotFlag:"",titleFlag:left}||
			//{dotFlag:"",titleFlag:right}||
			//{dotFlag:center,titleFlag:""}
			var dotLeft = 0;
			switch(this.options.dotFlag){
				case 'left'  :
					dotLeft = 15;
					if(this.options.titleFlag)$("#imgTitle").addClass("imgtit-right");
					break;
				case 'right' :
					dotLeft = this.options.imgSize.width-$('ol').width()-20;
					if(this.options.titleFlag)$("#imgTitle").addClass("imgtit-left");
					break;
				case 'center':
					dotLeft = (this.options.imgSize.width-$('ol').width())/2;
					if(this.options.titleFlag)$("#imgTitle").css({opacity:0});
					break;
				case ''      :
					if(this.options.titleFlag)$("#imgTitle").addClass("imgtit-"+this.options.titleFlag);
					break;
			}
			if(this.options.dotFlag){
				$('ol').css({'left': dotLeft,'top':this.options.imgSize.height-25,'zIndex':88});				
			}
			//鎺у埗鎸夐挳浣嶇疆
			if(this.options.control=="out"){
				$("#imgplayer-prev").css({left:-20});
				$("#imgplayer-next").css({right:-20});
			}
			$("#imgplayer-prev").css({top:(this.options.imgSize.height-$('#imgplayer-prev').height())/2});
			$("#imgplayer-next").css({top:(this.options.imgSize.height-$('#imgplayer-next').height())/2});

		},
		autoPlay:function(){
			var self = this;
			clearTimeout(this.autoTime);
			this.index<this.totalImg-1?this.index++:this.index=0;
			this._playAction();
			this.autoTime = setTimeout(function(){self.autoPlay()},self.options.speed);
		}
	};
	$.fn.gallery = function(options){//jQuery瀵硅薄鏂规硶
		var instance = $.data( this, 'gallery' );
		this.each(function(){
			instance ? instance_init():instance = $.data( this, 'gallery', new $.gallery( options, this ) );
		})
		return instance;
	};
}(jQuery))