<?php
namespace app\admin\controller;
use app\admin\model\Zdylist as Links;
class Zdylist extends Base
{
    public function index()
    {
    	$links= new Links;
    	$re =$links->catTree();

		$this->assign("re",$re);
    	return view('Zdylist/index');
    }
    public function add()
    { 
        unset($_POST['type']);
        //var_dump($_POST);exit;
        $file = request()->file('image');
       // var_dump($file);exit;
        $data=$_POST;
        if(isset($file)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $file->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'); 
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['image']=$imgpath;
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
            
             $data['addtime']=time();
              //var_dump($data);exit;
              $num= \think\Db::table('ht_zdylist_type')->insert($data);
        
                if($num){
                    return $this->success('添加成功！','oper');
                }else{
                    return $this->error('添加失败！','index');
                }
           
    }
    public function oper()
    {
    	$links= new Links;
    	$re =$links->catTree();
		$this->assign("re",$re);
    return view('Zdylist/oper');	
    }
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
    public function paixu(){
        $links= new Links;
       // var_dump($_POST['paixu']);exit;
        foreach ($_POST['paixu'] as $k=>$v){
    $re = $links->where("paixu={$k}")->data(array('paixu'=>$v))->update();
    
    //update(array('ordernum'=>$v),"id=$k"); 
        }
        //var_dump($re);exit;
        if($re){
            $this->success("排序成功",'oper');
        }else{
            
            $this->success('排序成功','oper');
        }
    }
     public function dels()
    { 
        $id = $_GET['id'];
     
        $links= new Links;
        $res = $links->destroy($id);
        $re =$links->catTree();

        $this->assign("re",$re);
        return view('Zdylist/oper');
    }
     public function update($id)
    {
    	$links= new Links;
    	//$res =$links->catTree();
    	$re =$links->upd($id);
        //echo $re['image'];exit;
        $res =$links->getType(0,1,$re['id']);
    	$this->assign("res",$res);
    	$this->assign("re",$re);
    	return view('Zdylist/update');
    }
    public function save()
    {
         $file = request()->file('image');
         //echo $file;exit;
        $data=$_POST;
        if(isset($file)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $file->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'); 
            if($info){         
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['image']=$imgpath;
            //var_dump($data['image']);exit;
           /* if($image != null){
                @unlink("__ROOT__/".$imgpath);
            }*/
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
             $data['addtime']=time();
    	$id = $_POST['id'];

    	$links= new Links;
    	$re =$links->where("id={$id}")->update($data);
    	if($re){
			$this->success("修改成功",'oper');
		}else{
			$this->error("修改失败",'update');
		}
	}
}