<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize(){
		//先调用钩子
		//检测用户是否登录
		if(empty($_SESSION['ad'])){
			//访问任何控制器或者方法，需要先进行登录验证
			$this -> redirect("Admin/Login/index");
		}
		// echo "test<br/>";
		// 获取权限 -- URL中访问的控制器和方法
		$nodelist=$_SESSION['nodelist'];
		$con = CONTROLLER_NAME;
		$act = ACTION_NAME;
// array(
//       'Media' => array(index,add,edit,del ),

//       );
//       检测是否有权限
// dump($nodelist);die;
		if(empty($nodelist[$con]) || !in_array($act, $nodelist[$con])){
			// echo "没有权限";
			$this -> error('您没有权限',U("Admin/Index/index"));
			// die('没有权限');
		}
	}

	
		
		
		
	

	
		
	
	

}