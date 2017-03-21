<?php
if(empty($_GET['a'])){
    echo '<script>alert("非法访问");location.href="index.php"</script>';
    exit;
}
session_start();
// 连接数据库
include '../../public/config.php';
$link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php>返回</a>');
mysqli_set_charset($link,'utf8');

switch ($_GET['a']) {
    // 添加地址
    case 'addadress':
        // var_dump($_SESSION);
        // die();
        if (empty($_POST)) header('location:index.php');
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
            echo '<script>alert("亲，地址添加成功");location.href="../address.php"</script>';
            exit;
        }else{
            echo '<script>alert("亲，地址添加失败");location.href="../address.php"</script>';
            exit;
        }
        
        break;
    
    // 删除地址信息
    case 'del':
        $id = $_GET['id'];
        $sql = "delete from ".FIX."address where id = $id"; 
        // echo $sql;
        // die;
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link)>0){
            echo '<script>alert("恭喜您，用户地址删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        else{
            echo '<script>alert("很抱歉，地址信息删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        break;


    // 修改用户资料
    case 'adredit':
        if (empty($_POST)) header('location:index.php');
        // 接收数据
        $uid = $_SESSION['info']['id'];
        $address = $_POST['address'];
        $phone = $_POST['phone']; 
        $name = $_POST['name']; 
        $code = $_POST['code'];
        $id = $_GET['id'];
        // var_dump($id);
        $set = "uid = '$uid',address = $address,phone = '$phone',name = '$name',code = '$code'";
        // 准备sql语句
        $sql = "update ".FIX."address set $set where id=$id";
        // var_dump($sql);
        // echo "$sql";
        // die();
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_affected_rows($link) > 0) {
            echo '<script>alert("修改成功");location.href="../address.php"</script>';
            exit;
        } else{
            echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        break;
    
    
    
}