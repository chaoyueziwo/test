<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Session;
use app\index\model\Type as Types;
use app\index\model\Cebiantype as Cebiantype;
use app\index\model\Product as Product;
use app\index\model\ShopCart as Links;
use app\index\model\Orders as Ords;
header("Content-type: text/html; charset=utf-8"); 
class Index extends Controller
{

    public function index()
    {

       $pSideNavCats = \think\Hook::listen('getHeadInfo');
       $pSideNavCats = $pSideNavCats[0];
       /*var_dump($pSideNavCats);exit;*/
       $this->assign("type",$pSideNavCats);
       return view();
       
    }
    public function order(){
      $user =  Session::get('user');
       $shopCart = new Links;
       $product = new Product;
      $shopCarts = $shopCart->selectAll( $user['id'] );
       /*for ($i=0; $i <count($shopCarts) ; $i++) { 
         $totalPrice = $shopCarts[$i]['price'];
       }*/

       $str = "";
       $arr = [];
       $arrs = [];
       foreach ($shopCarts as $key=>$v) {
        $str = $v['attrId'];
        $pieces = explode(",", $str);
        //获取属性ID
        
        for ($i=0; $i < count($pieces); $i++) { 
         /* echo $pieces[$i];exit;*/
          $pid = $pieces[$i];
          /*echo $pid;exit;*/
         
          $arrs[] =\think\Db::name('product_value')->where("id='{$pieces[$i]}' and isShow=1")->find();
         /* if ($arrs == null) {
            
          }else{
             $arrss[$i] = $arrs;
          }*/
         
        }
        /*echo $v['propertId'];exit;*/
        $arr[] =\think\Db::name('product_property')->where("pid = {$v['propertId']} and isShow = 1")->select(); 
       }
/*print_r($arr);exit;*/     
      $this->assign("shopCarts", $shopCarts );
      $this->assign("arr", $arr );
      $this->assign("arrs", $arrs );
      return view("index/order");
    }

   /*
    * 名 称: productDetail()
    * 功 能: 跳转到产品详情页
    * 参 数: 产品id
    * 返 回 值: 产品详情页
     */
    public function productDetail($id){

        $Product = new Product;
        $product = $Product->selectById($id);

        $attrValues = $Product->selectAttrById($id);

        $attrPrices = $Product->selectAttrPricesById($id);

        $attrs = array();
        $values = array();
        $attrsIndex = 0;
        $valuesIndex = 0;

        for ($i=0; $i < count($attrValues) ; $i++) {

          $tempI = $i - 1;
          if( ( $i != 0 ) && ( $attrValues[$i]['propertyId'] != $attrValues[$tempI]['propertyId'] ) ){

            $attrsIndex += 1;
            $attrs[$attrsIndex]['propertyId'] = $attrValues[$i]['propertyId'];
            $attrs[$attrsIndex]['propertyName'] = $attrValues[$i]['propertyName'];
            $valuesIndex = 0;

          }else{

            $attrs[$attrsIndex]['propertyId'] = $attrValues[$i]['propertyId'];
            $attrs[$attrsIndex]['propertyName'] = $attrValues[$i]['propertyName'];

          }

          $attrs[$attrsIndex]["values"][$valuesIndex]['valueId'] = $attrValues[$i]['valueId'];
          $attrs[$attrsIndex]["values"][$valuesIndex]['valueName'] = $attrValues[$i]['valueName'];
          $valuesIndex += 1 ;

        }

        // echo "</br>-----------</br>";
        // var_dump( json_encode($product) );
        // die;

        $this->assign("arrayLength", count( $attrs ) );
        $this->assign( "attrPrices" , $attrPrices );
        $this->assign( "product" , $product );
        $this->assign( "attrs", $attrs );
        return view("index/productDetail");

    }
    public function paySucceed($rid){
    ini_set('date.timezone','Asia/Shanghai');
        //error_reporting(E_ERROR);
     require_once __DIR__."/../../../vendor/WxpayAPIv3.0.1/lib/WxPay.Api.php";
      /*  var_dump($_REQUEST["transaction_id"]);*/
      $_REQUEST["out_trade_no"] = "132087470120180322125406";
      if(isset($_REQUEST["out_trade_no"]) ? $_REQUEST["out_trade_no"] : ""){
        $out_trade_no = $_REQUEST["out_trade_no"];
        $input = new \WxPayOrderQuery();
        $input->SetOut_trade_no($out_trade_no);
        $data = \WxPayApi::orderQuery($input);
       
      }
         /*var_dump($data);exit;
        exit();*/
        if ($data["trade_state_desc"] == "支付成功") {
          $time = $data["time_end"];
         /* var_dump($time);exit;
        exit();*/
         $arr = array('payStatus'=>1,'orderStatus'=>0,'commentStatus'=>0,'payType'=>1,'payedPrice'=>'888','payDate'=>$time);
        $orders = new Ords;
        $orders-> where("id=$rid")->setField($arr);
          $re = $orders->selOne($rid);
          $productName = $orders->selectAll($rid);
          $str = $re['valueId'];
        $pieces = explode(",", $str);//分割属性值ID
        //获取属性ID
        for ($i=0; $i < count($pieces); $i++) { 
         /* echo $pieces[$i];exit;*/
          $pid = $pieces[$i];
          /*echo $pid;exit;*/
         
          $arrs[] =\think\Db::name('product_value')->where("id='{$pieces[$i]}' and isShow=1")->find();//查询属性值
        
        }
        /*echo $v['propertId'];exit;*/
        $arr[] =\think\Db::name('product_property')->where("pid = {$re['productId']} and isShow = 1")->select();//查询属性 
          $this->assign("re",$re);
          $this->assign("arr", $arr );
          $this->assign("arrs", $arrs );
          $this->assign("data", $data );
          $this->assign("productName", $productName );
          return view();
        }else{
          $this->success("订单查询失败","index/Shopcar/pay");
        }
          
        }

     public function https_request($url, $data = null){
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
      if (!empty($data)){
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      }
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($curl);
      curl_close($curl);
      return $output;
    }

}
