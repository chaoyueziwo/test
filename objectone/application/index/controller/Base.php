<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Session;
use think\Paginator;

class Base extends Controller
{
	function _initialize(){
		$client =  Session::get('user');
		
		if(!isset($client['id'])){
			$this->redirect("index/User/login");
			exit();
		}
		
	}
}