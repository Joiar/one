<?php
session_start();
// 导入头部
include_once './config/header.php';
$oid = $_GET['oid'];
// var_dump($oid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评价列表</title>
    <link rel="stylesheet" type="text/css" href="./css/pj.css">
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body>
    <div class="content">
        <div class="pj">
            <h1 style="color:#FA8F8E">评价商品 ︶ε╰✿ </h1><br>
            <form action="action.php?a=pj&oid=<?=$oid?>" method="post">
            <textarea rows="10" cols="50" name="content" required >

            </textarea><br>
            <input class="btn" type="submit" value="提交">
            <input class="btn" type="reset" value="取消">
            </form>
        </div>
    </div>
</body>
</html>