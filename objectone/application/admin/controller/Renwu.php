<?php
namespace app\admin\controller;
use app\admin\model\Renwu as Links;
use app\admin\model\Typerenwu as Trenwu;
use app\admin\model\Section as Sec;
use app\admin\model\Addrenwu as Add;
/*use app\admin\model\Typefuwu as Tfuwu;*/
/*
*renwu 任务流程控制器,
*index()增加流程，
**index2()增加流程任务，
*add()保存新增数据,
*oper()查询数据；
*del()删除一条流程数据,
*del()删除一条流程任务数据,
*dels()删除多条数据,
*update()修改方法；
*save()保存修改数据,
 */
class Renwu extends Base
{
    /*
*名 称: index()
* 功 能: 增加流程
* 参 数: $v是状态值0为显示全部1为启用2为禁用3为草稿
* 返 回 值: $re字符串
 */
    public function index($v)
    {
    	
       /* $renwu = new Trenwu;
        $arr = $renwu->sel();
        $sec = new Sec;
        $sec = $sec->sel();*/
         /*$add = new Add;
        $res = $add->sel();*/
         /*$tfuwu = new Tfuwu;
        $re = $tfuwu->sel();*/
        $this->assign("v",$v);
		/*$this->assign("re",$re);*/
        /*$this->assign("res",$res);
        $this->assign("arr",$arr);
        $this->assign("sec",$sec);*/
    	return view('renwu/index');
    }
       /*
*名 称: index2()
* 功 能: 增加任务
* 参 数: $v是状态值0为显示全部1为启用2为禁用3为草稿
* $id为流程id
* 返 回 值: 
 */
    public function index2($id,$v)
    {
        
        $renwu = new Trenwu;
        $arr = $renwu->sel();
        $sec = new Sec;
        $sec = $sec->sel();
         $add = new Add;
        $res = $add->sel($id);
         /*$tfuwu = new Tfuwu;
        $re = $tfuwu->sel();*/
        $this->assign("v",$v);
        $this->assign("id",$id);
        /*$this->assign("re",$re);*/
        $this->assign("res",$res);
        $this->assign("arr",$arr);
        $this->assign("sec",$sec);
        return view('renwu/index2');
    }
     /*
*名 称: add()
* 功 能: 保存新增流程
* 参 数: 接收post传过的值
* 返 回 值: $keyId =当前id
 */
    public function add($v)
    {

       /*服务类型
         $ptaskId =$_POST['ptaskId'];
         $renwu = new Trenwu;
         $ptaskname = $renwu->upd($ptaskId);
        $_POST['ptaskId'] = $ptaskname['name'];*/
        $keyId = \think\Db::name('key_tasks')->insertGetId($_POST);
        
                if($keyId){
                    $this->redirect('renwu/index2',array('id'=>"$keyId",'v'=>"$v"));
                }else{
                    return $this->error('添加失败！','index');
                }
            /*}else{
                return $this->error($validate->getError());
            }
            return;*/
        return $this->fetch();
    }
     /*
*名 称: oper()
* 功 能: 查询所有数据,
* 参 数: $v是状态值0为显示全部1为启用2为禁用3为草稿

 */
    public function oper($v)
    {
        $links= new Links;

        $nub = $_POST['branches'];
        //全部流程
        $selCount = $links->selCount();
        //状态为启用
        $startCount = $links->startCount();
        //状态为禁用
        $forbiddenCount = $links->forbiddenCount();
        //状态为草稿
        $draftCount = $links->draftCount();
        if($nub == null){
            $nub = 1;
        }else{
            if($v ==0){
                    
                if($nub > $selCount){
                  return $this->success('已超过它的总条数，跳转失败！');
                }
            }elseif($v ==1){
                if($nub > $startCount){
                  return $this->success('已超过它的总条数，跳转失败！');
                }
            }elseif($v ==2){
             
                if($nub > $forbiddenCount){
                  return $this->success('已超过它的总条数，跳转失败！');
                }   
            }else{
                if($nub > $draftCount){
                  return $this->success('已超过它的总条数，跳转失败！');
                }   
            }
        }
        //全部流程
         //分页
        $lists = $links::paginate($nub);
        $page = $lists->render();
        //状态为草稿
        $draft = $links::where("isShow=2")->paginate($nub);
        $draftPage = $draft->render();
        //状态为禁用
        $forbidden = $links::where("isShow=0")->paginate($nub);
        $forbiddenPage = $forbidden->render();
        //状态为启用
        $start = $links->start();
        $start = $links::where("isShow=1")->paginate($nub);
        $startPage = $start->render();
        
        $this->assign('v', $v);
        $this->assign('page', $page);
        $this->assign('draftPage', $draftPage);
        $this->assign('forbiddenPage', $forbiddenPage);
        $this->assign('startPage', $startPage);
        $this->assign("draft",$draft);
        $this->assign("draftCount",$draftCount);
        $this->assign("forbidden",$forbidden);
        $this->assign("forbiddenCount",$forbiddenCount);
        $this->assign("start",$start);
        $this->assign("startCount",$startCount);
		$this->assign("lists",$lists);
        $this->assign("selCount",$selCount);
    return view('renwu/oper');	
    }
   
    public function del($id,$v)
    { 
    	$links= new Links;
    	$re = $links->where("id=$id")->delete();
    	if($re>0){
    		  return  $this->redirect('renwu/oper',array('v'=>"$v"));
                }else{
               return $this->redirect('renwu/oper',array('v'=>"$v"));
    	}
    }
    public function del2($id,$keyId)
    { 
        $links= new Add;
        $re = $links->where("id=$id")->delete();
        if($re>0){
             return $this->redirect('renwu/index2', array('id'=>"$keyId"));
                }else{
               return $this->error('删除失败！','oper');
        }
    }
     public function dels()
    { 
        $id = $_GET['id'];
     
        $links= new Links;
        $res = $links->destroy($id);
        $re =$links->catTree();

        $this->assign("re",$re);
        return view('renwu/oper');
    }
     public function update2()
    {
    	$id = $_POST[id];
        $links= new Add;
        $find =$links->upd($id);
       if($find > 0){    
                    return json($find);    
                }else{    
                   exit;    
                }
    }
     public function state()
    {
        $id = $_POST[id];
        $links= new Add;
        $find =$links->upd($id);
        if ($find['isShow'] == 0) {
           $re =$links->where("id={$id}")->setField('isShow', '1');
        }else{
           $re =$links->where("id={$id}")->setField('isShow', '0');
        }
       
       if($re > 0){    
                    return json($re);    
                }else{    
                   exit;    
                }
    }
    public function update($id,$v)
    {
        $links= new Links;
        $re =$links->upd($id);
        $renwu = new Trenwu;
        $arr = $renwu->sel();
        $sec = new Sec;
        $sec = $sec->sel();
         $add = new Add;
        $res = $add->sel($id);
         /*$tfuwu = new Tfuwu;
        $re = $tfuwu->sel();*/
        $this->assign("v",$v);
        $this->assign("id",$id);
        /*$this->assign("re",$re);*/
        $this->assign("res",$res);
        $this->assign("arr",$arr);
        $this->assign("sec",$sec);
        $this->assign("re",$re);
        /*$this->assign("res",$res);*/
        return view('renwu/update');
    }
    public function save($v)
    {
    	$id = $_POST['id'];
        unset($_POST['id']);
    	$links= new Links;
    	$re =$links->where("id={$id}")->update($_POST);
    	if($re){
			  $this->redirect('renwu/oper',array('v'=>"$v"));
		}else{
			$this->error("修改失败");
		}
	}
}