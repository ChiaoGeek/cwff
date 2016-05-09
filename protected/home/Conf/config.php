<?php
return array(
	// 添加数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'cwff', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'zhao7528377zz', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'think_', // 数据库表前缀

//	'SHOW_PAGE_TRACE' =>true ,// 显示页面Trace信息
	'SESSION_OPTIONS' =>array(
		'expire'=> 3600
		),

	'TMPL_PARSE_STRING'  =>array(
	     '__CSS__' => '../../../../public/css/home', // 更改默认的__PUBLIC__ 替换规则
	     '__JS__' => '../../../../public/js/home', // 增加新的JS类库路径替换规则
	     '__IMGCSS__' => '../../images/home' // 增加新的上传路径替换规则


	 
	)
);
?>