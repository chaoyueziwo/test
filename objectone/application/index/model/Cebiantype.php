<?php
namespace app\index\model;
use think\Model;
class Cebiantype extends Model {
	protected $table = "ht_lanmu_cebiantype";
	public function type(){
		$re = $this->where("pid=0 and isShow=1")->order("sort DESC")->limit("6")->select();
		return $re;
	}



	//获取父栏目
	public function getParentTypes(){

		$re = $this->where("pid=0 and isShow=1")->order("sort DESC")->select();		
		return $re;

	}

	//获取子栏目
	public function getChildTypes(){

		$re = $this->where("pid!=0 and isShow=1")->order("sort DESC")->select();	
		return $re;

	}


	//通过一级父栏目id获取 父栏目下相应产品信息
	public function getCproductsByPid($pid){

		$arrayName = array( '0'=>'ht_lanmu_cebiantype.id as typeId' , '1' => 'ht_lanmu_cebiantype.name as typeName' ,'2'=>'ht_lanmu_cebiantype.pid' ,'3' => 'ht_product.id as productId', '4'=>' ht_product.name as productName ', '5'=>' ht_product.top', '6'=>' ht_product.recommend ', '7'=>' ht_product.overhead ');
    	$re = $this->join("ht_product" , 'ht_product.pid=ht_lanmu_cebiantype.id', 'LEFT' )->field($arrayName)->where("ht_lanmu_cebiantype.isShow = 1 and ht_product.audit=1 and ht_product.state=1 and ht_lanmu_cebiantype.pid=$pid")->order("ht_lanmu_cebiantype.sort DESC, ht_product.overhead desc ")/*->buildsql();//*/->select(); 

      	return $re;

	}


	//通过二级父栏目id获取 父栏目下相应产品信息
	public function getProductsByPid($pid){

		$arrayName = array( '0'=>'ht_lanmu_cebiantype.id as typeId' , '1' => 'ht_lanmu_cebiantype.name as typeName' ,'2'=>'ht_lanmu_cebiantype.pid' ,'3' => 'ht_product.id as productId', '4'=>' ht_product.name as productName ', '5'=>' ht_product.top', '6'=>' ht_product.recommend ', '7'=>' ht_product.overhead ');
    	$re = $this->join("ht_product" , 'ht_product.pid=ht_lanmu_cebiantype.id', 'LEFT' )->field($arrayName)->where("ht_lanmu_cebiantype.isShow = 1 and ht_product.audit=1 and ht_product.state=1 and ht_lanmu_cebiantype.id=$pid")->order("ht_lanmu_cebiantype.sort DESC, ht_product.overhead desc ")/*->buildsql();//*/->select(); 
    	/*echo $re;die;*/
      	return $re;

	}

	//通过父栏目id获取 父栏目下相应产品信息	
	public function getCtypesByPid($pid){

    	$re = $this->/*join("ht_product" , 'ht_product.pid=ht_lanmu_cebiantype.id', 'LEFT' )->field($arrayName)->*/where("ht_lanmu_cebiantype.isShow = 1 and ht_lanmu_cebiantype.pid=$pid")->order("ht_lanmu_cebiantype.sort DESC")/*->buildsql();//*/->select(); 

      	return $re;

	}

	//通过父栏目id获取 父栏目下相应产品信息	
	public function getCtypesByPid2($pid){

		$arrayName = array( '0'=>'ht_lanmu_cebiantype.id as typeId' , '1' => 'ht_lanmu_cebiantype.name as typeName' ,'2'=>'ht_lanmu_cebiantype.pid' ,'3' => 'ht_product.id as productId', '4'=>' ht_product.name as productName ', '5'=>' ht_product.top', '6'=>' ht_product.recommend ', '7'=>' ht_product.overhead ', '8'=> 'ht_lanmu_cebiantype.title as title', '9'=>' ht_lanmu_cebiantype.key ', '10'=>' ht_lanmu_cebiantype.isShow ', '11'=>' ht_lanmu_cebiantype.url ', '12'=>' ht_lanmu_cebiantype.content ', '13'=>' ht_lanmu_cebiantype.sort ');
    	$re = $this->join("ht_product" , 'ht_product.pid=ht_lanmu_cebiantype.id', 'LEFT' )->field($arrayName)->where("ht_lanmu_cebiantype.isShow = 1  and ht_product.audit=1 and ht_product.state=1 and  ht_lanmu_cebiantype.pid=$pid")->order("ht_lanmu_cebiantype.sort DESC")/*->buildsql();//*/->select(); 

      	return $re;

	}


    //通过以级父id获取置顶商品id
	public function getOverheadsByPid($pid){

		//$arrayName = array( '0' => 'ht_admin.id', '1' => 'ht_admin.username', '2' => 'ht_organize.name', '3' => 'ht_admin.position' , '4' => 'ht_admin.mobile', '5' => 'ht_admin.organizeId' , '6' => 'ht_admin.rulerId', '7' => 'ht_admin.description' );
		$arrayName = array( '0'=>'ht_lanmu_cebiantype.id as typeId' , '1' => 'ht_lanmu_cebiantype.name as typeName' ,'2'=>'ht_lanmu_cebiantype.pid' ,'3' => 'ht_product.id as productId', '4'=>' ht_product.name as productName ', '5'=>' ht_product.top', '6'=>' ht_product.recommend ', '7'=>' ht_product.overhead ');
    	$re = $this->join("ht_product" , 'ht_product.pid=ht_lanmu_cebiantype.id', 'LEFT' )->field($arrayName)->where("ht_lanmu_cebiantype.isShow = 1 and  ht_product.audit=1 and ht_product.state=1 and ht_lanmu_cebiantype.pid=$pid")->order(" ht_product.overhead desc ")->limit(0,3)/*->buildsql();//*/->select(); 
    	// echo $re;die;
      	return $re;

	}

	// public function type(){
	// 	 $typeOneArr = $this->where("pid=0")->select();
 //    $optionStr ="";//下拉框的option
 //    foreach ($typeOneArr as $key=>$v){
 //      $optionStr.='<div class="server-hover-{$key}">';
 //      $optionStr .= "<ul>";
 //      if ($key == 1) {
 //      $optionStr .= "<li class='companyico'></li>";
 //      }elseif ($key == 2) {
 //       $optionStr .= '<li class="accountantico"></li>';
 //      }elseif ($key == 3) {
 //       $optionStr .= '<li class="equityico"></li>';
 //      }elseif ($key == 4) {
 //       $optionStr .= '<li class="socialico"></li>';
 //      }elseif ($key == 5) {
 //       $optionStr .= '<li class="aptitudeico"></li>';
 //      }elseif ($key == 6) {
 //       $optionStr .= '<li class="specialico"></li>';
 //      }
 //      $optionStr .= "<li class='fg mar0'>{$v['name']}</li>";
 //       $optionStr .= '<li class="leftarrows"></li>';
 //      $optionStr .= "</ul>";

      
 //      $typeTwoArr = $this->where("pid={$v['id']}")->select();
 //      foreach ($typeTwoArr as $vv){
 //      	$optionStr .= "<ul>";
 //      	$optionStr .= " <li><a href='#'>{$vv['name']}</a></li>";

 //      	$optionStr .= "</ul>";
 //      }
      
      
 //      $optionStr .= "</div>";
 //    }

 //    return $optionStr;
	// }
}