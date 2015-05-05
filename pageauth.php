<?php

function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
}

$code = $_GET['code'];
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx3fc6451e544100ab&secret=48abc5f3b8a10d47a10225ecb7505bf5&code={$code}&grant_type=authorization_code";

$res = httpGet($url);
$res = json_decode($res, true);

$url = "https://api.weixin.qq.com/sns/userinfo?access_token={$res['access_token']}&openid={$res['openid']}&lang=zh_CN";

$res = httpGet($url);
$res = json_decode($res, true);

echo '<pre>';
echo print_r($res, true);
