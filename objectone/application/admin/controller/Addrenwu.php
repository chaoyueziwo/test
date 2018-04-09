<?php
namespace app\admin\controller;
use app\admin\model\Addrenwu as Links;
class Addrenwu extends Base
{
    public function add($v)
    {
        $id = $_POST['keyId'];
        $_POST['addTime'] = time();
        $user = new Links($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();
                if($db){
                    return $this->redirect('Renwu/index2', array('id'=>"$id",'v'=>"$v"));
                }else{
                   return $this->redirect('Renwu/index2', "保存失败");
                }
        return $this->fetch();
    }
    public function save($v)
    {
        $id = $_POST['id'];
        unset($_POST['id']);
        $keyid = $_POST['keyId'];
        $_POST['addTime'] = time();
        $links= new Links;
        $re =$links->where("id={$id}")->update($_POST);
        if($re){
            $this->redirect('Renwu/index2',array('id'=>"$keyid",'v'=>"$v"));
        }else{
            $this->error("修改失败",'update');
        }
    }
     public function updateAdd($v)
    {
        $id = $_POST['keyId'];
        $_POST['addTime'] = time();
        $user = new Links($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();
                if($db){
                    return $this->redirect('Renwu/update', array('id'=>"$id",'v'=>"$v"));
                }else{
                   return $this->redirect( "保存失败");
                }
        return $this->fetch();
    }
    public function updateSave($v)
    {
        $id = $_POST['id'];
        unset($_POST['id']);
        $keyid = $_POST['keyId'];
        $_POST['addTime'] = time();
        $links= new Links;
        $re =$links->where("id={$id}")->update($_POST);
        if($re){
            $this->redirect('Renwu/update',array('id'=>"$keyid",'v'=>"$v"));
        }else{
            $this->error("修改失败",'update');
        }
    }
}