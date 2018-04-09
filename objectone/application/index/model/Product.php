<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Product extends Model {
	protected $table = "ht_product";

	//通过栏目id查找相应的产品
	public function selectByPid($pid){

		


	}


	//通过产品id查找相应的产品
	public function selectById($id){

		$re = $this->where("audit=1 and state=1 and id=$id")->find();		

		return $re;

	}


	//通过产品id获取产品属性值
	public function selectAttrById($id){

		$params = array(0=>"ht_product_property.pid as productId", 1=>"ht_product_property.name as propertyName", 2=>"ht_product_value.id as valueId", 3=>"ht_product_value.name as valueName",4=>"ht_product_property.id as propertyId", 5=>"ht_product_value.sid" );

		$rs = Db::table('ht_product_property')
            ->field( $params )
            ->join( ' ht_product_value ' , ' ht_product_value.sid=ht_product_property.id ', 'left')
            ->order( ' ht_product_property.sort desc, ht_product_value.id desc ')
            ->where( "ht_product_property.isShow = 1 and ht_product_value.isShow = 1 and ht_product_property.pid=$id" )
			->select();

		return $rs;

	}


	//通过产品id 获取产品属性价格列表
	public function selectAttrPricesById( $id='' )
	{

		$rs = Db::table('ht_property_price')
            ->where( "productId=$id" )
			->select();
		return $rs;

	}

}