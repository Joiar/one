<?php
// 判断是否是非法访问
if(empty($_GET['a'])){
    echo '<script>alert("非法访问");location.href="index.php"</script>';
    exit;
}
// 开启session
session_start();

// 连接数据库
include '../public/config.php';
$link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败。<a href="index.php">返回</a>');
// 设置字符集
mysqli_set_charset($link,'utf8');
switch ($_GET['a']) {
    case 'login':
        // var_dump($_POST);
        // var_dump($_SESSION);
        //接收数据
        $username = $_POST['username'];
        $pwd = md5($_POST['pwd']);
        $yzm = $_POST['yzm'];
        //判断用户名是否为空，是否合法
        // if(){

        // }
        //密码空。。。
        //1.判断验证码
        if (strtolower($yzm) != strtolower($_SESSION['yzm'])) {
            echo '<script>alert("验证码错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }

        //2.判断账号和密码
        $sql = "select * from ".FIX."user where username='$username' and pwd='$pwd'";
        // echo $sql;exit;
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_num_rows($res) > 0) {
            //登录成功，将用户信息写入session
            $_SESSION['adminInfo'] = mysqli_fetch_assoc($res);
            echo '<script>alert("恭喜你，登录成功！");location.href="index.php"</script>';
        } else {
            echo '<script>alert("用户名或密码错误");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
        break;

    case 'loginout':  //退出登录
        unset($_SESSION['adminInfo']);
        header('location:./index.php');
        break;

    default:
        header('location:index.php');
}