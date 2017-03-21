<?php
//判断是否是非法访问
if (empty($_GET['a'])) {
    header('location:index.php');
    exit;
}
session_start();

//连接数据库
include '../public/config.php';
$link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
mysqli_set_charset($link, 'utf8');

switch ($_GET['a']) {
    //添加单个商品到购物车
    case 'addGoods':
        if (empty($_GET['id'])) {
            header('location:shopping.php');
            exit;
        }
        $id = $_GET['id'];
        if (empty($_SESSION['shopping'][$id])) {
            //查出单条商品信息
            $sql = "select * from ".FIX."goods where id=$id limit 1";
            $res = mysqli_query($link, $sql);
            if ($res && mysqli_num_rows($res) > 0) {
                //找到了商品信息，将其写入session
                $info = mysqli_fetch_assoc($res);
                $info['num'] = 1;
                $_SESSION['shopping'][$id] = $info;
                header('location:shopping.php');
            } else {
                header('location:shopping.php');
                exit;
            }
        } else {
            $_SESSION['shopping'][$id]['num']++;
            header('location:shopping.php');
            exit;
        }
        break;
    // 数量加加
    case 'addNum':
        // 判断是否是非法访问
        if (empty($_GET['id'])) {
            header('location:shopping.php');
            exit;
        }
        // 接收数据
        $id = $_GET['id'];
        // 查询数据并判断库存
        $sql = "select store from ".FIX."goods where id = $id limit 1" ;
        $res = mysqli_query($link,$sql);
        $store = mysqli_fetch_assoc($res)['store'];
        if($store <= $_SESSION['shopping'][$id]['num']){
            echo '<script>alert("亲，库存不足啦");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }else{
            // 数据加加
            $_SESSION['shopping'][$id]['num']++;
            header('location:shopping.php');
            exit;
        }
        break;

    // 数量减减
    case 'cutNum':
        // 判断是否是非法访问
        if (empty($_GET['id'])) {
            header('location:shopping.php');
            exit;
        }
        // 接收数据
        $id = $_GET['id'];

        //判断不能小于1
        if ($_SESSION['shopping'][$id]['num'] <= 1) {
            echo '<script>alert("亲，最后一个商品了，不能再减了");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        $_SESSION['shopping'][$id]['num']--;
        header('location:shopping.php');
        exit;
        break;

    // 删除某个商品
    case 'del':
        //判断非法访问
        if (empty($_GET['id'])) {
            header('location:shopping.php');
            exit;
        }
        // 接收数据
        $id = $_GET['id'];
        unset($_SESSION['shopping'][$id]);
        header('location:shopping.php');
        break;

    // 删除购物车中所有商品
    case 'delAll':
        unset($_SESSION['shopping']);
        header('location:shopping.php');
        break;

    // 添加地址
    case 'addadress':
        // var_dump($_SESSION);
        // die();

        // 接收数据
        $uid = $_SESSION['info']['id'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $code = $_POST['code'];
        // 查询表里的地址
        $sql = "insert into ".FIX."address values(null,'$uid','$address','$phone','$name','$code')";
        // echo "$sql";
        // die();
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link)>0){
            echo '<script>alert("亲，地址添加成功");location.href="orderdetail.php"</script>';
            exit;
        }else{
            echo '<script>alert("亲，地址添加失败");location.href="orderdetail.php"</script>';
            exit;
        }

        break;

    // 下单操作
    case 'addOrder':
        // 判断是否选了地址
        // var_dump($_POST);
        // die;
        if (empty($_POST['address'])) {
            echo '<script>alert("亲，请先选择一个收货地址吧>-<");location.href="./orderdetail.php"</script>';
            // location.href='".$_SERVER'HTTP_REFERER']."'
            exit;
        }
        // 接收数据
        $uid = $_SESSION['info']['id'];
        $aid = $_POST['address'];
        $total = $_SESSION['total'];
        // var_dump($_SESSION);
        $time = time();
        // 接收sql语句
        $sql = 'insert into '.FIX."orders values(null, '$uid', '$aid', '$total', '$time', 1)";
        // var_dump($sql);
        // die;
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_affected_rows($link) > 0) {
            //再将商品信息插入订单详情
            $oid = mysqli_insert_id($link);
            $sql = 'insert into '.FIX."detail values";

            //循环拼接sql语句
            foreach ($_SESSION['shopping'] as $v) {
                $sql .= "(null, $oid, {$v['id']}, {$v['num']}),";
            }
            //处理sql语句右边的逗号
            $sql = rtrim($sql, ',');
            // echo $sql;
            $res2 = mysqli_query($link, $sql);
            if ($res2 && mysqli_affected_rows($link) == count($_SESSION['shopping'])) {
                //下单成功清空购物车
                unset($_SESSION['shopping']);

                echo '<script>alert("亲，下单成功，请尽快付款~~~");location.href="./pay.php?oid='.$oid.'"</script>';
                exit;
            } else {
                echo '<script>alert("亲，下单失败，请联系客服:18655298545");location.href="./orderdetail.php"</script>';
                exit;
            }
        } else {
            echo '<script>alert("亲，下单失败，请联系管理员");location.href="orderdetail.php"</script>';
            exit;
        }
        break;

    case 'qs':
        if (empty($_GET['oid'])) {
            header('location:order.php');
        }
        $oid = $_GET['oid'];
        $sql = "update ".FIX."orders set status=4 where id=$oid";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_affected_rows($link)) {
            header('location:order.php');
        } else {
            echo '<script>alert("亲，签收失败，请重试");location.href="order.php"</script>';
            exit;
        }
        break;

    case 'mr':
        if (empty($_GET['oid'])) {
            header('location:order.php');
        }
        $oid = $_GET['oid'];
        $sql = "update ".FIX."address set is_default=1 where id=$oid";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_affected_rows($link)) {
            header('location:address.php');
        } else {
            echo '<script>alert("亲，设置默认地址失败，请重试");location.href="address.php"</script>';
            exit;
        }
        break;

    case 'pj':
        if (empty($_GET['oid'])) {
                header('location:../index.php');
            }
            $oid = $_GET['oid'];
            // var_dump($_SESSION);
            // die;
            $uid = $_SESSION['info']['id'];
            $content = $_POST['content'];
            $time = time();
            $sql = "insert into ".FIX."pj values(null,$oid,$uid,'$content',$time)";
            // echo "$sql";
            // die;
            $res = mysqli_query($link,$sql);
            if ($res && mysqli_affected_rows($link) >0) {
                echo '<script>alert("评论成功！");location.href="order.php?oid='.$oid.'"</script>';
            } else {
                echo '<script>alert("评论失败，请重试！");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            }
            break;

        default:
            echo '非法操作！即将返回首页';
                header('refresh;url=../index.php');
            break;
        break;
}