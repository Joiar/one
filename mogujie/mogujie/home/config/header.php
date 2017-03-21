<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <div class="header">
        <div class="header-center">
            <div class="header-center-left">
                <a href="../home/index.php">蘑菇街首页</a>
            </div>
            <div class="header-center-right">
                <ul>
                    <?php
                        if (!empty($_SESSION['info'])) {
                            echo "<li><a href=''>欢迎".$_SESSION['info']['username'].'</a></li>&nbsp;';
                            echo "<li><a href='action/action.php?a=loginout' style='color:#f07'>退出登录</a></li>";
                        }else{
                            echo "<li><a href='login.php'>登录</a></li>";
                            echo "<li><a href='reg.php'>注册</a></li>";
                        }
                    ?>
                    <li class="XD">&nbsp;<a href="personal.php">个人信息</a> |</li>
                    <li class="DD"><a href="../home/order.php" >我的订单</a> |</li>
                    <li class="GWC"><a href="shopping.php">购物车</a> |</li>
                    <li class="KHFW"><a href="book.php">留言板
                        <!-- <i id="khfw-ico"></i> -->
                     </a>
                        <!-- <ol>
                            <li><a>消费者服务</a></li>
                            <li><a>商家服务</a></li>
                            <li><a>规则中心</a></li>
                        </ol> -->
                     </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="SS">
        <div class="SS-center">
            <div class="logo">
            </div>
            <div class="SS-center-center">
                <div class="selectbox">
                    <span>搜商品</span>
                </div>
                <input type="text" class="txt" placeholder="棉服">
                <input type="submit" value="搜索" class="sb" placeholder="棉服">
            </div>
            <!-- <div style="clear:both"></div> -->
            <div class="xiazai">
                <img src="./image/upload_66hilkaf40egj8f7330482ljbcah4_440x180.png" width="220">
            </div>
        </div>
    </div>
</body>
</html>