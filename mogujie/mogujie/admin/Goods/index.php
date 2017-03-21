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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 商品列表</strong> <a href="add.php" style="float:right; display:none;">添加用户</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加商品</a> </li>
        <li>状态：</li>
        
        <form action="index.php">
        <if condition="$iscid eq 1">
          <li>
            <select name="status" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
              <option value="">请选择分类</option>
              <option <?=@($_GET['status']==1)?'selected':''?> value="1">在售中</option>
              <option <?=@($_GET['status']==2)?'selected':''?> value="2">已下架</option>
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
            <th >编号</th>
            <th>商品名</th>
            <th>商品图片</th>
            <th>商品价格</th>
            <th>库存</th>
            <th>状态</th>
            <th>添加时间</th>
            <th width="310">操作</th>
        </tr>

        <?php
          include_once '../../public/config.php';
          $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
          mysqli_set_charset($link,'utf8');

          /**********搜索开始************/
          $where ='where 1=1';
          $search = '';
          // 拼接用户名和搜索条件
          if (!empty($_GET['name'])) {
            $where .= " and name like '%{$_GET['name']}%'";
            $search .= '&name='.$_GET['name'];
          }
          /**********搜索结束************/

          /**********分页开始************/
          // 设置每页显示的条数
          $num = 6;
          // 查出总条数
          $sql = "select count(*) from ".FIX."goods $where";
          $res = mysqli_query($link,$sql);
          $total = mysqli_fetch_row($res)[0];
          // 计算页码数
          $totalpage = ceil($total/$num);
          // 获取当前页
          $p = isset($_GET['p'])?$_GET['p']:1;
          // 计算偏移量
          $offset = ($p-1) * $num;
          $limit = "limit $offset,$num";
          /**********分页结束************/

          $sql = "select * from ".FIX."goods $where $limit";
          $res = mysqli_query($link,$sql);
          $row = mysqli_fetch_all($res,MYSQLI_ASSOC);

          foreach ($row as $value) {
            $id = $value['id'];
            echo "<tbody>
            <tr>
              <td>".$id."</td>
              <td>".$value['name']."</td>
              <td><img height='80' src='../../public/Goods/".$value['pic']."' /></td>
              <td>".$value['price']."</td>
              <td>".$value['store']."</td>
              <td class='am-hide-sm-only'><a href='action.php?a=zt&&zt=".$value['status']."&&id=".$id."'>".($value['status'] == 1?'上架':'下架')."</a></td>
              <td class='am-hide-sm-only'>".date('Y-m-d H:i:s',$value['addtime'])."</td>
              <td>
                <div class='button-group'>
                      <a href='edit.php?id=".$id."' class='button border-main'>
                          <span class='icon-edit'></span>修改
                      </a>
                      <a href='action.php?a=del&&id=".$id."' class='button border-red' >
                          <span class='icon-trash-o'></span>删除
                      </a>
                  </div>
                    </td>
                  </div>
                </div>
              </td>
            </tr>
            </tbody>";
          }
          ?>
    
        <tr>
            <td colspan="8">
            <div class="pagelist">
                共<?=$num?>条 
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
</form>
</body>
</html>