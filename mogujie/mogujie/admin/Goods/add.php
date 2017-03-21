<?php
session_start();
// 连接数据库
include '../../public/config.php';
$link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php>返回</a>');
mysqli_set_charset($link,'utf8');
$sql = "select * from ".FIX."type";
// echo $sql;
// die;
$res = mysqli_query($link,$sql);
// $arr = mysqli_fetch_assoc($res);
// var_dump($arr);
// die;
if ($res && mysqli_num_rows($res) > 0) {
  $arr = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
  echo '<script>alert("没有分类数据，请先添加分类");location.href="../Type/add.php"</script>';
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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>商品增加页面</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=add" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>商品名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="name" data-validate="required:请输入商品名" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>价格：</label>
        </div>
        <div class="field">
          <input type="number" class="input w50" value="" name="price" data-validate="required:请输入价格" />
          <!-- <div class="tips"></div> -->
        </div>
      </div>

        <div class="form-group">
          <div class="label">
            <label>分类：</label>
          </div>
          <div class="field">
            <select name="tid" class="input w50">
            <?php
            foreach ($arr as $value) {
              // 设置顶级分类不可选
              // $dis = ($value['pid'] == 0) ? 'disabled': '';
              // 缩进
              $num = substr_count($value['path'], ',');
              $str = str_repeat('　', $num); 
              // 尚未引入二级分类，$dis没引入
              echo "<option value='{$value['id']}'>{$str}{$value['name']}</option>";
            }

            echo "<option value='1'></option>";
            ?>
            </select>
            <div class="tips"></div>
          </div>
        </div>

      <div class="form-group">
        <div class="label">
          <label>商品图片：</label>
        </div>
        <div class="field">
          <input type="file" class="input w50" name="pic" />
        </div>
      </div>     
      
      <div class="form-group">
        <div class="label">
          <label>库存：</label>
        </div>
        <div class="field">
          <input type="number" class="input w50" value="" name="store" />
        </div>
      </div>

      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>状态：</label>
          </div>
          <div class="field">
            <select name="status" class="input w50">
              <option value="1">在售中</option>
              <option value="2">已下架</option>
            </select>
            <div class="tips"></div>
          </div>
        </div>
        

        <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea name="des" cols="30" rows="5" style="padding:10px;"></textarea>
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