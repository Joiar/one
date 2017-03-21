<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/foot.css">
</head>
<body>
    <div class="clear:both;"></div>
    <!-- 尾部 -->
    <div class="footer">
        <div class="footer-c">
            <div class="footer-center">
                <!-- 上面部分 -->
                <div class="footer-top">
                    <!-- 新手帮助 -->
                    <div class="footer-top-a">
                        <div class="footer-top-a-a">
                            <h3>- 新手帮助 -</h3>
                            <ul>
                                <li class="footer-top-a-b a">
                                    <a href="">常见问题</a>
                                </li>
                                <li class="footer-top-a-b a">
                                    <a href="">自助服务</a>
                                </li>
                                <li class="footer-top-a-b">
                                    <a href="">联系客服</a>
                                </li>
                                <li class="footer-top-a-b">
                                    <a href="">意见反馈</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- 权益保障 -->
                    <div class="footer-top-a">
                        <div class="footer-top-a-a">
                            <h3>- 权益保障 -</h3>
                            <ul>
                                <li class="footer-top-a-b a">
                                    <a href="">全国包邮</a>
                                </li>
                                <li class="footer-top-a-b a">
                                    <a href="">7天无理由退货</a>
                                </li>
                                <li class="footer-top-a-b" style="width: 80px">
                                    <a href="">退货运费补贴</a>
                                </li>
                                <li class="footer-top-a-b">
                                    <a href="">限时发货</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- 支付方式 -->
                    <div class="footer-top-a">
                        <div class="footer-top-a-a">
                            <h3>- 支付方式 -</h3>
                            <ul>
                                <li class="footer-top-a-b a">
                                    <a href="">微信支付</a>
                                </li>
                                <li class="footer-top-a-b a">
                                    <a href="">支付宝</a>
                                </li>
                                <li class="footer-top-a-b">
                                    <a href="">白付美支付</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-top-a">
                        <div class="footer-top-a-a">
                            <h3>- 友情链接 -</h3>
                <?php
                // 包含配置文件
                include_once '../public/config.php';
                // 连接数据库
                $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败！');
                mysqli_set_charset($link,'utf8');
                $sql = "SELECT * FROM ".FIX."link";
                $res = mysqli_query($link,$sql);
                // $row = mysqli_fetch_assoc($res);
                if ($res && mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>
                    <!-- 友情链接 -->
                            <ul>
                                <li class="footer-top-a-b a">
                                    <a href="<?=$row['link']?>"><?=$row['title']?></a>
                                </li>
                            </ul>
                <?php }
                } ?>
                        </div>
                    </div>
                </div>

            <!-- 下面部分 -->
                <div class="footer-bottom-a">
                    <ul>
                        <li class="footer-bottom-a-a">
                            <a href="">关于我们</a>
                        </li>
                        <li class="footer-bottom-a-a">
                            <a href="">招聘信息</a>
                        </li>
                        <li class="footer-bottom-a-a">
                            <a href="">联系我们</a>
                        </li>
                        <li class="footer-bottom-a-a">
                            <a href="">商家入驻</a>
                        </li>
                        <li class="footer-bottom-a-a">
                            <a href="">商家后台</a>
                        </li>
                        <li class="footer-bottom-a-a">
                            <a href="">蘑菇商学院</a>
                        </li>
                        <li class="footer-bottom-a-a">
                            <a href="">商家社区</a>
                        </li>
                    </ul>
                    <p class="bq">©2017 Mogujie.com 杭州卷瓜网络有限公司</p>
                </div>

                <div class="footer-bottom-a">
                    <p class="bq">营业执照注册号：330106000129004  |  网络文化经营许可证：浙网文（2016）0349-219号增值  |  电信业务经营许可证：浙B2-20110349  | 安全责任书  | 浙公网安备 33010602002329号</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>