<?php
session_start();
if(empty($_SESSION['adminInfo'])){
    header('location:index.php');    
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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">分类列表</strong> <a href="add.php" style="float:right; display:none;">分类用户</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加分类</a> </li>
       
      </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">编号</th>
            <th>分类名</th>
            <th>父类ID</th>
            <th>path路径</th>
            <th width="310">操作</th>
        </tr>
    
        <?php
        // 连接数据库
        include '../../public/config.php';
        $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php">返回</a>');
        mysqli_set_charset($link,'utf8');

        
        //遍历表格
        $sql = "select * from ".FIX."type order by concat(`path`, `id`)";
        $res = mysqli_query($link,$sql);
        // $row = mysqli_fetch_all($res,1);
        while ($row = mysqli_fetch_assoc($res)) {
            //制作缩进
            $num = substr_count($row['path'], ',');
            $str = str_repeat('!----', $num);
            echo "<tr>
                <td>{$row['id']}</td>
                <td style='text-align:left;'>{$str}{$row['name']}</td>
                <td>{$row['pid']}</td>
                <td>{$row['path']}</td>
                <td>
                    <div class='button-group'>
                        <a href='edit.php?pid={$row['pid']}&path={$row['path']}&id={$row['id']}&name={$row['name']}' class='button border-main'>
                            <span class='icon-edit'></span>修改
                        </a>
                        <a href='add.php?id={$row['id']}&path={$row['path']}' class='button border-main'>
                            <span class='icon-edit'></span>添加子分类
                        </a>
                        <a href='action.php?a=del&&id=".$row['id']."' class='button border-red'>
                            <span class='icon-trash-o'></span>删除
                        </a>
                        </a>
                    </div>
                </td>
            </tr>";
        }
        ?>
        </table>
  </div>
</form>
</body>
</html>