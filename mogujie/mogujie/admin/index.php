<?php
session_start();
if (empty($_SESSION['adminInfo'])) {
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>蘑菇街后台管理中心</title>
    <link rel="stylesheet" href="./css/pintuer.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="icon" href="../home/image/171169993508.ico" type="image/x-icon" >
    <script src="js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1>
      <img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />蘑菇街后台管理中心
        <span style="font-size:20px;color:#E508A0">欢迎<?= $_SESSION['adminInfo']['username']?>登录</span>
    </h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="../home/index.php" target="_blank">
    <span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="action.php?a=loginout"><span class="icon-power-off"></span> 退出登录</a>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="info.php" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="pass.html" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="Pl/index.php" target="right"><span class="icon-caret-right"></span>评论管理</a></li>
    <li><a href="adv.php" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>
    <li><a href="Books/index.php" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
    <li><a href="Orders/index.php" target="right"><span class="icon-caret-right"></span>订单管理</a></li>
  </ul>

  <!-- 用户管理 -->
  <h2><span class="icon-pencil-square-o"></span>用户管理</h2>
  <ul>
    <li><a href="User/add.php" target="right"><span class="icon-caret-right"></span>添加用户</a></li>
    <li><a href="User/index.php" target="right"><span class="icon-caret-right"></span>查看用户</a></li>
  </ul>

  <!-- 商品管理 -->
  <h2><span class="icon-pencil-square-o"></span>商品管理</h2>
  <ul>
    <li><a href="Goods/add.php" target="right"><span class="icon-caret-right"></span>添加商品</a></li>
    <li><a href="Goods/index.php" target="right"><span class="icon-caret-right"></span>查看商品</a></li>
  </ul>

  <h2><span class="icon-pencil-square-o"></span>分类管理</h2>
  <ul>
    <li><a href="type/add.php" target="right"><span class="icon-caret-right"></span>添加顶级分类</a></li>
    <li><a href="type/index.php" target="right"><span class="icon-caret-right"></span>查看分类</a></li>
  </ul>

  <!-- 友情链接 -->
  <h2><span class="icon-pencil-square-o"></span>友情链接</h2>
  <ul>
    <li><a href="Links/add.php" target="right"><span class="icon-caret-right"></span>添加友情链接</a></li>
    <li><a href="Links/index.php" target="right"><span class="icon-caret-right"></span>查看友情链接</a></li>
  </ul>

  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="list.html" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>
  </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);
	  $(this).toggleClass("on");
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="info.php" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>