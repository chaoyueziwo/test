<?php
namespace app\admin\model;
use think\Model;
class ProductSreve extends Model {
	protected $table = "ht_product_serve";
 public function sel($pid){
    $re = $this->where("pid=$pid")->select();
    return $re;
  }
 
  public function upd($pid){
          $re = $this->where("pid={$pid}")->find();
    return $re;
        }
   public function showOption($pid,$id=""){

   	//var_dump($id);var_dump($pid);exit;
    //获得第一级分类
    $typeOneArr = $this->where("pid=$pid")->select();

    $optionStr ="";//下拉框的option
   
      foreach ($typeOneArr as $vv){
        if($vv['id']==$id){
        $optionStr.="<option selected='selected' value='{$vv['id']}'>{$vv['name']}</option>";
        }else{
          $optionStr.="<option value='{$vv['id']}'>{$vv['name']}</option>";
        }
      }
      return $optionStr;
  }   
}