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
        if (empty($_SESSION['info'])) {
        echo '<script>alert("请先登录");location.href="../../home/login.php"</script>';
        exit;
    }
        // var_dump($_SESSION);
        //接收数据
        $name = $_SESSION['info']['username'];
        $id = $_SESSION['info']['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $time = time();

        //准备sql语句
        $sql = "insert into ".FIX."book(uid,name, title, content,time) values('$id','$name', '$title', '$content', '$time')";
        // $sql = "select * from ".FIX."book b,".FIX."user u where b.uid=u.id";
        // echo $sql;
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_affected_rows($link) > 0) {
            echo '<script>alert("恭喜您，留言发表成功");location.href="../../home/book.php"</script>';
            exit;
        } else {
            echo '<script>alert("非常抱歉，用户信息添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        break;


    // 删除留言信息
    case 'del':
        if (empty($_SESSION['info'])) {
            echo '<script>alert("请先登录");location.href="../../home/login.php"</script>';
            exit;
        }
        $bid = $_GET['bid'];
        $uid = $_GET['uid'];
        if ($_SESSION['info']['id'] !== $uid) {
            echo '<script>alert("很抱歉，您不能删除其他用户留言");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        $sql = "delete from ".FIX."book where bid = $bid";
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link) > 0){
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