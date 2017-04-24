<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
	//加载后台主页
	public function index(){
		$user = session('user')['username'];
		//当日新增文章数
		$mod = M('article');
		$addtime = date('Y-m-d');
		$data['addtime'] = array('like',"%$addtime%");
		$daynum = $mod -> where($data) -> count();
		// dump($daynum);die;
		$this -> assign('daynum',$daynum);
		//当月新增文章数
		$addtime = date('Y-m');
		$data['addtime'] = array('like',"%$addtime%");
		$daymonth = $mod -> where($data) -> count();
		// dump($daymonth);die;
		$this -> assign('daymonth',$daymonth);

		$this -> assign('user',$user);
		// dump($_SESSION);die;
		$this -> display("index");

	}	

	//加载修改密码页
	public function pass(){
		$user = session('user')['username'];
		$this -> assign('user',$user);
		$this -> display('pass');
	}

	//执行修改密码
	public function updatepass(){
		
		//判断原密码输入是否正确
		$id = session('user')['id'];
		$mod = M('users');
		$res = $mod -> find($id);
		if(!I('oldpass') || $res['password'] != md5(md5(I('oldpass')).$res['salt'])){
			$this -> error('初始密码输入错误');
		}
		//新密码输入是否一致
		if(I('newpass') != I('repass') || !I('newpass') || !I('repass')){
			$this -> error('两次密码输入不一致，请重新输入');
		}
		$data['password'] = md5(md5(I('newpass')).$res['salt']);
		$data['id'] = $id;
		
		$r = $mod -> save($data);
		if($r){
			//清除session
			session_unset();
  			session_destroy();
			$this -> success('恭喜密码修改成功,请重新登陆',U('Login/index'));
		}else{
			$this -> error('抱歉密码修改失败');
		}
		

	}

}