<?php
namespace app\admin\controller;
use app\admin\model\User as Links;
use app\admin\model\Section as Sec;
/*
*User 管理用户控制器
 */
class User extends Base
{

     /*
    *名 称: index()
    * 功 能: 启用用户列表
    * 参 数: catTree()下拉树状展示组织
    * 返 回 值: $re：组织列表，$res：用户列表，$lists:分页列表，$page:页码
     */
    public function index()
    {

        $isActive = $_GET['isActive'];

        if(is_null($isActive)){
            $isActive = 1;
        }else{
            $isActive = 1;
        }

        $page = $_GET['page'];
        $pageLimit = PAGE_LIMIT;
        if(is_null($page)){
            $page = 1;
        }else{

        }

        $links= new Sec;
        $re =$links->catTree();
        $this->assign("re",$re);
        $links= new Links;
        $res =$links->selActive($page-1, $pageLimit, $isActive);

        //分页
        $menu_model = new Links;
        $lists = $menu_model->where("isActive=1 and isDisabled=0")->paginate($pageLimit);
        //echo $menu_model->getLastSql();
        $page = $lists->render();
        $this->assign('lists', $lists);
        $this->assign('page', $page);
        $this->assign("res",$res);

        return view('user/index'); 
    	//return $this->fetch();

    }


 /*
*名 称: indexNoActive()
* 功 能: 禁用用户列表
* 参 数: catTree()下拉树状展示组织
* 返 回 值: $re：组织列表，$res：用户列表，$lists:分页列表，$page:页码
 */
    public function indexNoActive()
    {

        $isActive = 0;

        $page = $_GET['page'];
        $pageLimit = PAGE_LIMIT;
        if(is_null($page)){
            $page = 1;
        }else{

        }

        $links= new Sec;
        $re =$links->catTree();
        $this->assign("re",$re);
        $links= new Links;
        $res =$links->selActive($page-1, $pageLimit, $isActive);

        //分页
        $menu_model = new Links;
        $lists = $menu_model->where("isActive=0 and isDisabled=0")->paginate($pageLimit);

        $page = $lists->render();
        //var_dump($page);die;
        $this->assign('lists', $lists);
        $this->assign('page', $page);
        $this->assign("res",$res);
        
        return view("user/indexNoActive");

    }


    /*
*名 称: add()
* 功 能: 保存新增数据
* 参 数: 接收post传过的值
* 返 回 值: $db=被受影响的行数
 */
    public function add()
    {
        if(request()->isPost()){
            $links= new Links;
            $links->data([
            	'username'=>input('username'),
                'mobile'=>input('mobile'),
                'password'=>md5(input('password')),
                'isLeader'=>input('isLeader'),
                'rulerId'=>input('rulerId'),
                'description'=>input('description'),
                'position'=>input('position'),
                'organizeId'=>input('organizeId'), 
                'addtime'=>time(),
            ]);
            /*$validate = \think\Loader::validate('Link');
            if($validate->check($links)){//注意，在模型数据操作的情况下，验证字段的方式，直接传入对象即可验证*/
                $db= $links->save();//这里的save()执行的是添加
                if($db){
                    return $this->success('添加成功！','index');
                }else{
                    return $this->error('添加失败！','index');
                }
            /*}else{
                return $this->error($validate->getError());
            }
            return;*/
        }
        return $this->fetch();
    }
  /*
*名 称: ajaxs()
* 功 能: 搜索功能,
* 参 数: $keywords关键字
* 返 回 值: $searchres二维数组

 */  
    public function ajaxs(){
        $v=$_POST[value];
        $where['username'] = array('like','%'.$v.'%');
        $re== \think\Db::name('admin')->where($where)->select();
        if(mysql_num_rows($re)<=0) {
          exit('0');  
      }else{
        echo '<ul>';
        while($ro=mysql_fetch_array($re)) echo '<li><a href="">'.$ro['username'].'</a></li>';
        echo '<li><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
        echo '</ul>';
      }   
    }
    /*
*名 称: del()
* 功 能: 删除一条数据,
* 参 数: $id数据的ID
* 返 回 值: $re=被受影响的行数

 */ 
    public function del($id)
    { 
    	$links= new Links;
    	$re = $links->where("id=$id")->setField("isDisabled",1);
    	if($re>0){
    		  return $this->success('删除成功！','oper');
                }else{
               return $this->error('删除失败！','oper');
    	}
    }
 /*
*名 称: dels()
* 功 能: 批量删除数据,
* 参 数: $id拼接字符串：id1_id2_
* 返 回 值: 操作成功 ({"status":1}) ，操作失败 ({"status":0})

 */
     public function dels($idStr)
    { 
        // $id = $_GET['id'];
     
        // $links= new Links;
        // $res = $links->destroy($id);

        // //$re =$links->sel(0,2);

        // $re =$links->sel2();

        // $this->assign("re",$re);
        // return view('User/index');
        $jsoncallback = htmlspecialchars($_REQUEST ['callback']);


        $idArr = explode("_", $idStr);
        if($dArr[count($idArr)] == ""){
            array_pop($idArr);
        }

        $links= new Links;
        $re =$links->dels($idArr,1);


        if(!is_bool($re)){
            $json_data = json_encode( array( "status"=>1 ) );
            echo $jsoncallback."(".$json_data.")";
        }else{    
            $json_data = json_encode( array( "status"=>0 ) );
            echo $jsoncallback."(".$json_data.")";
        } 

    }



