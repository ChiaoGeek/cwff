<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>后台登录</title>
</head>
<body>
		<form action="?m=Index&a=loginVertify" name="form" id="form" method="post">
			Username: <input type="text" name="username" /><br />
			Password: <input type="password" name="password" /><br />
			Vertify : <input type="text" name="vertify" /><br />
			<input type="submit" value="submit" name="submit">	
			<input type="reset" value="reset" name="reset">

			<img src='__APP__/?m=Index&a=verify' />
		</form>

</body>
</html>