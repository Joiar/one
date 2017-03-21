<?php
session_start();
//判断是否登录
if (empty($_SESSION['info'])) {
    //如果没登录
    echo '<script>alert("亲，您还没有登录");location.href="login.php"</script>';
    exit;
    // var_dump($oid);
}
$oid = $_GET['oid'];
// 导入头部
include_once './config/header2.php';
// 导入公共文件
include_once '../public/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>收银台</title>
    <link rel="stylesheet" type="text/css" href="./css/shopping.css">
    <link rel="stylesheet" type="text/css" href="./css/pay1.css">
    <link rel="stylesheet" type="text/css" href="./css/pay2.css">

    <script type="text/javascript" href="./js/od1.js"></script>
    <script type="text/javascript" href="./js/od2.js"></script>
    <script type="text/javascript" href="./js/od3.js"></script>
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body class="media_screen_1200">
    <div id="body_wrap">
        <div class="g-header-in wrap clearfix">
            <div class="process-bar" style="float: right;">
                <div class="md_process md_process_len4">
                    <div class="md_process_wrap md_process_step2_5">
                        <div class="md_process_sd"></div>
                        <i class="md_process_i md_process_i1"> 1 <span class="md_process_tip">购物车</span> </i>
                        <i class="md_process_i md_process_i2"> 2 <span class="md_process_tip">确认订单</span> </i>
                        <i class="md_process_i md_process_i3"> 3 <span class="md_process_tip">支付</span> </i>
                        <i class="md_process_i md_process_i4"> <img src="//www.mogujie.com/img/pay/right.png" width="23" height="23" alt="" /> <span class="md_process_tip">完成</span> </i>
                    </div>
                </div>
            </div>
        </div>
    <!-- 页面内容 -->
    <div style="width:1200px;height:300px;margin:0 auto;border:1px solid #ddd;margin-top:20px;line-height:100px;">
        <h1 style="font-size:25px;color:#FF4466;text-align:center">订单已提交，请及时付款</h1>
        <a href="finish.php?oid=<?= $oid ?>" style="display:block;text-align:center;width:100px;height:50px;line-height:50px;border-radius:5px;margin-left:700px;background:#FF4466;">付款</a>
        <span style="font-size:20px;margin-left:70px;">订单号：<?=$_GET['oid']?></span>
    </div>
    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
</body>
</html>
