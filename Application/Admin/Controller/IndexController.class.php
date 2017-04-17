<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	
	//加载后台主页
	public function index(){
		//实例化finance表信息
		$mod = M('finance');
		//已付款订单列表
		$res = $mod -> where('status=1') -> order('add_time desc') -> limit(10) -> select();
		$this -> assign('res',$res);
		//新加入会员列表
		$vip = M('vip');
		$data = $vip -> order('add_time desc') -> limit(10) -> select();
		$this -> assign('data',$data);
		//获取现在的日期
		$day = date('Y-m-d');
		//查询总流水数以及总金额
		//充值金额
		$map['status'] = 1;
		$map['project'] = '充值';
		$map['add_time'] = array('like',"%$day%");
		$da['account'] = (float)($mod -> where($map) -> sum('account'));
		//发布文章金额
		$mp['status'] = 1;
		$mp['project'] = '发布文章';
		$mp['add_time'] = array('like',"%$day%");
		$da['pay'] = (float)($mod -> where($mp) -> sum('account'));

		//查询总会员数
		//实例化vip信息表
		$modVip = M('vip');
		$p['add_time'] = array('like',"%$day%");
		$da['vip'] = $modVip -> where($p) -> count();
		//激活会员数
		$a['add_time'] = array('like',"%$day%");
		$a['status'] = 1;
		$da['payvip'] = $modVip -> where($a) -> count();
		$this -> assign('vo',$da);
		$admin = session('ad')['admin'];
		$this -> assign('admin',$admin);
		$this -> display("index");
	}	

	//加载修改密码页
	public function pass(){
		$admin = session('ad')['admin'];
		$this -> assign('admin',$admin);
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
		$id = session('ad')['id'];
		$mod = M('admin');
		$res = $mod -> find($id);
		if($res['password'] != md5(I('oldpass'))){
			$this -> error('初始密码输入错误');
		}
		$data['password'] = md5($_POST['newpass']);
		$data['id'] = session('ad')['id'];
		if(!$mod -> validate($rules) -> create($data)){
			exit($mod -> getError());
		}else{
			$r = $mod -> save();
			if($r){
				//清除session
				session('ad',null);
				$this -> success('恭喜密码修改成功,请重新登陆',U('Login/index'));
			}else{
				$this -> error('抱歉密码修改失败');
			}
		}

	}

}