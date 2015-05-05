<?php
class WeChatController extends Yaf_Controller_Abstract
{

    public function Event201408Action()
    {
        $token  = '你在weixin公众号管理后台设置的token,copy到这';
        $weixin = new ThinkWechat($token);

        /* 获取请求信息 */
        $req_data = $weixin->request();
        $keywords = array('keyword1', 'keyword2');

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
            $content    = '输入有误,请输入: "' . implode('"或"', $keywords) . '"';
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
                // 不给返回错误提示
                exit('no wrong notice');
                //break;
            }

            // 下放激活码
            // 以下是你自己的相关业务逻辑,例如发码
            // 我们是提前把激活码放到数据库了
            $event_data = AppEvent201408Model::getEventCode($req_data);
            if (false === $event_data)
            {
                //$content = '出错了,请稍候再试.';
                exit('has wrong');
            }
            elseif (0 == count($event_data))
            {
                //$content = '对不起,您来晚了,激活码全部送完.';
                exit('over');
            }
            else
            {
                $content  = "您的激活码是：（{$event_data['event_code']}），请尽快兑换。";
                $content .= '<a href="http://xxoo.com/2014/0826/index.php">点我立刻兑换</a>';
            }
        } while(0);

        $weixin->response($content);
    }

}

