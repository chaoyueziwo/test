<?php
namespace app\admin\model;
use think\Model;
class Addrenwu extends Model {
	protected $table = "ht_tasks";
    public function sel($id){
		$re = $this->where("keyId=$id")->limit(6)->order('id', 'desc')->select();
		return $re;
	}
	public function upd($id){
		$re = $this->where("id=$id")->find();
		return $re;
	}
}