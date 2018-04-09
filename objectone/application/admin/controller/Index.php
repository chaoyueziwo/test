<?php
namespace app\admin\controller;
use app\admin\model\Cebiantype as Cebian;
use app\admin\model\Renwu as Links;
class Index extends Base
{
    public function index()
    {
    	$links = new Cebian;
        $arr = $links->showOption();
        $links= new Links;
        //全部流程
        $selCount = $links->selCount();
        //状态为草稿
        $draftCount = $links->draftCount();
        //状态为禁用
        $forbiddenCount = $links->forbiddenCount();
        //状态为启用
        $startCount = $links->startCount();
        $this->assign("draftCount",$draftCount);
        $this->assign("forbiddenCount",$forbiddenCount);
        $this->assign("startCount",$startCount);
        $this->assign("selCount",$selCount);
        $this->assign("arr",$arr);
        return view('index/index');
    }
    public function index_v148b2()
    {
        return view();
    }
}
