weixin
======

微信分享,公众号开发
-------------------
```conf

微信自动回复功能

1. 登陆https://mp.weixin.qq.com/
2. 点击“开发者中心”
3. 设置微信调用url,token

![接口配置info](https://github.com/tetang1230/weixin/blob/master/pics/peizhi1.jpg)

4. 以yaf框架为例,wechat.php中的Event201408 action去接受微信服务器的调用,这个action的url你要配置到微信公众后台
5. thinkwechat是接受weixin请求后,验签和解析xml的操作


微信分享功能

1. 下载这个项目,已经说明的非常详细了,链接：https://github.com/zxlie/WeixinApi

```
