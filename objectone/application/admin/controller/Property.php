<?php
namespace app\admin\controller;
use app\admin\model\Property as User;
//Property产品选项值控制器
class Property extends Base
{

    public function adds()
    { 
      $id = $_POST['pid'];
      unset($_POST['pid']); 
      $pid = $_POST['id'];
      unset($_POST['id']); 
      $user = new User($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();
     if($db){
                    return  $this->redirect('Product/index2',array('pid'=>"$id",'id'=>"$pid"));
                }else{
                    exit;
                }
        return $this->fetch();
    }
    /*
*名 称: add()
* 功 能: 保存产品选项值
* 参 数: 接收post传过的值
* 返 回 值: $re被受影响的函数
 */
     public function add()
    { 
      
      $sid = $_POST['sid']; 
      $user = new User($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();

     $re = $user->sel($sid);
     if($db){
                    return json($re); 
                }else{
                   exit;
                }
        return $this->fetch();
    }
 /*
*名 称: state()
* 功 能: 保存产品选项值状态
* 参 数: 接收post传过的值
* 返 回 值: $re被受影响的函数
 */
    public function state()
    {
        $id = $_POST[id];
        $links= new User;
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
    /*
*名 称: upd()
* 功 能: 修改产品选项值状态
* 参 数: 接收post传过的值
* 返 回 值: $re要修改的数据
 */
     public function upd(){
        $id = $_POST['keyId'];
        $name = $_POST['name'];
        $sid = $_POST['sid'];
     $re = \think\Db::name('product_value')->where("id=$id")->setField('name',"$name");
     $user = new User;
     $res = $user->sel($sid);
     if($re){
                    return json($res); 
                }else{
                   exit;
                }
    }
 /*
*名 称: del()
* 功 能: 删除产品选项值
* 参 数: 接收post传过的值
* 返 回 值: $re被受影响的函数
 */
     public function del(){
        $id = $_POST['id'];
     $user = new User;
     $re = $user->where("id=$id")->delete();
     if($re){
                    return json($re); 
                }else{
                   exit;
                }
    }
 /*
*名 称: isShow()
* 功 能: 保存产品选项值状态
* 参 数: 接收post传过的值
* 返 回 值: $show被受影响的函数
 */
    public function isShow(){
        $id = $_POST['id'];
     $user = new User;
     $re = $user->where("id=$id")->find();
     $isShow = $re['isShow'];
     if($isShow == 1){
    $show = \think\Db::name('product_value')->where("id=$id")->setField('isShow',0);
     }else{
     $show = \think\Db::name('product_value')->where("id=$id")->setField('isShow',1); 
     }
     if($show){
                    return json($isShow); 
                }else{
                   exit;
                }
    }
     /*
* 名 称: plus()
* 功 能:向上排序,
* 参 数: $id为产品选项值ID
  返 回 值: $show被受影响的行数
 */
     public function plus(){
      $id = $_POST['id'];
     $user = new User;
     $re = $user->where("id=$id")->find();
     $sort = ++$re['sort'];
    $show = \think\Db::name('product_value')->where("id=$id")->setField('sort',"$sort");
    
     if($show){
                    return json($show); 
                }else{
                   exit;
                }
    }
       /*
* 名 称: minus()
* 功 能:向下排序,
* 参 数: $id为产品选项值ID
  返 回 值: $show被受影响的行数
 */
    public function minus(){
       $id = $_POST['id'];
     $user = new User;
     $re = $user->where("id=$id")->find();
     $sort = --$re['sort'];
    $show = \think\Db::name('product_value')->where("id=$id")->setField('sort',"$sort");
    
     if($show){
                    return json($show); 
                }else{
                   exit;
                }
    }
     /*
* 名 称: amend()
* 功 能:查询产品选项值,
* 参 数: $id为产品选项ID
  返 回 值: $re为查询的数据
 */
    public function amend(){
      $sid = $_POST['sid']; 
      $user = new User;
     $re = $user->sel($sid);
     if($re != null){
                    return json($re); 
                }else{
                   return json($re);
                }
    }
}