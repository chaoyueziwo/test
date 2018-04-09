<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Product extends Model {
	protected $table = "ht_product";
 public function sel($pid){
    $re = $this->where("pid=$pid")->select();
    return $re;
  }
  public function selCount($pid){
    $re = $this->where("pid=$pid and audit=1")->count();
    return $re;
  }
   public function selw($pid){
    $re = $this->where("pid=$pid and audit=0")->select();
    return $re;
  }
  public function selc($pid){
    $re = $this->where("pid=$pid and audit=2")->select();
    return $re;
  }
   public function cselw($pid){
    $re = $this->where("pid=$pid and audit=0")->count();
    return $re;
  }
   public function cselc($pid){
    $re = $this->where("pid=$pid and audit=2")->count();
    return $re;
  }
   public function cstate($pid){
    $re = $this->where("pid=$pid and state=0")->count();
    return $re;
  }
  public function upd($id){
          $re = $this->where("id={$id}")->find();
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

  //通过产品id 获取产品属性价格列表
  public function selectAttrPricesById( $id='' )
  {

    $rs = Db::table('ht_property_price')
            ->where( "productId=$id" )
      ->select();
    return $rs;

  }

}