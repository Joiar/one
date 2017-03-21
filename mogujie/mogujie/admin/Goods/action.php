<?php
if(empty($_GET['a'])){
    echo '<script>alert("非法访问");location.href="index.php"</script>';
    exit;
}
session_start();
// 连接数据库
include '../../public/config.php';
include_once('../../public/function.php');
$link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php>返回</a>');
mysqli_set_charset($link,'utf8');

switch ($_GET['a']) {
    case 'add':
        if (empty($_POST)) header('location:index.php');
            // 接受文件
            $info = upload('pic', '../../public/Goods');
            if ($info['status']) {
                $pic = $info['name'];
            } else {
                echo '<script>alert("'.$info['msg'].'");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
                exit;
            }

            $name = $_POST['name'];
            $price = $_POST['price'];
            $store = $_POST['store'];
            $status = $_POST['status'];
            $des = $_POST['des'];
            $tid = $_POST['tid'];
            $time = time();

            // 3.sql
                $sql = "INSERT INTO ".FIX."goods VALUES(NULL,'$tid','$name','$price','$pic','$des',$status,$store,'$time',1,1)";
            // 4.send
                $res = mysqli_query($link,$sql);
            // 5.process
                if ($res && mysqli_affected_rows($link) > 0) {
                    echo '<script>alert("添加成功");location.href="index.php"</script>';
                } else {
                    echo '<script>alert("添加失败，请检查相关信息");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
                }
            break;

    // 处理状态
    case 'zt':
        // 准备变量
        $zt = $_GET['zt'];
        $id = $_GET['id'];
        $zt == 1? $zt = 2: $zt = 1;
        // 准备sql语句
        $sql = "update ".FIX."goods set status=$zt where id=$id";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_affected_rows($link) > 0) {
            echo '<script>alert("修改成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        } else {
            echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        break;

    // 删除用户信息
    case 'del':
            $id = $_GET['id'];
            $sql = "delete from ".FIX."goods where id=$id";
            $res = mysqli_query($link,$sql);
            if ($res && mysqli_affected_rows($link) > 0) {
                echo '<script>alert("删除成功");location.href="index.php"</script>';
                exit;
            } else {
                echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
                exit;

            }
            break;
    
    // 修改用户资料
    case 'edit':
            if (empty($_POST)) header('location:index.php');
            //接收数据
            $name = $_POST['name'];
            $tid = $_POST['tid'];
            $price = $_POST['price'];
            // $pic = $_POST['pic'];
            $store = $_POST['store'];
            $status = $_POST['status'];
            $des = $_POST['des'];
            $id = $_GET['id'];

            // 判断图片文件
            // if (!empty($pic)) {
            //     $set = "name='$name',tid=$tid,price=$price,status=$status,store='$store',pic='$pic',des='$des'";
            // } else {
            // }
                $set = "name='$name',tid=$tid,price=$price,status=$status,store='$store',des='$des'";

            $sql = "update ".FIX."goods set $set where id=".$id;
            $res = mysqli_query($link, $sql);
            if ($res && mysqli_affected_rows($link) > 0) {
                echo '<script>alert("修改成功");location.href="index.php"</script>';
                exit;
            } else{
                echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
                exit;
            }
            break;
    default:
        header('location:index.php');
        break;
}