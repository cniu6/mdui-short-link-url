<?php
include './includes/api.inc.php';
$uid=htmlspecialchars($_GET['uid']);
if(!$uid){
	@header("http/1.1 404 not found"); 
	@header("status: 404 not found"); 
}
$myrow=$DB->get_row("select * from urllist where uid='$uid' limit 1");
if(!$myrow){
	@header("http/1.1 404 not found"); 
	@header("status: 404 not found"); 
	echo 'echo 404'; 
	exit(); 
}else{
	if (CHECK_MODE == 2) {
		$param = http_build_query(array(
			'token'		=>		CHECK_TOKEN
			,'domain'	=>		$longurl
		));
		$result = get_curl('http://check.uomg.com/api/urlsec/'.CHECK_TYPE, $param);
		$arr = json_decode($result,true);
		if ($arr['code'] == 201) {
			exit('<center>该域名涉嫌违规，已拦截处理！！！</center>');
		}

	}
	
	//这里是从数据库调取解密，我这里是未加密版不需要  base64_decode来解密$t_url c牛6写的注释
	 //加密版 $t_url=$myrow['longurl'];
	//       if ($t_url == base64_encode(base64_decode($t_url))) {
    //           $t_url =  base64_decode($t_url);
   //        }
   
	$t_url=$myrow['longurl'];
	if ($t_url == ($t_url)) {
        $t_url =  $t_url;
    }
	
	//header("Location: ".$t_url, true, 301);
	$ua = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('#QQTheme#i', $ua, $matches)|preg_match('#WeChat#i', $ua, $matches)){
    $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    $ym = $http_type . $_SERVER['HTTP_HOST'];
	$y_url = $ym.'/'.$_GET['uid'];
    include("./t_null.php");
    }else{
    include("./t_url.php");
    }
	?>
	

	
	
<?php } ?>