<?php
namespace app\admin\model;
use think\Model;
class Cebiantype extends Model {
	protected $table = "ht_lanmu_cebiantype";
  function showOption($currentTypeId=""){
    //获得第一级分类
    $typeOneArr = $this->where("pid=0")->select();
    $optionStr ="";//下拉框的option
    foreach ($typeOneArr as $v){
      $optionStr.="<div>";
      $optionStr.="<ul class='martop10px'>";
      $optionStr.="<li><span>-</span>&nbsp;&nbsp;&nbsp;{$v['name']}</li>";
      //获取当前一级分类下的子分类
      $typeTwoArr = $this->where("pid={$v['id']}")->select();
      foreach ($typeTwoArr as $vv){
        /*if($vv['id']==$currentTypeId){
        $optionStr.="<option selected='selected' value='{$v['id']}|{$vv['id']}'>{$vv['name']}</option>";
        }else{
          $optionStr.="<option value='{$v['id']}|{$vv['id']}'>{$vv['name']}</option>";
        }*/
        $optionStr.="<li class='marleft26px mar10px'><a href='__WEB__/admin/Product/oper/id/{$vv['id']}' target='main' class='nav-item-title'>{$vv['name']}</a></li>";
      }
      $optionStr.="</ul>";
      $optionStr.="</div>";
      $optionStr.="</hr>";
    }
    return $optionStr;
  }
  //定义一个方法，获取树状的分类信息
        public function catTree(){
            $cats = $this->select();
            return $this->tree($cats);
        }

        //定义一个方法，对给定的数组，递归形成树
        public function tree($arr,$pid=0,$level=0){
            static $tree = array();
            foreach($arr as $v){
                if($v['pid']==$pid){
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
   * @param number $pid
   * @param num 获取的是第几级分类
   */
  function getType($pid=0,$num=1,$selectId=0){
    //指定条件 pid=$pid
    $this->where("pid=$pid");
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
public function selOption(){

    //var_dump($id);var_dump($pid);exit;
    //获得第一级分类
    $typeOneArr = $this->where("pid=0")->select();

    $optionStr ="";//下拉框的option
   
      foreach ($typeOneArr as $vv){
        
        
       $optionStr.="<tbody>
               <tr class='sectionlist'>
                   <td><input type=\"checkbox\"></td>
                   <td>{$vv['id']}</td>
                   <td><input type=\"text\" name=\"sort[{$vv['id']}]\" value=\"{$vv['sort']}\"></td>
                   <td class=\"minu\">
                       <span>-</span>
                   </td>
                   <td class=\"section\">{$vv['name']}</td>
                   <td>{$vv['title']}</td>
                   <td>
                       <a href=\"__URL__/update/id/{$vv['id']}\" class=\"lanse\">修改</a>
                       <span class=\"dele\">删除</span>
                       <!--删除确认弹出框-->
                       <div class=\"dele-box\">
                           <div>
                               <span>提示信息</span>
                               <span class=\"close\">&times;</span>
                           </div>
                           <div>
                               <span class=\"redico\"></span>
                               删除后将无法恢复，确认删除此栏目？
                           </div>
                           <!--确认删除-->
                           <div class=\"confirmdele\">
                               <a class=\"dele\" href=\"__URL__/del/id/{$vv['id']}\">删除</a>
                               <span>取消</span>
                           </div>
                       </div>
                   </td>
               </tr>";
      $to = $this->where("pid={$vv['id']}")->select();
      foreach ($to as  $vs) {
     
                 $optionStr.="<tr class=\"sectionlist-list\">
                   <td><input type=\"checkbox\"></td>
                   <td>{$vs['id']}</td>
                   <td><input type=\"text\" name=\"sort[{$vs['id']}]\" value=\"{$vs['sort']}\"></td>
                   <td class=\"minu\">
                       |-<span>-</span>
                   </td>
                   <td class=\"section\">{$vs['name']}</td>
                   <td>{$vs['title']}</td>
                   <td>
                        <a href=\"__URL__/update/id/{$vs['id']}\" class=\"lanse\">修改</a>
                       <span class=\"dele\">删除</span>
                       <!--删除确认弹出框-->
                       <div class=\"dele-box\">
                           <div>
                               <span>提示信息</span>
                               <span class=\"close\">&times;</span>
                           </div>
                           <div>
                               <span class=\"redico\"></span>
                               删除后将无法恢复，确认删除此栏目？
                           </div>
                           <!--确认删除-->
                           <div class=\"confirmdele\">
                               <a class=\"dele\" href=\"__URL__/del/id/{$vs['id']}\">删除</a>
                               <span>取消</span>
                           </div>
                       </div>
                   </td>
               </tr>";
                 $tos = $this->where("pid={$vs['id']}")->select();
      foreach ($tos as  $vvs) {
         
                 $optionStr.="<tr class=\"sectionlist-list-list\">
                   <td><input type=\"checkbox\"></td>
                   <td>{$vvs['id']}</td>
                   <td><input type=\"text\" name=\"sort[{$vvs['id']}]\" value=\"{$vvs['sort']}\"></td>
                   <td class=\"minu\">
                       |-<span>-</span>
                   </td>
                   <td class=\"section\">{$vvs['name']}</td>
                   <td>{$vvs['title']}</td>
                   <td>
                        <a href=\"__URL__/update/id/{$vvs['id']}\" class=\"lanse\">修改</a>
                       <span class=\"dele\">删除</span>
                       <!--删除确认弹出框-->
                       <div class=\"dele-box\">
                           <div>
                               <span>提示信息</span>
                               <span class=\"close\">&times;</span>
                           </div>
                           <div>
                               <span class=\"redico\"></span>
                               删除后将无法恢复，确认删除此栏目？
                           </div>
                           <!--确认删除-->
                           <div class=\"confirmdele\">
                               <a class=\"dele\" href=\"__URL__/del/id/{$vvs['id']}\">删除</a>
                               <span>取消</span>
                           </div>
                       </div>
                   </td>
               </tr>";
            $toss = $this->where("pid={$vvs['id']}")->select();
      foreach ($toss as  $vvss) {
                  $optionStr.="<tr class=\"sectionlist-list-list\">
                   <td><input type=\"checkbox\"></td>
                   <td>{$vvss['id']}</td>
                   <td><input type=\"text\" name=\"sort[{$vvss['id']}]\" value=\"{$vvss['sort']}\"></td>
                   <td class=\"minu\">
                       |-<span>-</span>
                   </td>
                   <td class=\"section\">{$vvss['name']}</td>
                   <td>{$vvss['title']}</td>
                   <td>
                        <a href=\"__URL__/update/id/{$vvss['id']}\" class=\"lanse\">修改</a>
                       <span class=\"dele\" >删除</span>
                       <!--删除确认弹出框-->
                       <div class=\"dele-box\">
                           <div>
                               <span>提示信息</span>
                               <span class=\"close\">&times;</span>
                           </div>
                           <div>
                               <span class=\"redico\"></span>
                               删除后将无法恢复，确认删除此栏目？
                           </div>
                           <!--确认删除-->
                           <div class=\"confirmdele\">
                               <a class=\"dele\" href=\"__URL__/del/id/{$vvss['id']}\">删除</a>
                               <span>取消</span>
                           </div>
                       </div>
                   </td>
               </tr>";
                 }
               
      }
                 
      }
       $optionStr.="</tbody>";
      }
      return $optionStr;
  }              
}