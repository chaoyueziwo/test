<?php
namespace app\admin\controller;
use app\admin\model\Crm as Links;

class Crm extends Base
{
    /*
*名 称: index()
* 功 能: 增加流程
* 参 数: $v是状态值0为显示全部1为启用2为禁用3为草稿
* 返 回 值: $re字符串
 */
    public function index()
    {
    	$links = new Links;
        $arr = $links->sel();
        $this->assign('arr',$arr);
    	return view();
    }
  
}