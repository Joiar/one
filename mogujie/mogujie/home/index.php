<?php
session_start();
// 导入头部
include_once './config/header.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>蘑菇街-我的买手街</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<link rel="stylesheet" type="text/css" href="./css/banner.css">
		<link rel="stylesheet" type="text/css" href="./css/BL.css">
    	<link rel="stylesheet" type="text/css" href="./css/list.css">
		<link rel="icon" href="./image/171169993508.ico" type="image/x-icon" >
	</head>
	<body>
		<div class="banner" id="bannerbg">
			<div class="banner-center">
				<div class="banner-left">
					<ul class="nav_list">
					<?php
                    // 包含配置文件
                    include_once '../public/config.php';
                    // 连接数据库
                    $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败！');
                    mysqli_set_charset($link,'utf8');
                    $sql = "SELECT * FROM ".FIX."type";
                    $res = mysqli_query($link,$sql);
                    if ($res && mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                        	// var_dump($row);
                        	// die;
                            $sql = "SELECT * FROM ".FIX."type WHERE pid={$row['id']}";
                            $res2 = mysqli_query($link,$sql);
                            $str = "<li class='nav_li nav_li_first' id='coat' onmouseover='coatout.style.display = 'block'' onmouseout="."coatout.style.display = 'none'"."'>
								<dl class='nav_wrap'>
									<dt>
										<a rel='nofollow' class='catagory' target='_blank' href='list.php?id={$row['id']}&&name={$row['name']}'>{$row['name']}</a>
									</dt>

								";
                            // $str = "<dt><a href='list.php?id={$row['id']}&&name={$row['name']}'>{$row['name']}</a></dt>";
                            if ($res && mysqli_num_rows($res2) > 0) {
                                while ($son = mysqli_fetch_assoc($res2)) {
                                	$str .= "<dd>
										<span>
											<a rel='nofollow' class='first' target='_blank' href='list.php?id={$son['id']}&&name={$son['name']}&&pid={$son['pid']}'>{$son['name']}</a>
										</span>
									</dd>";
                                    // $str .= "<dd><a href='list.php?id={$son['id']}&&name={$son['name']}&&pid={$son['pid']}'>{$son['name']}</a></dd>";
                                }
                            } else {
                                continue;
                            }
                            $str .= "</dl></li>";
                            echo $str;
                        }
                    }
                    ?>
					</ul>
				</div>

					<!-- 二级菜单部分 -->
					<!-- 上衣 -->
					<div class="banner-left-SY" id="coatout" onmouseover="this.style.display = 'block';"onmouseout = "this.style.display = 'none'">
						<h3 style="margin-left:10px">上衣</h3>
					<div class="DJ">
						当季热卖
					</div>
					<div class="DJ-NR">
						<p><a href="" id="red">毛呢外套</a>
						<a href="">精致套装</a>
						<a href="">棉服毛衣</a>
						<a href="">针织衫</a>
						<a href="">气质风衣</a>
						<a href="">衬衫</a>
						<a href="">棒球外套</a><br>
						<a href="">长袖T恤</a>
						<a href="">牛仔外套</a>
						<a href="" id="red">时尚卫衣</a></p>
					</div>
					<div class="DJ">
						冬季新品
					</div>
					<div class="DJ-NR">
						<p><a href="">冬季外套</a>
						<a href="">高领毛衣</a>
						<a href="" id="red">廓形毛呢</a>
						<a href="">马甲皮衣</a>
						<a href="">面包棉服</a>
						<a href="" id="red">皮草</a>
						<a href="">连帽卫衣</a>
						<a href="">羽绒服</a>
						<a href="">针织开衫</a></p>
					</div>
					<div class="DJ">
						潮流时尚
					</div>
					<div class="DJ-NR">
						<p><a href="">性感V领</a>
						<a href="">喇叭袖</a>
						<a href="">粗棒毛衣</a>
						<a href="" id="red">刺绣</a>
						<a href="">俏皮露肩</a>
						<a href="">绑带衬衫</a>
						<a href="">条纹控</a>
						<a href="">白衬衫</a> <br>
						<a href="" id="red">双排扣毛呢</a></p>
					</div>
				</div>

					<!-- 裙子 -->
					<div class="banner-left-SY" id="skirtout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
						<h3 style="margin-left:10px">裙子</h3>
						<div class="DJ">
							当季热卖
						</div>
						<div class="DJ-NR">
							<p><a href="" id="red">冬季新款</a>
							<a href="">长袖连衣裙</a>
							<a href="">美裙套装</a>
							<a href="">半身裙</a>
							<a href="">针织裙</a>
							<a href="">连衣裙</a>
							<a href="" id="red">卫衣裙</a><br>
							<a href="">毛呢连衣裙</a></p>
						</div>
						<div class="DJ">
							流行精选
						</div>
						<div class="DJ-NR">
							<p><a href="">皮裙</a>
							<a href="">收腰裙</a>
							<a href="">外穿背心裙</a>
							<a href="">包臀裙</a>
							<a href="" id="red">蕾丝裙</a>
							<a href="">高腰裙</a>
							<a href="">衬衫裙</a>
							<a href="" id="red">牛仔半身裙</a></p>
						</div>
						<div class="DJ">
							经典必备
						</div>
						<div class="DJ-NR">
							<p><a href="">鱼尾裙</a>
							<a href="">背带裙</a>
							<a href="" id="red">半身长裙</a>
							<a href="">公主袖裙</a>
							<a href="">小白裙</a>
							<a href="">A字裙</a>
							<a href="" id="red">百褶裙</a>
							<a href="">雪纺裙</a></p>
						</div>
					</div>

					<!-- 裤子 -->
					<div class="banner-left-SY" id="pantsout" onmouseover="this.style.display = 'block';"onmouseout = "this.style.display = 'none';">
						<h3 style="margin-left:10px">裤子</h3>
						<div class="DJ">
							当季热卖
						</div>
						<div class="DJ-NR">
							<p><a href="">打底裤</a>
							<a href="">牛仔裤</a>
							<a href="" id="red">阔腿裤</a>
							<a href="">小脚裤</a>
							<a href="">背带裤</a>
							<a href="">休闲裤</a>
							<a href="" id="red">九分裤</a>
							<a href="">七分裤</a><br>
							<a href="">加绒打底裤</a></p>
						</div>
						<div class="DJ">
							流行精选
						</div>
						<div class="DJ-NR">
							<p><a href="" id="red">秋冬热卖</a>
							<a href="">破洞牛仔裤</a>
							<a href="">哈伦裤连体裤</a>
							<a href="" id="red">直筒裤喇叭裤</a>
							<a href="">灯笼裤</a><br>
							<a href="" id="red">宽松牛仔裤</a>
							<a href="">磨边牛仔裤</a></p>
						</div>
						<div class="DJ">
							经典必备
						</div>
						<div class="DJ-NR">
							<p><a href="">铅笔裤</a>
							<a href="">五分裤</a>
							<a href="" id="red">裙裤</a>
							<a href="">皮裤</a>
							<a href="" id="red">条纹裤</a>
							<a href="">高腰裤</a>
							<a href="" id="red">运动裤</a></p>
						</div>
					</div>

					<!-- 内衣 -->
						<div class="banner-left-SY" id="underwearout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
							<h3 style="margin-left:10px">内衣</h3>
							<div class="DJ">
								内衣
							</div>
							<div class="DJ-NR">
								<p><a href="">内衣套装</a>
								<a href="">调整型内衣</a>
								<a href="">文胸</a>
								<a href="">内裤</a>
								<a href="" id="red">无痕内衣</a>
								<a href="">运动内衣</a>
								<a href="">卡通内衣</a><br>
								<a href="" id="red">保暖内衣</a></p>
							</div>
							<div class="DJ">
								家居睡衣
							</div>
							<div class="DJ-NR">
								<p><a href="">睡衣套装</a>
								<a href="">家居服</a>
								<a href="" id="red">睡裙</a>
								<a href="" id="red">情侣睡衣</a>
								<a href="">睡袍</a>
								<a href="">甜美家居服</a>
								<a href="" id="red">珊瑚绒</a>
							</div>
							<div class="DJ">
								袜子
							</div>
							<div class="DJ-NR">
								<p><a href="">堆堆袜</a>
								<a href="">短袜</a>
								<a href="">瘦腿袜</a>
								<a href="">丝袜</a>
								<a href="">打底袜</a>
								<a href="" id="red">中筒袜</a>
								<a href="">船袜</a>
							</div>
						</div>

					<!-- 女鞋 -->
						<div class="banner-left-SY" id="shoesout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
						<h3 style="margin-left:10px">女鞋</h3>
						<div class="DJ">
							人气热销
						</div>
						<div class="DJ-NR">
							<p><a href="">单鞋</a>
							<a href="">运动鞋</a>
							<a href="">靴子</a>
							<a href="">小白鞋</a>
							<a href="">帆布鞋</a>
							<a href="">厚底鞋</a>
							<a href="" id="red">高跟鞋</a>
							<a href="">休闲鞋</a>
							<a href="">一脚蹬</a><br>
							<a href="">马丁靴</a>
							<a href="">牛津鞋</a>
							<a href="" id="red">粗跟鞋</a></p>
						</div>
						<div class="DJ">
							热门推荐
						</div>
						<div class="DJ-NR">
							<p><a href="">当季热卖</a>
							<a href="">厚底运动</a>
							<a href="" id="red">及踝靴</a>
							<a href="">英伦靴子</a>
							<a href="">甜美高跟</a>
							<a href="">玛丽珍鞋</a>
							<a href="">尖头单鞋</a>
							<a href="" id="red">学院帆布</a><br>
							<a href="">豆豆鞋</a>
							<a href="">乐福鞋</a>
							<a href="">松糕鞋</a>
						</div>
						<div class="DJ">
							经典直击
						</div>
						<div class="DJ-NR">
							<p><a href="">明星同款</a>
							<a href="" id="red">韩版运动</a>
							<a href="">欧美范</a>
							<a href="">情侣款</a>
							<a href="">学生党</a>
							<a href="">原宿风</a>
							<a href="">复古擦色</a>
							<a href="">系带款</a><br>
							<a href="">舒适平底</a>
							<a href="" id="red">学院休闲</a>
							<a href="">名媛淑女</a>
							<a href="" id="red">森系清新</a>
						</div>
					</div>

					<!-- 男友 -->
					<div class="banner-left-SY" id="boyfriendout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">男友</h3>
						<div class="DJ">
							当季热卖
						</div>
						<div class="DJ-NR">
							<p><a href="">棉衣棉服</a>
							<a href="" id="red">牛仔裤</a>
							<a href="">卫衣</a>
							<a href="">夹克</a>
							<a href="" id="red">休闲鞋</a>
							<a href="">休闲裤</a>
							<a href="">毛衣针织</a>
							<a href="">绅士皮鞋</a><br>
							<a href="" id="red">时尚套装</a>
							<a href="">男袜</a>
							<a href="">贴身内裤</a>
							<a href="" id="red">衬衫12.12底价</a></p>
						</div>
						<div class="DJ">
							人气单品
						</div>
						<div class="DJ-NR">
							<p><a href="">九分裤</a>
							<a href="" id="red">帆布鞋</a>
							<a href="">马丁靴</a>
							<a href="">牛仔外套</a>
							<a href="">风衣</a>
							<a href="">棒球夹克</a>
							<a href="">皮衣</a>
							<a href="" id="red">休闲西装</a><br>
							<a href="">板鞋</a>
							<a href="">运动鞋</a>
							<a href="" id="red">买遍男神款鞋</a>
						</div>
						<div class="DJ">
							潮流元素
						</div>
						<div class="DJ-NR">
							<p><a href="" id="red">单宁风</a>
							<a href="">约会装</a>
							<a href="">基本款</a>
							<a href="">中国风</a>
							<a href="">品质购</a>
							<a href="" id="red">条纹装</a>
							<a href="">印花刺绣</a>
							<a href="">飞行员夹克</a><br>
							<a href="">一脚蹬</a>
							<a href="" id="red">束脚裤</a>
							<a href="">破洞风</a>
						</div>
					</div>

					<!-- 包包 -->
					<div class="banner-left-SY" id="bagout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
						<h3 style="margin-left:10px">包包</h3>
						<div class="DJ">
							热门
						</div>
						<div class="DJ-NR">
							<p><a href="">新品双肩包</a>
							<a href="">斜挎包</a>
							<a href="">手提包</a>
							<a href="" id="red">单肩包</a>
							<a href="">百搭大包</a>
							<a href="">迷你小包</a>
							<a href="">旅行箱包</a><br>
							<a href="">女士钱包</a>
							<a href="">男士钱包</a>
							<a href="" id="red">香风链条</a>
							<a href="">手拿包</a> </p>
						</div>
						<div class="DJ">
							款式
						</div>
						<div class="DJ-NR">
							<p><a href="">双肩包</a>
							<a href="" id="red">斜挎包</a>
							<a href="">单肩包</a>
							<a href="">手提包</a>
							<a href="">钱包</a>
							<a href="">旅行箱</a>
							<a href="" id="red">手拿包</a>
							<a href="">帆布包</a><br>
							<a href="" id="red">mini小包</a></p>
						</div>
						<div class="DJ">
							流行
						</div>
						<div class="DJ-NR">
							<p><a href="">链条包</a>
							<a href="">贝壳包</a>
							<a href="">水桶包</a>
							<a href="" id="red">方形包</a>
							<a href="">复古包</a>
							<a href="">卡通包</a>
							<a href="" id="red">铆钉包</a>
							<a href="">邮差包</a><br>
							<a href="">子母包</a>
							<a href="">印花包</a>
						</div>
					</div>

					<!-- 运动 -->
					<div class="banner-left-SY" id="sportout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">运动</h3>
						<div class="DJ">
							1212精选
						</div>
						<div class="DJ-NR">
							<p><a href="">运动套装</a>
							<a href="" id="red">运动鞋</a>
							<a href="">元气棉服</a>
							<a href="">时尚卫衣</a>
							<a href="" id="red">秋冬短靴</a>
							<a href="">跑鞋棒球衫</a>
							<a href="">帆布鞋</a><br>
							<a href="">情侣款双肩包</a>
							<a href="">烧烤用品</a>
							<a href="" id="red">运动主会场</a>
							<a href="">人气榜单</a>
							<a href="" id="red">人气榜单</a></p>
						</div>
						<div class="DJ">
							火爆热卖
						</div>
						<div class="DJ-NR">
							<p><a href="">时尚卫衣</a>
							<a href="">人气套装</a>
							<a href="">网红款</a>
							<a href="" id="red">小白鞋</a>
							<a href="">跑鞋</a>
							<a href="">瑜伽必备</a>
							<a href="">运动内衣</a>
							<a href="" id="red">明星同款</a><br>
							<a href="">减脂神器</a>
							<a href="">运动裤</a>
							<a href="">体重秤</a>
							<a href="">拉力器</a>
							<a href="">小型装备</a>
							<a href="" id="red">大型装备</a>
							</p>
						</div>
						<div class="DJ">
							品牌专柜

						</div>
						<div class="DJ-NR">
							<p><a href="">耐克</a>
							<a href="" id="red">阿迪达斯</a>
							<a href="">匡威</a>
							<a href="">特步</a>
							<a href="">鸿星尔克</a>
							<a href="" id="red">法国公鸡</a>
							<a href="">李宁</a>
							<a href="">环球回力</a><br>
							<a href="">asicsNew Balance</a>
							<a href="">花花公子</a>
							<a href="">TECTOP户外</a>
							<a href="">双星</a>
							<a href="" id="red">品牌主会场</a>
						</div>
					</div>

					<!-- 美妆 -->
					<div class="banner-left-SY" id="makeupsout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">美妆</h3>
						<div class="DJ">
							必备护肤
						</div>
						<div class="DJ-NR">
							<p><a href="">保湿补水</a>
							<a href="" id="red">美白淡斑</a>
							<a href="">洁面</a>
							<a href="">人气面膜</a>
							<a href="">水乳</a>
							<a href="">眼唇护理</a>
							<a href="">T区护理</a><br>
							<a href="" id="red">护唇膏</a>
							<a href="">精华护肤套装</a>
							<a href="" id="red">防晒男士护肤</a>
						</div>
						<div class="DJ">
							潮流彩妆

						</div>
						<div class="DJ-NR">
							<p><a href="" id="red">妆前隔离</a>
							<a href="">BB霜</a>
							<a href="">遮瑕粉底</a>
							<a href="">腮红</a>
							<a href="">阴影高光</a>
							<a href="">定妆散粉</a>
							<a href="" id="red">口红</a>
							<a href="">眼妆</a><br>
							<a href="">眉笔</a>\
							<a href="">美妆工具</a>
							<a href="" id="red">彩妆套装</a>
							<a href="">香水</a>
							<a href="">指甲油</a>
							</p>
						</div>
						<div class="DJ">
							个人护理
						</div>
						<div class="DJ-NR">
							<p><a href="">洗发护发</a>
							<a href="" id="red">烫染造型</a>
							<a href="">沐浴露</a>
							<a href="" id="red">身体乳</a>
							<a href="">全身呵护</a>
							<a href="">手足护理</a>
							<a href="" id="red">美胸瘦身</a>
							<a href="">口腔护理</a><br>
							<a href="">卫生巾</a>
							<a href="">脱毛膏</a>
						</div>
					</div>

					<!-- 配饰 -->
					<div class="banner-left-SY" id="decorationout" display:none; onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">配饰</h3>
						<div class="DJ">
							冬季新品
						</div>
						<div class="DJ-NR">
							<p><a href="" id="red">早秋围巾</a>
							<a href="">手表</a>
							<a href="">锁骨链</a>
							<a href="">帽子</a>
							<a href="">发饰</a>
							<a href="">戒指</a>
							<a href="" id="red">眼镜框</a><br>
							<a href="">耳饰</a>
							<a href="">棒球帽</a>
							<a href="">手链</a>
							<a href="" id="red">墨镜</a>
							<a href="">耳钉</a>
							<a href="">男士手表皮带</a>
							</p>
						</div>
						<div class="DJ">
							潮流速递
						</div>
						<div class="DJ-NR">
							<p><a href="">几何项链</a>
							<a href="">情侣手表</a>
							<a href="" id="red">银饰发箍</a>
							<a href="">吊坠组合</a>
							<a href="" id="red">戒指</a>
							<a href="">手镯颈链</a>
							<a href="">渔夫帽</a>
							<a href="">脚链</a><br>
							<a href="" id="red">男士墨镜</a></p>
						</div>
						<div class="DJ">
							特色饰品
						</div>
						<div class="DJ-NR">
							<p><a href="">轻奢珠宝</a>
							<a href="" id="red">腰带</a>
							<a href="">胸针</a>
							<a href="">假领子</a>
							<a href="" id="red">新娘配饰</a>
							<a href="">假发</a>
							<a href="" id="red">钥匙扣</a>
							<a href="">纹身贴</a><br>
						</div>
					</div>

					<!-- 家居 -->
					<div class="banner-left-SY" id="householdout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">家居</h3>
						<div class="DJ">
							家纺布艺
						</div>
						<div class="DJ-NR">
							<p><a href="">四件套秋</a>
							<a href="">冬被</a>
							<a href="">沙发垫</a>
							<a href="" id="red" >抱枕</a>
							<a href="">家居鞋</a>
							<a href="">枕头</a>
							<a href="">地毯地垫</a><br>
							<a href="" id="red">床幔床垫</a>
							<a href="">坐垫毯子</a>
							<a href="" id="red">窗帘被套</a>
							<a href="">餐桌布艺</a> </p>
						</div>
						<div class="DJ">
							家具家饰

						</div>
						<div class="DJ-NR">
							<p><a href="">简易衣柜</a>
							<a href="">墙贴</a>
							<a href="">鞋架</a>
							<a href="" id="red">摆件</a>
							<a href="">电脑桌</a>
							<a href="">绿植盆栽</a>
							<a href="">镜子</a>
							<a href="">仿真花</a><br>
							<a href="" id="red">闹钟</a>
							<a href="">相片</a>
							<a href="">墙香薰</a>
							<a href="">衣帽架</a>
							<a href="" id="red">花架DIY</a>
							<a href="">鲜花速递</a>
							<a href="">沙发</a>
							</p>
						</div>
						<div class="DJ">
							美味厨房

						</div>
						<div class="DJ-NR">
							<p><a href="">锅具</a>
							<a href="" id="red">碗叉勺筷</a>
							<a href="">调味罐</a>
							<a href="">饭盒</a>
							<a href="">烘焙器具</a>
							<a href="" id="red">保鲜罐</a>
							<a href="">围裙</a>
							<a href="">厨房小家电</a><br>
							<a href="" id="red">厨房清洁</a>
							<a href="">橡胶手套</a>
						</div>
					</div>

					<!-- 母婴 -->
					<div class="banner-left-SY" id="babyout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">母婴</h3>
						<div class="DJ">
							当季热卖
						</div>
						<div class="DJ-NR">
							<p><a href="">男童装</a>
							<a href="">女童装</a>
							<a href="" id="red">轻薄外套</a>
							<a href="">童裤</a>
							<a href="">孕妇连衣裙</a>
							<a href="">孕妇装</a>
							<a href="">帆布鞋</a><br>
							<a href="" id="red">家居服</a>
							<a href="">益智早教</a>
							</p>
						</div>
						<div class="DJ">
							流行精选母婴
						</div>
						<div class="DJ-NR">
							<p><a href="">儿童套装</a>
							<a href="">卫衣</a>
							<a href="" id="red">打底裤</a>
							<a href="">单鞋</a>
							<a href="">亲子装</a>
							<a href="">孕妇套装</a>
							<a href="">袜子</a>
							<a href="" id="red">孕产</a><br>
							<a href="">洗护</a>
							<a href="">孕妇裤</a>
							</p>
						</div>
						<div class="DJ">
							经典必备

						</div>
						<div class="DJ-NR">
							<p><a href="">新生儿T恤</a>
							<a href="" id="red">婴儿礼盒</a>
							<a href="">待产包</a>
							<a href="">托腹裤</a>
							<a href="">哺乳内衣</a>
							<a href="">童车</a>
							<a href="">婴儿床品</a>
							<a href="" id="red">月子服</a><br>
						</div>
					</div>

					<!-- 食品 -->
					<div class="banner-left-SY" id="foodout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
						<h3 style="margin-left:10px">食品</h3>
						<div class="DJ">
							茶酒饮料
						</div>
						<div class="DJ-NR">
							<p><a href="" id="red">咖啡冲饮</a>
							<a href="">谷物</a>
							<a href="">花草茶</a>
							<a href="">饮料</a>
							<a href="">冲饮</a>
							<a href="">果味茶饮</a>
							<a href="" id="red">早餐茶饮</a><br>
							<a href="">代餐粉粉</a>
						</div>
						<div class="DJ">
							进口食品
						</div>
						<div class="DJ-NR">
							<p><a href="">韩国</a>
							<a href="">日本</a>
							<a href="" id="red">东南亚进口</a>
							<a href="">饼干进口</a>
							<a href="">糕点进口</a>
							<a href="" id="red">糖巧进口</a>
							<a href="">水饮泰国</a>
						</div>
						<div class="DJ">
							休闲零食
						</div>
						<div class="DJ-NR">
							<p><a href="">饼干糕点</a>
							<a href="">糖果蜜饯</a>
							<a href="">坚果</a>
							<a href="" id="red">肉铺</a>
							<a href="">肉食</a>
							<a href="">巧克力</a>
							<a href="">膨化食品</a>
							<a href="" id="red">零食大礼包</a><br>
							<a href="">方便速食</a>
							<a href="">曲奇</a>
						</div>
					</div>

					<!-- 百货 -->
					<div class="banner-left-SY" id="merchandiseout" onmouseover="this.style.display = 'block';" onmouseout="this.style.display = 'none';">
					<h3 style="margin-left:10px">百货</h3>
						<div class="DJ">
							生活小物
						</div>
						<div class="DJ-NR">
							<p><a href="">保温杯</a>
							<a href="">晴雨伞</a>
							<a href="" id="red">玻璃杯</a>
							<a href="" id="red">毛绒玩具</a>
							<a href="">心机小物</a>
							<a href="">衣物护理</a>
							<a href="">用品家务</a><br>
							<a href="">清洁毛巾</a>
							<a href="" id="red">浴巾</a>
							<a href="">情趣内衣</a>
							<a href="">纸品</a>
							</p>
						</div>
						<div class="DJ">
							收纳控
						</div>
						<div class="DJ-NR">
							<p><a href="">收纳盒</a>
							<a href="">收纳箱</a>
							<a href="">收纳袋</a>
							<a href="" id="red">首饰盒</a>
							<a href="">桌面收纳</a>
							<a href="">纸巾盒</a>
							<a href="">内衣收纳</a>
							<a href="">脏衣篓</a><br>
							<a href="" id="red">鞋盒</a>
							<a href="">鞋盒</a>
							</p>
						</div>
						<div class="DJ">
							手机数码
						</div>
						<div class="DJ-NR">
							<p><a href="">手机</a>
							<a href="" id="red">手机壳</a>
							<a href="">耳机</a>
							<a href="">智能手环</a>
							<a href="">移动电源</a>
							<a href="">手机贴膜</a>
							<a href="" id="red">自拍杆</a>
							<a href="">U盘</a><br>
							<a href="">手机支架</a>
							<a href="">小音箱</a>
							<a href="">数据线</a>
							<a href="" id="red">鼠标</a>
						</div>
					</div>
					<!-- banner部分 -->
					<div class="banner-banner" id="box">
						<ul>
							<li style="z-index:1;"><img src="./image/banner/banner1.png" alt="" /></li>
							<li><img src="./image/banner/banner2.png" alt="" /></li>
							<li><img src="./image/banner/banner3.png" alt="" /></li>
							<li><img src="./image/banner/banner4.png" alt="" /></li>
							<li><img src="./image/banner/banner5.png" alt="" /></li>
							<li><img src="./image/banner/banner6.png" alt="" /></li>
							<li><img src="./image/banner/banner7.png" alt="" /></li>
						</ul>
						<ol>
							<li class="list"></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ol>
					</div>
					<!-- banner结束 -->
