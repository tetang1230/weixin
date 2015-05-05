<?php

require("ThinkWechat.php");

$chat = new ThinkWechat('weixin');
$req_data = $chat->request();
$keywords = array('1', '2');


do
{
        // 新用户关注
        if('event' == $req_data['MsgType'] && 'subscribe' == $req_data['Event'])
        {
                $content  = '感谢关注XXOO，精彩内容与大家分享～～' . "\n";
                $content .= '发送“keyword1”或“keyword2”即刻参与活动！';
                break;
        }
        // 处理用户发送的内容
        $break_flag = 1;
        foreach ($keywords as $k)
        {
                if ($k == trim($req_data['Content']))
                {
                        $break_flag = 0;
                        break;
                }
        }
        if ($break_flag)
        {
                $content    = '输入有误,请输入: "' . implode('"或"', $keywords) . '"';

        }else{
                $content = '输入正确,马上给你发奖了！';
        }
} while(0);
$chat->response($content);

?>
