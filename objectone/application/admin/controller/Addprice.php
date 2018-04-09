<?php
namespace app\admin\controller;
use app\admin\model\Addprice as User;
class Addprice extends Base
{
    public function add()
    {
        var_dump($_POST);exit;
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        unset($_POST['id']);
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
    
}