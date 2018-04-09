<?php
namespace app\admin\controller;
use app\admin\model\Cebiantype as Links;
/*
*Cebiantype 侧边栏目控制器,
*index()以无限极增加栏目
*add()保存新增数据,
*oper()查询数据；
*del()删除一条数据,
*dels()删除多条数据,
*update()修改方法；
*save()保存修改数据哦,
 */
class Cebiantype extends Base
{
    /*
*名 称: index()
* 功 能: 增加侧边栏目
* 参 数: catTree()下拉树状展示组织
* 返 回 值: $re字符串
 */
    public function index()
    {

    }
 /*
*名 称: add()
* 功 能: 保存新增栏目
* 参 数: 接收post传过的值
* 返 回 值: $db=被受影响的行数
 */
    public function add()
    {
        if(request()->isPost()){
            $links= new Links;
            $links->data([
            	'name'=>input('name'),
                'title'=>input('title'),
                'pid'=>input('pid'),
                'key'=>input('key'),
                'content'=>input('content'),
                'sort'=>input('sort'),
                'isShow'=>input('isShow'),
                'url'=>input('url'),
            ]);
            /*$validate = \think\Loader::validate('Link');
            if($validate->check($links)){//注意，在模型数据操作的情况下，验证字段的方式，直接传入对象即可验证*/
                $db= $links->save();//这里的save()执行的是添加
                if($db){
                    return $this->success('添加成功！','oper');
                }else{
                    return $this->error('添加失败！','add');
                }
            /*}else{
                return $this->error($validate->getError());
            }
            return;*/
    }else{

            $links= new Links;
            $re =$links->catTree();

            $this->assign("re",$re);
            return view('cebiantype/add');


        }
        return $this->fetch();
    }
    /*
    *名 称: oper()
    * 功 能: 查询所有数据,
    * 参 数: selOption()折叠展示数据表格
    * 返 回 值: $re为字符串

     */
    public function oper()
    {
    	$links= new Links;
    	$re =$links->selOption();
		$this->assign("re",$re);
    return view('cebiantype/oper');	
    }
    /*
    *名 称: sort()
    * 功 能: 更新排序,
    * 参 数: $_POST['sort']是个关联的数组
    * 返 回 值: 

     */
    public function sort(){
        $links= new Links;
        foreach ($_POST['sort'] as $k=>$v){
            //var_dump($v);exit;
            $re= $links->where("id={$k}")->data(array('sort'=>$v))->update();
        }
        if( !is_bool($re) ){
            $this->success("排序成功",'oper');
        }else{
            
            $this->success('排序失败','oper');
        }
    }
      /*
    *名 称: del()
    * 功 能: 删除一条数据,
    * 参 数: $id数据的ID
    * 返 回 值: $re=被受影响的行数

     */
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
    /* public function dels()
    { 
        $id = $_GET['id'];
     
        $links= new Links;
        $res = $links->destroy($id);
        $re =$links->catTree();

        $this->assign("re",$re);
        return view('type/oper');
    }*/
    /*
    *名 称: update()
    * 功 能: 修改数据,
    * 参 数: $id数据的ID
    * 返 回 值: $re是当前修改的数据，$res是下拉树状展示组织
     */
     public function update($id)
    {
        $links= new Links;
        //$res =$links->catTree();
        $re =$links->upd($id);
        $res =$links->getType(0,1,$re['pid']);
        $this->assign("res",$res);
        $this->assign("re",$re);
        return view('cebiantype/update');
    }
     /*
    *名 称: save()
    * 功 能: 保存修改的数据,
    * 参 数: $id数据的ID
    * 返 回 值: $re=被受影响的行数

     */ 
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