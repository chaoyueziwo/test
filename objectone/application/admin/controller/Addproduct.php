<?php
namespace app\admin\controller;
use app\admin\model\Addproduct as User;
//Addproduct产品选项控制器
class Addproduct extends Base
{
    public function adds()
    {
        //var_dump($_POST);exit;
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        unset($_POST['id']);
        $_POST['addTime'] = time();
        //$_POST['addtime'] = time();
      $user = new User($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();
     if($db){
                    return  $this->redirect('Product/index2',array('id'=>"$pid",'pid'=>"$id"));
                }else{
                   return $this->redirect('Product/index2', "保存失败");
                }
        // if(request()->isPost()){
        //     $links= new Links;
        //     $links->data([
        //     	'name'=>input('name'),
        //         'yi'=>input('yi'),
        //         'showyi'=>input('showyi'),
        //         'er'=>input('er'),
        //         'shower'=>input('shower'),
        //         'san'=>input('san'),
        //         'showsan'=>input('showsan'),
        //         'si'=>input('si'),
        //         'showsi'=>input('showsi'),
        //         'wu'=>input('wu'),
        //         'showwu'=>input('showwu'),
        //         'liu'=>input('liu'),
        //         'showliu'=>input('showliu'),
        //         'qi'=>input('qi'),
        //         'showqi'=>input('showqi'),
        //         //'pid'=>$pid,
        //         'addtime'=>time(),
        //     ]);
        //        }
            /*$validate = \think\Loader::validate('Link');
            if($validate->check($links)){//注意，在模型数据操作的情况下，验证字段的方式，直接传入对象即可验证*/
               
            /*}else{
                return $this->error($validate->getError());
            }
            return;*/
     
        return $this->fetch();
    }
 /*
*名 称: add()
* 功 能: 保存产品选项
* 参 数: 接收post传过的值
* 返 回 值: $keyId插入数据的ID
 */
    public function add()
    {
        //var_dump($_POST);exit;
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        unset($_POST['id']);
        $_POST['addTime'] = time();
        //$_POST['addtime'] = time();
    
      // 过滤post数组中的非数据表字段数据
     $keyId = \think\Db::name('product_property')->insertGetId($_POST);

     if($keyId){
                    return json("$keyId"); 
                }else{
                   exit;
                }
      
    }
    /*
*名 称: state()
* 功 能: 保存产品选项状态
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

     $re = \think\Db::name('product_property')->where("id=$id")->setField('name',"$name");
    if($re > 0){    
                    return json($re);    
                }else{    
                   exit;    
                }
    }
    /*
*名 称: del()
* 功 能: 删除产品选项
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
* 名 称: plus()
* 功 能:向上排序,
* 参 数: $id为产品选项ID
  返 回 值: $show被受影响的行数
 */
    public function plus(){
      $id = $_POST['id'];
     $user = new User;
     $re = $user->where("id=$id")->find();
     $sort = ++$re['sort'];
    $show = \think\Db::name('product_property')->where("id=$id")->setField('sort',"$sort");
    
     if($show){
                    return json($show); 
                }else{
                   exit;
                }
    }
       /*
* 名 称: minus()
* 功 能:向下排序,
* 参 数: $id为产品选项ID
  返 回 值: $show被受影响的行数
 */
    public function minus(){
       $id = $_POST['id'];
     $user = new User;
     $re = $user->where("id=$id")->find();
     $sort = --$re['sort'];
    $show = \think\Db::name('product_property')->where("id=$id")->setField('sort',"$sort");
    
     if($show){
                    return json($show); 
                }else{
                   exit;
                }
    }
}