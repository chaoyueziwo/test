<?php
namespace app\admin\controller;
use app\admin\model\Product as Links;
use app\admin\model\Renwu as Renwu;
use app\admin\model\Addproduct as Addp;
use app\admin\model\Property as Pre;
use app\admin\model\Addprice as Pri;
use app\admin\model\ProductSreve as Sreve;
use app\admin\model\ProductFlow as Flow;
//Product产品控制器
class Product extends Base
{
      /*
      *名 称: index()
      * 功 能: 增加产品
      * 参 数: $id为产品的分类ID
      * 返 回 值: $arr为流程下拉列表
       */
    public function index($id)
    {  
        $renwu = new Renwu;
        $arr = $renwu->sel();
        $this->assign("arr",$arr);
        $this->assign("id",$id);
    	return view('product/index');
    }
     /*
      *名 称: index2()
      * 功 能: 增加产品选项
      * 参 数: $id为产品的ID,$pid为产品分类ID
      * 返 回 值: $res为选项列表
       */
    public function index2($pid,$id)
    {  
       $Links = new Links;
        $arr = $Links->showOption($pid,$id);
        $add = new Addp;
        $res = $add->sel($id);
        $sreve = new Sreve;
        $upd = $sreve->upd($id);
        $this->assign("upd",$upd);
        $this->assign("id",$id);
        $this->assign("pid",$pid);
        $this->assign("arr",$arr);
        $this->assign("res",$res);
        return view('product/index2');
    }
    /*
      *名 称: index3()
      * 功 能: 增加产品组合价格
      * 参 数: $pid为产品的ID,$id为产品分类ID
      * 返 回 值: $arrs为组合选项值
       */
     public function index3($pid,$id)
    {   
        $add = new Addp;


       $prices = $add->selectPrices($pid);   

/*        $rs = $this->getValuePriceIndex($prices ,3);


        //var_dump( json_encode($prices ));die;
        $tempPrices[0]['propertyId'] = $prices[0]['propertyId'];

        $tempIndex = 1;
        for ($i=1; $i < count($prices)-1 ; $i++) { 

          $insertTempFlag = 1;

          for ($j=0; $j < count($tempPrices) ; $j++) { 
              if( $prices[$i]['propertyId'] == $tempPrices[$j]['propertyId']){
                $insertTempFlag = 0;
              } 
          }
          if($insertTempFlag == 1){
            $tempPrices[$tempIndex]['propertyId'] = $prices[$i]['propertyId'];
            $tempIndex += 1;
          }

        }

*/
        //获取属性
        $res = $add->sel($pid);

        $sreve = new Sreve;
        $upd = $sreve->upd($pid);
        $arrs ="";
       
        foreach ($res as $key =>$v) {
          $arrs.="<div class='fids'>";
          $arrs.="<ul class='Father_Title'>";
          $arrs.="<li>{$v['name']}: </li>";
          $arrs.="</ul>" ;
          $sid = $v['id'];

          //产品属性
          $pre = new Pre;
          $re = $pre->sel($sid);
          // 
          $arrs.="<ul class='Father_Item{$key}'>";
          foreach ($re as $key => $value) {

            if($value['isShow'] == 1){
              $arrs.="<li class='li_width'><label><input onclick='isShow(this)' checked='checked' id='Checkbox3' type='checkbox' class='chcBox_Width' value='{$value['name']}|{$value['id']}' />{$value['name']}<span class='li_empty'  contentEditable='true' value='{$value['id']}'></span></label></li>";    
            }else{
               $arrs.="<li class='li_width'><label><input onclick='isShow(this)' id='Checkbox3' type='checkbox' class='chcBox_Width' value='{$value['name']}|{$value['id']}' />{$value['name']}<span class='li_empty'  contentEditable='true' value='{$value['id']}'></span></label></li>";    
            }


          }
          $arrs.="</ul>" ; # code...
          $arrs.="</div>";
        }

        $product = new Links;
        $attrPrices = $product->selectAttrPricesById($pid);
        $this->assign("attrPrices",json_encode($attrPrices) );

        $sreve = new Sreve;
        $upd = $sreve->upd($pid);
        $this->assign("upd",$upd);
        $this->assign("id",$id);
        $this->assign("pid",$pid);
        $this->assign("arr",$arrs);
        $this->assign("res",$res);
        return view('product/index3');
    }
    /*
      *名 称: index4()
      * 功 能: 增加产品流程
      * 参 数: $pid为产品的ID,$id为产品分类ID
      * 返 回 值: $flow为产品流程列表，$sreve为服务列表
     */
    public function index4($pid,$id){
      $flow = new Flow;
      $sreve = new Sreve;
      $res = $sreve->upd($pid);
      $re = $flow->sel($pid);
      $this->assign("res",$res);
      $this->assign("re",$re);
      $this->assign("id",$id);
      $this->assign("pid",$pid);
      return view();
    }
     /*
      *名 称: ajaxs()
      * 功 能: 增加产品组合价格
      * 参 数: 接收ajax为$_POST传过来的值
      * 返 回 值: $res为插入的条数
     */
    public function ajaxs(){


      $vids = input('post.vids');
      $vids1 = input('post.vids1');
      $vids2 = input('post.vids2');
      $key = input('post.key');
      $productId = input('post.productId');
      $price = input('post.prices');
      $re= "";
      if (!is_null($vids2)) {
            if ($vids>$vids1 || $vids1>$vids2) {
             $re.=$vids.$vids1.$vids2;
            }elseif ($vids1>$vids || $vids>$vids2) {
              $re.=$vids1.$vids.$vids2;
            }elseif ($vids2>$vids || $vids>$vids1) {
             $re.=$vids2.$vids.$vids1;
            }elseif ($vids>$vids2 || $vids2>$vids1) {
              $re.=$vids.$vids2.$vids1;
            }elseif ($vids1>$vids2 || $vids2>$vids) {
              $re.=$vids1.$vids2.$vids;
            }else{
              $re.=$vids2.$vids1.$vids;
            }
      }
      if ($vids>$vids1) {
         $re.=$vids;
         $re.=$vids1;
        }else{
          $re.=$vids1;
         $re.=$vids;
        }
      $user = new Pri;


     $res = $user->where('vid='.$key)->delete();

     if($res > 0){  
        return json("2");    
     }else{

           $user->data(["vid"  =>  $key,
          "productId"  =>  $productId,
          'price' =>  $price]);

            $res = $user->save();
      //dump($userid);
          if($res > 0){    
                      return json("1");    
                  }else{    
                      return json("0");    
                  }   
     } 

    }
    public function price(){
      $productId = $_POST['productId'];
      $pri = new Pri;
      $re = $pri->sel($productId);
      if($productId > 0){    
                    return json($re);    
                }else{    
                    return json("0");    
                } 
    }
/*
*名 称: add()
* 功 能: 保存新增产品
* 参 数: 接收post传过的值
* 返 回 值:  $userId =当前id
 */
    public function add()
    {
         $pid = $_POST['id'];
        unset($_POST['id']);
        $_POST['pid'] = $pid;
        $renwu = new Renwu;
        $taskId = $_POST['taskId'];
        $name = $renwu->upd($taskId);
        $_POST['taskName'] = $name['name'];
        $_POST['addTime'] = time();
        $file = request()->file('bigPic');
        $middlePic = request()->file('middlePic');
        $smallPic = request()->file('smallPic');
        $data=$_POST;
        if(isset($file)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $file->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['bigPic']=$imgpath;
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
          if(isset($middlePic)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $middlePic->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'); 
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['middlePic']=$imgpath;
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
          if(isset($smallPic)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $smallPic->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'); 
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['smallPic']=$imgpath;
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
       
        //$user = new Links($data);
      // 过滤post数组中的非数据表字段数据
        // $db=$user->allowField(true)->insert();
    $userId = \think\Db::name('product')->insertGetId($data);
        if($userId ){
                    $this->redirect('Product/index2',array('pid'=>"$pid",'id'=>"$userId"));
                }else{
                    return $this->error('添加失败！','index');
                }
        
        return $this->fetch();
    }
/*
*名 称: oper()
* 功 能: 查询所有数据,
* 参 数: $id产品分类ID
  返 回 值:  //$re,$rew,$res,$rec分别是状态为启用,禁用,草稿,停用,数据
 */
    public function oper($id)
    {
       //print_r($id);exit;
    	$links= new Links;
      $selCount = $links->selCount($id);
      $nubw =$links->cselw($id);
      $nubc =$links->cselc($id);
      $nubt =$links->cstate($id);
      $nub = $_POST['branches'];
      $v =$_POST['v'];
       if($nub == null){
            $nub = 3;
        }else{    
              if($v ==1){
                    
                if($nub > $selCount){
                  return $this->success('已超过它的总条数，跳转失败！');
                      }
                  }elseif($v ==2){
                      if($nub > $nubw){
                        return $this->success('已超过它的总条数，跳转失败！');
                      }
                  }elseif($v ==3){
                   
                      if($nub > $nubc){
                        return $this->success('已超过它的总条数，跳转失败！');
                      }   
                  }else{
                      if($nub > $nubt){
                        return $this->success('已超过它的总条数，跳转失败！');
                      }   
               }
           
        }
 
        $rew =$links->selw($id);
        $nubw =$links->cselw($id);
        $rec =$links->selc($id);
        $nubc =$links->cselc($id);
        $re = $links::where("pid=$id and audit=1")->paginate($nub);
        $page = $re->render();
        $rew = $links::where("pid=$id and audit=0")->paginate($nub);
        $page2 = $rew->render();
        $rec = $links::where("pid=$id and audit=2")->paginate($nub);
        $page3 = $rec->render();
        $ret = $links::where("pid=$id and state=0")->paginate($nub);
        $page4 = $rec->render();
        $this->assign("ret",$ret);
        $this->assign("page4",$page4);
        $this->assign("nubt",$nubt);
        $this->assign("page",$page);
        $this->assign("page2",$page2);
        $this->assign("page3",$page3);
        $this->assign("id",$id);
		    $this->assign("re",$re);
        $this->assign("rew",$rew);
        $this->assign("rec",$rec);
        $this->assign("nubw",$nubw);
        $this->assign("nubc",$nubc);
    return view('product/oper');	
    }
    /*
*名 称: audit()
* 功 能: ajax排序,
* 参 数: $_OPST
  返 回 值:  $res被受影响的行数
 */
    public function audit(){
       $links= new Links;
       $id = $_POST['id'];
       $audit = $_POST['audit'];
       $arrid = explode(',',$id);
       $data = [];
       if($audit == 3){
        $audit = 0;
       for($i=0;$i<count($arrid);$i++)
        {
        $data[] = ['id' => $arrid[$i],'state'=>"$audit"];
        } 
       
          $res = $links->saveAll($data,true);
          if($res){
                    return json($res); 
                }else{
                   exit;
                }
          }else{
            for($i=0;$i<count($arrid);$i++)
                {
                $data[] = ['id' => $arrid[$i],'audit'=>"$audit"];
                } 
              $res = $links->saveAll($data,true);
             if($res){
                    return json($res); 
                }else{
                   exit;
              }
          }
    }
  /*
*名 称: top()
* 功 能: ajax排序,
* 参 数: $_OPST
  返 回 值:  $res被受影响的行数
 */
    public function top(){
       $links= new Links;
       $id = $_POST['id'];
       $audit = $_POST['audit'];
       $arrid = explode(',',$id);
       $data = [];
            for($i=0;$i<count($arrid);$i++)
                {
                $data[] = ['id' => $arrid[$i],'recommend'=>"$audit"];
                } 
              $res = $links->saveAll($data,true);
             if($res){
                    return json($res); 
                }else{
                   exit;
              }
    }
       /*
*名 称: overhead()
* 功 能: ajax排序,
* 参 数: $_OPST
  返 回 值:  $res被受影响的行数
 */
     public function overhead(){
       $links= new Links;
       $id = $_POST['id'];
       $audit = $_POST['audit'];
       $arrid = explode(',',$id);
       $data = [];
            for($i=0;$i<count($arrid);$i++)
                {
                $data[] = ['id' => $arrid[$i],'overhead'=>"$audit"];
                } 
              $res = $links->saveAll($data,true);
             if($res){
                    return json($res); 
                }else{
                   exit;
              }
    }
/*
*名 称: topnews()
* 功 能: ajax排序,
* 参 数: $_OPST
  返 回 值:  $res被受影响的行数
 */
    public function topnews(){
       $links= new Links;
       $id = $_POST['id'];
       $audit = $_POST['audit'];
       $arrid = explode(',',$id);
       $data = [];
            for($i=0;$i<count($arrid);$i++)
                {
                $data[] = ['id' => $arrid[$i],'top'=>"$audit"];
                } 
              $res = $links->saveAll($data,true);
             if($res){
                    return json($res); 
                }else{
                   exit;
              }
    }
  /*
*名 称: del()
* 功 能:删除单个产品,
* 参 数: $id为产品ID，$pid为产品分类ID
  返 回 值:  $re被受影响的行数
 */
    public function del($id,$pid)
    { 
    	$links= new Links;
    	$re = $links->where("id=$id")->delete();
    	if($re>0){
    		  return $this->redirect('product/oper', array('id' => "$pid"), 5, '删除成功...'); 
                }else{
               return $this->error('删除失败！','oper');
    	}
    }

      public function del2($id2,$id,$pid)
    { 
        $del = new Addp;
        $re = $del->where("id=$id2")->delete();
        if($re>0){
              return $this->redirect('product/index2', array('id' => "$id",'pid'=>"$pid"), 5, '删除成功...'); 
                }else{
               return $this->error('删除失败！','oper');
        }
    }
/*
*名 称: dels()
* 功 能:删除多个产品,
* 参 数: $id为产品ID，$pid为产品分类ID
  返 回 值:  $res被受影响的行数
 */
     public function dels()
    { 
        $id = $_POST['id'];
     
        $links= new Links;
        $res = $links->destroy($id);
        if($res){
                    return json($res); 
                }else{
                   exit;
                }
    }
    /*
*名 称: update()
* 功 能:修改产品,
* 参 数: $_POST
  返 回 值:  $re是修改该产品的数据
 */
     public function update($id,$pid)
    {
    	$links= new Links;
    	//$res =$links->catTree();
    	$re =$links->upd($id);
        $renwu = new Renwu;
        $currentTypeId = $re['taskId'];
        $arr = $renwu->showOption($currentTypeId);
        $this->assign("arr",$arr);
    	$this->assign("re",$re);
        $this->assign("id",$pid);
    	return view('product/update');
    }
        /*
*名 称: save()
* 功 能:保存修改产品,
* 参 数: $_POST
  返 回 值:  $re是修改该产品的数据
 */
    public function save()
    {
         $id = $_POST['uid'];
        unset($_POST['uid']);
    	 $pid = $_POST['id'];
        unset($_POST['id']);
        $_POST['pid'] = $pid;
        $renwu = new Renwu;
        $taskId = $_POST['taskId'];
        $name = $renwu->upd($taskId);
        $_POST['taskName'] = $name['name'];
        $_POST['addTime'] = time();
       $file = request()->file('bigPic');
        $middlePic = request()->file('middlePic');
        $smallPic = request()->file('smallPic');
        $data=$_POST;
        if(isset($file)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $file->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['bigPic']=$imgpath;
            $imagename = $_POST['bigPic'];
              if($imagename != null){
                  @unlink("__ROOT__/".$imagename);
                }
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
          if(isset($middlePic)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $middlePic->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'); 
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['middlePic']=$imgpath;
            $imagename = $_POST['middlePic'];
              if($imagename != null){
                  @unlink("__ROOT__/".$imagename);
                }
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }
          if(isset($smallPic)){        // 成功上传后 获取上传信息        // 输出 jpg
        $info = $smallPic->validate(['size'=>1567118,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'); 
            if($info){    
            $a=$info->getSaveName();  
            $imgp= str_replace("\\","/",$a);  
            $imgpath='uploads/'.$imgp;  
            $data['smallPic']=$imgpath;
            $imagename = $_POST['smallPic'];
              if($imagename != null){
                  @unlink("__ROOT__/".$imagename);
                }
           }else{        // 上传失败获取错误信息        
            echo $file->getError(); 
            }  
             }

    	$links= new Links;
    	$re =$links->where("id={$id}")->update($data);
    	if($re){
			$this->redirect('product/index2',array('pid'=>"$pid",'id'=>"$id"));
		}else{
			$this->error("修改失败",'update');
		}
	}
/*
*名 称: addSreve()
* 功 能:添加产品服务,
* 参 数: $_POST
  返 回 值: $db被受影响的行数
 */
  public function addSreve(){
    $pid = $_POST['pid'];
    $re= \think\Db::name('product_serve')->where("pid=$pid")->find();
    if($re == null){
    $_POST['addTime'] = time();
    $user = new Sreve($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();
     if($db){
                    return json($db); 
                }else{
                   exit;
                }
      }else{
    $id = $re['id'];
    $_POST['addTime'] = time();
    $res =  \think\Db::name('product_serve')->where("id=$id")->update($_POST); 
    if($res){
                    return json($id); 
                }else{
                   exit;
                }
      }
  }
  /*
* 名 称: addFlow()
* 功 能:添加产品流程,
* 参 数: $_POST
  返 回 值: $db被受影响的行数
 */
  public function addFlow(){
    $pid = $_POST['pid'];
    $_POST['addTime'] = time();
    $user = new Flow($_POST);
      // 过滤post数组中的非数据表字段数据
     $db=$user->allowField(true)->save();

     $re = $user->sel($pid);
     if($db){
                    return json($re); 
                }else{
                   exit;
                }
  }
  /*
* 名 称: selFlow()
* 功 能:查询产品流程,
* 参 数: $re产品流程数据
  返 回 值: $db被受影响的行数
 */
  public function selFlow(){
    $flow = new Flow;
    $id = $_POST['id'];
    $re = $flow->upd($id);
    if($re != null){
                    return json($re); 
                }else{
                   exit;
                }
  }
   /*
* 名 称: saveFlow()
* 功 能:查询产品流程,
* 参 数: $re产品流程数据
  返 回 值: $db被受影响的行数
 */
  public function saveFlow(){
    $flow = new Flow;
    $id = $_POST['id'];
    unset($_POST['id']);
     $_POST['addTime'] = time();
    $re = $flow->where("id=$id")->update($_POST);
    if($re != null){
                    return json($re); 
                }else{
                   exit;
                }
  }
/*
* 名 称: delFlow()
* 功 能:删除产品流程,
* 参 数: $id为产品ID
  返 回 值: $re被受影响的行数
 */
  public function delFlow(){
    $flow = new Flow;
    $id = $_POST['id'];
    $re = $flow->where("id=$id")->delete();
    if($re != null){
                    return json($re); 
                }else{
                   exit;
                }
  }
  /*
* 名 称: plus()
* 功 能:向上排序,
* 参 数: $id为产品ID
  返 回 值: $show被受影响的行数
 */
  public function plus(){
      $id = $_POST['id'];
     $flow = new Flow;
     $re = $flow->where("id=$id")->find();
     $sort = ++$re['sort'];
    $show = \think\Db::name('product_flow')->where("id=$id")->setField('sort',"$sort");
    
     if($show){
                    return json($show); 
                }else{
                   exit;
                }
    }
     /*
* 名 称: minus()
* 功 能:向下排序,
* 参 数: $id为产品ID
  返 回 值: $show被受影响的行数
 */
    public function minus(){
       $id = $_POST['id'];
     $flow = new Flow;
     $re = $flow->where("id=$id")->find();
     $sort = --$re['sort'];
    $show = \think\Db::name('product_flow')->where("id=$id")->setField('sort',"$sort");
    
     if($show){
                    return json($show); 
                }else{
                   exit;
                }
    }
}
