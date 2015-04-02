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

1. 下载这个项目,已经说明的非常详细了,链接：https://github.com/zxlie/WeixinApi,现在官网已经开放api了,这个项目没必要参考了
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

