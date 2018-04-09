<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

namespace think\captcha;

use think\Config;

class CaptchaController
{


    public function index($id = "")
    {
    	//var_dump( (array)Config::get('captcha') );die;

        $captcha = new Captcha((array)Config::get('captcha'));
        return $captcha->entry($id);
    }

    public function getIndexLogin($id = ""){


	    $config = [
	        'seKey'    => 'ThinkPHP.CN',
	        // 验证码加密密钥
	        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
	        // 验证码字符集合
	        'expire'   => 1800,
	        // 验证码过期时间（s）
	        'useZh'    => false,
	        // 中文验证码字符串
	        'useImgBg' => false,
	        // 使用背景图片
	        'fontSize' => 25,
	        // 验证码字体大小(px)
	        'useCurve' => true,
	        // 是否画混淆曲线
	        'useNoise' => false,
	        // 是否添加杂点
	        'imageH'   => 0,
	        // 验证码图片高度
	        'imageW'   => 0,
	        // 验证码图片宽度
	        'length'   => 5,
	        // 验证码位数
	        'fontttf'  => '',
	        // 验证码字体，不设置随机获取
	        'bg'       => [243, 251, 254],
	        // 背景颜色
	        'reset'    => true,
	        // 验证成功后是否重置
	    ];

        $captcha = new Captcha( $config );
        return $captcha->entry($id);

    }

}