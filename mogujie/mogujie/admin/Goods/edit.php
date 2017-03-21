<?php
  session_start();
  if (empty($_SESSION['adminInfo'])) {
    header('location:../login.php');
  }
  $id = $_GET['id'];
  include_once('../../public/config.php');
// 1.connect
    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败,点<a href="index.php">此处</a>返回');
// 2.charset
    mysqli_set_charset($link,'utf8');
// 3.sql
    $sql = "SELECT * FROM ".FIX."goods WHERE id=$id";
// 4.send sql
    $res = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($res);

// 获取分类
    $sql1 = 'SELECT * FROM '.FIX."type order by concat(path, id)";
    // echo $sql1;
    // die;
    $res1 = mysqli_query($link, $sql1);
    if ($res1 && mysqli_num_rows($res) > 0) {
      $arr = mysqli_fetch_all($res1, MYSQLI_ASSOC);
    } else {
      echo '<script>alert("没有分类数据，请先添加分类");location.href="../Type/add.php"</script>';
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
    <form method="post" class="form-x" action="action.php?a=edit&&id=<?=$row['id']?>">  




    <div class="form-group">
      <div class="label">
        <label>商品名：</label>
      </div>
      <div class="field">
        <input type="text" class="input w50" value="<?=$row['name']?>" name="name" data-validate="required:请输入商品名" />
        <!-- <div class="tips"></div> -->
      </div>
    </div>

    <div class="form-group">
      <div class="label">
        <label>价格：</label>
      </div>
      <div class="field">
        <input type="number" class="input w50" value="<?=$row['price']?>" name="price" data-validate="required:请输入价格" />
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
            echo "<option value='{$value['id']}' <?= ({$row['tid']} == {$value['id']}) ? 'selected' : ''?>>{$str}{$value['name']}</option>";
          }
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
        <input type="number" class="input w50" value="<?=$row['store']?>" name="store" />
      </div>
    </div>

    <if condition="$iscid eq 1">
      <div class="form-group">
        <div class="label">
          <label>状态：</label>
        </div>
        <div class="field">
          <select name="status" class="input w50">
            <option value="1" <?= $row['status'] == 1 ? 'selected' : ''?>>在售中</option>
            <option value="2" <?= $row['status'] == 2 ? 'selected' : ''?>>已下架</option>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      

      <div class="form-group">
      <div class="label">
        <label>描述：</label>
      </div>
      <div class="field">
        <textarea name="des" cols="30" rows="5" style="padding:10px;"><?=$row['des']?></textarea>
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