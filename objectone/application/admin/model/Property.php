<?php
namespace app\admin\model;
use think\Model;
class Property extends Model {
	protected $table = "ht_product_value";
    public function sel($id){
		$re = $this->where("sid=$id")->order('id', 'desc')->select();
		return $re;
	}
}