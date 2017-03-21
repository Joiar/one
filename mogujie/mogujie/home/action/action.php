<?php
session_start();

include_once('../../public/config.php');
include_once '../../public/function.php';
// 连接数据库
$link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
// 设置字符集
mysqli_set_charset($link,'utf8');
$a = $_GET['a'];

switch ($a) {
    // 登录
    case 'login':
        // 接收数据
        $name = $_POST['user'];
        $pwd = md5($_POST['pwd']);
        // $pwd = $_POST['pwd'];
        // 准备sql语句
        $sql = "select * from mgj_user where username='$name' and pwd='$pwd' and status=1";
        // echo "$sql";
        // exit;
        $res = mysqli_query($link,$sql);
        if($res && mysqli_num_rows($res)>0){
            $_SESSION['info']=mysqli_fetch_assoc($res);
            echo '<script>alert("登录成功，欢迎您！");location.href="../index.php"</script>';
            header('refresh:2;url=../index.php');
        } else{
            echo '<script>alert("登录失败，请重试");location.href="../login.php"</script>';
            header('refresh:2;url=../login.php');
        }
        break;

    // 退出登录
    case 'loginout':
        unset($_SESSION['info']);
        header('location:../index.php');
        break;
    // 注册
    case 'reg':
        // 接收数据
        $name = $_POST['user'];
        $pwd = md5($_POST['pwd']);
        $pwd2 = md5($_POST['pwd2']);
        if($pwd2 != $pwd){
            echo "两次密码不一致,2秒后跳转到<a href='../index.php'>注册</a>页";
            header('refresh:2;url=../reg.php');
            exit;
        }
        // 准备sql语句
        $sql = "insert into mgj_user(username, pwd, role, addtime) values('$name', '$pwd',1, unix_timestamp())";
        // echo $sql;
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link)>0){
            echo '<script>alert("注册成功，欢迎您！");location.href="../login.php"</script>';
            header('refresh:2;url=../login.php');
        } else{
            echo '<script>alert("注册失败");location.href="../reg.php"</script>';
            header('refresh:2;url=../reg.php');
        }
        break;

    // 个人资料
    case 'personal':
        // 接收数据
        $id =$_GET['id'];
        $name = $_POST['user'];
        $sex = $_POST['sex'];
        $des = ($_POST['des']);
        $birth = ($_POST['birth']);
        $phone = ($_POST['phone']);

        // 准备sql语句
        $sql = "update ".FIX."user set username='$name',sex='$sex',phone='$phone',des='$des',birth='$birth' where id=".$id;
        echo "$sql";
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link) > 0){
            echo '<script>alert("恭喜你，个人资料修改成功");location.href="../personal.php"</script>';
            header('refresh:2;url=../personal.php');
        // }else{
        //     echo '<script>alert("很抱歉，修改失败");location.href="../personal.php"</script>';
        //     header('refresh:2;url=../personal.php');
        }
        break;

    // 个人头像
    case 'file':
        // 处理修改
        if (empty($_GET['id'])) {
            header('location:personal.php');
        }
        $id = $_GET['id'];
        // 接受文件
        $info = upload('pic', '../../Public/Pic');
        // var_dump($info);
        if ($info['status']) {
            $pic = $info['name'];
        } else {
            echo '<script>alert("'.$info['msg'].'");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }

        // 接收数据
        $id =$_GET['id'];
        // 准备sql语句
        $sql = "update ".FIX."user set img='$pic' where id=".$id;
        // echo "$sql";
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link) > 0){
            echo '<script>alert("恭喜你，个人头像修改成功");location.href="../personal.php"</script>';
            header('refresh:2;url=../personal.php');
        }else{
            echo '<script>alert("很抱歉，修改失败");location.href="../personal.php"</script>';
            header('refresh:2;url=../personal.php');
        }
        break;

    default:
        echo "非法操作！2秒后<a href='../personal.php'>跳转</a>";
        header('refresh:2;url=../personal.php');
        break;
}