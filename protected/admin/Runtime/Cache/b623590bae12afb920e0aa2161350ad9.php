<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <title>
            phpcms V9 - 后台管理中心
        </title>
        <link href="__ROOT__/public/css/admin/reset.css" rel="stylesheet" type="text/css"
        />
        <link href="__ROOT__/public/css/admin/phpcms54/zh-cn-system.css" rel="stylesheet"
        type="text/css" />       
        <link rel="stylesheet" href="__ROOT__/public/css/admin/jquery.treeview.css"
        type="text/css" />
        <script language="javascript" type="text/javascript" src="__ROOT__/public/js/admin/jquery.min.js">
        </script>        
        <script type="text/javascript" src="__ROOT__/public/js/admin/jquery.cookie.js">
        </script>
        <script type="text/javascript" src="__ROOT__/public/js/admin/jquery.treeview.js">
        </script>

        <style type="text/css">
            html{_overflow-y:scroll} .filetree *{white-space:nowrap;} .filetree span.folder,
            .filetree span.file{display:auto;padding:1px 0 1px 16px;}
        </style>
    </head>
    
    <body>
        <div class="bk10">
        </div>
 
        <script language="JavaScript">
            $(document).ready(function() {
                $("#category_tree").treeview({
                    control: "#treecontrol",
                    persist: "cookie",
                    cookieId: "treeview-black"
                });
            });
            function open_list(obj) {
                var display_center_id = window.parent.document.getElementById('display_center_id');
                
                window.top.$("#current_pos_attr").html($(obj).html());
                //alert(display_center_id.style.color);
                display_center_id.style.display = "";
            }
        </script>
        <div id="treecontrol">
            <span style="display:none">
                <a href="http://localhost/sck/index.php?m=content&amp;c=content&amp;a=public_categorys&amp;type=add&amp;menuid=822&amp;pc_hash=hOgiU8#&amp;pc_hash=hOgiU8">
                </a>
                <a href="http://localhost/sck/index.php?m=content&amp;c=content&amp;a=public_categorys&amp;type=add&amp;menuid=822&amp;pc_hash=hOgiU8#&amp;pc_hash=hOgiU8">
                </a>
            </span>
            <a href="http://localhost/sck/index.php?m=content&amp;c=content&amp;a=public_categorys&amp;type=add&amp;menuid=822&amp;pc_hash=hOgiU8#&amp;pc_hash=hOgiU8">
                <img src="__ROOT__/public/images/admin/minus.gif">
                <img src="__ROOT__/public/images/admin/application_side_expand.png">
                展开/收缩
            </a>
        </div>
        <!--
        <ul class="filetree  treeview">
            <li class="collapsable">
                <div class="hitarea collapsable-hitarea">
                </div>
                <span>
                    <img src="__ROOT__/public/images/admin/box-exclaim.gif" height="14" width="15">
                    &nbsp;
                    <a href="http://localhost/sck/index.php?m=content&amp;c=content&amp;a=public_checkall&amp;menuid=822&amp;pc_hash=hOgiU8"
                    target="right">
                        审核内容
                    </a>
                </span>
            </li>
        </ul>
        -->
        <?php echo ($menu); ?>
    </body>

</html>