<?php
namespace app\admin\model;
use think\Model;
class Login extends Model {
	protected $table = "ht_admin";
   public function test($username,$password){
   	$data = [
   		'username' => "$username",
   		'password' => "$password"
   	];

     $re = $this->where($data)->find();
     /*$a = $this->getLastSql(); 
     echo $a;*/
     return $re;
  }
}