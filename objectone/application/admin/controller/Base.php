<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use think\Session;
use think\Paginator;

class Base extends Controller
{
	function _initialize(){
		$a =  Session::get('user');
		
		if(!isset($a['id'])){
			$this->error("请进行登陆","admin/Login/index");
			exit();
		}
		
	}
}