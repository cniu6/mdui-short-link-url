<?php
if(!@file_exists('../install.lock')&&!@file_exists('./install.lock')){
	echo '<h2>检测到无 install.lock 文件</h2><ul><li><font size="4">如果您尚未安装本程序，请<a href="../install/">前往安装</a></font></li><li><font size="4">如果您已经安装本程序，请手动放置一个空的 install.lock 文件到根目录下，<b>为了您站点安全，在您完成它之前我们不会工作。</b></font></li></ul><br/>';
	exit(0);
}
?>

<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="renderer" content="webkit"/>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=440,target-densitydpi=device-dpi, minimum-scale=0.5,maximum-scale=1">
 <title>零时免费短网址生成</title>
 <meta name="keywords" content="缩短网址,网址压缩,网址缩短,短网址,短域名,短地址,短URL,免费缩短网址,短链接生成器,短网址生成,免费缩址,域名伪装,C牛6,域名转向,网站推广,短链接,长网址变短网址">
 <meta name="description" content="免费专业的网址缩短服务,在线生成短网址,不限制接口请求数,跳转快,稳定可靠,防屏蔽,防拦截!">
 <link rel="stylesheet" href="./mdui/css/mdui.min.css"/>
 <script src="./mdui/js/mdui.min.js"></script>
   
</header>  

<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-blue">
    <div id='loading' class="mdui-spinner" hidden style="position:fixed;top:0;bottom:0;left:0;right:0;margin: auto;height: 50px;width: 50px;z-index:10000000;"></div>
    <header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
        
        <a href="/" class="mdui-typo-headline">零时短链接</a>
        
        
      <div class="mdui-toolbar-spacer">
        
      </div>
    
      <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon">
        <i class="mdui-icon material-icons">refresh</i>
      </a>
     <a class="mdui-btn mdui-btn-icon" mdui-tooltip="{content:'护眼模式 on/off'}" onclick="rtx()">
            <i class="mdui-icon material-icons">brightness_4</i>
        </a>
    </div>
</div>  
</div>
    </header>
</body>


   



  <div class="mdui-container">
 
      <div style="Height:30px"></div>

      <div class="mdui-container mdui-shadow-24" >
        <br/>
      <div class="mdui-card-primary-title"><h2>短网址生成工具</h2></div>
			<div class="mdui-card-primary-subtitle">您可以在下面粘贴长网址，我们来为您自动转换成得简短网址链接。</div>
      <div class="mdui-typo">
            <hr/> 
          
                
          <div class="mdui-card-primary">
        </div>
    
     
        <center> <h4 id="error-tips">
</h4></center>
     
     <div class="mdui-typo">
            <hr/> 
          
				<div class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-12 mdui-col-sm-8 mdui-textfield-has-bottom" id="input-wrap">
				<i class="mdui-icon material-icons">language</i>
				<label class="mdui-textfield-label" for="inputContent">请输入长网址,可不带http://</label>
				<input class="mdui-textfield-input" type="text" id="inputContent">
        </div>
  
	
			<div class="mdui-textfield mdui-col-xs-12 mdui-col-sm-8 mdui-textfield-has-bottom">
			<i class="mdui-icon material-icons">forward</i>
			<label class="mdui-textfield-label" id="result-wrap">生成结果</label>
		    <input class="mdui-textfield-input" type="text" id="gen_result_url" value="">  
      </div>	
     </div>
            
   <button class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-btn-raised mdui-hoverable" id="shortify"  onclick="checkUrl(document.getElementById('inputContent').value)">点击缩短</button>                 
	
   <a class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-btn-raised mdui-hoverable mdui-col-md-3" target="_blank" id="preViewBtn"><button class="mdui-btn mdui-ripple" target="_blank" id="preViewBtn" type="button">点击预览</button></a>
  
				 
           </div>
     </div>
      
</div>
</div>
 
<div class="mdui-container">
 
 
          <div style="Height:50px"></div>
    
          <div class="mdui-container mdui-shadow-24" >
            <div class="mdui-card mt">
                <div class="mdui-card-menu">
                    
              <div class="mdui-card-primary">
            </div>
           </div>
          </div>
      
          <h1>Hi!</h1>
          <div class="mdui-typo">
            <hr/> 
    <blockquote>
      <li>一个开源的Mdui短链接php系统带api无限制</li>
       </blockquote>
       <div class="mdui-typo">
         <hr/> 
 


     </div>
      </div>
      </div>
      </div>
      </div>


      <body>
	<script>
		function sendAJAX(hasHttp) {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4) {

					if(xhr.status===200){

						if (xhr.responseText.indexOf("(1045)") > -1) {
							console.log(xhr.responseText.indexOf("(1045)"));
							msgAlert('您还没有配置数据库文件吧！');
              mdui.snackbar({
             message: '您还没有配置数据库文件吧！',
             position:'top',
              timeout:'2000',  });
						}
						var result = JSON.parse(xhr.responseText);
						if (result.result == 1) {
							var resultWrap = document.getElementById('result-wrap');
							resultWrap.style.display = 'block';
							var preViewBtn = document.getElementById('preViewBtn'),
								genResultUrl = document.getElementById('gen_result_url');
							preViewBtn.setAttribute('href', location.protocol+'//'+location.host+'/' + result.code);
							genResultUrl.value = location.protocol+'//'+location.host+'/' + result.code
						} else {
							msgAlert(result.msg);
						}
					}else{
							msgAlert('返回错误');
               mdui.snackbar({
               message: '返回错误',
               position:'top',
               timeout:'2000',  });
					}	
				}
			};
			var urlVal = document.getElementById('inputContent').value;
			var urlParam = hasHttp?urlVal:'http://'+urlVal;
			xhr.open('GET', location.protocol+'//'+location.host + '/api.php?url=' + encodeURIComponent(urlParam));
			xhr.send();
		}

		function msgAlert(txt,input) {
			var tips = document.getElementById('error-tips');
			tips.style.display = "block";
			tips.innerHTML = txt;
			input&&(document.getElementById('input-wrap').classList.add('has-error'))
			setTimeout(function () {
				tips.style.display = 'none';
			}, 2000)
		}
		function closeWrapper(){
			document.getElementById('result-wrap').style.display='none'
		}
		function checkUrl(text) {
			var hasHttp = /^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(text),
				notHasHttp = /^\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(text);
			if (!hasHttp&&!notHasHttp) {
				msgAlert('输入的url有误,请重新输入!',true);
        mdui.snackbar({
             message: '输入的url有误,请重新输入!',
             position:'top',
              timeout:'2000',  });
			} else {
				document.getElementById('input-wrap').classList.remove('has-error')
				sendAJAX(hasHttp);
			}
		}
	</script>

   

