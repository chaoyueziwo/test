<?php
namespace app\admin\controller;
use app\admin\model\Typerenwu as Links;
/*
*Typerenwu 任务类别控制器,
*index()以无限极增加栏目
*add()保存新增数据,
*oper()查询数据；
*del()删除一条数据,
*dels()删除多条数据,
*update()修改方法；
*save()保存修改数据哦,
 */
class Typerenwu extends Base
{
    public function index()
    {
    	
    	return view('Typerenwu/index');
    }
    public function add()
    {
        if(request()->isPost()){
            $links= new Links;
            $links->data([
            	'name'=>input('name'),
                'title'=>input('title'),
                'key'=>input('key'),
                'content'=>input('content'),
                'sort'=>input('sort'),
            ]);
            /*$validate = \think\Loader::validate('Link');
            if($validate->check($links)){//注意，在模型数据操作的情况下，验证字段的方式，直接传入对象即可验证*/
                $db= $links->save();//这里的save()执行的是添加
                if($db){
                    return $this->success('添加成功！','oper');
                }else{
                    return $this->error('添加失败！','index');
                }
            /*}else{
                return $this->error($validate->getError());
            }
            return;*/
        }
        return $this->fetch();
    }
    public function oper()
    {
    	$links= new Links;
    	$re =$links->sel();
         $page = input('get.page');
    if (isset($page) && null !== $page) {
        $当前页 = $page;
    }
    else {
        $当前页 = 1;
    }
    $options=[
        'page'=>$当前页,
        'path'=>url('oper')
    ];
    $arr= \think\Db::name('task_type')->paginate(10,false,$options);//默认每页是15条数据
        $this->assign("a",$arr);
		$this->assign("re",$re);
    return view('Typerenwu/oper');	
    }
    public function paixu(){
        $links= new Links;
       // var_dump($_POST['paixu']);exit;
        foreach ($_POST['paixu'] as $k=>$v){
    $re = $links->where("paixu={$k}")->data(array('paixu'=>$v))->update();
    
    //update(array('ordernum'=>$v),"id=$k"); 
        }
        //var_dump($re);exit;
        if($re){
            $this->success("排序成功",'oper');
        }else{
            
            $this->success('排序成功','oper');
        }
    }
    public function del($id)
    { 
    	$links= new Links;
    	$re = $links->where("id=$id")->delete();
    	if($re>0){
    		  return $this->success('删除成功！','oper');
                }else{
               return $this->error('删除失败！','oper');
    	}
    }
     public function dels()
    { 
        $id = $_GET['id'];
     
        $links= new Links;
        $res = $links->destroy($id);
        $re =$links->sel();

        $this->assign("re",$re);
        return view('typerenwu/oper');
    }
     public function update($id)
    {
    	$links= new Links;
    	//$res =$links->catTree();
    	$re =$links->upd($id);
    	$this->assign("re",$re);
    	return view('typerenwu/update');
    }
    public function save()
    {
    	$id = $_POST['id'];

    	$links= new Links;
    	$re =$links->where("id={$id}")->update($_POST);
    	if($re){
			$this->success("修改成功",'oper');
		}else{
			$this->error("修改失败",'update');
		}
	}
}