<?php
session_start();
if (empty($_GET['a'])) {
    echo '<script>alert("非法操作！");location.href="../index.php"</script>';
    exit;
}
$a = $_GET['a'];

include_once('../../public/config.php');
// 1.connect
    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败,点<a href="index.php">此处</a>返回');
// 2.charset
    mysqli_set_charset($link,'utf8');

    switch ($a) {
        // 处理编辑
        case 'edit':
            if (empty($_POST)) header('location:index.php');
            //接收数据
            $oid = $_GET['oid'];
            $status = $_POST['status'];

            $sql = "update ".FIX."orders set status=$status where id=$oid";
            // echo "$sql";
            $res = mysqli_query($link, $sql);
            if ($res && mysqli_affected_rows($link) > 0) {
                echo '<script>alert("修改成功");location.href="index.php"</script>';
                exit;
            } else{
                // echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
                exit;
            }
            break;

        default:
            echo '<script>alert("非法操作！");location.href="../index.php"</script>';
            break;
    }

// 6.close
    mysqli_close($link);