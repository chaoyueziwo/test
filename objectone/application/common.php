<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

error_reporting(E_ERROR | E_WARNING | E_PARSE);

//后端列表页 管理员用户字段选择 入口
\think\Hook::add('getSqlColumns','app\\index\\hook\\ColumnIndex');

//前端获取头部信息
\think\Hook::add('getHeadInfo','app\\index\\hook\\ColumnIndex');

//账号校验入口
\think\Hook::add('mobileCheck','app\\index\\hook\\AccountCheck');