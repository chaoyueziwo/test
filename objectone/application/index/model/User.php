<?php
namespace app\index\model;
use think\Model;
class User extends Model {
	protected $table = "ht_userinfo";
	public function type(){
		//$re = $this->where("fid=0")->order("paixu ASC")->limit("5")->select();
		
		return $re;
	}

	public function check($mobile,$password){
   	$data = [
   		'mobile' => "$mobile",
   		'password' => "$password"
   	];

     $re = $this->where($data)->find();
     /*$a = $this->getLastSql(); 
     echo $a;*/
     return $re;
  }
	public function selectOneById($id){

		$re = $this->where("id=$id")->find();
		return $re;

	}

	public function selectOneByMobile($mobile){

		$re = $this->where("mobile=$mobile")->find();
		return $re;

	}

	public function selectOneByMobilePw($mobile,$password){

		$re = $this->where("mobile='$mobile' and password='$password'")->find();
		return $re;

	}

	public function insertOne(){



	}
	
}