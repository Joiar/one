<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录_蘑菇街</title>
	<link rel="icon" href="./image/171169993508.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./css/login.css">
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
						<a href="" class="pt">普通登录</a>
					</div>
					<div class="banner-right-c">
						<a href="" class="wmm">手机无密码登录</a>
						<div class="banner-right-a">
						</div>
					</div>
				</div>

				<div class="banner-form">
					<form action="action/action.php?a=login" method="post">
						<input class="fo" type="txt" name="user" autofocus required placeholder="昵称">
						<input class="fo pd" type="password" name="pwd" placeholder="密码">
						<input class="fo sub" type="submit" value="登录">
					</form>
					<div class="tb">
						<a href="" class="qq">
							<img class="img" src="./image/login/qq.png">
						</a>
						<a href="" class="wx">
							<img class="img" src="./image/login/wx.png">
						</a>
						<a href="" class="wb">
							<img class="img" src="./image/login/wb.png">
						</a>
					</div>
					<div class="zh">
					<a href="reg.php">没账号，去注册</a>&nbsp;
					<a href="index.php">返回主页</a>
					</div>
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