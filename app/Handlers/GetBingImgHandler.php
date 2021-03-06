<?php

namespace App\Handlers;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;

class GetBingImgHandler
{

	public function translate()
    {
        // 实例化 HTTP 客户端
        $http = new Client;
        // 初始化配置信息  请求地址
        $api = 'https://bing.ioliu.cn/v1/rand?type=json';
        // 发送 HTTP Get 请求
        $response = $http->get($api);

        $result = json_decode($response->getBody(), true);
        /**
        获取结果，如果请求成功，dd($result) 结果如下：

        {
		    "data": {
		        "enddate": "20180612",
		        "url": "http://h1.ioliu.cn/bing/Kiasma_EN-AU13083124808_1920x1080.jpg?imageslim",
		        "bmiddle_pic": null,
		        "original_pic": null,
		        "thumbnail_pic": null,
		        "copyright": "奇亚斯玛当代艺术博物馆，芬兰赫尔辛基 (© Nikolaus Gruenwald/Offset)"
		    },
		    "status": {
		        "code": 200,
		        "message": ""
		    }
		}

        **/
        //获取结果
        if(isset($result['status']) && $result['status']['code'] == 200){
        	$imgUrl = $result['data']['url'];
            $newUrl = 'index/article/' . time() . '_' . rand(10, 1000) . '.jpg';
            //下载远程图片
            $articlePath = public_path($newUrl);
            try {
                // 下载最新的头像到本地
                $client = new Client();
                $client->request('GET', $imgUrl, [
                    'sink' => $articlePath,
                ]);
            } catch (Exception $e) {
                //默认图片
                $newUrl = 'index/images/default.jpg';
            }
            return $newUrl;
        }else{
        	//默认图片
        	return  'index/images/default.jpg';
        }

    }
}