<?php
namespace app\admin\model;
use think\Model;
/*
*Section 管理部门模型,
 */
class Section extends Model {
	protected $table = "ht_organize";
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
    $typeOneArr = $this->select();

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
//定义一个方法，获取树状的分类信息
   public function catTree(){
            $cats = $this->select();
            return $this->tree($cats);
        }
   public function selOption(){

    //var_dump($id);var_dump($pid);exit;
    //获得第一级分类
    $typeOneArr = $this->where("pid=0")->select();

    $optionStr ="";//下拉框的option
   
      foreach ($typeOneArr as $vv){
        
        
       $optionStr.="<tbody>
                        <tr>
                            <td>
                                <span>-</span>
                            </td>
                            <td class='section'>{$vv['name']}</td>
                            <td>/</td>
                            <td>
                           <span onclick='update({$vv['id']})'>修改</span>
                            <span class='dele'><a id=\"del\" href=\"javascript:if(confirm('确实要删除该内容吗?'))location='__URL__/del/id/{$vv['id']}'\">删除</a></span>
                            </td>
                        </tr>
                  </tbody>";
      $to = $this->where("pid={$vv['id']}")->select();
      foreach ($to as  $vs) {
         $optionStr.="<tbody>";
                 $optionStr.="<tr class='sectionlist'>
                      <td>
                          |-<span>-</span>
                      </td>
                      <td class='section'>|-{$vs['name']}</td>
                      <td>/</td>
                      <td>
                         <span onclick='update({$vs['id']})'>修改</span>
                            <a id=\"del\" href=\"javascript:if(confirm('确实要删除该内容吗?'))location='__URL__/del/id/{$vs['id']}'\">删除</a>
                      </td>
                  </tr>";
                 $tos = $this->where("pid={$vs['id']}")->select();
      foreach ($tos as  $vvs) {
         
                 $optionStr.="<tr class='sectionlist-list'>
                      <td>
                          |-<span>-</span>
                      </td>
                      <td class='section'>|-{$vvs['name']}</td>
                      <td>/</td>
                      <td>
                         <span onclick='update({$vvs['id']})'>修改</span>
                            <a id=\"del\" href=\"javascript:if(confirm('确实要删除该内容吗?'))location='__URL__/del/id/{$vvs['id']}'\"><span>删除</span></a>
                      </td>
                  </tr>";
            $toss = $this->where("pid={$vvs['id']}")->select();
      foreach ($toss as  $vvss) {
                  $optionStr.="<tr class='sectionlist-list-list'>
                      <td>
                          |-<span>-</span>
                      </td>
                      <td class='section'>|-{$vvss['name']}</td>
                      <td>/</td>
                      <td>
                        <span onclick='update({$vvss['id']})'>修改</span>
                            <a id=\"del\" href=\"javascript:if(confirm('确实要删除该内容吗?'))location='__URL__/del/id/{$vvss['id']}'\"><span>删除</span></a>
                      </td>
                  </tr>";
                 }
               
      }
                  $optionStr.="</tbody>";
      }
      }
      return $optionStr;
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
        /**
   * 根据父分类id，获取子分类
   * @param number $fid
   * @param num 获取的是第几级分类
   */
  function getType($fid=0,$num=1,$selectId=0){
    //指定条件 fid=$fid
    $this->where("pid=$fid");
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