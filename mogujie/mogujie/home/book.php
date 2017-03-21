<?php
session_start();
// 导入头部
include_once './config/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
</head>
<body>
    <div class="box">
        <div class="tj">
            <a href="../admin/Books/add.php" style="display:block;width:115px;height:32px;text-decoration:none;background:#FF177A;border:none;color:#fff;line-height:32px;text-align:center">发表留言</a>
        </div>
        <table style="width:1190px;text-align:center"cellspacing="0">
        <caption><h2>用户留言板</h2></caption>
            <tr>
                <!-- <td width="120">ID</td> -->
                <td width="10%">昵称</td>
                <td width="20%">标题</td>
                <td width="40%">内容</td>
                <td width="20%">留言时间</td>
                <td width="10%">操作</td>
            </tr>
<?php
    // 连接数据库
    include '../public/config.php';
    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php">返回</a>');
    mysqli_set_charset($link,'utf8');
    //遍历表格
        $sql = "select b.uid,b.bid,b.title,b.content,b.time,u.username from ".FIX."book b,".FIX."user u where b.uid=u.id";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_num_rows($res) > 0) {
            // var_dump($res);
            while ($row = mysqli_fetch_assoc($res)) {
                echo"<tr>
                    <td>".$row['username']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['content']."</td>
                    <td>".date('Y-m-d H:i:s',$row['time'])."</td>
                    <td>
                        <div class='button-group'>
                            <a href='../admin/Books/action.php?a=del&&bid=".$row['bid']."&&uid=".$row['uid']."' class='button border-red' >
                                <span class='icon-trash-o'></span>删除
                            </a>
                        </div>
                    </td>
                </tr>";
            }
        } else {
            echo "
                <tr>
                    <td colspan='6'>查询无果</td>
                </tr>
            ";
        }
        ?>
            <!-- <tr>
                <td>昵称</td>
                <td>内容</td>
                <td>时间</td>
                <td>电话</td>
                <td>
                    <a href='adredit.php?id=".$row['id']."' style="">编辑</a>
                    <a href='./action/adraction.php?a=del&id=".$row['id']."'>删除</a>
                </td>
            </tr> -->
        </table>
    </div>
    <?php
        include_once './config/footer.php';
    ?>
</body>
<style>
    .box{
        width: 1200px;
        height:700px;
        border: 1px solid #dfdfdf;
        margin:0 auto;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .tj{
        width:115px;
        height:32px;
        color:#ccc;
        float: right;
    }
    td{
        padding: 8px;
        border:1px solid #ddd;
    }
</style>
</html>