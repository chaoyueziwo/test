<?php
namespace app\admin\model;
use think\Model;
class Renwu extends Model {
	protected $table = "ht_key_tasks";
 public function sel(){
    $re = $this->select();
    return $re;
  }
  public function selCount(){
    $re = $this->count();
    return $re;
  }
  public function draft(){
    $re = $this->where("isShow=2")->select();
    return $re;
  }
  public function draftCount(){
    $re = $this->where("isShow=2")->count();
    return $re;
  }
  public function forbidden(){
    $re = $this->where("isShow=0")->select();
    return $re;
  }
  public function forbiddenCount(){
    $re = $this->where("isShow=0")->count();
    return $re;
  }
  public function start(){
    $re = $this->where("isShow=1")->select();
    return $re;
  }
  public function startCount(){
    $re = $this->where("isShow=1")->count();
    return $re;
  }
  public function upd($id){
          $re = $this->where("id={$id}")->find();
    return $re;
        }
  function showOption($currentTypeId=""){
    //获得第一级分类
    $typeOneArr = $this->where("isShow=1")->select();
    $optionStr ="";//下拉框的option
   
      foreach ($typeOneArr as $vv){
        if($vv['id']==$currentTypeId){
        $optionStr.="<option selected='selected' value='{$vv['id']}'>{$vv['name']}</option>";
        }else{
          $optionStr.="<option value='{$vv['id']}'>{$vv['name']}</option>";
        }
      }
      return $optionStr;
  }
}