<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
		<meta charset="utf-8">
		<title>后台管理系统</title>
		<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/admin/m2_add.css">
		<script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/phpcms54/jquery.min.js"></script>

<!--		<script type="text/javascript" src="__ROOT__/public/plugin/ckeditor/ckeditor.js"></script>   -->
        <script type="text/javascript" src="__ROOT__/public/plugin/ueditorphp142/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="__ROOT__/public/plugin/ueditorphp142/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->

         <!-- laydate -->
        <script type="text/javascript" src="__ROOT__/public/plugin/laydate/laydate.js"></script>



</head>
<body>
	
<div id="container">
			<div id="blank_one"></div>
			<div id="upload">
			 <form action="?m=Index&a=m2_add_file" name="form1" id="form1" method="post" enctype="multipart/form-data">
             <!--表单隐藏-->
                <input type="hidden" name="raw_id" class="up_input" id="title" value="<?php echo ($column_argu["raw_id"]); ?>" >
                <input type="hidden" name="p_id" class="up_input" id="title" value="<?php echo ($column_argu["p_id"]); ?>" >
                <input type="hidden" name="time" class="up_input" id="title" value="<?php echo ($value["time"]); ?>" >
                <input type="hidden" name="model_type" class="up_input" id="title" value="<?php echo ($column_argu["model_type"]); ?>" >
                <input type="hidden" name="id" class="up_input" id="title" value="<?php echo ($value["id"]); ?>" >
             <!--表单隐藏-->
				<div id="upload_title" class="upload_class">
                    文章标题：<input type="text" name="title" class="up_input" id="title" value="<?php echo ($value["title"]); ?>" >
                </div>
 				<div id="upload_type"class="upload_class">
 					文章类型：<select name="zhtype" id="select">
                            <?php if(($flag == 'updata')): ?><option value="<?php echo ($value["entype"]); ?>_<?php echo ($value["zhtype"]); ?>"><?php echo ($value["zhtype"]); ?></option>
                            <?php else: ?><option value="<?php echo ($select["en_name"]); ?>_<?php echo ($select["cn_name"]); ?>"><?php echo ($select["cn_name"]); ?></option><?php endif; ?>
 
							</select>
 				</div>
 				<div id="upload_author" class="upload_class">文章作者：
                      <?php if(($flag == 'updata')): ?><input type="text" class="up_input" name="author" id="date" value="<?php echo ($value["author"]); ?>">
                      <?php else: ?><input type="text" class="up_input" name="author" id="date" value="中国女性影展"><?php endif; ?>
                </div>
 				<div id="upload_time" class="upload_class">
                    上传时间：<input type="text" class="up_input" name="createtime" id="time" value="<?php echo ($value["createtime"]); ?>" size="40" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})">
                </div>
                <!-- <div id="upload_picture" class="upload_class">
                    上传缩略图：<input type="file" class="up_input" name="thumb" id="picture" value="<?php echo ($value["createtime"]); ?>" size="40">
                </div> -->

				
                <div id="upload_content"><span style="height:40px;display:block; line-height:40px; ">&nbsp;&nbsp;上传内容：</span>
                    <script id="editor" type="text/plain" name="content" style="width:690px;margin:auto;height:500px;"><?php echo ($value["content"]); ?></script>
                </div>
				<div id="upload_button" class="upload_class"> 
                    <?php if(($flag == 'update')): ?><input type="submit" name="updata" id="submit" value="修改">
                    <?php else: ?><input type="submit" name="submit" id="submit" value="提交"><?php endif; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <input type="reset" name="reset" id="reset" value="重置">
				</div>
			</form>
			</div>
</div>
</body>
<script language="JavaScript">

    </script>

    <script type="text/javascript">
                        var ue = UE.getEditor('editor');
    </script>
	</html>