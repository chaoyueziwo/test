<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Session;
use Qcloud\Sms\SmsSingleSender;
use app\index\model\User as Links;
use app\index\model\Cebiantype as Cebiantype;
use app\index\model\Type as Types;

class User extends Controller
{

   /*
    *名 称: login()
    * 功 能: 登录页面,
    * 参 数: 无
    * 返 回 值: 登录页面
     */  
    public function login()
    {
       // $params = array("mobile"=>"13521272040");

       // $rs =  \think\Hook::listen('mobileCheck', $params );
        // $this->getHeadInfo();
        $pSideNavCats = \think\Hook::listen('getHeadInfo');
        $pSideNavCats = $pSideNavCats[0];
        $this->assign("type",$pSideNavCats);

        $user =  Session::get('client');

        if(is_null($user)){
          return view('user/login');
        }else{
         /* $this->success("为以登陆状态",$url);*/
        return view('index/index');
        }

    }

   /*
    *名 称: logout()
    * 功 能: 登出,
    * 参 数: 无
    * 返 回 值: 暂无
     */  
    public function logout(){

      Session::set('user',null);
    }


     /*
    *名 称: ajaxCheckMobile()
    * 功 能: 批量禁止数据,
    * 参 数: mobile（手机号），password（密码）
    * 返 回 值: 用户名或手机号码错误 (2) ，登录成功 (1)，验证码错误(0)
     */
    public function ajaxLogin(){
      //检查验证码是否正确
    if(request()->isPost()){
            $data = input('post.');
            if(!captcha_check($data['verify'])) {
                // 校验失败
               return json("0");
            }
        }
        $mobile = strtolower(input('post.mobile'));
        $pd = strtolower(input('post.password'));
        $password = md5($pd);
       
       $res = Loader::model('User')->check($mobile,$password);

    if($res != false){
    //创建会话变量
    /*$_SESSION = $res;*/

    Session::set('user',$res);
    
      return json("1");
    }else{
      return json("2");
    }

     

    }

     /*
    *名 称: ajaxCheckMobile()
    * 功 能: 批量禁止数据,
    * 参 数: mobile
    * 返 回 值: 手机号存在 ({"status":2}) ，格式错误 ({"status":0}，校验通过 ({"status":1})
     */
    public function ajaxCheckMobile(){

       $jsoncallback = htmlspecialchars($_REQUEST ['callback']);
       $mobile = $_POST['mobile'];

       $params = array("mobile"=>$mobile);

       $rs = \think\Hook::listen('mobileCheck', $params );

       if( $rs[0] == true ){

            $links= new Links;
            $user =$links->selectOneByMobile($mobile);

            if(is_null($user)){

            }else{

              $json_data = json_encode( array( "status"=>2 ) );
              echo $jsoncallback."(".$json_data.")";       
              return;

            }

            $json_data = json_encode( array( "status"=>1 ) );
            echo $jsoncallback."(".$json_data.")";  
            return;

       }else{

            $json_data = json_encode( array( "status"=>0 ) );
            echo $jsoncallback."(".$json_data.")";  
            return;

       }

    }

    //注册页
    public function register()
    {
       $Cebiantype = new Cebiantype;

       // //导航栏 父栏目
       // $pNavCats = $Types->getParentTypes();

       // //导航栏 子栏目
       // $CNavCats = $Types->getChildTypes();

       // var_dump( json_encode($CNavCats) );die;
       // dump($re);die;
       $cebiantype = $Cebiantype->type();
       //侧边导航栏

        $pSideNavCats = \think\Hook::listen('getHeadInfo');
        $pSideNavCats = $pSideNavCats[0];
       $this->assign("type",$pSideNavCats);
       return view();
    }


   /*
    *名 称: getRegisteCode()
    * 功 能: 注册时手机短信验证,
    * 参 数: mobile
    * 返 回 值: 
    */
    public function getRegisteCode(){
      $arr = array();
        $phoneNumber = $_POST['mobile'];
        // 短信应用SDK AppID
        //$appid = 1400009099; // 1400开头
        $appid = 1400076452;

        // 短信应用SDK AppKey
        //$appkey = "9ff91d87c2cd7cd0ea762f141975d1df37481d48700d70ac37470aefc60f9bad";
        $appkey = "d3f696fdb97a91511517307efd637c1c";

       /* $phoneNumber = "13521272040";*/

        // 短信模板ID，需要在短信应用中申请
        $templateId = 97347;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请
        // 签名
        $smsSign = "聚惠企业"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
        /*$nub = substr(str_shuffle("012345678901234567890123456789"), 0, 4);*/

        // 指定模板ID单发短信
        try {
            $ssender = new SmsSingleSender($appid, $appkey);
            $nub = $ssender->code();
            $arr = array();
           $re = $phoneNumber.$nub;
           $tate = array('nub'=>"$re");
            $arr = array();
            $params = ["$nub","5"];
            $arr[] = $ssender->sendWithParam("86", $phoneNumber, $templateId,
                $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
            $rsp = json_decode($result); 
           $arr[] = json_encode($tate);
           
             return json($arr);
        } catch(\Exception $e) {
            echo var_dump($e);
        }

    }

  public function check(){
    $vmobile = $_POST['vmobile'];
    $mobile = $_POST['mobile'];
    $re = $mobile.$vmobile;
    $verify = $_POST['verify'];
    if($re != $verify){
      $this->success("验证码不正确");
    }
    if(request()->isPost()){
            $links= new Links;
            $links->data([
              'mobile'=>input('mobile'),
              'mail'=>input('mail'),
              'nickname'=>input('nickname'),
              'password'=>md5(input('password')),
              'addTime'=>time(),
            ]);
            $db= $links->save();//这里的save()执行的是添加
                if($db){
                    return $this->success('注册成功！','login');
                }else{
                    return $this->error('注册失败！','register');
                }
        }
  }
    //会员中心
    public function membercenter()
    {

       return view();
    }


    public function topbottom()
    {

       return view();
    }


    public function testPay(){

      // var_dump("__ROOT__");die;
        ini_set('date.timezone','Asia/Shanghai');
        //error_reporting(E_ERROR);
        require_once __DIR__."/../../../vendor/WxpayAPIv3.0.1/lib/WxPay.Api.php";
        require_once __DIR__."/../../../vendor/WxpayAPIv3.0.1/example/WxPay.NativePay.php";
        require_once __DIR__.'/../../../vendor/WxpayAPIv3.0.1/example/log.php';
        // require_once "../lib/WxPay.Api.php";
        // require_once "WxPay.NativePay.php";
        // require_once 'log.php';

        //模式一
        /**
         * 流程：
         * 1、组装包含支付信息的url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
         * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
         * 5、支付完成之后，微信服务器会通知支付成功
         * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */
        $notify = new \NativePay();
        $url1 = $notify->GetPrePayUrl("123456789");

        //模式二
        /**
         * 流程：
         * 1、调用统一下单，取得code_url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、支付完成之后，微信服务器会通知支付成功
         * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */

        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $setOut = $input->SetOut_trade_no(\WxPayConfig::MCHID);
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);
       /* var_dump($setOut);die;*/
        $url2 = $result["code_url"];
       return '<img alt="模式二扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data='.$url2.'" style="width:150px;height:150px;"/>';

    }

}
