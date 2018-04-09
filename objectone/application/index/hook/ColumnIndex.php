<?php
namespace app\index\hook;
use think\Db;
use app\index\model\Cebiantype as Cebiantype;
use app\index\model\Type as Types;
Class ColumnIndex
{

      /*
      *名 称: getSqlColumns()
      * 功 能: 获取当前管理员用户当前模块设置字段列,
      * 参 数: array("adminId"=>value,"blockId"=>value)
      * 返 回 值: 字段列
       */ 
	function getSqlColumns($params){

      	$rs = Db::table('ht_admin_columns')
            // ->field('ht_product.name,miaoshu,ht_product_property.name')
            ->field("tableName, columnKey, columnKeyDesc")
            ->join( 'ht_table_columns' , 'ht_admin_columns.columnId=ht_table_columns.id' )
            //->where('ht_admin_columns.adminId',1)
            ->where($params)
            ->buildsql();
            //->select();

		$columns = array('0'=>'ht_product.name', '1'=>'ht_product.miaoshu', '2'=>'ht_product_property.name' );

		return $columns;

	}

		//获取前端公共头部信息
      function getHeadInfo(){

       $Types = new Types;
       $Cebiantype = new Cebiantype;

       //导航栏 父栏目
       $pNavCats = $Types->getParentTypes();

       //导航栏 子栏目
       $cNavCats = $Types->getChildTypes();

       // var_dump( json_encode($pNavCats) );die;
       // dump($re);die;
       // $cebiantype = $Cebiantype->type();

       //导航栏 父栏目
       $pSideNavCats = $Cebiantype->getParentTypes();

       // array_pop($pSideNavCats);

       //导航栏 子栏目
       $cSideNavCats = $Cebiantype->getChildTypes();
/*var_dump($cSideNavCats);exit;
*/       $typeProducts = null;

       $index = 0;

       for($i = 0; $i < count( $pSideNavCats ); $i++ ){

          //导航栏 子栏目
          $childCats = $Cebiantype->getCtypesByPid( $pSideNavCats[$i]['id'] );

          
          for ($j=0; $j < count($childCats); $j++) {  
            
            $products = $Cebiantype->getProductsByPid( $childCats[$j]['id'] );   
            $childCats[$j]['products'] = $products;
          }
/*var_dump($childCats);exit;*/
          $pSideNavCats[$i]['typeProducts'] = $childCats;

          //通过以级父id获取置顶商品id
          $overheads = $Cebiantype->getOverheadsByPid($pSideNavCats[$i]['id'] );
          $pSideNavCats[$i]['overheads'] = $overheads;
// /*var_dump($overheads);exit;*/
          // $tempArrInfo = null;
          // $typeIndex = 0;
          // $productIndex = 0;
          // $overheads = null;
          // for($j = 0; $j < count( $childCats ); $j++ ){

          //   if($j == 0){
          //       $tempArrInfo[ $typeIndex ] ['title']= $childCats[$j]['title'];
          //       $tempArrInfo[ $typeIndex ] ['id']= $childCats[$j]['typeId'];
          //       $tempArrInfo[ $typeIndex ] ['name']= $childCats[$j]['typeName'];
          //       $tempArrInfo[ $typeIndex ] ['pid']= $childCats[$j]['pid'];
          //       $tempArrInfo[ $typeIndex ] ['key']= $childCats[$j]['key'];
          //       $tempArrInfo[ $typeIndex ] ['isShow']= $childCats[$j]['isShow'];
          //       $tempArrInfo[ $typeIndex ] ['url']= $childCats[$j]['url'];
          //       $tempArrInfo[ $typeIndex ] ['sort']= $childCats[$j]['sort'];
          //       $tempArrInfo[ $typeIndex ] ['content']= $childCats[$j]['content'];
          //       $tempArrInfo[ $typeIndex ] ['url']= $childCats[$j]['url'];
          //       // $typeIndex += 1;

          //       // $tempProducts[$productIndex]['productId'] = $childCats[$j]['productId'];
          //       // $tempProducts[$productIndex]['productName'] = $childCats[$j]['productName'];
          //       // $tempProducts[$productIndex]['top'] = $childCats[$j]['top'];
          //       // $tempProducts[$productIndex]['recommend'] = $childCats[$j]['recommend'];
          //       // $tempProducts[$productIndex]['overhead'] = $childCats[$j]['overhead'];
          //       // $tempArrInfo[ $typeIndex ]['products'] =  $tempProducts;
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['typeId'] = $childCats[$j]['typeId'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['pid'] = $childCats[$j]['pid'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['productId'] = $childCats[$j]['productId'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['productName'] = $childCats[$j]['productName'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['top'] = $childCats[$j]['top'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['recommend'] = $childCats[$j]['recommend'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['overhead'] = $childCats[$j]['overhead'];

          //       $productIndex += 1;
          //   }else{

          //       if($childCats[$j]["typeId"] != $childCats[$j-1]["typeId"]){
          //           $productIndex = 0;
          //           $typeIndex += 1;
          //           $tempArrInfo[ $typeIndex ] ['title']= $childCats[$j]['title'];
          //           $tempArrInfo[ $typeIndex ] ['id']= $childCats[$j]['typeId'];
          //           $tempArrInfo[ $typeIndex ] ['name']= $childCats[$j]['typeName'];
          //           $tempArrInfo[ $typeIndex ] ['pid']= $childCats[$j]['pid'];
          //           $tempArrInfo[ $typeIndex ] ['key']= $childCats[$j]['key'];
          //           $tempArrInfo[ $typeIndex ] ['isShow']= $childCats[$j]['isShow'];
          //           $tempArrInfo[ $typeIndex ] ['url']= $childCats[$j]['url'];
          //           $tempArrInfo[ $typeIndex ] ['sort']= $childCats[$j]['sort'];
          //           $tempArrInfo[ $typeIndex ] ['content']= $childCats[$j]['content'];
          //           $tempArrInfo[ $typeIndex ] ['url']= $childCats[$j]['url'];
          //           // $index += 1;
          //       }else{


          //       }

          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['typeId'] = $childCats[$j]['typeId'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['pid'] = $childCats[$j]['pid'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['productId'] = $childCats[$j]['productId'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['productName'] = $childCats[$j]['productName'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['top'] = $childCats[$j]['top'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['recommend'] = $childCats[$j]['recommend'];
          //       $tempArrInfo[ $typeIndex ]['products'][$productIndex]['overhead'] = $childCats[$j]['overhead'];
          //       $productIndex += 1;

          //   }

          //   $tempGoods[$j]['productId'] = $childCats[$j]['productId'];
          //   $tempGoods[$j]['productId'] = $childCats[$j]['productId'];
          //   $Products[$i] = $tempArrInfo;

            

          // }

          // $pSideNavCats[$i]['typeProducts'] = $tempArrInfo;
          // $pSideNavCats[$i]['overheads'] = array();
          // //$products[$i] = $tempGoods[]
          // var_dump(  json_encode($pSideNavCats[$i])  );
          // echo "</br>---------|||||||||||||||-------</br>";die;

       }

        // var_dump(  json_encode($pSideNavCats)  );
        //    echo "</br>-----+++++++++-----</br>";die;
       //侧边导航栏

       return $pSideNavCats;

    }

}