<?php
session_start();
// 导入头部
include_once './config/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/detail.css">
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body>
    <?php
        include_once '../public/config.php';
        $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
        mysqli_set_charset($link,'utf8');
        $id = $_GET['id'];
        $sql = "select * from ".FIX."goods where id=$id";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_num_rows($res) > 0) {
            $info = mysqli_fetch_assoc($res);
        } else {
            header('location:index.php');
            exit;
        }
    ?>
        <div class="content">
            <!-- 图片部分 -->
            <div class="tt">
                <div class="tt-top">
                    <img src="<?=__PUBLIC__.'/Goods/'.$info['pic']?>" width="400" height="600">
                </div>
                <div class="box">
                    <div class="tp">
                        <img src="./image/detail/2.jpg" width="70" height="70">
                    </div>
                    <div class="tp">
                        <img src="./image/detail/3.jpg" width="70" height="70">
                    </div>
                    <div class="tp">
                        <img src="./image/detail/4.jpg" width="70" height="70">
                    </div>
                    <div class="tp">
                        <img src="./image/detail/5.jpg" width="70" height="70">
                    </div>
                </div>
            </div>
            <!-- 右边部分 -->
            <div class="right">
                <h1 class="title">
                    <span><?= $info['name'] ?></span>
                </h1>
                <div class="min-box">
                    <table cellspacing="20">
                        <tr>
                        <td>价格：</td>
                        <td>
                            <span>¥<?= $info['price'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>促销价：</td>
                        <td style="color:#ef2f23;font-size:24px;font-weight:700">
                            ¥<?= $info['price']*0.8 ?>
                        </td>
                        <td>评价：</td>
                        <td>197</td>
                        <td>累计销量：</td>
                        <td>1083</td>
                    </tr>
                    <tr>
                        <td>店铺优惠：</td>
                        <td style="color:#333">
                            商品99元包邮
                        </td>
                    </tr>
                    </table>
                </div>

                <div>
                    <table cellspacing="30">
                        <tr>
                            <td>尺码：</td>
                            <td>均码</td>
                        </tr>
                        <tr>
                            <td>数量：</td>
                            <td>
                                <select>
                                    <option>1</option>
                                </select>
                            </td>
                            <td>库存1050件</td>
                        </tr>
                    </table>
                </div>

            <?php if ($info['store'] > 0) {?>
                <div class="butn">
                        <a style="display:block; text-decoration:none; text-align:center;" class="btn" href="action.php?a=addGoods&id=<?=$id?>">立即购买</a>
                </div>
            <?php } else {
                echo '<span class="status">卖的太好了，暂时缺货~</span>';
            }?>
                <!-- 选项卡部分 -->
                <div class="content2">
                    <ul>
                        <li id="li1" class="cur" onmouseover="change1()">商品描述</li>
                        <li id="li2" onmouseover="change2()">累计评价</li>
                    </ul>
                    <div id="all">
                        <div id="div1" style="display:block;">
                            <br>
                            &nbsp;&nbsp;<?=$info['des']?>
                        </div>
                        <div id="div2" style="display:none;">
                            <br>
            <?php
            $uid = $_SESSION['info']['id'];
            $sql = "select u.username,u.img,p.content from ".FIX."pj p,".FIX."user u where p.uid=u.id and uid=$uid limit  5";
            // echo $sql;
            // echo $sql;
            // 发送sql请求
            $res = mysqli_query($link,$sql);
            if ($res && mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div>
                        <img src="<?= __PUBLIC__.'/Pic/'.$row['img']?>" height="30" width="30" style="border-radius:50%;">
                        <span><?= $row['username']?>：<?=$row['content']?></span>
                    </div>
                <?php }
                }
                ?>
                            <br/>
                        </div>
                    </div>
                </div> (｡◕ˇ∀ˇ◕）
            </div>
        </div>
    <!-- 导入页脚 -->
    <?php
        include_once './config/footer.php';
    ?>
</body>
</html>

<script>
    var li1 = document.getElementById('li1');
    var li2 = document.getElementById('li2');
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');

    function change1(){
        li1.setAttribute('class','cur');
        li2.setAttribute('class','');
        div1.style.display = 'block';
        div2.style.display = 'none';
    }
    function change2(){
        li1.setAttribute('class','');
        li2.setAttribute('class','cur');
        div1.style.display = 'none';
        div2.style.display = 'block';
    }

</script>