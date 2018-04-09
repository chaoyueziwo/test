<?php
namespace app\index\model;
use think\Model;
class Index extends Model {
	protected $table = "ht_lanmu_type";
	public function type(){
		$re = $this->where("pid=0")->order("sort ASC")->limit("5")->select();
		
		return $re;
	}
}