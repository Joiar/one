<?php
session_start();
//判断是否登录
if (empty($_SESSION['info'])) {
    //如果没登录
    echo '<script>alert("亲，您还没有登录");location.href="login.php"</script>';
    exit;

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
    <title>支付成功</title>
    <link rel="stylesheet" type="text/css" href="./css/shopping.css">
    <link rel="stylesheet" type="text/css" href="./css/pay1.css">
    <link rel="stylesheet" type="text/css" href="./css/finish.css">
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
    <div style="width:1200px;margin:0 auto; height:400px;border:1px solid #ddd;">
        <p style="font-size:30px;text-align:center;margin-top:30px;color:red">订单已支付成功，会尽快发货！</p><br>
        <table style="width:1190px;margin:0 auto">
            <tr>
                <td>订单号</td>
                <td>商品名</td>
                <td>价格</td>
                <td>下单时间</td>
                <td>订单状态</td>
            </tr>
<?php
    // 连接数据库
    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
    // 设置字符集
    mysqli_set_charset($link,'utf8');
    $sql = "update ".FIX."orders set status=2 where id=$oid";
    // echo $sql;
    mysqli_query($link,$sql);
    // 准备sql语句
    $uid = $_SESSION['info']['id'];
    $sql = "select d.oid,o.id,g.name,o.total,o.addtime,a.address,o.status from ".FIX."orders o,".FIX."address a,".FIX."goods g ,".FIX."detail d  where o.aid=a.id and g.id=d.gid and o.id=d.oid and o.uid=$uid";
    $res = mysqli_query($link,$sql);
    $arr = ['待付款','待发货','待收货','已签收'];
    while ($row = mysqli_fetch_assoc($res)) { ?>
          <form action="action.php?a=edit&oid=<?=$row['oid']?>" method='post' class='am-form'>
                <tr>
                  <td><?= $row['id']?></td>
                  <td><?= $row['name']?></td>
                  <td><?= $row['total']?></td>
                  <td class='am-hide-sm-only'><?= date('Y-m-d H:i:s',$row['addtime'])?></td>
                  <td><?= $arr[($row['status'])-1]?></td>
                </form>
    <?php
       }
        ?>
        </table>
    </div>
    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
<style>
    td{
        border:1px solid #ddd;
        text-align: center;
        padding:5px;
    }
</style>
</body>
</html>