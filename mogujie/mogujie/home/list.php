<?php
session_start();
// 导入头部
include_once './config/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品列表</title>
    <link rel="stylesheet" type="text/css" href="./css/list.css">
</head>
<body>
    <div class="centent">
        <!-- <div class="xq2"> -->
            <!-- 开始遍历商品 -->
            <?php
            include_once '../public/config.php';
            $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
            mysqli_set_charset($link,'utf8');
            $sql = "select * from ".FIX."goods where status=1";
            $res = mysqli_query($link,$sql);
            $arr = mysqli_fetch_all($res,1);
            foreach ($arr as $value) {?>
                <div class="tp2">
                    <img src="<?=__PUBLIC__.'/Goods/'.$value['pic']?>" style="width:220px">
                    <a href="detail.php?id=<?=$value['id']?>" class="wz">
                        <p style="height:22px;"><?=$value['name']?></p>
                        <div class="jg">
                            <b>¥<?=$value['price']?></b>
                        </div>
                    </a>
                </div>

            <?php
            }
            ?>
            <!-- 结束遍历商品 -->

        <!-- </div> -->

    </div>
    <?php
        // 连接数据库
        // 搜索开始
        $where = 'where 1=1';
        $search = '';
        //拼接用户名搜索条件
        if (!empty($_GET['name'])) {
        $where .= " and name like '%{$_GET['name']}%'";
        $search .= '&name='.$_GET['name'];
        }

        // 搜索结束

        //分页开始
        //设置每页显示的条数
        $num = 6;
        // 查出总条数
        $sql = 'select count(*) from '.FIX."goods $where";
        $res = mysqli_query($link, $sql);
        $total = mysqli_fetch_row($res)[0];
        // var_dump($total);
        // die;
        // 计算总页码数
        $totalpage = ceil($total/$num);
        //获取当前页
        $p = isset($_GET['p'])?$_GET['p']:1;
        if ($p <1 ) $p = 1;
        if ($p > $totalpage) $p = $totalpage;
        //计算偏移量
        $offset = ($p-1) * $num;
        $limit = "limit $offset,$num";
        // 分页结束
        ?>
        <div class="pagelist">
        共<?=$total?>条
        <a href="list.php?p=<?=($p-1)?>">上一页</a>
        <?php
            for($i = 1; $i <= $totalpage; $i++){
                echo "<span ".($i==$p?"class='current'":'').">$i</span>";
            }
        ?>
        <a href="list.php?p=<?=($p+1)?>">下一页</a>
        <a href="list.php?p=<?=$totalpage?>">尾页</a>
    </div>
    <div style="clear:both;"></div>
    <!-- 导入页脚 -->
        <?php
            include_once './config/footer.php';
        ?>
</body>
</html>