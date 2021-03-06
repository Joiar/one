<?php
session_start();
//判读是否传了id
if (empty($_GET['id'])) {
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
//连接数据库
include '../../public/config.php';
$link = @mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败<a target="_top" href="../index.php">返回</a>');
mysqli_set_charset($link, 'utf8');
$sql = 'select * from '.FIX."user where id=$id limit 1";
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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>用户修改页面</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=edit&&id=<?=$info['id']?>">
      <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?=$info['username']?>" name="username" data-validate="required:请输入用户名" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input placeholder="如果不想修改就不填" type="password" class="input w50" value="" name="pwd" data-validate="required:请输入密码" />
        </div>
      </div>     
      
      <div class="form-group">
        <div class="label">
          <label>确认密码：</label>
        </div>
        <div class="field">
          <input placeholder="如果不想修改就不填" type="password" class="input w50" value="" name="pwd2" data-validate="required:请输入确认密码" />
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>手机号码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?=$info['phone']?>" name="phone" data-validate="required:请输入手机号码" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>
      
      <div class="form-group">
          <div class="label">
            <label>QQ：</label>
          </div>
          <div class="field">
            <input type="text" class="input w50" value="<?=$info['qq']?>" name="qq" />
            <div class="tips"></div>
          </div>
      </div>

      <div class="form-group">
          <div class="label">
            <label>自我简介：</label>
          </div>
          <div class="field">
            <textarea name="des" cols="30" rows="6" placeholder="随便写点什么，让大家了解你吧。"><?=$info['des']?></textarea>
          </div>
      </div>

      
      <?php
        if ($id == '10') {
          echo "<input type='hidden' name='role' value='3'>";
        } else { ?>
      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>角色：</label>
          </div>
          <div class="field">
            <select name="role" class="input w50">
              <option value="">请选择分类</option>
              <option value="1" <?= $info['role'] == 1 ? 'selected' : ''?>>普通用户</option>
              <option value="2" <?= $info['role'] == 2 ? 'selected' : ''?>>管理员</option>
            </select>
            <div class="tips"></div>
          </div>
        </div>
      <?php
        }
      ?>
       
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