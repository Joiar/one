<?php
session_start();
//判读是否传了id
if (empty($_GET['lid'])) {
    header('location:index.php');
    exit;
}
$lid = $_GET['lid'];
//连接数据库
include '../../public/config.php';
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败<a target="_top" href="../index.php">返回</a>');
mysqli_set_charset($link, 'utf8');
$sql = 'select * from '.FIX."link where lid=$lid limit 1";
$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
    $info = mysqli_fetch_assoc($res);
// var_dump($info);
// exit;
} else {
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="../css/pintuer.css">
<link rel="stylesheet" href="../css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>链接修改页面</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=edit&&lid=<?=$info['lid']?>">
      <div class="form-group">
        <div class="label">
          <label>链接标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?=$info['title']?>" required name="title" data-validate="required:链接标题" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>链接网址：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" required name="link" data-validate="required:链接网址" value="<?=$info['link']?>" />
        </div>
      </div>    
     
       
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit" style="margin-left:8%;float:left">提交</button>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="reset" style="margin-left:5%;float:left">重置</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>