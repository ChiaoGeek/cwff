<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>phpcmsV9 - 后台管理中心</title>
<link href="__ROOT__/public/css/admin/phpcms54/reset.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/public/css/admin/phpcms54/zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/public/css/admin/phpcms54/table_form.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/public/plugin/layer/skin/layer.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/public/plugin/layer/skin/layer.ext.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="__ROOT__/public/css/admin/phpcms54/zh-cn-styles1.css" title="styles1" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="__ROOT__/public/css/admin/phpcms54/zh-cn-styles2.css" title="styles2" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="__ROOT__/public/css/admin/phpcms54/zh-cn-styles3.css" title="styles3" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="__ROOT__/public/css/admin/phpcms54/zh-cn-styles4.css" title="styles4" media="screen" />
<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/phpcms54/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/phpcms54/admin_common.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/phpcms54/styleswitch.js"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/public/plugin/layer/layer.js"></script>

<script type="text/javascript">
    window.focus();
    var pc_hash = 'xK5QbE';

   function menu(){
        var display_center_id = window.parent.document.getElementById('display_center_id');
        display_center_id.style.display = "";

   }
    </script>
</head>
<body onload="menu()">
<div class="subnav">

    <div class="content-menu ib-a blue line-x">
        <a href='javascript:;' class="on"><em><?php echo ($zhtype); ?></em></a><span>|</span><a class="aadd" id="<?php echo ($entype); ?>_<?php echo ($raw_id); ?>_<?php echo ($p_id); ?>_<?php echo ($model_type); ?>_<?php echo ($zhtype); ?>" name="none"><em>文章上传</em></a></div>
</div>
<style type="text/css">
    html{_overflow-y:scroll}
</style><form name="myform" action="?m=admin&c=category&a=listorder" method="post">
<div class="pad_10">
<div class="explain-col">
温馨提示：如有问题请联系系统开发者(chiao@zhaochang.org)。
</div>
<div class="bk10"></div>
<div class="table-list">
    <table width="100%" cellspacing="0" >
        <thead>
            <tr>
            <th width="80">编号</th>
            <th align='left' width='220'>标题</th>
            <th align='left' width='80'>阅读次数</th>
            <th align='left' width="150">所属栏目</th>
            <th align='left' width="150">所属类型</th>
            <th align='left' width="150">上传时间</th>
            <th >管理操作</th>
            </tr>
        </thead>
    <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td align='center'><?php echo ($vo["id"]); ?></td>
                    <td ><?php echo ($vo["title"]); ?></td>
                    <td><?php echo ($vo["time"]); ?></td>
                    <td><?php echo ($vo["zhtype"]); ?></td>
                    <td align='left'><?php echo ($vo["model_type"]); ?></td>
                    <td align='left'><?php echo ($vo["createtime"]); ?></td>
                    <td align='center' >  <a href="#" style="cursor:pointer;" name="<?php echo ($vo["id"]); ?>">查看</a> |<a class="aadd" style="cursor:pointer;" name="<?php echo ($vo["id"]); ?>" id="<?php echo ($vo["id"]); ?>_<?php echo ($vo["entype"]); ?>_<?php echo ($vo["raw_id"]); ?>_<?php echo ($vo["p_id"]); ?>_<?php echo ($vo["model_type"]); ?>_<?php echo ($zhtype); ?>">修改</a> | <a href="javascript:confirmurl('?m=Index&a=m2_delete&id=<?php echo ($vo["id"]); ?>','确认要删除吗？')">删除</a> </td>
                </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
   </tbody>
    </table>

    <div class="btn" id="about">
    <?php echo ($page); ?>
    </div>  </div>
</div>
</div>
</form>
<script language="JavaScript">
<!--
    window.top.$('#display_center_id').css('display','none');
//-->
    $('.aadd').on('click', function(){
            var id = this.name;
            var argu = this.id;
 
            if (id == 'none') {
                var raw_id = (argu.split)('_')[1];
                var p_id = (argu.split('_'))[2];
                var entype = (argu.split('_'))[0];
                var model_type = (argu.split('_'))[3]+'_'+(argu.split('_'))[4];
                var zhtype = (argu.split)('_')[5];
                      layer.open({
                        type: 2,
                        title: '文章上传',
                        shadeClose: false,
                        shade: 0.5,
                        maxmin: true,
                        moveOut: true,
                        area: ['730px', '100%'],
                        content: ['?m=Index&a=m2_add&enname='+entype+'&raw_id='+raw_id+'&p_id='+p_id+'&model_type='+model_type], //iframe的url
                        end:function(){
                            window.location.href='?m=Index&a=m2_articlelist&en_name='+entype+'&raw_id='+raw_id+'&p_id='+p_id+'&model_type='+model_type+'&zhtype='+zhtype;
                        }    
                }); 

            }else{     
                var raw_id = (argu.split)('_')[2];
                var p_id = (argu.split('_'))[3];
                var entype = (argu.split('_'))[1];
                var id = (argu.split('_'))[0];
                var model_type = (argu.split('_'))[4]+'_'+(argu.split('_'))[5];
                var zhtype = (argu.split)('_')[6];
                        layer.open({
                        type: 2,
                        title: '文章修改',
                        shadeClose: false,
                        shade: 0.5,
                        maxmin: true,
                        moveOut: true,
                        area: ['730px', '100%'],
                        content: ['?m=Index&a=m2_add&id='+argu], //iframe的url
                        end:function(){
                            window.location.href='?m=Index&a=m2_articlelist&en_name='+entype+'&raw_id='+raw_id+'&p_id='+p_id+'&model_type='+model_type+'&zhtype='+zhtype;
                        }    
                }); 

            }
  
    });

    </script>
</body>
</html>