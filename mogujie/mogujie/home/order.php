<?php
session_start();
// 导入头部
include_once './config/header.php';
if (empty($_SESSION['info'])) {
    echo '<script>alert("请先登录");location.href="login.php"</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单列表_蘑菇街</title>
    <link rel="stylesheet" type="text/css" href="./css/order.css">
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body>
    <div class="hr">
    </div>
    <div class="content">
        <?php
        // 导入左边部分
        include_once './config/header3.php';
        ?>
        <div class="content-right">
        <table style="width:880px;margin:0 auto," cellspacing="0">
        <caption><h2>订单列表</h2></caption>
            <tr>
                <td>订单号</td>
                <td>商品名</td>
                <td>价格</td>
                <td>下单时间</td>
                <td>订单状态</td>
                <td>操作</td>
                <td>评价</td>
            </tr>
<?php
    // 连接数据库
    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
    // 设置字符集
    mysqli_set_charset($link,'utf8');
    $uid = $_SESSION['info']['id'];
    // 准备sql语句
    $sql = "select d.oid,o.id,g.name,o.total,o.addtime,a.address,o.status from ".FIX."orders o,".FIX."address a,".FIX."goods g ,".FIX."detail d  where o.aid=a.id and g.id=d.gid and o.id=d.oid and o.uid=$uid";
    $res = mysqli_query($link,$sql);
    $arr = ['待付款','待发货','待收货','已签收'];
    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['status'] == '4') {
            $href = "javascript:volid(0);";
        } else {
            $href = "action.php?a=qs&oid=".$row['oid'];
        }
        ?>
        <tr>
            <td><?= $row['id']?></td>
            <td style="text-align:left"><?= $row['name']?></td>
            <td><?= $row['total']?></td>
            <td class='am-hide-sm-only'><?= date('Y-m-d H:i:s',$row['addtime'])?></td>
            <td><?= $arr[($row['status'])-1]?></td>
            <td>
                <a href="<?= $href?>" style='display:block;margin:0 auto;color:#444;background:#FF4466;border:none;width:50px;'> 签收 </a>
            </td>
            <td>
                <a href="pj.php?oid=<?=$row['oid']?>" style='display:block;margin:0 auto;color:#444;background:#FF4466;border:none;width:50px;'> 评价 </a>
            </td>
        </tr>
        <?php
       }
        ?>
        </table>
        </div>
    </div>
    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
    <style>
    td{
        border:1px solid #ddd;
        text-align: center;
        padding:8px;
    }
    </style>
</body>
</html>
