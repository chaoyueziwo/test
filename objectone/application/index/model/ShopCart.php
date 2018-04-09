<?php
namespace app\index\model;
use think\Model;
use think\Db;

class ShopCart extends Model {
	protected $table = "ht_shop_cart";

	//通过栏目id查找相应的产品
	public function selectAll($uid){
$params = array(0=>"ht_product.name as productName", 1=>"ht_product.seoTitle as seoTitle", 2=>"ht_product.smallPic as smallPic", 3=>"ht_shop_cart.price as price",4=>"ht_shop_cart.isInvoice as isInvoice", 5=>"ht_shop_cart.proQuantity", 6=>"ht_product.id as propertId", 7=>"ht_shop_cart.attrId");
$rs = Db::table('ht_shop_cart')
            ->field( $params )
			->join("ht_product","ht_product.id = ht_shop_cart.productId","inner")->where("userId=$uid")->order("ht_shop_cart.id desc")->limit(0,1)->select();
		return $rs;

	}


	public function addOne($addCartProduct)
	{

		$rs = $this->insert( $addCartProduct );
		return $rs;

	}

	public function selectOne($uid,$productId,$attrId){

		$rs = $this->where( "userId = $uid and productId=$productId and attrId='{$attrId}'" )->find();
		return $rs;

	}



}