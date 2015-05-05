<?php
require_once "jssdk.php";
$jssdk = new JSSDK("appID", "appsecret");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>

</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'translateVoice',
            'startRecord',
            'stopRecord',
            'onRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard'
    ]
  });
  
  wx.ready(function () {
         // 在这里调用 API
         
         
         //2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
         wx.onMenuShareAppMessage({
                                  title: '互联网之子 方倍工作室',
                                  desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它
们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
                                  link: 'http://movie.douban.com/subject/25785114/',
                                  imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
                                  trigger: function (res) {
                                  alert('用户点击发送给朋友');
                                  },
                                  success: function (res) {
                                  alert('已分享');
                                  },
                                  cancel: function (res) {
                                  alert('已取消');
                                  },
                                  fail: function (res) {
                                  alert(JSON.stringify(res));
                                  }
                                  });
         //alert('已注册获取“发送给朋友”状态事件');
         
         // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
         wx.onMenuShareTimeline({
                                  title: 'jc',
                                  link: 'http://movie.douban.com/subject/25785114/',
                                  imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
                                  trigger: function (res) {
                                  alert('用户点击分享到朋友圈');
                                  },
                                  success: function (res) {
                                  alert('已分享');
                                  },
                                  cancel: function (res) {
                                   alert('已取消');
                                  },
                                  fail: function (res) {
                                  alert(JSON.stringify(res));
                                  }
                                  });
});
</script>
