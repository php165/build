<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class AdminController extends CommonController {
	
	//加载管理员列表页
	public function index(){
		//实例化admin信息操作对象
		$mod = M("admin");
		//分页
		$page = new Page($mod->count(),10);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$res = $mod -> limit($page->firstRow,$page->listRows)->order('id desc')->select();

		//分页链接
		$url = $page ->show();
		// dump($url);exit;
		$this ->assign('url',$url);
		//获取信息，放置模板
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
	}

	//加载管理员添加页
	public function add(){
		$this -> display("add");
	}

	//执行添加管理员
	public function insert(){
		//实例化admin信息操作对象
		// dump($_POST);die;
		$rules = array(
				array('admin','require','管理员名必须填写'),
				array('admin','','管理员名已经存在',0,'unique',1),//在新增的时候验证admin字段是否唯一
				array('password','require','密码必须填写'),
				array('repassword','password','确认密码不正确',0,'confirm'),//验证确认密码是否和密码一致
				array('auth','require','管理员权限必须填写'),
			);
		$mod = M('admin');
		$_POST['password'] = md5($_POST['password']);
		$_POST['repassword'] = md5($_POST['repassword']);
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//添加管理员

			$res = $mod -> add();
			if($res){
				//添加管理员权限到admin_role表
				$data['uid'] = $res;
				$data['rid'] = I('auth');
				//实例化admin_role表
				$rmod = M('admin_role');
				$rmod -> add($data);
				$this -> success('恭喜管理员添加成功!',U('Admin/index'));
			}else{
				$this -> error('抱歉管理员添加失败!');
			}	
		}
	}

	//加载管理员编辑表单
	public function edit(){
		//实例化admin信息操作对象
		$mod = M("admin");
		//判断用户提交的信息
		$id = I('id');
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('抱歉您没有权限操作!');
		}
		//加载要修改的信息
		$this -> assign("vo",$mod->find(I('id')));
		//加载模板
		$this -> display("edit");
	}

	//执行编辑管理员
	public function update(){
		//实例化admin信息的操作对象
		$mod = M("admin");
		//判断用户提交的信息
		$rules = array(
				array('admin','require','管理员名称必须填写'),
			);
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//更新数据
			$res = $mod -> save();
			if($res){
				$this -> success('修改成功',U("Admin/index"));
			}else{
				$this -> error('修改失败');
			}
		}
		
	}

	//删除管理员
	public function del(){
		//实例化admin信息的操作对象
		$mod = M("admin");
		$map['id'] = I('id');
		$res = $mod -> where($map) -> delete();
		//删除关联表的权限
		$role = M('admin_role');
		$r['uid'] = I('id');
		$rr = $role -> where($r) -> delete();
		if($res){
			$this -> success('删除成功',U("Admin/index"));
		}else{
			$this -> error('删除失败');
		}
	}

	//加载修改角色表单
	public function role($id){
		// echo $id;die;
		//判断用户提交的数据是否正确
		//获取用户的权限值
		$auth = M('admin');
		$admin = $auth -> find($id);
		if(!$admin){
			$this -> error('抱歉您没有权限操作');
		}
		//查询管理员的所有种类
		$role = M('role');
		$res = $role -> select();
		// dump($res);die;
		//加载用户信息
		$this -> assign('admin',$admin);
		// 查询用户所拥有的权限
		$mod = M('admin_role');
		$data = $mod -> where('uid='.$admin['id']) -> select();
		// dump($data);die;
		//处理数据
		$arr=[];
		foreach($data as $v){
			$arr[]=$v['rid'];
		}
		// dump($arr);die;
		$this -> assign('list1',$arr);
		$this -> assign('list',$res);
		$this -> display("role");
	}

	//执行修改角色
	public function updaterole(){
		// dump($_POST);die;
		//先删除用户的所有角色
		$mod = M('admin_role');
		$mod -> where('uid='.$_POST['id']) -> delete();
		//添加用户新的角色
		foreach ($_POST['rid'] as $v) {
			$data['rid'] = $v;
			$data['uid'] = $_POST['id'];
			$mod -> add($data);
			//更新admin表中管理员的权限
			$admin = M('admin');
			$map['id'] = $_POST['id'];
			$map['auth'] = $v;
			//执行修改
			$admin -> save($map);
			
		}
		$this -> success('修改角色成功',U('Admin/index'));
	}

}