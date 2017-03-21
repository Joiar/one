<?php
session_start();
// var_dump($_SESSION);
// die();
// 导入头部
include_once './config/header2.php';
include_once '../public/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <link rel="stylesheet" type="text/css" href="./css/shopping.css">
    <link rel="stylesheet" type="text/css" href="./css/shopping2.css">
    <link rel="stylesheet" type="text/css" href="./css/shopping3.css">
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body class="media_screen_1200">
    <div id="body_wrap">
        <div class="g-header clearfix">
            <div class="g-header-in wrap clearfix">
                <div class="process-bar">
                    <div class="md_process md_process_len4">
                        <div class="md_process_wrap md_process_step1_5">
                            <div class="md_process_sd"></div>
                            <i class="md_process_i md_process_i1">
                                1         
                               <span class="md_process_tip">购物车</span>
                            </i>
                            <i class="md_process_i md_process_i2">
                                2                
                                <span class="md_process_tip">确认订单</span>
                            </i>
                            <i class="md_process_i md_process_i3">
                                3                
                                <span class="md_process_tip">支付</span>
                            </i>
                            <i class="md_process_i md_process_i4">
                                <img src="./image/right.png" width="23" height="23" alt="">
                                <span class="md_process_tip">完成</span>
                            </i>
                        </div>
                    </div>        
                </div>
                <div class="logo logo-cart">
                </div>
            </div>
        </div>
        
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
                    <th >操作</th>
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
                    <div class="cart_num cart_counter" data-stockid="16a57t6" data-stocknum="1986" data-timestamp="" data-ptp="1.Tu04rb.0.0.2qkhC"> 
                        <input type="text" class="cart_num_input cart_bold" maxlength="3" value="<?=$value['num']?>">  
                        <a href="action.php?id=<?=$value['id']?>&a=addNum" class="cart_num_add"></a> 
                        <a href="action.php?id=<?=$value['id']?>&a=cutNum" class="cart_num_reduce "></a>  
                    </div> 
                </div>
            </td>
            <!-- 小计 -->
            <td ><p>￥<?=number_format($value['price']*$value['num'],2)?></p></td>
            <!-- 操作 -->
            <td ><a href="action.php?id=<?=$value['id']?>&a=del">删除</a></td>
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
            <div class="cart_paybar_vmbox">
                <input type="checkbox" name="s_all" class="s_all_slave cart_vm" id="s_all_f" />
                <label for="s_all_f" class="mr10">全选</label>
                <a href="action.php?a=delAll" class="mr10 cart_uline cart_pregray" id="cartRemoveUnuse">清空商品</action.php?a=delAlla>
                <a href="javascript:;" class="mr10 cart_uline cart_pregray" id="cartRemoveToCollect">移入收藏夹</a>
            </div>
            <div class="cart_paybar wrap">

                <?php
                // 判断购物车里商品是否为空
                if(empty($_SESSION['shopping'])){
                    echo '<script>alert("购物车为空");location.href="list.php"</script>';
                    // header('location:slist.php');
                    exit;
                }
                echo "<a href='orderdetail.php' class='cart_paybtn fr cart_paybtn_disable' id='payBtn'>去付款</a>";
?>
            <a href="list.php" style="display:block;text-align:center;color:#6A6A6A;background:#ddd;width:152px;height:51px;margin-top:-1px;overflow:hidden;"class=' fr cart_paybtn_disable' value="继续购物"><h3 style="font-size:20px;">< 继续购物</h3></a>

            <div class="cart_paybar_info_cost cart_deep_red cart_bold cart_font26 cart_money fr goodsSum">¥ <?=number_format($total,2)?></div>
            <div class="cart_paybar_info cart_pregray fr">
              共有 <span class="cart_deep_red goodsNum"><?=$nums?></span> 件商品，总计：
            </div>
        </div>
        
    </div>
    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
</body>
</html>
