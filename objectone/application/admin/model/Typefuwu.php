<?php
namespace app\admin\model;
use think\Model;
class Typefuwu extends Model {
	protected $table = "ht_fuwu_type";
	public function sel(){
		$re = $this->select();
		return $re;
	}
	public function upd($id){
          $re = $this->where("id={$id}")->find();
    return $re;
        }
 	public function showOption($id=""){

   	//var_dump($id);var_dump($pid);exit;
    //获得第一级分类
    $typeOneArr = $this->where("sort=1")->select();

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