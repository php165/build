<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
	//加载后台主页
	public function index(){
		$user = session('user')['username'];
		$this -> assign('user',$user);
		$this -> display("index");
	}	

	//加载修改密码页
	public function pass(){
		$user = session('user')['username'];
		$this -> assign('user',$user);
		$this -> display('pass');
	}

	//执行修改密码
	public function updatePass(){
		//判断密码是都正确
		$rules = array(
				array('oldpass','require','初始密码必填'),
				array('repass','newpass','确认密码不正确',0,'confirm'), 
			);
		//判断原密码输入是否正确
		$id = session('user')['id'];
		$mod = M('users');
		$res = $mod -> find($id);
		if($res['password'] != md5(md5(I('oldpass')).$res['salt'])){
			$this -> error('初始密码输入错误');
		}
		$data['password'] = md5(md5(I('newpass')).$res['salt']);
		$data['id'] = $id;
		if(!$mod -> validate($rules) -> create($data)){
			exit($mod -> getError());
		}else{
			$r = $mod -> save();
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

}