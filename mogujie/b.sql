-- MySQL dump 10.13  Distrib 5.7.11, for Win32 (AMD64)
--
-- Host: localhost    Database: mogujie
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mgj_address`
--

DROP TABLE IF EXISTS `mgj_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` char(6) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_address`
--

LOCK TABLES `mgj_address` WRITE;
/*!40000 ALTER TABLE `mgj_address` DISABLE KEYS */;
INSERT INTO `mgj_address` VALUES (26,24,'广州省广州市天河区万富商业大厦1楼','18655298545','樊玲','23100',2),(28,24,'广州省广州市天河区万富商业大厦1楼','18655298526','吕帅','23100',2),(29,24,'广州省广州市天河区万富商业大厦1楼','18655298526','李万鹏','23100',2),(34,10,'广州省广州市天河区it兄弟连教育一楼','18655298545','樊玲','23100',2),(35,10,'广州省广州市天河区it兄弟连教育一楼','18655298524','李万鹏','23100',2),(36,25,'','','','',2),(37,25,'456','654','654','456',2),(38,28,'5667','8769','879','565',2),(39,30,'78','867','786','78',2),(40,30,'广州省广州市天河区','18655298545','樊玲','23100',2),(41,32,'松花江上','18655298526','吕畜生','233000',2),(42,33,'ndsadlasd','123123','aoihssaodi','233000',1),(43,33,'那就UI解决就看见门口吗 ','了，了，','离开了；，','23100',2);
/*!40000 ALTER TABLE `mgj_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_book`
--

DROP TABLE IF EXISTS `mgj_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_book` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_book`
--

LOCK TABLES `mgj_book` WRITE;
/*!40000 ALTER TABLE `mgj_book` DISABLE KEYS */;
INSERT INTO `mgj_book` VALUES (14,34,'oo','dfhf','\r\n       gfhdgfh ',1484875210);
/*!40000 ALTER TABLE `mgj_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_detail`
--

DROP TABLE IF EXISTS `mgj_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_detail`
--

LOCK TABLES `mgj_detail` WRITE;
/*!40000 ALTER TABLE `mgj_detail` DISABLE KEYS */;
INSERT INTO `mgj_detail` VALUES (13,14,11,1),(14,14,7,1),(15,15,10,1),(16,15,6,1),(17,16,4,1),(18,17,10,1),(19,18,7,1),(20,19,6,1),(21,20,16,20),(22,21,8,1),(23,22,7,1),(24,23,5,1),(25,24,7,1),(26,25,12,1),(27,26,5,1);
/*!40000 ALTER TABLE `mgj_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_goods`
--

DROP TABLE IF EXISTS `mgj_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `pic` varchar(255) NOT NULL,
  `des` text,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:在售中 2:已下架',
  `store` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `clicknum` int(10) unsigned NOT NULL DEFAULT '0',
  `buynum` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_goods`
--

LOCK TABLES `mgj_goods` WRITE;
/*!40000 ALTER TABLE `mgj_goods` DISABLE KEYS */;
INSERT INTO `mgj_goods` VALUES (4,25,'【女人衣橱8】秋冬新款时尚显瘦甜美V领打底包臀系带连衣裙',88.00,'81111587b5ac9612a9.jpg','甜美V领打底包臀系带连衣裙潮',1,200,1484479177,1,1),(5,25,'秋冬新款 韩版纯色气质修身毛呢连衣裙收腰显瘦长袖A字短裙',90.00,'46818587b5d930b291.jpg','这款版型是比较简约的收腰廓形，适中的长度就是不局限于身材，无论是娇小妹纸还是高挑的妹纸，这个长度都是能很好地拉长身材比例，显瘦又显腿长，所以你们真的不用担心会不好驾驭呢。哈哈哈哈我是超级喜欢袖口的设计，简约而不简单的微喇叭袖口设计，让手腕更显纤细，腰间的可拆卸腰带可以说是一个小亮点，让纯色的大身会显得更修身。因为这款是偏修身版型的，对长度要求会比较高，所以我做了四个尺码的，大家可以选择自己的尺码啦。如果会纠结的话可以联系我们可爱的客服MM来帮忙参考的哈~',1,130,1484479891,1,1),(6,159,'【送进口船袜】香色怡人宫廷圆顶蚊帐',200.00,'14849587b5e9a88097.jpg','【宫廷圆顶蚊帐】（安装便捷，无需打孔，吸盘吸附，现挂现用）精致帐顶，优雅蕾丝，高密防蚊层，精美蝴蝶结绑带，优质升级宝塔，优雅极地长纱，倾情法式浪漫，美好的艺术品',1,120,1484480154,1,1),(7,159,'【送餐具礼盒】韩版卡通刺绣四件套床上用品',200.00,'13696587b5f097173b.jpg','新款亲肤棉四件套不褪色，不起球，拥有柔和的光泽度，棉的纯净，丝绸的质感，睡眠品质整夜满格。柔软亲肤，环保印染，是您健康居家不错的选择。',1,50,1484480265,1,1),(8,25,'2016秋冬装新款韩版女装潮夜店性感蕾丝长袖两件套装连衣裙子',150.00,'63312587b5f77bd80d.jpg','欧洲性感蕾丝长袖连衣裙+不规则半身裙套装潮(模特)',1,200,1484480375,1,1),(9,134,'面膜组合春雨蜂胶嫩肤面膜水光樱花面膜卡通动物面膜10片装',25.00,'94746587b6298e8d51.jpg','面膜组合，多种选择，春夏补水、保湿、亮肤祛黄、舒缓肌肤、收缩毛孔，保湿效果不错，一款滋润补水加锁水面膜',1,200,1484481176,1,1),(10,159,'运动风法莱绒保暖四件套床上用品单人床双人床套件',200.00,'59140587b6330deb9a.jpg','克重越高，，密度越高，保暖性越强，在寒冷的冬夜里依然感受温暖和舒适',1,331,1484481328,1,1),(11,25,'秋冬新品V领露肩长袖纯色修身收腰显瘦小黑裙A字中长款连衣裙',100.00,'62232587b848a9704c.jpg','这件连衣裙的剪裁真的是简直了，选用弹力面料 完美勾勒了腰线，然后大大的裙摆自然过渡散开 超级显瘦遮肉。领口采用不对称的设计，可以 微微露出单边的肩膀 也可以不露肩穿，完全取决于你自己喜欢的感觉 无论是单穿还是作为内搭都非常好看，小黑裙是永远不会退流行的单品 简单又有设计感，气质又不失女人味 搭配一个短靴就能营造出率性又街拍的感觉 无论什么场合都很适合，非常推荐哦！',1,200,1484489866,1,1),(12,145,'doctor朴信惠同款项链女小金豆锁骨链',20.00,'65042587b85fbcde4a.jpg','doctor朴信惠同款项链女小金豆锁骨链',1,20,1484490235,1,1),(13,145,'套餐购买8.9元黑色复古蕾丝项链夜店性感锁骨链贴脖链原创脖链',15.00,'73675587b877db6c09.jpg','套餐优惠大减价，现在只要8.9元，店铺现在有优惠券送，记得领取哦',1,300,1484490621,1,1),(14,96,'【修身版型品质羊羔毛】冬款保暖新款皮羊羔毛皮衣男加绒棉衣',150.00,'91446587b882dcde8e.jpg','【修身版型偏小一个码大家买的时候注意】新品推荐，潮男必备，支持7天无理退货，赠送运费保险，购物0风险！',1,90,1484490797,1,1),(15,109,'2017新款女包韩版甜美淑女休闲时尚包包斜挎包单肩包手提包',200.00,'86505587b88c6a25a1.jpg','本店所有产品支持15天无理由退换，不喜欢，质量部满意一律可以退换，并且运费由我们承担，相当于 免费试用15天。 默认快递：申通快递，偏远地区统一发邮政，需要其他快递的请联系客服。下午四点前的订单当天发货，普通城市一般发货后3-5天可送到，偏远地区时间稍慢一点。 包包尺寸及材质详情页中均有描述。',1,333,1484490950,1,1),(16,96,'(加厚保暖品质款)新款日系情侣加厚毛衣撞色修身羊毛衫套头毛衣',101.00,'19897587b8931ed10e.jpg','赠送运费保险，购物0风险！新品推荐大码，潮男必备，支持7天无理退货。',1,100,1484491057,1,1),(17,121,'冬季加绒保暖棉鞋情侣鞋女士休闲鞋板鞋运动鞋短靴增高韩版潮鞋子',352.00,'12283587b89bc0c98f.jpg','增高4.5CM，秋季新品，品质保证，女款2色，男款2色，女款35-40码，男款39-44码，标准运动鞋码，平时运动鞋，休闲鞋怎么穿就怎么拍哦',1,58402,1484491196,1,1),(18,121,'秋冬新款气垫鞋厚底韩版运动女鞋百搭休闲板鞋学生原宿跑步鞋',500.00,'78999587b8a2c10945.jpg','尺码：35-39 脚胖、脚宽、脚背厚的MM请根据自己的脚型考虑是否要买大1码 尺码正常，脚不胖建议选择正常尺码',1,2212,1484491308,1,1);
/*!40000 ALTER TABLE `mgj_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_link`
--

DROP TABLE IF EXISTS `mgj_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_link` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_link`
--

LOCK TABLES `mgj_link` WRITE;
/*!40000 ALTER TABLE `mgj_link` DISABLE KEYS */;
INSERT INTO `mgj_link` VALUES (3,'百度','http://www.baidu.com'),(4,'蘑菇街','http://mogujie.com'),(5,'京东','https://www.jd.com');
/*!40000 ALTER TABLE `mgj_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_orders`
--

DROP TABLE IF EXISTS `mgj_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `aid` int(10) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_orders`
--

LOCK TABLES `mgj_orders` WRITE;
/*!40000 ALTER TABLE `mgj_orders` DISABLE KEYS */;
INSERT INTO `mgj_orders` VALUES (14,30,39,300.00,1484787601,4),(15,30,39,400.00,1484787700,4),(16,30,39,88.00,1484791364,4),(17,30,39,200.00,1484791760,4),(18,30,39,200.00,1484793728,1),(19,30,39,200.00,1484814832,1),(20,32,41,2020.00,1484835775,1),(21,32,41,150.00,1484836696,1),(22,32,41,200.00,1484837312,1),(23,32,41,90.00,1484837791,1),(24,32,41,200.00,1484838300,1),(25,32,41,20.00,1484839627,2),(26,33,42,90.00,1484844129,4);
/*!40000 ALTER TABLE `mgj_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_pj`
--

DROP TABLE IF EXISTS `mgj_pj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_pj` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_pj`
--

LOCK TABLES `mgj_pj` WRITE;
/*!40000 ALTER TABLE `mgj_pj` DISABLE KEYS */;
INSERT INTO `mgj_pj` VALUES (1,14,30,'\r\n            高房价回复客户',1484884624),(2,14,30,'\r\n            的非官方的股份登革热头头儿',1484884643),(3,14,30,'\r\n            的非官方的股份登革热头头儿',1484884651),(4,14,30,'衣服非常好，非常喜欢！！！',1484884703),(5,14,30,'\r\n            dsfdsfdsfdsfds',1484884744),(6,14,30,'dsfdfdsfdsfdsfgfgfgf\r\n            ',1484884763);
/*!40000 ALTER TABLE `mgj_pj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_type`
--

DROP TABLE IF EXISTS `mgj_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '0,',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_type`
--

LOCK TABLES `mgj_type` WRITE;
/*!40000 ALTER TABLE `mgj_type` DISABLE KEYS */;
INSERT INTO `mgj_type` VALUES (25,'上衣',0,'0,'),(26,'初冬上新',25,'0,25,'),(27,'毛呢外套',25,'0,25,'),(28,'棉服',25,'0,25,'),(29,'打底裤',31,'0,31,'),(30,'精致套装 ',25,'0,25,'),(31,'裤子',0,'0,'),(32,'棉服毛衣 ',25,'0,25,'),(33,'针织衫',25,'0,25,'),(34,'气质风衣 ',25,'0,25,'),(35,'衬衫',25,'0,25,'),(36,'棒球外套 ',25,'0,25,'),(37,'长袖T恤 ',25,'0,25,'),(38,'牛仔外套 ',25,'0,25,'),(39,'时尚卫衣',25,'0,25,'),(40,'冬季外套 ',25,'0,25,'),(41,'高领毛衣 ',25,'0,25,'),(42,'廓形毛呢 ',25,'0,25,'),(43,'马甲皮衣 ',25,'0,25,'),(44,'面包棉服 ',25,'0,25,'),(45,'皮草 ',25,'0,25,'),(46,'连帽卫衣 ',25,'0,25,'),(47,'羽绒服 ',25,'0,25,'),(48,'针织开衫',25,'0,25,'),(49,'鱼尾裙',57,'0,57,'),(50,'背带裙',57,'0,57,'),(51,'半身长裙',57,'0,57,'),(52,'公主袖裙',57,'0,57,'),(53,'小白裙',57,'0,57,'),(54,'A字裙',57,'0,57,'),(55,'百褶裙',57,'0,57,'),(56,'雪纺裙',57,'0,57,'),(57,'裙子',0,'0,'),(58,'冬季新款',57,'0,57,'),(59,'长袖连衣裙 ',57,'0,57,'),(60,'美裙套装 ',57,'0,57,'),(61,'半身裙 ',57,'0,57,'),(62,'针织裙 ',57,'0,57,'),(63,'连衣裙 ',57,'0,57,'),(64,'卫衣裙 ',57,'0,57,'),(65,'毛呢连衣裙',57,'0,57,'),(66,'牛仔裤 ',31,'0,31,'),(67,'阔腿裤 ',31,'0,31,'),(68,'小脚裤 ',31,'0,31,'),(69,'背带裤 ',31,'0,31,'),(70,'休闲裤 ',31,'0,31,'),(71,'九分裤 ',31,'0,31,'),(72,'七分裤',31,'0,31,'),(73,' 加绒打底裤',31,'0,31,'),(74,'内衣',0,'0,'),(75,'内衣套装 ',74,'0,74,'),(76,'调整型内衣',74,'0,74,'),(77,' 文胸 ',74,'0,74,'),(78,'内裤 ',74,'0,74,'),(79,'无痕内衣',74,'0,74,'),(80,' 运动内衣 ',74,'0,74,'),(81,'卡通内衣 ',74,'0,74,'),(82,'保暖内衣',74,'0,74,'),(83,'女鞋',0,'0,'),(84,'单鞋 ',83,'0,83,'),(85,'运动鞋 ',83,'0,83,'),(86,'靴子 ',83,'0,83,'),(87,'小白鞋 ',83,'0,83,'),(88,'帆布鞋 ',83,'0,83,'),(89,'厚底鞋 ',83,'0,83,'),(90,'高跟鞋',83,'0,83,'),(91,'休闲鞋 ',83,'0,83,'),(92,'一脚蹬 ',83,'0,83,'),(93,'马丁靴 ',83,'0,83,'),(94,'牛津鞋 ',83,'0,83,'),(95,'粗跟鞋',83,'0,83,'),(96,'男友',0,'0,'),(97,'棉衣棉服 ',96,'0,96,'),(98,'牛仔裤 ',96,'0,96,'),(99,'卫衣 ',96,'0,96,'),(100,'夹克 ',96,'0,96,'),(101,'休闲鞋',96,'0,96,'),(102,'休闲裤 ',96,'0,96,'),(103,'毛衣针织 ',96,'0,96,'),(104,'绅士皮鞋 ',96,'0,96,'),(105,'时尚套装 ',96,'0,96,'),(106,'男袜 ',96,'0,96,'),(107,'贴身内裤 ',96,'0,96,'),(108,'衬衫12.12底价',96,'0,96,'),(121,'运动',0,'0,'),(122,'运动套装 ',121,'0,121,'),(123,'运动鞋 ',121,'0,121,'),(124,'元气棉服 ',121,'0,121,'),(125,'时尚卫衣 ',121,'0,121,'),(126,'秋冬短靴 ',121,'0,121,'),(127,'跑鞋棒球衫 ',121,'0,121,'),(128,'帆布鞋 ',121,'0,121,'),(129,'情侣款双肩包 ',121,'0,121,'),(130,'烧烤用品 ',121,'0,121,'),(131,'运动主会场 ',121,'0,121,'),(132,'人气榜单 ',121,'0,121,'),(133,'人气榜单',121,'0,121,'),(134,'美妆',0,'0,'),(135,'保湿补水 ',134,'0,134,'),(136,'美白淡斑 ',134,'0,134,'),(137,'洁面 ',134,'0,134,'),(138,'人气面膜 ',134,'0,134,'),(139,'水乳 ',134,'0,134,'),(140,'眼唇护理 ',134,'0,134,'),(141,'T区护理 ',134,'0,134,'),(142,'护唇膏 ',134,'0,134,'),(143,'精华护肤套装 ',134,'0,134,'),(144,'防晒男士护肤',134,'0,134,'),(145,'配饰',0,'0,'),(146,'早秋围巾 ',145,'0,145,'),(147,'手表 ',145,'0,145,'),(148,'锁骨链 ',145,'0,145,'),(149,'帽子 ',145,'0,145,'),(150,'发饰 ',145,'0,145,'),(151,'戒指 ',145,'0,145,'),(152,'眼镜框 ',145,'0,145,'),(153,'耳饰 ',145,'0,145,'),(154,'棒球帽 ',145,'0,145,'),(155,'手链 ',145,'0,145,'),(156,'墨镜 ',145,'0,145,'),(157,'耳钉 ',145,'0,145,'),(158,'男士手表皮带',145,'0,145,'),(159,'家居',0,'0,'),(160,'四件套秋 ',159,'0,159,'),(161,'冬被 ',159,'0,159,'),(162,'沙发垫 ',159,'0,159,'),(163,'抱枕',159,'0,159,'),(164,'家居鞋 ',159,'0,159,'),(165,'枕头 ',159,'0,159,'),(166,'地毯地垫 ',159,'0,159,'),(167,'床幔床垫 ',159,'0,159,'),(168,'坐垫毯子',159,'0,159,'),(169,' 窗帘被套 ',159,'0,159,'),(170,'餐桌布艺',159,'0,159,'),(171,'母婴',0,'0,'),(172,'男童装 ',171,'0,171,'),(173,'女童装 ',171,'0,171,'),(174,'轻薄外套 ',171,'0,171,'),(175,'童裤 ',171,'0,171,'),(176,'孕妇连衣裙 ',171,'0,171,'),(177,'孕妇装',171,'0,171,'),(178,' 帆布鞋 ',171,'0,171,'),(179,'家居服 ',171,'0,171,'),(180,'益智早教',171,'0,171,'),(181,'食品',0,'0,'),(182,'咖啡冲饮 ',181,'0,181,'),(183,'谷物 ',181,'0,181,'),(184,'花草茶 ',181,'0,181,'),(185,'饮料',181,'0,181,'),(186,' 冲饮 ',181,'0,181,'),(187,'果味茶饮 ',181,'0,181,'),(188,'早餐茶饮 ',181,'0,181,'),(189,'代餐粉粉',181,'0,181,'),(190,'百货',0,'0,'),(191,'保温杯 ',190,'0,190,'),(192,'晴雨伞 ',190,'0,190,'),(193,'玻璃杯 ',190,'0,190,'),(194,'毛绒玩具 ',190,'0,190,'),(195,'心机小物 ',190,'0,190,'),(196,'衣物护理 ',190,'0,190,'),(197,'用品家务 ',190,'0,190,'),(198,'清洁毛巾 ',190,'0,190,'),(199,'浴巾 ',190,'0,190,'),(200,'包包',0,'0,'),(201,'双肩包',200,'0,200,'),(202,'斜挎包',200,'0,200,'),(203,'手提包',200,'0,200,'),(204,'单肩包',200,'0,200,'),(205,'百搭大包',200,'0,200,'),(206,'迷你小包',200,'0,200,'),(207,'旅行箱包',200,'0,200,'),(208,'女士钱包',200,'0,200,'),(209,'男士钱包',200,'0,200,'),(210,'香风链条手拿包',200,'0,200,');
/*!40000 ALTER TABLE `mgj_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mgj_user`
--

DROP TABLE IF EXISTS `mgj_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgj_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pwd` char(32) NOT NULL COMMENT 'md5的加密',
  `role` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:普通会员 2:管理员',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:正常 2:禁用',
  `phone` char(11) DEFAULT NULL,
  `qq` varchar(15) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `des` text,
  `img` varchar(255) NOT NULL DEFAULT 'head.jpg',
  `birth` char(10) DEFAULT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '2' COMMENT '2:女 1:男',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mgj_user`
--

LOCK TABLES `mgj_user` WRITE;
/*!40000 ALTER TABLE `mgj_user` DISABLE KEYS */;
INSERT INTO `mgj_user` VALUES (10,'admin','202cb962ac59075b964b07152d234b70',3,1,'','',1484059375,'lklk','52068587f0b477bdae.jpg',NULL,2),(14,'12','c20ad4d76fe97759aa27a0c99bff6710',2,1,NULL,NULL,1484102814,NULL,'head.jpg',NULL,2),(15,'太容易','3c59dc048e8850243be8079a5c74d079',1,1,NULL,NULL,1484105887,NULL,'head.jpg',NULL,2),(16,'梵蒂冈','3416a75f4cea9109507cacd8e2f2aefc',1,1,NULL,NULL,1484105924,NULL,'head.jpg',NULL,2),(19,'高管','c4ca4238a0b923820dcc509a6f75849b',1,1,NULL,NULL,1484193280,NULL,'head.jpg',NULL,2),(21,'儿童','202cb962ac59075b964b07152d234b70',1,1,'','',1484193344,'','head.jpg',NULL,2),(24,'5465','73c18c59a39b18382081ec00bb456d43',1,1,NULL,NULL,1484211747,'5416','head.jpg',NULL,2),(25,'45785785','4124bc0a9335c27f086f24ba207a4912',1,1,NULL,NULL,1484287483,'75','68128587f4d3debad3.jpg',NULL,2),(26,'ls','44ba5ca65651b4f36f1927576dd35436',2,1,'1555555','525',1484380428,'515','head.jpg',NULL,2),(28,'45','4124bc0a9335c27f086f24ba207a4912',1,2,NULL,NULL,1484725145,'','62292587f541bdd822.jpg','2017-01-18',2),(29,'bb','21ad0bd836b90d08f4cf640b4c298e7c',2,1,NULL,NULL,1484738948,NULL,'head.jpg',NULL,2),(30,'aa','4124bc0a9335c27f086f24ba207a4912',1,1,'652',NULL,1484745787,'4255','11591587f7cd133def.jpg','2017-01-22',2),(31,'ee','d41d8cd98f00b204e9800998ecf8427e',1,1,NULL,NULL,1484835136,NULL,'head.jpg',NULL,2),(32,'吕帅','202cb962ac59075b964b07152d234b70',1,1,NULL,NULL,1484835161,NULL,'171085880c9aeae602.jpg',NULL,2),(33,'nihao','194ce5d0b89c47ff6b30bfb491f9dc26',1,1,NULL,NULL,1484843530,NULL,'head.jpg',NULL,2),(34,'oo','e47ca7a09cf6781e29634502345930a7',1,1,NULL,NULL,1484874763,NULL,'head.jpg',NULL,2);
/*!40000 ALTER TABLE `mgj_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-20 14:28:28
