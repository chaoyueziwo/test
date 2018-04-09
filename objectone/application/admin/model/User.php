<?php
namespace app\admin\model;
use think\Model;
class User extends Model {

	protected $table = "ht_admin";
   public function sel($page, $pageLimit){

   		$arrayName = array( '0' => 'ht_admin.id', '1' => 'ht_admin.username', '2' => 'ht_organize.name', '3' => 'ht_admin.position' , '4' => 'ht_admin.mobile', '5' => 'ht_admin.organizeId' , '6' => 'ht_admin.rulerId', '7' => 'ht_admin.description' );

    	$re = $this->join("ht_organize" , 'ht_admin.rulerId=ht_organize.id', 'LEFT' )->limit( $page*$pageLimit , $pageLimit )->field( $arrayName )->where("isDisabled = 0")->select(); 

      return $re;
   }


   public function selActive($page, $pageLimit, $isActive){

      $arrayName = array( '0' => 'ht_admin.id', '1' => 'ht_admin.username', '2' => 'ht_organize.name', '3' => 'ht_admin.position' , '4' => 'ht_admin.mobile', '5' => 'ht_admin.organizeId' , '6' => 'ht_admin.rulerId', '7' => 'ht_admin.description' );

      $re = $this->join("ht_organize" , 'ht_admin.rulerId=ht_organize.id', 'LEFT' )->limit( $page*$pageLimit , $pageLimit )->field( $arrayName )->where("isDisabled = 0 and isActive=".$isActive)->select(); 

      return $re;
   }

   public function sel2(){

    	$re = $this->where("isDisabled = 0")->select();
    	return $re;

   }


   public function updates($ids,$value){

   		$whereCond = "";
   		for($i = 0; $i<count($ids); $i++){

   			$whereCond = $whereCond."id=".$ids[$i] ;

   			if( count($ids) != ($i+1) ){

   				$whereCond  = $whereCond." or ";

   			}

   		}

   		$rs = $this->where($whereCond)->setField("isActive",$value);

   		return $rs;
   }

    /*删除*/
   public function dels($ids,$value){

      $whereCond = "";
      for($i = 0; $i<count($ids); $i++){

        $whereCond = $whereCond."id=".$ids[$i] ;

        if( count($ids) != ($i+1) ){

          $whereCond  = $whereCond." or ";

        }

      }

      $rs = $this->where($whereCond)->setField("isDisabled",1);

      return $rs;
   }

}