<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Orders extends Model {
	protected $table = "ht_orders";

	//通过栏目id查找相应的产品


	public function addOne($addCartProduct)
	{

		$rid = $this->insertGetId($addCartProduct);
		return $rid;

	}

	public function selOne($id)
	{

		$re = $this->where("id = $id")->find();
		return $re;

	}
	public function selectAll($id){
$params = array(0=>"ht_product.name as productName");
$rs = Db::table('ht_orders')
            ->field( $params )
			->join("ht_product","ht_orders.productId = ht_product.id","inner")->where("ht_orders.id=$id")->find();
		return $rs;

	}

}