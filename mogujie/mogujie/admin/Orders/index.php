<?php
session_start();
if(empty($_SESSION['adminInfo'])){
    header('location:index.php');    
}
include_once '../../public/config.php';
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
      <!-- <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加用户</a> </li>
      </ul> -->
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">订单号</th>
            <th width="350">商品名</th>
            <th>总价</th>
            <th>下单时间</th>
            <th>收货地址</th>
            <th>状态</th>
            <th >操作</th>
        </tr>
    
        <?php
        // 连接数据库
        $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败'); 
        // 设置字符集
        mysqli_set_charset($link,'utf8');



         //分页开始
        //设置每页显示的条数
        $num = 6;
        // 查出总条数
        $sql = "select count(*) from ".FIX."orders o,".FIX."address a,".FIX."goods g ,".FIX."detail d  where o.aid=a.id and g.id=d.gid and o.id=d.oid";
        $res = mysqli_query($link, $sql);
        $total = mysqli_fetch_row($res)[0];
        // echo "$total";
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
      
        // 准备sql语句
        $sql = "select d.oid,o.id,g.name,o.total,o.addtime,a.address,o.status from ".FIX."orders o,".FIX."address a,".FIX."goods g ,".FIX."detail d  where o.aid=a.id and g.id=d.gid and o.id=d.oid $limit";
        // echo $sql;
        // die;
        // echo $sql;
        $res = mysqli_query($link,$sql);
        // var_dump($res);
        // die;
      
        //遍历表格
        while ($row = mysqli_fetch_assoc($res)) { ?>
          <form action="action.php?a=edit&oid=<?=$row['oid']?>" method='post' class='am-form'>
                <tr>
                  <td><?= $row['id']?></td>
                  <td><?= $row['name']?></td>
                  <td><?= $row['total']?></td>
                  <td class='am-hide-sm-only'><?= date('Y-m-d H:i:s',$row['addtime'])?></td>
                  <td><?= $row['address']?></td>
                  <td>
                    <select style='padding:3px;' name='status'>
                      <option <?=($row['status'] == 1 ? 'selected' : '') ?> value='1'>未付款</option>
                      <option <?=($row['status'] == 2 ? 'selected' : '') ?> value='2'>已付款</option>
                      <option <?=($row['status'] == 3 ? 'selected' : '') ?> value='3'>已发货</option>
                      <option <?=($row['status'] == 4 ? 'selected' : '') ?> value='4'>已签收</option>
                    </select>
                    
                  </td>
                  <td>
                    <div class='am-btn-toolbar'>
                      <div class='am-btn-group am-btn-group-xs'>
                          <input class='button border-main' type="submit" value="保存"><!-- 
                        <input style='color:#444;background:#fff;transition:all 0.3s ease-out;' class='am-btn am-btn-default am-btn-xs am-text-secondary am-hide-sm-only' type='submit' value='保存'> -->
                      </div>
                    </div>
                  </td>
                </tr>
                </form>
        <?php
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