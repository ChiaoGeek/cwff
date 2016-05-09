<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
            <h3 class="f14"><span class="switchs cu on" title="相关设置"></span>文章内容管理</h3>
            <!--
            <ul>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="_MP<?php echo ($vo["id"]); ?>" class="sub_menu">
                        <a href="javascript:_MP('<?php echo ($vo["id"]); ?>','?m=Index&a=m2_articlelist&enname=<?php echo ($vo["enname"]); ?>');" hidefocus="true" style="outline:none;"><?php echo ($vo["zhname"]); ?></a>
                    </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
            </ul>
            <h3 class="f14"><span class="switchs cu on" title="相关设置"></span>友情链接</h3>
            <ul>
                <li id="_MP5" class="sub_menu">
                	<a href="javascript:_MP('5','?m=Index&a=menu');" hidefocus="true" style="outline:none;">管理员管理</a></li>
                <li id="_MP6" class="sub_menu">
                	<a href="javascript:_MP('6','index.html');" hidefocus="true" style="outline:none;">角色管理</a></li>
            </ul>
            <h3 class="f14"><span class="switchs cu on" title="相关设置"></span>照片模块内容</h3>
            <ul>
                <li id="_MP5" class="sub_menu">
                    <a href="javascript:_MP('5','index.html');" hidefocus="true" style="outline:none;">管理员管理</a></li>
                <li id="_MP6" class="sub_menu">
                    <a href="javascript:_MP('6','index.html');" hidefocus="true" style="outline:none;">角色管理</a></li>
            </ul>
            -->
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