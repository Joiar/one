<?php
session_start();
// 导入头部
include_once './config/header.php';
include_once '../public/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蘑菇街</title>
    <link rel="stylesheet" type="text/css" href="./css/address.css">
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body>
    <div class="hr">
    </div>
    <div class="content">
    <!-- 左边的部分 -->
        <?php
        // 导入左边部分
        include_once './config/header3.php';
        ?>
        <!-- 右边的部分 -->
        <div class="content-right">
        <!-- 地址管理 -->
            <div class="dz">
                <p><h3>地址管理  &nbsp;<span style="color:#FA8F8E">✧ (≖ ‿ ≖)✧</span></h3></p>
            </div>
            <div class="tj">
                <a href="addaddress.php" style="width:115px;height:32px"><img src="./image/kuw9n_kqyvquklnjbdissugfjeg5sckzsew_115x32.png "></a>
            </div>
            <!-- 表格 -->
            <div class="bg">
                <table cellspacing="0">
                    <tr>
                        <td>收货人</td>
                        <td>收货地址</td>
                        <td>邮编</td>
                        <td>手机号</td>
                        <td colspan="3">操作</td>
                    </tr>
<?php
            //连接数据库
            $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
            // 设置字符集
            mysqli_set_charset($link,'utf8');
            // 准备sql语句
            $sql = "select * from ".FIX."address where uid={$_SESSION['info']['id']}";
            // echo $sql;
            // 发送sql请求
            $res = mysqli_query($link,$sql);
            // var_dump($res);
            //查询地址信息
            // var_dump(mysqli_num_rows($res));
            if ($res && mysqli_num_rows($res) > 0) {
                // $row = mysqli_fetch_all($res,1);
                // foreach ($row as $value) {
                //     var_dump($value);
                while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?= $row['name']?></td>
                    <td><?= $row['address']?></td>
                    <td><?= $row['code']?></td>
                    <td><?= $row['phone']?></td>
                    <td><a href='action.php?a=mr&oid=<?=$row["id"]?>'>设为默认</a></td>
                    <td><a href='adredit.php?id=".$row['id']."'>编辑</a></td>
                    <td><a href='./action/adraction.php?a=del&id=".$row['id']."'>删除</a></td>
                </tr>
            <?php
                }
            }
?>
                </table>
            </div>
        </div>
    </div>

    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
    <style>
        td{
            border: 1px solid #dfdfdf;
            text-align: center;
        }
    </style>
</body>
</html>
