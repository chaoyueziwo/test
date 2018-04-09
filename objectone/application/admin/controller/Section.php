<?php
namespace app\admin\controller;
use app\admin\model\Section as Links;
use app\admin\model\User as Users;

/*
*Section 管理部门控制器,
 */
class Section extends Base
{
/*
*名 称: add()
* 功 能: 保存新增数据,
* 参 数: 接收post传过的值
* 返 回 值: $db=被受影响的行数

 */
    public function add()
    {
        if(request()->isPost()){
            $links= new Links;
            $Users = new Users;

            $links->data([
            	'name'=>input('name'),
                'pid'=>input('pid'),
               // 'person'=>input('k'),
                'description'=>input('description'),
            ]);

            /*$validate = \think\Loader::validate('Link');
            if($validate->check($links)){//注意，在模型数据操作的情况下，验证字段的方式，直接传入对象即可验证*/
            $db= $links->save();//这里的save()执行的是添加
            $organizeId =  $links->id ; 
            if($db){

                if( !is_null(input('k') && input('k')!="" )){
                    $map['username'] = input('k');
                    $admin = \think\Db::name('admin')->where($map)->update( [ 'organizeId' => $organizeId,'isLeader' => 1 ] );
                }

                return $this->success('添加成功！','oper');
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
        $keywords=$_POST[value];
        if ($keywords) {
            $map['username'] = ['like','%'.$keywords.'%'];
            $searchres = \think\Db::name('admin')->where($map)->order('id desc')->paginate($listRows = 4,$simple = false,$config = ['query'=>array('username'=>$keywords),
                ]);

             foreach ($searchres as $key => $value) {
            echo "<span onclick='values(this)'>{$value['username']}</span>";
            }
                
                }else{
                    echo '<span>因暂无数据</span>';
                    echo '<span><a href="javascript:;" onclick="$(this).parent().parent().fadeOut(100)">关闭</a& gt;</span>';
                }
        
    }
       /*
*名 称: oper()
* 功 能: 查询所有数据,
* 参 数: catTree()下拉树状展示组织，selOption()折叠展示数据
* 返 回 值: $re,$res为字符串

 */
    public function oper()
    {

    	$links= new Links;
        $re =$links->catTree();
        $res =$links->selOption();
        $this->assign("re",$re);
        $this->assign("res",$res);
        return view('section/options');	

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
    	$re = $links->where("id=$id")->delete();
    	if($re>0){
    		  return $this->success('删除成功！','oper');
                }else{
               return $this->error('删除失败！','oper');
    	}
    }
 /*
*名 称: dels()
* 功 能: 同时删除多条数据,
* 参 数: $id数据的ID
* 返 回 值: $re=被受影响的行数返回json格式数据

 */
     public function dels()
    { 
        $id = $_POST['id'];
     
        $links= new Links;
        $re = $links->where("id=$id")->delete();
       if($re > 0){    
                    return json("1");    
                }else{    
                    return json("0");    
                }  
    }
/*
*名 称: update()
* 功 能: 修改数据,
* 参 数: $id数据的ID
* 返 回 值: $re=被受影响的行数返回json格式数据
 */
     public function update()
    {
         $id = $_POST[id];
   
    	$links= new Links;
        $find =$links->upd($id);
       if($find > 0){    
                    return json($find);    
                }else{    
                   exit;    
                }
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
        $_POST['person'] = $_POST['k'];
        unset($_POST['k']);
    	$links= new Links;
    	$re =$links->where("id={$id}")->update($_POST);
    	if($re){
			$this->success("修改成功",'oper');
		}else{
			$this->error("修改失败",'update');
		}
	}
}