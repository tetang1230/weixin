weixin
======

微信分享,公众号开发
-------------------
```conf

微信自动回复功能

1. 登陆https://mp.weixin.qq.com/
2. 点击“开发者中心”
3. 设置微信调用url,token
4. 以yaf框架为例,wechat.php中的Event201408 action去接受微信服务器的调用,这个action的url你要配置到微信公众后台
5. thinkwechat是接受weixin请求后,验签和解析xml的操作

微信分享功能

1 分享的时候要把url在微信中(手机测试)打开(即weixin的webview中),这样才能正确的分享

微信网页授权功能

1 用户同意授权，获取code
  
  在确保微信公众账号拥有授权作用域（scope参数）的权限的前提下（服务号获得高级接口后，默认拥有scope参数中的snsapi_base和snsapi_userinfo），引导关注者打开如下页面：

https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
若提示“该链接无法访问”，请检查参数是否填写错误，是否拥有scope参数对应的授权作用域权限。

上面的信息都是来自微信官网,这里注意两点
  1) 一般我们都获取用户信息,所以scope参数用snsapi_userinfo
  2) redirect_uri参数一定加上http
  
  这里给出一个示例url
  
  https://open.weixin.qq.com/connect/oauth2/authorize?appid=YOUR_APP_ID&redirect_uri=http://182.92.220.196/jichao/pageauth.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect
  

2 用户同意授权后

如果用户同意授权，页面将跳转至 redirect_uri/?code=CODE&state=STATE。若用户禁止授权，则重定向后不会带上code参数，仅会带上state参数redirect_uri?state=STATE

code说明 ：
code作为换取access_token的票据，每次用户授权带上的code将不一样，code只能使用一次，5分钟未被使用自动过期。


这样我们就能拿到code的值了,接下来直接看我的pageauth.php，就明白了，最后返回的结果如下

![接口配置info](https://github.com/tetang1230/weixin/blob/master/pics/weixinpageauth.jpg)

具体的网页授权的相关文档,请看登陆微信公共平台后台,公众平台开发者文档->用户管理->网页授权获取网页基本信息

```


![接口配置info](https://github.com/tetang1230/weixin/blob/master/pics/pz1.jpg)

在设置url,token 提交之前,验证程序就要部署好,以便weixin发过来请求验证。即jcwx.php需要添加本例中的程序：

http://yourURL/wechat/Event201408,此url同时接受微信的get请求(验证weixin请求)和post请求(如果验证通过就接受post请求过来的xml信息)
```php
$weixin = new ThinkWechat($token);
/* 获取请求信息 */
$req_data = $weixin->request();
$keywords = array('keyword1', 'keyword2');
```