 /*
*名 称: start()
* 功 能: 批量开启数据,
* 参 数: $id拼接字符串：id1_id2_
* 返 回 值: 操作成功 ({"status":1}) ，操作失败 ({"status":0})

 */
    public function start($idStr){

        $jsoncallback = htmlspecialchars($_REQUEST ['callback']);
        $idArr = explode("_", $idStr);
        if($dArr[count($idArr)] == ""){
            array_pop($idArr);
        }

        $links= new Links;
        $re =$links->updates($idArr,1);

        if(!is_bool($re)){
            $json_data = json_encode( array( "status"=>1 ) );
            echo $jsoncallback."(".$json_data.")";  
        }else{    
            $json_data = json_encode( array( "status"=>0 ) );
            echo $jsoncallback."(".$json_data.")";  
        } 

    }

 /*
*名 称: forbiden()
* 功 能: 批量禁止数据,
* 参 数: $id拼接字符串：id1_id2_
* 返 回 值: 操作成功 ({"status":1}) ，操作失败 ({"status":0})
 */
    public function forbiden($idStr){

        $jsoncallback = htmlspecialchars($_REQUEST ['callback']);
        $idArr = explode("_", $idStr);
        if($dArr[count($idArr)] == ""){
            array_pop($idArr);
        }
        $links= new Links;
        $re =$links->updates($idArr,0);

        if(!is_bool($re)){ 
            $json_data = json_encode( array( "status"=>1 ) );
            echo $jsoncallback."(".$json_data.")";  
        }else{    
            $json_data = json_encode( array( "status"=>0 ) );
            echo $jsoncallback."(".$json_data.")";  
        } 

    }



/*
*名 称: update()
* 功 能: 修改数据,
* 参 数: $id数据的ID
* 返 回 值: $re=被受影响的行数返回json格式数据
 */
     public function updates()
    {

    	$links= new Links;

        //$res =$links->catTree();
        $re =$links->upd($id);
        $res =$links->getType(0,1,$re['id']);
        $this->assign("res",$res);
        $this->assign("re",$re);
    	return view('Section/update');
    }




/*
*名 称: save()
* 功 能: 保存修改的数据,
* 参 数: $id数据的ID
* 返 回 值: $re=被受影响的行数
*/
    public function save()
    {
    	$id = $_POST['id'];

    	$links= new Links;
    	$re =$links->where("id={$id}")->update($_POST);
    	if($re){
			$this->success("修改成功",'oper');
		}else{
			$this->error("修改失败",'update');
		}
	}
}