<?php
namespace app\admin\model;
use think\Model;
class Addprice extends Model {
	protected $table = "ht_property_price";
    public function sel($id){
		$re = $this->where("productId=$id")->select();
		return $re;
	}
}