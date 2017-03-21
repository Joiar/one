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
    <div class="panel-head"><strong class="icon-reorder"> 用户列表</strong> <a href="add.php" style="float:right; display:none;">添加用户</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加用户</a> </li>
        <li>角色：</li>
        
        <form action="index.php">
        <if condition="$iscid eq 1">
          <li>
            <select name="role" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
              <option value="">请选择分类</option>
              <option <?=@($_GET['role']==1)?'selected':''?> value="1">普通用户</option>
              <option <?=@($_GET['role']==2)?'selected':''?> value="2">管理员</option>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="username" class="input" value="<?=@$_GET['username']?>" style="width:250px;  line-height:17px;display:inline-block" />
          <button type="submit" class="button border-main icon-search" >搜索</button></li>
        </form>
      </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">编号</th>
            <th>用户名</th>
            <th>角色</th>
            <th>状态</th>
            <th>注册时间</th>
            <th width="310">操作</th>
        </tr>
    
        <?php
        // 连接数据库
        include '../../public/config.php';
        $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败<a href="index.php">返回</a>');
        mysqli_set_charset($link,'utf8');
        // 搜索开始
        $where = 'where 1=1';
        $search = '';
        //拼接用户名搜索条件
        if (!empty($_GET['username'])) {
        $where .= " and username like '%{$_GET['username']}%'";
        $search .= '&username='.$_GET['username'];
        }
        //拼接角色
        if (!empty($_GET['role'])) {
            $where .= " and role=".$_GET['role'];
            $search .= '&role='.$_GET['role'];
        }
        // 搜索结束

        //分页开始
        //设置每页显示的条数
        $num = 6;
        // 查出总条数
        $sql = 'select count(*) from '.FIX."user $where";
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
        // $sql = "select * from ".FIX."user $limit";
        $sql = "select * from ".FIX."user $where order by role desc,addtime desc $limit";
        $res = mysqli_query($link,$sql);
        if ($res && mysqli_num_rows($res) > 0) {
            // var_dump($res);
            // $row = mysqli_fetch_all($res,1);
            $arr = ['普通会员','管理员','超级管理员'];
            // var_dump($arr);
            while ($row = mysqli_fetch_assoc($res)) {
                echo"<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['username']."</td>
                    <td>".$arr[($row['role'])-1]."</td>
                    <td><a href='action.php?a=zt&&zt=".$row['status']." && id=".$row['id']."'>".($row['status'] == 1 ? '正常' : '禁用')."</a></td>
                    <td>".date('Y-m-d H:i:s',$row['addtime'])."</td>
                    <td>
                        <div class='button-group'>
                            <a href='edit.php?id=".$row['id']."' class='button border-main'>
                                <span class='icon-edit'></span>修改
                            </a>
                            <a href='action.php?a=del&&id=".$row['id']."' class='button border-red' >
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