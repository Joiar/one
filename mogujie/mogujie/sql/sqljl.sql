create database mogujie;
use mogujie;

-- 创建用户表
create table mgj_user(
    id int unsigned primary key auto_increment,
    username varchar(50) not null unique,
    pwd char(32) not null comment 'md5的加密',
    role tinyint not null default 1 comment '1:普通会员 2:管理员 3:超级管理员',
    status tinyint not null default 1 comment '1:正常 2:禁用',
    sex tinyint not null default 2 comment '2:女 1:男',
    phone char(11),
    qq varchar(15),
    addtime int not null default 0,
    des text
)engine=innodb default charset=utf8;

-- 上传头像
alter table mgj_user add img varchar(255) not null default 'head.jpg';

-- 插入测试数据
insert into mgj_user(username, pwd, role, addtime) values('admin', md5('123'),2, unix_timestamp());


--创建分类表
create table mgj_type(
    id int unsigned primary key auto_increment,
    name varchar(255) not null,
    pid int unsigned not null default 0,
    path varchar(255) not null default '0,'
)engine=innodb default charset=utf8;

--创建商品表
create table mgj_goods(
    id int unsigned primary key auto_increment,
    tid int unsigned not null,
    name varchar(255) not null,
    price decimal(10,2) unsigned not null default 0,
    pic varchar(255) not null,
    des text,
    status tinyint not null default 1 comment '1:在售中 2:已下架',
    store int unsigned not null default 0,
    addtime int not null default 0,
    clicknum int unsigned not null default 0,
    buynum int unsigned not null default 0,
    index name(name)
)engine=innodb default charset=utf8;

--创建地址表
create table mgj_address(
    id int unsigned primary key auto_increment,
    uid int unsigned not null,
    address varchar(255) not null,
    phone char(11) not null,
    name varchar(50) not null,
    code char(6)
)engine=innodb default charset=utf8;

--创建订单表
create table mgj_orders(
    id int unsigned primary key auto_increment,
    uid int unsigned not null,
    aid int unsigned not null,
    total decimal(10,2) not null,
    addtime int not null default 0,
    status tinyint not null default 1
)engine=innodb default charset=utf8;

--创建订单详情表
create table mgj_detail(
    id int unsigned primary key auto_increment,
    oid int unsigned not null,
    gid int unsigned not null,
    num int unsigned not null default 1
)engine=innodb default charset=utf8;

-- 创建友情链接表
create table mgj_link(
    lid int unsigned auto_increment primary key,
    title varchar(30) not null,
    link varchar(255) not null
)engine=innodb default charset=utf8;

-- 创建留言表
create table mgj_book(
    bid int unsigned auto_increment primary key,
    uid int unsigned not null,
    name varchar(50) not null,
    title varchar(30) not null,
    content text not null,
    time int not null default 0
)engine=innodb default charset=utf8;


-- 创建商品评价表
create table mgj_pj(
    pid int unsigned auto_increment primary key,
    gid int unsigned not null,
    uid int unsigned not null,
    content text not null,
    time int not null default 0
)engine=innodb default charset=utf8;