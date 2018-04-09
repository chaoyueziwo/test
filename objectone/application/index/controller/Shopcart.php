<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Session;
use app\index\model\Product as Product;
use app\index\model\ShopCart as Links;
use app\index\model\Orders as Ords;

class Shopcart extends Base
{

   /*
    * 名 称: order()
    * 功 能: 跳转到确认订单页，把产品放入购物车中且读取购物车中所有的商品
    * 参 数: 产品id
    * 返 回 值: 产品详情页
     */
    public function order()
    {
       if( is_null($_POST['productId']) ){

          return ;

       }else{

          $productId = $_POST['productId'];

       }

       if( is_null($_POST['quantity']) ){

          $quantity = 1;

       }else{

          $quantity = $_POST['quantity'];

       }

       if( is_null($_POST['isInvoice']) ){

          $isInvoice = 1;

       }else{

          $isInvoice = $_POST['isInvoice'];

       }

       //获取属性id相对应的价格，生产订单时做校验
       if( is_null($_POST['sid']) ){

          $sid = 1;

       }else{

          $sid = $_POST['sid'];

       }

       if( is_null($_POST['price']) ){

          $price = 1;

       }else{

          $price = $_POST['price'];

       }

       $user =  Session::get('user');

       $addCartProduct = array('userId'=>$user['id'], 'productId'=>$productId,'proQuantity'=>$quantity,'addTime'=>time(),'isInvoice'=>$isInvoice,'attrId'=>$sid,'price'=>$price);

       $shopCart = new Links;

       $isExist = $shopCart->selectOne( $user['id'], $productId , $sid );

       if(is_null($isExist)){

          $rs = $shopCart->addOne( $addCartProduct );

       }else{

       }
/*
       $shopCarts = $shopCart->selectAll( $user['id'] );
       for ($i=0; $i <count($shopCarts) ; $i++) { 
         $totalPrice = $shopCarts[$i]['price'];
       }*/

       return  $this->redirect('Index/order');
      /* $this->assign("shopCarts", $shopCarts );
       $this->assign("totalPrice", $totalPrice );
       return view("index/order");*/

    }

   /*
    * 名 称: pay()
    * 功 能: 支付页
    * 参 数: 购物车中选中的对应id、数量、是否开发票
    * 返 回 值: 支付页
     */
    public function pay()
    {
     $result = action('User/testPay');
      /*print_r($result);exit;*/
     $user =  Session::get('user');
     $clientId = $user['id'];
     $productId = $_POST['productId'];
     $payPrice = $_POST['payPrice'];
     $proQuantity = $_POST['proQuantity'];
     $valueId = $_POST['valueId'];
     $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
     $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
     $data = $_POST;
     if(!isset($productId)){

     }else{
     $data = array('orderId'=>"$orderSn",
                   'clientId'=>"$clientId",
                   'productId'=>"$productId",
                   'payPrice'=>"$payPrice",
                   'valueId'=>"$valueId",
                   'proQuantity'=>"$proQuantity",
                   'addTime'=>time());
    $order = new Ords;
      $rid = $order->addOne($data);//返回当前订单的ID
      $re = $order->selOne($rid);
     
     $this->assign("re",$re);
     $this->assign("rid",$rid);
   }
     $this->assign("result",$result);
      return view("index/pay"); 

    }



    public function paySucceed($value='')
    {

      return view("index/paySucceed"); 
    }


}
