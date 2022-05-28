<?php
include './includes/api.inc.php';
$longurl = (isset($_GET['url'])) ?$_GET['url']:$_POST['url'];
$format = (isset($_GET['format'])) ?$_GET['format']:$_POST['format'];

if(!$longurl){
	show_result(0,"the url cannot be empty",10001);
  	exit();
}
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$longurl)) {
	show_result(0,"url is incorrect",10002);
  	exit();
}
//查域名是否报毒，然后在存入数据库
if (CHECK_MODE == 1) {
	$param = http_build_query(array(
		'token'		=>		CHECK_TOKEN
		,'domain'	=>		$longurl
	));
	$result = get_curl('http://check.uomg.com/api/urlsec/'.CHECK_TYPE, $param);
	$arr = json_decode($result,true);
	if ($arr['code'] == 201) {
		show_result(0,"url is red",10004);
	}

}
//链接缩短核心 base32加密  存在数据库时 base64加密 我用的存数据库的链接未加密版 c牛6写的注释
$uid = shorturl($longurl);   //给缩短后的随机后缀去掉变成$uid = shorturl($longurl); 变为  $uid = $longurl; 使生成源链接，达不到缩短，数据库储存的uid也是源链接 ‘ shorturl ’就是一个base32加密函数在 api.inc.php中写到。
$myrow = $DB->get_row("select * from urllist where longurl='".$longurl."' limit 1"); //储存在数据库时不加密，加密版 $myrow = $DB->get_row("select * from urllist where longurl='".base64_encode($longurl)."' limit 1");
if(!$myrow){
	//不存在，就储存一个
    $sql = $DB->query("insert into `urllist` (`uid`,`longurl`) values ('".$uid."','".$longurl."')"); //储存在数据库时不加密，加密版 $sql = $DB->query("insert into `urllist` (`uid`,`longurl`) values ('".$uid."','".base64_encode($longurl)."')");
	if(!empty($sql)){
	    show_result($uid,"success",1);
	}else{
	    show_result(0,"failure",10003);
	}
	
}else{
	//存在直接提取
	show_result($uid,"existence",1);
}

$DB->close();

function show_result($code,$msg,$result){
	global $format;
	if ($format === 'txt') {
		if ($code === 0 ){
			exit($msg);
		}else{
			exit($code);
		}
	}else{
		$result=array("code"=>$code,"msg"=>$msg,"result"=>$result);
		exit(json_encode($result));
	}

}