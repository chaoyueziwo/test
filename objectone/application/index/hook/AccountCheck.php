<?php
namespace app\index\hook;
use think\Db;
Class AccountCheck
{

      /*
      *名 称: mobileCheck()
      * 功 能: 校验手机号,
      * 参 数: array("mobile"=>value)
      * 返 回 值: 为true时校验通过，为false时校验失败
       */ 
	function mobileCheck( $params ){

            $tel = $params['mobile'];

            if(strlen($tel) == "11") 
            {

                  //上面部分判断长度是不是11位 
                  $n = preg_match_all("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/",$tel,$array); 
                  /*接下来的正则表达式("/131,132,133,135,136,139开头随后跟着任意的8为数字 '|'(或者的意思) 
                  * 151,152,153,156,158.159开头的跟着任意的8为数字 
                  * 或者是188开头的再跟着任意的8为数字,匹配其中的任意一组就通过了 
                  * /")*/
             
                  //var_dump($array); //看看是不是找到了,如果找到了,就会输出电话号码的 

                  if( count($array[0]) ==0 ){

                        return false;

                  }else{

                        return true;
                  }

            }else
            { 
                  
                  return false;
            } 


	}




}