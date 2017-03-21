<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册_蘑菇街</title>
	<link rel="icon" href="./image/171169993508.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./css/reg.css">
</head>
<body>
	<div class="all">
		<!-- 头部 -->
		<div class="top">
			<div class="logo">
				<div class="loginn"></div>
			</div>
		</div>
		<!-- 中间部分 -->
		<div class="center">
			<div class="banner-left">
			</div>
			<div class="banner-right">
				<!-- 登录方式 -->
				<div class="banner-right2">
					<div class="banner-right-b">
					<h3>新用户注册</h3>
					</div>
					<div class="banner-right-c">
					</div>
				</div>

				<div class="banner-form">
					<form action="action/action.php?a=reg" method="post">
						<input class="fo" type="txt" name="user" autofocus required placeholder="昵称">
						<input class="fo pd" type="password" name="pwd" placeholder="密码">
						<input class="fo pd" type="password" name="pwd2" placeholder="确认密码">
							<input class="fo sub" type="submit" value="注册">
						<div class="zh">
						<a href="login.php">已有账号，去登录</a>&nbsp;
						<a href="index.php">返回主页</a>
						</div>
					</form>
				</div>

				
			</div>

		</div>
		<!-- 尾部 -->
		<?php
			include_once './config/footer.php';
		?>
	</div>
</body>
</html>