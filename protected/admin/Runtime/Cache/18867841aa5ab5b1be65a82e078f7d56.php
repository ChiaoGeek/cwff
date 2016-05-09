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
<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/phpcms54/formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/phpcms54/formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript">
   
</script>
</head>
<body>
<style type="text/css">
    html{_overflow-y:scroll}
</style>

<form name="myform" id="myform" action="?m=Index&a=m3_sub1_add" method="post">
<input type="hidden" value="<?php echo ($value["id"]); ?>" name="id">
<div class="pad-10">
<div class="col-tab">
<ul class="tabBut cu-li">
<li id="tab_setting_1" class="on">栏目添加</li>

</ul>
<div id="div_setting_1" class="contentList pad-10">

<table width="100%" class="table_form ">
     <tr>
        <th>栏目中文名称：</th>
        <td>
        <span id="normal_add"><input type="text" name="cn_name" id="catname" class="input-text" value="<?php echo ($value["cn_name"]); ?>"></span>
        </td>
      </tr>
      <tr>
        <th>栏目英文名称：</th>
        <td>
        <span id="normal_add"><input type="text" name="en_name" id="catname" class="input-text" value="<?php echo ($value["en_name"]); ?>"></span>
        </td>
      </tr>
      <tr>
        <th>栏目所属P_ID：</th>
        <td>
        <span id="normal_add"><input type="text" name="p_id" id="catname" class="input-text" value="<?php echo ($value["p_id"]); ?>"></span>
        </td>
      </tr>    
      <tr>
        <th>列表下文章模型：</th>
        <td>
        <span id="normal_add"><input type="text" name="article_type" id="catname" class="input-text" value="<?php echo ($value["article_type"]); ?>"></span>
        </td>
      </tr>      
      <tr>
        <th width="200">栏目模型</th>
        <td>
          <select name="model_type" id="modelid" >
              <?php if(is_array($option_value)): $i = 0; $__LIST__ = $option_value;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
            </if>
          </select>      
          </td>
      </tr>
 <input type="hidden" name="are_using_num" value="0">  
</table>

</div>


 <div class="bk15"></div>
    <?php if(($flag == 'submit')): ?><input name="submit" type="submit" value="提交" class="button">
                <?php else: ?><input type="hidden" name="id" value="<?php echo ($value["id"]); ?>"><input type="submit" value="修改" name="updata" class="button"><?php endif; ?>

</form>
</div>

</div>
<!--table_form_off-->
</div>

</body></html>