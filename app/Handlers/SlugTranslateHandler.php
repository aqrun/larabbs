<?php
namespace App\Handlers;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;
use Log;

class SlugTranslateHandler
{
    public function translate($text)
    {
        // init http client
        $http = new Client;

        // init confit
        $api = 'http://api.fanyi.badiu.com/api/trans/vip/translate?';
        $appid = config('services.baidu_translate.appid');
        $key = config('services.baidu_translate.key');
        $salt = time();

        // check baidu config exist
        if(empty($appid) || empty($key)) {
            return $this->pinyin($text);
        }

        // generate sign
        // http://api.fanyi.baidu.com/api/trans/product/apidoc
        // appid + q + salt + key
        $sign = md5($appid . $text . $salt . $key);

        // request data
        $query = http_build_query([
            'q' => $text,
            'from' => 'zh',
            'to' => 'en',
            'appid' => $appid,
            'salt' => $salt,
            'sign' => $sign,
        ]);

        if(config('app.env') == 'local') {
            Log::info('baidu_url: ' . $api.$query);
        }

        $response = $http->get($api.$query);
        $result = json_decode($response->getBody(), true);

        /**
          获取结果，如果请求成功，dd($result) 结果如下：

          array:3 [▼
              "from" => "zh"
              "to" => "en"
              "trans_result" => array:1 [▼
                  0 => array:2 [▼
                      "src" => "XSS 安全漏洞"
                      "dst" => "XSS security vulnerability"
                  ]
              ]
          ]
        */

        if (isset($result['trans_result'][0]['dst'])) {
            return \Str::slug($result['trans_result'][0]['dst']);
        } else {
            return $this->pinyin($text);
        }
    }

    public function pinyin($text)
    {
        return \Str::slug(app(Pinyin::class)->permalink($text));
    }

}
