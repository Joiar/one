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
        $title = $_POST['title'];
        $url = $_POST['link'];
        // 3.sql
            $sql = "insert into ".FIX."link values(null,'$title','$url')";
        // 4.send
            $res = mysqli_query($link,$sql);
        // 5.process
            if ($res && mysqli_affected_rows($link) > 0) {
                echo '<script>alert("添加成功");location.href="index.php"</script>';
            } else {
                echo '<script>alert("添加失败，请检查相关信息");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            }
        break;
    

    // 删除链接
    case 'del':
            $lid = $_GET['lid'];
            $sql = "delete from ".FIX."link where lid=$lid";
            $res = mysqli_query($link,$sql);
            if ($res && mysqli_affected_rows($link) > 0) {
                echo '<script>alert("删除成功");location.href="index.php"</script>';
                exit;
            } else {
                echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
                exit;
            }
            break;
    
    // 修改链接
    case 'edit':
        if (empty($_POST)) header('location:index.php');
        //接收数据
        $lid = $_GET['lid'];
        $title = $_POST['title'];
        $url = $_POST['link'];
        $set = "title = '$title',link = '$url'";
       
        $sql = "update ".FIX."link set $set where lid=$lid";
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