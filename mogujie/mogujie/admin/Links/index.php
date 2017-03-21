<?php
session_start();
if(empty($_SESSION['adminInfo'])){
    header('location:index.php');    
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="../css/pintuer.css">
<link rel="stylesheet" href="../css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<!-- <form method="post" action="" id="listform"> -->
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 友情链接列表</strong> <a href="add.php" style="float:right; display:none;">添加友情链接</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加友情链接</a> </li>
        <form action="index.php">
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="title" class="input" value="<?=@$_GET['title']?>" style="width:250px;  line-height:17px;display:inline-block" />
          <button type="submit" class="button border-main icon-search" >搜索</button></li>
        </form>
      </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">编号</th>
            <th>链接标题</th>
            <th>链接网址</th>
            <th>操作</th>
        </tr>
    
        <?php
        // 连接数据库
        include '../../public/config.php';
        $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php">返回</a>');
        mysqli_set_charset($link,'utf8');
        // 搜索开始
        $where = 'where 1=1';
        $search = '';
        //拼接搜索条件
        // var_dump($_SESSION);
        if (!empty($_GET['title'])) {
        $where .= " and title like '%{$_GET['title']}%'";
        $search .= '&title='.$_GET['title'];
        }
        // 搜索结束

        //分页开始
        //设置每页显示的条数
        $num = 6;
        // 查出总条数
        $sql = 'select count(*) from '.FIX."link $where";
        // echo "$sql";
        $res = mysqli_query($link, $sql);
        $total = mysqli_fetch_row($res)[0];
        // var_dump($total);
        // die;
        // 计算总页码数
        $totalpage = ceil($total/$num);
        //获取当前页
        $p = isset($_GET['p'])?$_GET['p']:1;
        if ($p <1 ) $p = 1;
        if ($p > $totalpage) $p = $totalpage;
        //计算偏移量
        $offset = ($p-1) * $num;
        $limit = "limit $offset,$num";
        // 分页结束
    
        //遍历表格
        $sql = "select * from ".FIX."link $where $limit";
        // echo "$sql";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_num_rows($res) > 0) {
            // var_dump($res);
            while ($row = mysqli_fetch_assoc($res)) {
                echo"<tr>
                    <td>".$row['lid']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['link']."</td>
                    <td>
                        <div class='button-group'>
                            <a href='edit.php?id=".$row['lid']."' class='button border-main'>
                                <span class='icon-edit'></span>修改
                            </a>
                            <a href='action.php?a=del&&lid=".$row['lid']."' class='button border-red' >
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
           
        <tr>
            <td colspan="8">
            <div class="pagelist">
                共<?=$total?>条 
                <a href="index.php?p=<?=($p-1)?>">上一页</a>
                <?php
                    for($i = 1; $i <= $totalpage; $i++){
                        echo "<span ".($i==$p?"class='current'":'').">$i</span>";
                    }
                ?>
                <a href="index.php?p=<?=($p+1)?>">下一页</a>
                <a href="index.php?p=<?=$totalpage?>">尾页</a>
            </div>
            </td>
        </tr>
    </table>
  </div>
<!-- </form> -->
</body>
</html>