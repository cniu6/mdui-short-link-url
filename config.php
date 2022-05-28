
<?php
//数据库信息
$host = 'localhost'; //数据库地址
$port = 3306; //端口
$user = ''; //用户名
$pwd = ''; //密码
$dbname = ''; //库名称

//检测域名是否报毒
//0：关闭检测
//1：生成时检测
//2：跳转时检测
define('CHECK_MODE', 1);
//vx：微信查询
//qq：管家查询
define('CHECK_TYPE', 'vx');
//检测密钥
define('CHECK_TOKEN', 'e245b6542564b812b5205f872a861fe7');
?>