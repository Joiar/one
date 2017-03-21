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
    <title>确认订单</title>
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
    // $arr = mysqli_fetch_assoc($res);
    // var_dump($arr);
    // 判断地址
    if($res && mysqli_num_rows($res)>0) {?>

        <!-- biaodan -->
        <div class="bd" style="width:1200px;margin:0 auto;border:1px solid #ddd;margin-top:35px;">
            <div class="cart_page_wrap pt0">
                <h2 class="cart_stit">选择收货地址</h2>
                <div class="cart_address_wrap" id="cartAddress">
                    <!-- 选择收获地址list -->
                <form action="action.php?a=addOrder" method="post">
                    <ul class="cart_address_list clearfix" >
                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                        <input type="radio" name="address" value="<?=$row['id']?>" style="float:left">
                        <li style="border:1px dashed #FF4466;padding:10px;font-size:14px; float:left;display:block">
                            <p class="cart_address_street" style="border-bottom:1px dashed #FF4466;width:130px;padding:2px;"><?=$row['name']?>
                                <b style="float:right">收</b>
                            </p>
                            <p class="cart_address_street"><?=$row['address']?></p>
                            <p class="cart_address_zipinfo" ><?=$row['code']?></p>
                            <p class="cart_address_mobile"><?=$row['phone']?></p>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- 管理收获地址 -->
                    <ul class="cart_address_ctrl clearfix" id="addressCtrl">
                        <li> <a href="javascript:;" class="cart_icon_link allAddressSwitch" style="display:none">显示全部地址<i class="cart_icon_quarw">down</i></a> </li>
                        <li> <a href="address.php" target="_blank">管理收货地址</a> </li>
                        <li> <a href="addaddress.php" class="addOtherAddress">添加新地址</a> </li>
                        <li> <a href="address.php" class="addOtherAddress">修改地址</a> </li>

                    </ul>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <form action="action.php?a=addadress" method="post">
        <div class="content" style="width:1200px;height:100%;margin:0 auto;">
            <h2 class="cart_stit">选择收货地址</h2>
            <div class="cart_address_wrap" id="cartAddress">
                <!-- 管理收获地址 -->
                   <a href="address.php" target="_blank">添加新地址</a>
                   <a href="address.php" target="_blank">管理收货地址</a>
            </div>
            <div id="J_otherAddrWrap">
                <div class="__addressPop">
                    <dl class="address_pop">
                        <dt>邮政编码：</dt>
                        <dd>
                            <i class="needicon">*</i>
                            <input type="text" data-type="c" data-normal="" class="text formsize_normal J_postcode J_form vm" name="code">
                            <span class="prompt"></span>
                        </dd>
                        <dt>街道地址：</dt>
                        <dd>
                            <i class="needicon">*</i>
                            <textarea data-type="*" data-min="5" data-max="100" data-normal="请填写街道地址，最少5个字，最多不能超过100个字" data-errormsg="请填写街道地址，最少5个字，最多不能超过100个字" class="textarea formsize_large J_street J_form" name="address" cols="30" rows="3"></textarea>
                            <span class="prompt breakline">请填写街道地址，最少5个字，最多不能超过100个字</span>
                        </dd>
                        <dt>收货人姓名：</dt>
                        <dd><i class="needicon">*</i>
                            <input type="text" data-type="*" data-errormsg="请填写收货人" data-normal="" class="text formsize_normal J_name J_form vm" name="name">
                            <span class="prompt"></span>
                        </dd>
                        <dt>手机：</dt>
                        <dd>
                            <i class="needicon">*</i>
                            <input type="text" data-type="phone" data-errormsg="请填写正确的联系号码" data-normal="" class="text formsize_normal J_mobile J_form vm" name="phone">
                            <span class="prompt"></span>
                        </dd>
                        <dt></dt>
                        <dd class="pt10 oper_btn">
                            <input type="submit" class="confirm_btn J_okbtn mr10" style="border:none">
                            <input type="submit" class="cancel_btn J_cancelbtn" style="border:none">
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </form>
    <?php
    }
?>



    <div class="center-b">
    <?php
    //总价变量
    $total = 0;
    //总件数变量
    $nums = 0;
    if (empty($_SESSION['shopping'])) {
        echo '<h5 style="font-size:25px;text-align:center;height:100px;line-height:100px;">小主，购物车还是空的，快去<a href="list.php" style="font-size:25px;color:red">逛逛</a>吧</h5>';
    } else {
        foreach ($_SESSION['shopping'] as $value) :
            $total += $value['price']*$value['num'];
            $nums += $value['num'];
    ?>
    <table class="cart_table" id="cartOrderTable">
        <tr>
            <th></th>
            <th style="width:500px">商品信息</th>
            <th>单价(元)</th>
            <th >数量</th>
            <th >小计(元)</th>
            <!-- <th >操作</th> -->
        </tr>

        <tr>
            <td>
                <img style="width:60px;height:60px;" src="<?= __PUBLIC__.'/Goods/'.$value['pic'] ?>">
            </td>
            <td style="">
                <p><?=$value['name']?></p>
            </td>
            <!-- 单价 -->
            <td><p>￥<?=$value['price']?></p></td>
            <!-- 数量 -->
            <td>
                <div>
                    <p><?=$value['num']?></p>
                </div>
            </td>
            <!-- 小计 -->
            <td ><p>￥<?=number_format($value['price']*$value['num'],2)?></p></td>
        </tr>
    <?php endforeach;}
    ?>
    </table>
        <div class="cart_page_wrap" id="cartEmptyPage" style="display:none;">
            <div class="cart_empty">
            <div class="cart_empty_icon"></div>
            <h5 class="mb20">您的购物车还是空的，赶快去挑选商品吧！</h5>
            <ul class="cart_empty_list">
                <li>去看看大家都喜欢的<a href="http://www.mogujie.com/shopping/" class="cart_red cart_uline">潮流单品</a></li>
                <li>去看看正在折扣中的优品<a href="http://www.mogujie.com/tuan/" class="cart_red cart_uline">团购</a></li>
            </ul>
            </div>
        </div>

        <div class="cart_paybar wrap" id="cartPaybar">
            <input style="border:none;" type="submit" class="cart_paybtn fr cart_paybtn_disable" value="去付款">
            <div class="cart_paybar_info_cost cart_deep_red cart_bold cart_font26 cart_money fr goodsSum">¥<?=number_format($total,2)?></div>
            <div class="cart_paybar_info cart_pregray fr">
              共有
                <span class="cart_deep_red goodsNum"><?=$nums?></span> 件商品，总计：
            </div>
        </div>
        </form>
    </div>
    <?php
    // 导入尾部
        $_SESSION['total'] = $total;
    include_once './config/footer.php';
    ?>
</body>
</html>
