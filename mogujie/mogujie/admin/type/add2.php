<?php
if(!empty($_GET['id']) && !empty($_GET['path'])){
  $id = $_GET['id'];
  $path = $_GET['path'].$_GET['id'].',';
}else{
  $pid = 0;
  $path = '0,';
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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加子分类</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=add">
      <input type="hidden" name="pid" value="<?=$pid?>" />
      <input type="hidden" name="path" value="<?=$path?>" />  
      <div class="form-group">
        <div class="label">
          <label>分类名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="name" data-validate="required:请输入用户名" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>
          
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit" style="margin-left:8%;float:left"> 提交</button>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="reset" style="margin-left:5%;float:left">重置</button>
        </div>
    </form>
      </div>
  </div>
</div>

</body></html>