<?php
namespace app\admin\model;
use think\Model;
class Zdy extends Model {
	protected $table = "ht_zdy_type";
 /* function showOption($currentTypeId=""){
    //获得第一级分类
    $typeOneArr = $this->where("fid=0 and isshow=1")->select();
    $optionStr ="";//下拉框的option
    foreach ($typeOneArr as $v){
      $optionStr.="<optgroup label='{$v['name']}'>";
      //获取当前一级分类下的子分类
      $typeTwoArr = $this->where("fid={$v['id']}")->select();
      foreach ($typeTwoArr as $vv){
        if($vv['id']==$currentTypeId){
        $optionStr.="<option selected='selected' value='{$v['id']}|{$vv['id']}'>{$vv['name']}</option>";
        }else{
          $optionStr.="<option value='{$v['id']}|{$vv['id']}'>{$vv['name']}</option>";
        }
      }
      $optionStr .= "</optgroup>";
    }
    return $optionStr;
  }*/
  //定义一个方法，获取树状的分类信息
        public function catTree(){
            $cats = $this->select();
            return $this->tree($cats);
        }

        //定义一个方法，对给定的数组，递归形成树
        public function tree($arr,$pid=0,$level=0){
            static $tree = array();
            foreach($arr as $v){
                if($v['fid']==$pid){
                    //说明找到，保存
                    $v['level'] = $level;
                    $tree[] = $v;
                    //继续找
                    $this -> tree($arr,$v['id'],$level+1);
                }
            }
            return $tree;
        }
        public function upd($id){
          $re = $this->where("id={$id}")->find();
    return $re;
        }
        /**
   * 根据父分类id，获取子分类
   * @param number $fid
   * @param num 获取的是第几级分类
   */
  function getType($fid=0,$num=1,$selectId=0){
    //指定条件 fid=$fid
    $this->where("fid=$fid");
    //查询
    $arr=$this->select();
    //拼字符串
    $optionStr="";
    $num++;
    //决定--的个数
    $strGang=str_repeat('——', $num-1);
    foreach($arr as $v){
      if($v['id']==$selectId){
        $optionStr.="<option selected='selected' value='{$v['id']}'>{$strGang}{$v['name']}</option>";
      }else{
        $optionStr.="<option value='{$v['id']}'>{$strGang}{$v['name']}</option>";
      }
      //找第一级的子分类
      $optionSon=$this->getType($v['id'],$num,$selectId);
      $optionStr.=$optionSon;
    }
    //返回数据 <option value='id'>名称</option>
    return $optionStr;
  }
        
}