<script>
        if(window.innerWidth>=1000)document.getElementById('main-drawer');
        var container=document.querySelector("#container");
        
        mdui.mutation();
        var rtx_status=Number(localStorage.getItem('rtx'))||0;
        if(rtx_status)document.body.classList.add("mdui-theme-layout-dark");
        function rtx(){
            if(rtx_status)document.body.classList.remove("mdui-theme-layout-dark");
            else document.body.classList.add("mdui-theme-layout-dark");
            rtx_status^=1;
            localStorage.setItem('rtx',rtx_status);
        }
        </script>        

      </body>


   
    <div style="Height:150px"></div>
    <footer class="mdui-text-center mdui-shadow-24">
     
      <br>
      <a class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" href="mailto:mcbbs666@126.com" mdui-tooltip="{content: '邮箱mcbbs666@126.com'}" one-link-mark="yes">
      <i class="mdui-icon material-icons">email</i>
      </a>
     
      <a class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: 'Gthub上的开源项目'}" href="http://github.com/cniu6/mdui-short-link-url">
      <i class="mdui-icon material-icons">public</i>
      </a>
    
      
  
         
      
      <br>
      
 <div class="mdui-chip mdui-chip-title  mdui-color-indigo-400"> &nbsp; <a id="hitokoto">:D 获取中...</a>
  
  </div>
</div></div>
  <div class="mdui-text mdui-typo">
    <p>Copyright ©&nbsp;2021-2022&nbsp; <code> 零时短链接 - C牛6</code></p>
 
    <a href="https://mdui.org" target="_blank">|  Powered by: <code>MDUI</code> |</a>
 
  
  <p><a>| 已运行了<span id="timefooter"></span> |</a></p>
  
    <div style="Height:10px"></div>

    
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
      fetch('https://v1.hitokoto.cn')
          .then(function (res) {
          return res.json();
      })
          .then(function (data) {
          var hitokoto = document.getElementById('hitokoto');
          hitokoto.innerText = data.hitokoto;
      })
  
  </script>
     <script>
    function secondToDate(second) {
      if (!second) {
        return 0;
      }
      var time = new Array(0, 0, 0, 0, 0);
      if (second >= 365 * 24 * 3600) {
        time[0] = parseInt(second / (365 * 24 * 3600));
        second %= 365 * 24 * 3600;
      }
      if (second >= 24 * 3600) {
        time[1] = parseInt(second / (24 * 3600));
        second %= 24 * 3600;
      }
      if (second >= 3600) {
        time[2] = parseInt(second / 3600);
        second %= 3600;
      }
      if (second >= 60) {
        time[3] = parseInt(second / 60);
        second %= 60;
      }
      if (second > 0) {
        time[4] = second;
      }
      return time;
    }
  </script>
  <script type="text/javascript" language="javascript">
    function setTime() {
      var create_time = Math.round(new Date(Date.UTC(2022, 4, 23, 25, 20, 01)).getTime() / 1000);//年，目标月-1，日，时，分，秒≥1//得到运行时间（可修改）
      var timestamp = Math.round((new Date().getTime() + 8 * 60 * 60 * 1000) / 1000);
      currentTime = secondToDate((timestamp - create_time));
      currentTimeHtml = '              ' + currentTime[0] + ' 年' + currentTime[1] + '天' +
        currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4] +
        '秒';
     
      document.getElementById("timefooter").innerHTML = currentTimeHtml;
    
    }
    setInterval(setTime, 1000);
  </script>
  
 
  
    </div>
   </div>
      </div>
      </div>
      </footer>
  
      <div style="Height:50px"></div>
  
  

  <link rel="stylesheet" href="./mdui/css/mdui.min.css"/>
   <script src="./mdui/js/mdui.min.js"></script>
   
 
  <script>
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?8586042c29dadae4b6eb8cacf8d9fa97";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
  })();
  </script>


</footer>
<script nonce="81586268-09f0-448d-9e65-71e2d1868939">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></html>

    
 