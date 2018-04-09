<?php
namespace app\admin\model;
use think\Model;
class Addproduct extends Model {
	protected $table = "ht_product_property";
    public function sel($id){
		$re = $this->where("pid=$id")->order('id', 'desc')->select();
		return $re;
	}
	public function upd($id){
		$re = $this->where("id=$id")->find();
		return $re;
	}


	public function selectPrices( $id ){
		$re = $this->join(" ht_product_value " ," ht_product_value.sid = ht_product_property.id ", "inner" )->field("ht_product_property.id as propertyId , ht_product_value.id as valueId")->where("ht_product_property.pid=$id")->order('ht_product_value.id', 'desc')->select()/*->buildsql()*/;
		// var_dump( json_encode( $re ) ) ;
		return $re;		

	}

}