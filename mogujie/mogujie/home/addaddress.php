<?php
session_start();
//判断是否登录
if (empty($_SESSION['info'])) {
    //如果没登录
    echo '<script>alert("亲，您还没有登录");location.href="login.php"</script>';
    exit;
}
// 导入头部
include_once './config/header2.php';
// 导入公共文件
include_once '../public/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <link rel="stylesheet" type="text/css" href="./css/shopping.css">
    <link rel="stylesheet" type="text/css" href="./css/od1.css">
    <link rel="stylesheet" type="text/css" href="./css/od2.css">
    <script type="text/javascript" href="./js/od1.js"></script>
    <script type="text/javascript" href="./js/od2.js"></script>
    <script type="text/javascript" href="./js/od3.js"></script>
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body class="media_screen_1200">
    <div id="body_wrap">
    <!-- 页面内容 -->
        <form action="action/adraction.php?a=addadress" method="post"> 
        <div class="content" style="width:1200px;height:100%;margin:0 auto;"> 
            <h2 class="cart_stit">选择收货地址</h2>
            <div class="cart_address_wrap" id="cartAddress"> 
                <!-- 选择收获地址list --> 
                <ul class="cart_address_list clearfix" id="cartAddressList"></ul> <!-- 管理收获地址 --> 
                <ul class="cart_address_ctrl clearfix" id="addressCtrl"> 
                    <li>
                        <a href="javascript:;" class="cart_icon_link allAddressSwitch" style="display:none">显示全部地址</a> 
                    </li> 
                    <li><a href="" target="_blank">管理收货地址</a></li> 
                    <li><a href="" class="address.php">添加新地址</a></li> 
                </ul> 
            </div>
            <div id="J_otherAddrWrap">
                <div class="__addressPop">
                    <dl class="address_pop">
                        <dt>邮政编码：</dt>
                        <dd>
                            <i class="needicon">*</i>
                            <input type="text" data-type="c" data-normal="" class="text formsize_normal J_postcode J_form vm" name="code" required>
                            <span class="prompt"></span>
                        </dd>
                        <dt>街道地址：</dt>
                        <dd>
                            <i class="needicon">*</i>
                            <textarea data-type="*" data-min="5" data-max="100" class="textarea formsize_large J_street J_form" name="address" cols="30" rows="3" required></textarea>
                            <span class="prompt breakline">请填写街道地址，最少5个字，最多不能超过100个字</span>
                        </dd>
                        <dt>收货人姓名：</dt>
                        <dd><i class="needicon">*</i>
                            <input required type="text" data-type="*" data-normal="" requiredclass="text formsize_normal J_name J_form vm" name="name" >
                            <span class="prompt"></span>
                        </dd>
                        <dt>手机：</dt>
                        <dd>
                            <i class="needicon">*</i>
                            <input type="text" required data-type="phone"  data-normal="" class="text formsize_normal J_mobile J_form vm" name="phone">
                            <span class="prompt"></span>
                        </dd>
                        <dt></dt>
                        <dd class="pt10 oper_btn">
                            <!-- <input type="submit" values="提交"> -->
                            <input type="submit" value="提交" style="width:104px;height:34px;border:none;background:#FFA701;color:#fff;font-size:18px;" >
                            <input type="reset" value="取消" style="border:none;width:104px;height:34px;font-size:18px;">
                        </dd>
                    </dl>
                </div>
            </div>
    </form>
  
    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
</body>
</html>
