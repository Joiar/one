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
    // 添加分类
    case 'add':
        if (empty($_POST)) header('location:index.php');
        // var_dump($_POST);
        //接收数据
        $name = $_POST['name'];
        $pid = $_POST['pid'];
        // var_dump($_POST['pid']);
        // die;
        $path = $_POST['path'];
        if (empty($_GET['id'])) {
            $sql = "insert into ".FIX."type values(null,'$name', '$pid', '$path')";
        } else {
            $path = $path.$id.',';
            $sql = "insert into ".FIX."type values(null,'$name', '{$_GET['id']}', '$path')";
            echo $sql;
        }

        //准备sql语句
        // echo $sql;
        // die;
        $res = mysqli_query($link, $sql);
        if ($res && mysqli_affected_rows($link) > 0) {
            echo '<script>alert("恭喜您，添加成功");location.href="index.php"</script>';
            exit;
        } else {
            echo '<script>alert("非常抱歉，添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }
        break;

    // 删除分类信息
    case 'del':
        $id = $_GET['id'];
        $sql = "delete from ".FIX."type where id = $id";
        // echo $sql;
        // die;
        $res = mysqli_query($link,$sql);
        if($res && mysqli_affected_rows($link)>0){
            echo '<script>alert("恭喜您，删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            exit;
        }else{
            echo '<script>alert("很抱歉，删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
        break;

    // 修改分类信息
    case 'edit':+88

        if (empty($_POST)) header('location:index.php');
        // var_dump($_POST);
        //1.先修改当前条数据
        $id = $_POST['id'];
        $name = $_POST['name'];
        $path = $_POST['path'].',';
        $pid = ltrim(strrchr($_POST['path'], ','), ',');
        $sql = "update ".FIX."type set name='$name', pid='$pid', path='$path' where id=$id";
        // echo $sql;
        mysqli_query($link, $sql);

        //2.处理后代数据
        $like = $_POST['ypath'].$id.',';
        $sql = 'select * from '.FIX."type where path like '$like%';";

        $res = mysqli_query($link, $sql);
        $son = mysqli_fetch_all($res, MYSQLI_ASSOC);
        foreach ($son as $v) {
            $sonPath = str_replace($like, $path.$id.',', $v['path']);
            $sql = "update ".FIX."type set path='$sonPath' where id={$v['id']}";

            mysqli_query($link, $sql);
        }
        header('location:index.php');

        // $res = mysqli_query($link, $sql);
        // if ($res && mysqli_affected_rows($link) > 0) {
        //  echo '<script>alert("修改成功");location.href="index.php"</script>';
        //  exit;
        // } else{
        //  echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        //  exit;
        // }
        break;
    default:
        header('location:index.php');
        break;
}