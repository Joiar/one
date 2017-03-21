 <?php
session_start();
// var_dump($_SESSION);
// 导入头部
include_once './config/header.php';
// var_dump($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>基本信息_蘑菇街</title>
    <link rel="stylesheet" type="text/css" href="./css/personal.css">
    <link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
</head>
<body>
    <div class="hr">
    </div>
    <div class="content">
        <?php
        // 导入左边部分
        include_once './config/header3.php';
        ?>
        <div class="content-right">
            <!-- 基本资料 -->
            <div class="jbxx">
                <span><b>基本资料</b></span>
            </div>
            <!-- 表单部分 -->
            <div class="center">
                <form action="./action/action.php?a=personal&id=<?=$_SESSION['info']['id']?>" method="post">
                    <table>
                        <tr>
                            <td>昵&nbsp;&nbsp;称:</td>
                            <td>
                                <input class="kk" type="text" name="user" autofocus required  placeholder="昵称" value="<?= $_SESSION['info']['username']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>性别：</td>
                            <td>
                                <input type="radio" name="sex" <?=$_SESSION['info']['sex']==1?"checked":'';?>value="1">男
                                    <input type="radio" name="sex" <?=$_SESSION['info']['sex']=='2'?"checked":'';?>value="2">女
                            </td>
                        </tr>
                        <tr>
                            <td>生&nbsp;&nbsp;日：</td>
                            <td>
                                <input type="date" name="birth" value="<?=$_SESSION['info']['birth']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>手机号码：</td>
                            <td><input class="kk" type="text" name="phone"  required value="<?= $_SESSION['info']['phone']?>" placeholder="请输入您的手机号"></td>
                        </tr>
                        <tr>
                            <td valign="top">自我介绍：</td>
                            <td>
                                <textarea name="des" cols="60" rows="10" value="<?= $_SESSION['info']['des']?>" placeholder="随便写点什么，让大家了解你吧。" style="padding:0 10px;"></textarea>
                            </td>
                        </tr>
                    </table>
                    <input class="fo" type="submit" value="修改">
                    <input class="fo qx" type="submit" value="取消">
                </form>
            </div>
        </div>
    </div>
    <?php
    // 导入尾部
    include_once './config/footer.php';
    ?>
</body>
</html>
