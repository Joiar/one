<?php
//判读是否传了id
if (empty($_GET['id'])) {
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
$name = $_GET['name'];
$pid = $_GET['pid'];
$ypath = $_GET['path'];
//连接数据库
include '../../public/config.php';
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败<a target="_top" href="../index.php">返回</a>');
mysqli_set_charset($link, 'utf8');
$sql = 'select * from '.FIX."type where path not like '%,{$id},%' order by concat(path, id)";
$res = mysqli_query($link, $sql);
$info = mysqli_fetch_all($res, MYSQLI_ASSOC);
// $info = mysqli_fetch_all($res, MYSQLI_ASSOC);
// var_dump($info);
// die;

// if ($res && mysqli_num_rows($res) > 0) {
//     $info = mysqli_fetch_assoc($res);
// } else {
//     header('location:index.php');
//     exit;
// }
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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>分类修改页面</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=edit">  
      <div class="form-group">
        <div class="label">
          <label>分类名：</label>
        </div>
        <div class="field">
          <input type="hidden" name="id" value="<?= $id?>">
          <input type="hidden" name="ypath" value="<?=$ypath?>" />
          <input type="text" class="input w50" value="<?=$name?>" name="name" data-validate="required:请输入用户名" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>父类ID：</label>
        </div>
        <div class="field">
          <select name="path" class="input w50">
        <?php
          foreach ($info as $v) {
            if ($pid == $v['id']) {
              $sel = 'selected';
            } else {
              $sel = '';
            }
            //制作缩进
            $num = substr_count($v['path'], ',');
            $str = '&nbsp;&nbsp;'.str_repeat('&nbsp;&nbsp;', $num);
            echo "<option $sel value='{$v['path']}{$v['id']}'>{$str}{$v['name']}</option>";
          }
        ?>    
            </select>
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