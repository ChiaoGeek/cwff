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

   
    </script>
</head>
<body>
<div class="subnav">

    <div class="content-menu ib-a blue line-x">
        <a href='javascript:;' class="on"><em>系统模型管理</em></a><span>|</span><a class="aadd" name="none"><em>添加模型</em></a></div>
</div>
<style type="text/css">
    html{_overflow-y:scroll}
</style><form name="myform" action="?m=admin&c=category&a=listorder" method="post">
<div class="pad_10">
<div class="explain-col">
温馨提示：请在添加、修改栏目全部完成后，<a href="?m=admin&c=category&a=public_cache&menuid=43&module=admin">更新栏目缓存</a>
</div>
<div class="bk10"></div>
<div class="table-list">
    <table width="100%" cellspacing="0" >
        <thead>
            <tr>
            <th width="80">id</th>
            <th align='left' width='150'>模型名称</th>
            <th align='left' width='150'>使用数量</th>
            <th align='left' width="150">模型所属类型</th>
            <th align='left' width="150">模型描述</th>
            <th >管理操作</th>
            </tr>
        </thead>
    <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td align='center'><?php echo ($vo["id"]); ?></td>
                    <td ><?php echo ($vo["name"]); ?></td>
                    <td ><?php echo ($vo["are_using_num"]); ?></td>
                    <td ><?php echo ($vo["model_type"]); ?></td>
                    <td><?php echo ($vo["description"]); ?></td>
                    <td align='center' > <!--<a class="aadd" style="cursor:pointer;" name="<?php echo ($vo["id"]); ?>">修改</a> | --><a href="javascript:confirmurl('?m=Index&a=m1_sub1_delete&id=<?php echo ($vo["id"]); ?>','确认要删除吗？')">删除</a> </td>
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
            if (id == 'none') {
                        layer.open({
                        type: 2,
                        title: '栏目管理',
                        shadeClose: true,
                        shade: 0.8,
                        area: ['700px', '50%'],
                        content: '?m=Index&a=m1_sub1_add', //iframe的url
                        //content: 'http://job.nedu.edu.cn', //iframe的url
                        end:function(){
                            window.location.href='?m=Index&a=m1_sub1';
                        }    
                }); 
            }else{
                        layer.open({
                        type: 2,
                        title: '栏目管理',
                        shadeClose: true,
                        shade: 0.8,
                        area: ['700px', '50%'],
                        content: '?m=Index&a=m1_sub1_add&id='+id, //iframe的url
                        end:function(){
                            window.location.href='?m=Index&a=m1_sub1';
                        }    
                }); 

            }
  
    });

    </script>
</body>
</html>