<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
use think\Session;

class Login extends Controller
{
    public function index()
    {
       return view('login/index');
    }

	function check(){
		//检查验证码是否正确
		if(request()->isPost()){
            $data = input('post.');
            if(!captcha_check($data['yzma'])) {
                // 校验失败
                $this->error('验证码不正确');
                exit();
            }
        }
        $username = strtolower($_POST['username']);
        $pd = strtolower($_POST['password']);
        $password = md5($pd);
       /* $user = model('login');
        $re = $user->where('username = "{$username}" and username = "{$password}"')->find();
            
        var_dump($re);exit;*/
       $res = Loader::model('Login')->test($username,$password);

     /* var_dump($res);exit;*/
		/*$name = Db::query('select * from login where id=1');
		print_r($name);exit;*/
		if($res != false){
		//创建会话变量
		/*$_SESSION = $res;*/

		Session::set('user',$res);
		
			$this->success('登陆成功',"admin/Index/index");	

		}else{
			$this->error('登陆失败',"admin/Login/index");
		}
	}
} 