<?php

    if(!empty($_SESSION['info'])) {
    //连接数据库
    $link = mysqli_connect(HOST, USER, PWD, DB) or die('数据库连接失败。<a href="index.php">返回</a>');
    mysqli_set_charset($link, 'utf8');
    // var_dump($_SESSION['info']);
    $sql = "select * from ".FIX."user where id={$_SESSION['info']['id']}";
    // 发送sql请求
    $res = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($res);
    // var_dump($row);
    // die;
    ?>

	<!-- 开始头像部分 -->
	<div class="base-info">
		<div style="width:70px;height:70px;border-radius:50%;background:red;margin:0 auto;margin-top:20px;">
    	<img id="img" class="tx" src="<?=__PUBLIC__.'/Pic/'.$row['img']?>" width="70" height="70"/>
    	</div>
    	<div style="margin-top:10px">
    	<p style="text-align:center;color:#ff5777"><?= $_SESSION['info']['username']?>晚上好！</p>
    	</div>
    	<div style="width:80px;height:30px;line-height:30px;border-radius:5px;border:1px solid red;margin:0 auto;margin-top:14px;">
    		<a href="personal.php" style="tetx-align:center;color:red;padding:10px;font-size:14px;text-decoration:none">会员中心</a>
    	</div>
	</div>
	<!-- 结束头像部分 -->
    <?php
    }
