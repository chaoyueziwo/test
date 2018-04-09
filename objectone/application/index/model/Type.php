<?php
namespace app\index\model;
use think\Model;
class Type extends Model {
	protected $table = "ht_lanmu_type";
	public function type(){

		$re = $this->where("pid=0 and isShow=1")->order("sort ASC")->limit("5")->select();		
		return $re;

	}

	//获取父栏目
	public function getParentTypes(){

		$re = $this->where("pid=0 and isShow=1")->order("sort ASC")->limit("5")->select();		
		return $re;

	}

	//获取子栏目
	public function getChildTypes(){

		$re = $this->where("pid!=0 and isShow=1")->order("sort ASC")->limit("5")->select();	
		return $re;

	}

}