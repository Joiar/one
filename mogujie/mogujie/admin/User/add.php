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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>用户增加页面</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=add">  
      <div class="form-group">
        <div class="label">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="username" data-validate="required:请输入用户名" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="" name="pwd" data-validate="required:请输入密码" />
        </div>
      </div>     
      
      <div class="form-group">
        <div class="label">
          <label>确认密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="" name="pwd2" data-validate="required:请输入确认密码" />
        </div>
      </div>

      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>角色：</label>
          </div>
          <div class="field">
            <select name="role" class="input w50">
              <option value="">请选择分类</option>
              <option value="1">普通用户</option>
              <option value="2">管理员</option>
            </select>
            <div class="tips"></div>
          </div>
        </div>
       
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit" style="margin-left:8%;float:left"> 提交</button>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="reset" style="margin-left:5%;float:left">重置</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>