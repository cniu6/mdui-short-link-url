## mdui-short-link-url
<h1 align="center">

一个开源的mdui风格短链接系统
  <br>
</h1>

适合个人使用,只是把链接缩短储存,相同网址会取相同短链。

## 环境 

PHP+MySql即可，可以安装在虚拟主机里

## 安装
<h3>Steps</h3>
在Releases下载最新zip<br/>
解压<br/>
Nginx伪静态在 ./jingtai.txt 中<br/>
IIS，Apache伪静态自己转换。。。<br/>
到./install目录下安装<br/>
安装完成后记得删掉./install目录<br/>
回到首页即可使用<br/>

## 关于api

使用 .../api.php?url=http://{url}  <br/>
POST / GET<br/>

|返回结果|操作名称|数据|
|-|-|-|
|`code输出`|返回的短链接|为0时说明有问题，一般正常输出为短链接的随机后缀|
|`msg`|结果状态|成功为succes，在数据库中存在为existence，网址不正确为url is incorrect，网址输入为空为the url cannot be empty,违规网址被拦截为url is red,数据库未连接为failure|
|`result`|状态码|成功输出位1，网址输入不正确为10002，网址输入为空是10001，违规网址被拦截为10004,数据库未连接为10003||



-注意{url} 必须要带小数点 列如 xxx.xxx 否则不正常会 跳转到0.0.0.0 <br/>
-注意{url}的开头必须要带http:// 



## DEMO

- <a href="http://url.zerohh.top">零时短链接</a>
  
## 我们站在巨人的肩膀上
-[MDUI](http://mdui.org/)
  And  You
## 其他
```
 这是网上流传的源码 来源于 [@2D天天]（http://b23.tv?KlAxWcd）在v0.01分支有源码

```
