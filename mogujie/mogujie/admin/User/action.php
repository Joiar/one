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
    case 'add':
        if (empty($_POST)) header('location:index.php');
        var_dump($_POST); 
        //接收数据
        $username = $_POST['username'];
        $pwd = md5($_POST['pwd']);
        $pwd2 = md5($_POST['pwd2']);
        $role = $_POST['role'];
        $time = time();
        
        // 判断两次密码是否一致
        if ($pwd != $pwd2) {
            echo '<script>alert("两次密码不一致");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        //准备sql语句
        $sql = "insert into ".FIX."user(username, pwd, role, addtime) values('$username', '$pwd', '$role', '$time')";
        // echo $sql;
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_affected_rows($link) > 0) {
            echo '<script>alert("恭喜您，用户信息添加成功");location.href="index.php"</script>';
            exit;
        } else {
            echo '<script>alert("非常抱歉，用户信息添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        break;

    // 处理状态
    case 'zt':
        // 准备变量
        $zt = $_GET['zt'];
        $zt == 1 ? $zt = 2 : $zt = 1;
        $id = $_GET['id'];
        if ($_SESSION['adminInfo']['id'] == $id) {
            echo '<script>alert("不能自己修改自己！！！");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        // 判断是否是超级管理员
        if ($id == 10){
            echo '<script>alert("不能修改超级管理员信息");location.href="index.php"</script>';
            exit;
        }
        //准备sql语句
        $sql = "update ".FIX."user set status=$zt where id=$id";
        // echo $sql;
        // die;
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link)>0){
            echo '<script>alert("恭喜您，用户状态修改成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }else{
             echo '<script>alert("恭喜您，用户状态修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;            
        }
        break;

    // 删除用户信息
    case 'del':
        $id = $_GET['id'];
        if ($_SESSION['adminInfo']['id'] == $id) {
            echo '<script>alert("不能自己删除自己！！！");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        
        $sql = "delete from ".FIX."user where id = $id"; 
        // echo $sql;
        // die;
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link)>0){
            echo '<script>alert("恭喜您，用户信息删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }else{
            echo '<script>alert("很抱歉，用户信息删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
        break;
    
    // 修改用户资料
    case 'edit':
        if (empty($_POST)) header('location:index.php');
        //接收数据
        $username = $_POST['username'];
        $role = $_POST['role'];
        $phone = $_POST['phone'];
        $des = $_POST['des'];
        $pwd = $_POST['pwd'];
        $pwd2 = $_POST['pwd2'];
        $qq = $_POST['qq'];
        $id = $_GET['id'];
        $set = "username = '$username',role = $role,phone = '$phone',des = '$des',qq = '$qq'";
        // var_dump($role);
        // die;
        // 判断是否是超级管理员
        if ($id = '10') {
            if (($_SESSION['adminInfo']['role'] !== 3) && ($id !== '10')){
                echo '<script>alert("不能修改超级管理员信息");location.href="index.php"</script>';
                exit;
            }
        }
        // 判断密码是否一致
        if($pwd !== $pwd2 ){
            echo '<script>alert("两次密码不一致");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        //判断用户名是否合法
        
        $sql = "update ".FIX."user set $set where id=$id";
        // var_dump($sql);
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