?>

				</div>
			</div>
			<div class="clear:both;"></div>
			<!-- 中间部分 -->
			<div class="center" >
				<div class="picq">
					<div class="picc">
						<img src="./image/xmn.jpg" />
					</div>
					<div class="picc">
						<img src="./image/3pic.png" />
					</div>
					<div class="picc">
						<img src="./image/4pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/5pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/6pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/2pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/9.pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/8.pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/12.pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/7.pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/10.pic.jpg" />
					</div>
					<div class="picc">
						<img src="./image/11.pic.jpg" />
					</div>
				</div>
				<div class="clear:both;"></div>
				<div class="center-TG">
					<div class="center-bg">
						<div class="title1">
							<h3>团购热卖</h3>
						</div>
						<div class="title2">
							每一款都质检
						</div>
						<div class="title3">
							SALE
						</div>
						<div class="pic-YF">
							<img src="./image/YF1.png" />
						</div>
						<div class="title4">
							<h3>限时快抢</h3>
						</div>
						<div class="title5">
							限时精选
						</div>
						<div class="pic-YF2">
							<img src="./image/YF2.png" />
						</div>
					</div>

					<div class="center-bg2">
						<div class="title1">
							<h3>新品发现</h3>
						</div>
						<div class="title2">
							潮流风向标
						</div>
						<div class="title3">
							SHOW
						</div>
						<div class="pic-YF3">
							<img src="./image/YF3.png" />
						</div>
						<div class="title6">
							<h3>369-100劵</h3>
						</div>
						<div class="title7">
							疯抢ing
						</div>
						<div class="pic-YF4">
							<img src="./image/YF4.png" />
						</div>
					</div>

                    <!-- 签到部分 -->
                    <div class="QD" onmouseover="this.style.background = 'url(./image/qd2.jpg)';" onmouseout="this.style.background = 'url(./image/qd1.jpg)';">
                    </div>
				</div>
                <DIV CLASS="CLEAR:BOTH;"></DIV>
			<!-- 提升气质必备单品行 -->
				<div class="QZ">
					<img src="./image/QZ1.jpg">
					<img src="./image/QZ2.jpg">
					<img src="./image/QZ3.jpg">
					<img src="./image/QZ4.jpg">
				</div>
				<!-- 蘑菇优选 -->
				<div class="MGYX">
					<div class="MGYX-1">
						<div class="MGYX-wz">蘑菇优选</div>
						<div class="MGYX-wz2">品质优选 双12抢鲜购</div>
						<div class="btn">去看看</div>
					</div>
					<div class="MGYX-2">
						<!-- <img src="./image/YX2.png" width="265" height="336"> -->
						<div class="KB">口碑推荐</div>
						<div class="KB2">双12必BUY精选</div>
					</div>
					<div class="MGYX-3">
						<div class="MGYX-3-TOP">
							<div class="MP">
								<div class="KB">名品制造</div>
								<div class="KB2">MUJI等制造商19元起</div>
							</div>
							<div class="MY">
								<div class="KB">买一送一</div>
								<div class="KB2">双12疯抢 超值买送</div>
							</div>
							<div class="XR">
								<div class="KB">新人专享</div>
								<div class="KB2">亲肤柔和 纯棉呵护</div>
							</div>
						</div>
						<div class="MGYX-3-BOT">
							<div class="JK">
								<div class="KB">进口好物</div>
								<div class="KB2">国际进口品牌29元起</div>
							</div>
							<div class="RM">
								<div class="KB">口碑热卖</div>
								<div class="KB2">优选好货 品质力荐</div>
							</div>
							<div class="XP">
								<div class="KB">每周新品</div>
								<div class="KB2">新款速递 好货</div>
							</div>
						</div>
					</div>
				</div>

				<!-- 品牌精选 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/pinpai/pp1.jpg')">
						<!-- <div class="MGYX-1"> -->
						<div class="MGYX-wz">品牌精选</div>
						<div class="MGYX-wz2">潮牌尖货 初冬焕新</div>
						<div class="btn" style="color: #AA44EE">去看看</div>
						<!-- </div> -->
					</div>
					<div class="BL-MID"  style="background:url('./image/pinpai/pp2.jpg') no-repeat center; background-size: 224px 336px;">
						<!-- <div class="MGYX-2"> -->
						<div class="KB">品牌联盟</div>
						<div class="KB2" style="color: #AA44EE">大牌好货 送券不停</div>
						<!-- </div> -->
					</div>
					<div class="PPJX-mid" >
						<div class="BL-KUAN BL-YSZ" style="background:url('./image/pinpai/pp3.jpg') no-repeat;background-size: 334px 168px;"  >
							<div class="KB">包配</div>
							<div class="KB2" style="color: #AA44EE">品牌经典 时尚焕新</div>
						</div>
						<div class="BL-KUAN BL-YSZ" style="background:url('./image/pinpai/pp4.jpg') no-repeat;background-size: 334px 168px;" >
							<div class="KB">女鞋</div>
							<div class="KB2"style="color: #AA44EE">潮流时尚 暖冬推荐</div>
						</div>
					</div>
					<div class="PPJX-right">
						<div class="BL-SMALL" ></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp8.jpg') no-repeat;background-size: 112px 112px;" ></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp11.jpg') no-repeat;background-size: 112px 112px;"></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp6.jpg') no-repeat;background-size: 112px 112px;"></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp9.jpg') no-repeat;background-size: 112px 112px;"></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp12.jpg') no-repeat;background-size: 112px 112px;"></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp7.jpg') no-repeat;background-size: 112px 112px;"></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp10.jpg') no-repeat;background-size: 112px 112px;"></div>
						<div class="BL-SMALL" style="background:url('./image/pinpai/pp13.jpg') no-repeat;background-size: 112px 112px;"></div>
					</div>
				</div>
				<!-- 潮流女装 -->
				<div class="BL-ALL" >
					<div class="BL-LEFT" style="background:url('./image/nz/10.jpg')">
						<div class="MGYX-wz"> 潮流女装</div>
						<div class="MGYX-wz2">冬装流行款抢购</div>
						<div class="btn" style="color: #FF5588">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/nz/6.jpg') no-repeat;background-size: 265px 336px;" >
						<div class="KB">上衣</div>
						<div class="KB2" style="color: #FF5588">5折美衣特惠疯抢</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/nz/5.jpg') no-repeat;background-size:170px 170px;" >
							<div class="KB">裙子</div>
							<div class="KB2" style="color: #FF5588">59元美裙嗨购</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/nz/7.jpg') no-repeat;background-size:170px 170px;">
							<div class="KB">裤子</div>
							<div class="KB2" style="color: #FF5588">心机显瘦必备</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/nz/1.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >新款棉服</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/nz/4.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >羽绒服</div>
						</div>
						<div class="BL-BLOCK" class="BL-BLOCK" style="background:url('./image/nz/9.jpg') center no-repeat;background-size:170px 170px;">
							<div class="KB">时尚套装</div>
							<div class="KB2" style="color: #FF5588">超值省心搭配</div>
						</div>
						<div class="BL-BLOCK"  class="BL-BLOCK" style="background:url('./image/nz/8.jpg') center no-repeat;background-size:170px 170px;">
							<div class="KB">内衣</div>
							<div class="KB2" style="color: #FF5588">39元轻松升杯</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/nz/2.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >毛呢外套</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/nz/3.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >毛衣</div>
						</div>
					</div>
				</div>
				<!-- 人气美鞋 -->
				<div class="BL-ALL">
					<div class="BL-LEFT"  style="background:url('./image/xie/1.jpg')">
						<div class="MGYX-wz"> 人气美鞋</div>
						<div class="MGYX-wz2">新外貌“鞋”会</div>
						<div class="btn" style="color: #FF9922">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/xie/8.png') center no-repeat;background-size: 224px 336px;">
						<div class="KB">女鞋抢新</div>
						<div class="KB2" style="color: #FF9922">10000双新靴上架</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/xie/7.png') no-repeat;background-size:170px 170px;">
							<div class="KB">焕新美靴</div>
							<div class="KB2" style="color: #FF9922">219.9万+菇凉都在抢</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/10.png') no-repeat;background-size:170px 170px;">
							<div class="KB">运动鞋</div>
							<div class="KB2" style="color: #FF9922">39元起</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/3.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >人气精选</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/6.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >小白鞋</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/9.png') no-repeat;background-size:170px 170px;">
							<div class="KB">单鞋</div>
							<div class="KB2" style="color: #FF9922">明星同款抢鲜</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/2.png') no-repeat;background-size:170px 170px;">
							<div class="KB">雪地靴</div>
							<div class="KB2" style="color: #FF9922">冬日小地暖</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/5.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >一脚蹬</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xie/4.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;margin-left:50px;" >高跟鞋</div>
						</div>
					</div>
				</div>

				<!-- 绝配男友 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/ny/1.jpg ')no-repeat;">
						<div class="MGYX-wz" >绝配男友</div>
						<div class="MGYX-wz2">3折起 全宇宙时髦单品</div>
						<div class="btn" style="color: #5577FF">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/ny/5.jpg') center no-repeat;background-size: 224px 336px;">
						<div class="KB">绝配男友</div>
						<div class="KB2" style="color: #5577FF">万件新品 尖货集中营</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/ny/8.jpg') no-repeat;background-size:170px 170px;">
							<div class="KB">上衣</div>
							<div class="KB2" style="color: #5577FF">早秋新装GO></div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/3.jpg') no-repeat;background-size:170px 170px;">
							<div class="KB">裤装</div>
							<div class="KB2" style="color: #5577FF">腿长出天际</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/4.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >男靴</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/10.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >贴身私物</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/6.jpg') no-repeat;background-size:170px 170px;">
							<div class="KB">男鞋</div>
							<div class="KB2" style="color: #5577FF">“鞋”门秘籍</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/7.jpg') no-repeat;background-size:170px 170px;">
							<div class="KB">39元起</div>
							<div class="KB2" style="color: #5577FF">神级单品 百种优惠</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/9.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >连帽服</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/ny/2.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >高领毛衣</div>
						</div>
					</div>
				</div>

				<!-- 箱包美学 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/xb/3.jpg ')no-repeat;">
						<div class="MGYX-wz"> 箱包美学</div>
						<div class="MGYX-wz2">秋季新款，3折开抢</div>
						<div class="btn" style="color: #3399FF">去看看</div>
					</div>
					<div class="BL-FOUR">
						<div class="BL-BLOCK" style="background:url('./image/xb/8.jpg ')no-repeat center; background-size:106px 106px;">
							<div style="margin-left:20px;margin-top:20px">斜挎包</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xb/9.jpg ')no-repeat center; background-size:106px 106px;">
							<div style="margin-left:20px;margin-top:20px">双肩包</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xb/6.jpg ')no-repeat center; background-size:106px 106px;">
							<div style="margin-left:20px;margin-top:20px">手提包</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xb/7.jpg ')no-repeat center; background-size:106px 106px;">
							<div style="margin-left:20px;margin-top:20px">迷你小包</div>
						</div>
					</div>
					<div class="BL-MID" style="background:url('./image/xb/5.jpg') center no-repeat;background-size: 265px 360px;">
					</div>
					<div class="BL-FOUR">
						<div class="BL-KUAN" style="background:url('./image/xb/4.jpg') center no-repeat;background-size: 344px 170px;">
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xb/1.jpg') center no-repeat;background-size:170px 170px;">
						</div>
						<div class="BL-BLOCK" style="background:url('./image/xb/2.jpg') center no-repeat;background-size:170px 170px;">
						</div>
					</div>
				</div>

				<!-- 1212品牌会场 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/1212/2.jpg ')no-repeat;">
						<div class="MGYX-wz"> 1212品牌会场</div>
						<div class="MGYX-wz2">阿迪耐克新百伦</div>
						<div class="btn" style="color: #6644FF">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/1212/7.jpg ')no-repeat; background-size: 224px 336px;">
						<div class="KB">1212运动主会场</div>
						<div class="KB2" style="color: #6644FF">耐克阿迪疯狂降</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/1212/6.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">1212运动鞋</div>
							<div class="KB2" style="color: #6644FF">品牌直降99</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/1.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">1212运动套装</div>
							<div class="KB2" style="color: #6644FF">省钱更省心</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/3.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >运动靴</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/5.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >跑鞋</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/8.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">1212棉衣/羽绒</div>
							<div class="KB2" style="color: #6644FF">暖心让利99元</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/9.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">1212卫衣/外套</div>
							<div class="KB2" style="color: #6644FF">趋势都在这里</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/4.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >连帽服</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/1212/5.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >连帽服</div>
						</div>
					</div>
				</div>

				<!-- 护肤彩妆 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/hf/1.png ')no-repeat;">
						<div class="MGYX-wz">  护肤彩妆</div>
						<div class="MGYX-wz2">秋妆必买清单 低至3折</div>
						<div class="btn" style="color: #EE66EE">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/hf/5.jpg ')no-repeat; background-size: 224px 336px;">
						<div class="KB">护肤彩妆</div>
						<div class="KB2" style="color: #EE66EE">品牌特惠低至1折</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/hf/3.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">热销面膜</div>
							<div class="KB2" style="color: #EE66EE">敷出水嫩润白肌</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/7.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">1212运动套装</div>
							<div class="KB2" style="color: #EE66EE">省钱更省心</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/6.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >清洁卸妆</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/4.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >热销面膜</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/9.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">滋润洗护</div>
							<div class="KB2" style="color: #EE66EE">秋冬滋润进行时</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/2.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">特惠套装</div>
							<div class="KB2" style="color: #EE66EE">全套护肤更有效</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/10.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >润唇膏</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/hf/8.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >化妆水</div>
						</div>
					</div>
				</div>

				<!--  品质家居 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/jj/2.png ')no-repeat;">
						<div class="MGYX-wz">品质家居</div>
						<div class="MGYX-wz2">-好生活并不贵-</div>
						<div class="btn" style="color: #44BB77">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/jj/5.jpg ')no-repeat; background-size: 224px 336px;">
						<div class="KB">趣味家居</div>
						<div class="KB2" style="color: #44BB77">给家换秋装</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/jj/8.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">百货</div>
							<div class="KB2" style="color: #44BB77">收纳新法则</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/10.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">家用电器</div>
							<div class="KB2" style="color: #44BB77">高颜值卷发棒</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/6.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >贴心暖被</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/7.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >毛绒抱枕</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/4.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">手机数码</div>
							<div class="KB2" style="color: #44BB77">V脸自拍秘诀</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/1.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">寝室小家</div>
							<div class="KB2" style="color: #44BB77">好生活并不贵</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/9.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >冬季防护</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/jj/3.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >文化玩乐</div>
						</div>
					</div>
				</div>

				<!-- 辣妈潮宝 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/lm/1.png ')no-repeat;">
						<div class="MGYX-wz"> 辣妈潮宝</div>
						<div class="MGYX-wz2">－品质精选，裸价回馈－</div>
						<div class="btn" style="color: #FF44BB">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/lm/10.png ')no-repeat; background-size: 224px 336px;">
						<div class="KB">童装</div>
						<div class="KB2" style="color: #FF44BB">必买好货秋上新</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/lm/4.png ')no-repeat center; background-size:170px 170px;">
							<div class="KB">小公主</div>
							<div class="KB2" style="color: #FF44BB">秋季美美的</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/9.png ')no-repeat center; background-size:170px 170px;">
							<div class="KB">小王子</div>
							<div class="KB2" style="color: #FF44BB">帅气时尚酷酷的</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/7.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >妈咪套装</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/8.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >外套</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/6.png ')no-repeat center; background-size:170px 170px;">
							<div class="KB">时髦孕妈</div>
							<div class="KB2" style="color: #FF44BB">女人最美的时刻</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/2.png ')no-repeat center; background-size:170px 170px;">
							<div class="KB">舒适童鞋</div>
							<div class="KB2" style="color: #FF44BB">帮宝宝走更好的路</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/3.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >儿童套装</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/lm/5.png') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >益智早教</div>
						</div>
					</div>
				</div>
				<!-- 食品 -->
				<div class="BL-ALL">
					<div class="BL-LEFT" style="background:url('./image/sp/1.jpg ')no-repeat;">
						<div class="MGYX-wz"> 食品</div>
						<div class="MGYX-wz2">-进口食品9.9元起-</div>
						<div class="btn" style="color: #00CC88">去看看</div>
					</div>
					<div class="BL-MID" style="background:url('./image/sp/2.jpg ')no-repeat; background-size: 224px 336px;">
						<div class="KB">免单不停</div>
						<div class="KB2" style="color: #00CC88">狂欢来啦，1元买买买</div>
					</div>
					<div class="BL-MORE">
						<div class="BL-BLOCK" style="background:url('./image/sp/3.png')no-repeat center; background-size:170px 170px;">
							<div class="KB">零食大礼包</div>
							<div class="KB2" style="color: #00CC88">超值划算到哭</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/4.png')no-repeat center; background-size:170px 170px;">
							<div class="KB">坚果炒货</div>
							<div class="KB2" style="color: #00CC88">疯抢10000</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/5.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >49.9专区</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/6.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >39.9专区</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/7.jpg ')no-repeat center; background-size:170px 170px;">
							<div class="KB">麦片冲饮</div>
							<div class="KB2" style="color: #00CC88">好喝暖心来一杯</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/8.png')no-repeat center; background-size:170px 170px;">
							<div class="KB">美味饼干</div>
							<div class="KB2" style="color: #00CC88">品质保证，买买买</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/9.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >29.9专区</div>
						</div>
						<div class="BL-BLOCK" style="background:url('./image/sp/10.jpg') center no-repeat;background-size:120px 120px;">
							<div style="width:170px;height:20px;margin-top:140px;text-align:center" >19.9专区</div>
						</div>
					</div>
				</div>

			<!--  -->
			<div class="centent" style="overflow:hidden;">
			<p><b>猜你喜欢</b></p><br>
            <!-- 开始遍历商品 -->
            <?php
            include_once '../public/config.php';
            $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败');
            mysqli_set_charset($link,'utf8');
            $sql = "select * from ".FIX."goods";
            $res = mysqli_query($link,$sql);
            $arr = mysqli_fetch_all($res,1);
            foreach ($arr as $value) {?>
                <div class="tp2">
                    <img src="<?=__PUBLIC__.'/Goods/'.$value['pic']?>" style="width:220px">
                    <a href="detail.php?id=<?=$value['id']?>" class="wz">
                        <p style="height:22px;"><?=$value['name']?></p>
                        <div class="jg">
                            <b>¥<?=$value['price']?></b>
                        </div>
                    </a>
                </div>

            <?php
            }
            ?>
            <!-- 结束遍历商品 -->

    		</div>

		</div>

		<!-- 导入页脚 -->
		<?php
			include_once './config/footer.php';
		?>

	</body>
	<script type="text/javascript" src="./js/move.js"></script>
	<script type="text/javascript" src="./js/banner.js"></script>
</html>