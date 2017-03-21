<?php
    if (empty($_SESSION['info'])) {
        echo '<script>alert("请先登录");location.href="login.php"</script>';
        exit;
    }
    $img = !empty($_SESSION['info']['img']) ? $_SESSION['info']['img'] : 'head.img';
    //连接数据库
    include_once '../public/config.php';
    $link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
    mysqli_set_charset($link, 'utf8');
    $sql = "select * from ".FIX."user where id={$_SESSION['info']['id']}";
    // 发送sql请求
    $res = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($res);
    // var_dump($row);
    // die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/personal.css">
</head>
<body>
    <!-- 左边的部分 -->
        <div class="content-left">
                <form action="../home/action/action.php?a=file&id=<?=$_SESSION['info']['id']?>" method="post" enctype="multipart/form-data">
                    <div class="pc" style="width:110px;height:110px;margin:0 auto;border:none">
                        <img id="img" class="tx" src="<?= __PUBLIC__.'/Pic/'.$row['img']?>" />
                    </div>
                    <input id="pic" style="margin-top:45px;" type="file" name="pic">
                    <input type="submit" value="更换头像">
                </form>
            <div class="wz">
                <p style="text-align:center;color:#ff5777">欢迎<?= $_SESSION['info']['username']?></p>
            </div>
            <div class="dd">
                <div class="dd-d">
                    <a href="order.php">我的订单 > </a>
                </div>
            </div>

            <div class="dd">
                <div class="dd-d">
                    <a href="">我的钱包 > </a>
                </div>
            </div>

            <div class="dd">
                <div class="dd-d">
                    <a href="">我的理财 > </a>
                </div>
            </div>

            <div class="dd">
                <div class="dd-d">
                    <a href="">优惠特权 > </a>
                </div>
            </div>

            <div class="dd">
                <div class="dd-d">
                    <a href="address.php">地址管理 > </a>
                </div>
            </div>

            <div class="dd">
                <div class="dd-d">
                    <a href="">账号设置 > </a>
                </div>
            </div>

        </div>
</body>
</html>
<script>
    var pic = document.getElementById('pic');
    var img = document.getElementById('img');
    pic.onchange = function(){
        //火狐下，直接设img属性
        img.style.display = 'block';
        img.style.width = '110px';
        img.style.height = '110px';
        //img.src = this.files[0].getAsDataURL();

        //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
        img.src = window.URL.createObjectURL(this.files[0]);
    }
</script>