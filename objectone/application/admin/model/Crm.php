<?php
namespace app\admin\model;
use think\Model;
class Crm extends Model {

	protected $table = "ht_userinfo";
  
   public function sel(){

    	$re = $this->select();
    	return $re;

   }


}