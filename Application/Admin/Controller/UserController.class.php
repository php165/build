<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Org\Net\IpLocation;//获取客户ip地址的类
class UserController extends CommonController {
	
	//加载会员列表页
	public function index(){
		//实例化users信息操作对象
		$mod = M("users");
		//设置查询
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];
		$content = $_GET['content'];
		if($_GET['searchtype']){
			$data[$_GET['searchtype']] = array('like',"%{$_GET['content']}%");
			// dump($data);die;
		}else{
			$data = '';
		}	
		//分页
		$page = new Page($mod->where($data)->count(),5);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$res = $mod
			-> alias('u')
			-> order('u.addtime desc')
		 	-> where($data) 
		 	-> limit($page->firstRow,$page->listRows)
		 	-> select();
		// dump($res);
		//分页链接
		$url = $page ->show();
		$this -> assign('content',$content);
		$this -> assign('search',$search); 
		$this ->assign('url',$url);
		
		
		//获取信息，放置模板
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
		// dump($_GET);
	}
	//加载管理员添加页
	public function add(){
		$mod = M('role');
		$res = $mod -> select();
		//获取信息，放置模板
		$this -> assign('res',$res);
		$this -> display("add");
	}

	//执行添加管理员
	public function insert(){
		// dump($_POST);die;
		//实例化users信息操作对象
		$mod = M('users');
		//获取数据
		$rules = array(     
			array('username','require','用户名必须填写！'), 
			array('username','','用户名已经存在！',0,'unique',1), 
			array('username','/^[\w]{3,11}$/','用户名只能是a-z并包含0-9|用户名长度必须在3-11之间',1,'regex',3), 
			array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致 
		);
		//判断用户是否选择了权限
		if(empty($_POST['auth'])){
			$this -> error('抱歉您没有选择权限，请选择');
		}
		//随机生成字符串
		$_POST['salt'] = mt_rand(1000,9999);
		//密码加密
		$_POST['password'] = md5(md5($_POST['password']).$_POST['salt']);
		$_POST['repassword'] = md5(md5($_POST['repassword']).$_POST['salt']);

		//获取添加时间
		$_POST['addtime'] = date("Y-m-d");
				
		//添加数据
		if(!$mod -> validate($rules) -> create()){
			//验证规则失败时
			exit($mod -> getError());
		}else{
			//验证通过时
			$res = $mod -> add();
			if($res){
				//添加权限信息到users_role表中
				$auth = I('auth');
				$uid = $res;
				$m = M('users_role');
				foreach ($auth as $v) {
					$data['uid'] = $uid;
					$data['rid'] = $v;
					$m -> add($data);
				}
				$this -> success('新增成功',U("User/index"));
			}else{
				$this -> error('新增失败');
			}
		}
		
	}

	//加载管理员修改权限表单
	public function edit(){
		//获取权限数据
		$mod = M('node');
		$node = $mod -> where('salt=1') -> select();
		// dump($node);die;
		//处理数据
		$data=[];
		foreach ($node as $v) {
			$data[$v['name']] = $mod -> where('pid="'.$v['id'].'"') -> select();

		}
		// dump($data);die;
		
		//管理员现有权限信息
		$id = intval(I('id'));
		$res = M('users') -> find($id);
		if(!$res){
			$this -> error('此管理员不存在',U('User/index'));
		}
		$rid = M('users_role') -> where('uid="'.$id.'"') -> find();
		$role = M('role') -> where('id="'.$rid['rid'].'"') -> find();
		$this -> assign('role',$role);
		$this -> assign('res',$res);
		// 权限信息
		$this -> assign('list',$data);
		$this -> display('edit');
		
	}

	//执行管理员权限修改
	public function update(){
		// dump($_POST);die;
		$id = I('id');
		//用户提交数据是否为空
		if(!$_POST['nid']){
			$this -> error('请选择权限');
		}
		//查看管理员rid
		$r = M('users_role') -> where('uid="'.$id.'"') -> find();
		//修改现在管理员权限
		$rid = $r['rid'];
		$mod = M('role_node');
		//先删除原有权限，再添加新的权限
		$res = $mod -> where('rid="'.$rid.'"') -> delete();
		foreach ($_POST['nid'] as $v) {
			$data['rid'] = $rid;
			$data['nid'] = $v;
			$res1 = $mod -> add($data);
		}
		//修改角色名字
		$res3 = M('role') -> where('role="'.I('role').'"') -> select();
		if($res3){
			$this -> error('该角色已经存在');
		}
		$da['id'] = $rid;
		$da['role'] = I('role');
		$res2 = M('role') -> save($da);

		if($res && $res1){
			$this -> success('恭喜修改成功',U('User/index'));
		}else{
			$this -> error('抱歉修改失败');
		}

	}

	//删除管理员
	public function del(){
		//实例化users信息的操作对象
		$mod = M("users");
		$id = intval(I('id'));
		$u = $mod -> find($id);
		if(!$u){
			$this -> error('此管理员不存在，请重新选择', U('User/index'));
		}

		$status = M('users_role as ur') -> join('__USERS__ as u on u.id = ur.uid') -> where('u.id="'.session('user')['id'].'"') -> select();
		$rid = [];
		foreach ($status as $v ) {
			$rid[] = $v['rid'];
		}
		//判断用户是否有权限删除
		if(!in_array(1, $rid)){
			$this -> error('抱歉您没有权限操作',U('User/index'));
		}
		// //判断要删除的管理员是否启用
		// if($u['status'] == 0){
		// 	$this -> error("该管理员已启用，请先禁用");
		// }
		//查看是否为超级管理员
		$role = $mod
			-> alias(u)
			-> join('anc_users_role as ur on ur.uid=u.id')
			-> join('anc_role as r on ur.rid = r.id')
			-> field('r.role')
			-> where('u.id="'.$id.'"')
			-> find();
			if($role['role'] == "超级管理员"){
				$this -> error('该管理员为超级管理员，禁止删除');
			}
		//执行删除
		$res = $mod -> delete($id);
		//删除users_role中的数据
		$r = M('users_role') -> where('uid="'.$id.'"') -> delete();
		if($res && $r){
			$this -> success("恭喜删除成功!", U("User/index"));
		}else{
			$this -> error("抱歉删除失败，请重试");
		}
	}

	//禁用管理员
	public function status(){
		//判断是否存在此管理员
		$user = M('users');
		$id = intval(I('id'));
		$u = $user -> find($id);
		if(!$u){
			$this -> error('此管理员不存在，请重新选择', U('User/index'));
		}
		if($u['status'] == 1){
			//管理员未启用，现在启用
			$data['status'] = 0;
			$data['id'] = $id;
			$res = $user -> save($data);
			if($res){
				$this -> success("恭喜启用成功", U("User/index"));
			}else{
				$this -> error("抱歉启用失败");
			}
		}
		if($u['status'] == 0){
			$data['status'] = 1;
			$data['id'] = $id;
			//查看是否为超级管理员
			$role = $user
				-> alias(u)
				-> join('anc_users_role as ur on ur.uid=u.id')
				-> join('anc_role as r on ur.rid = r.id')
				-> field('r.role')
				-> where('u.id="'.$id.'"')
				-> find();
				if($role['role'] == "超级管理员"){
					$this -> error('该管理员为超级管理员，禁止禁用');
				}
			$res = $user -> save($data);
			if($res){
				$this -> success("恭喜禁用成功", U("User/index"));
			}else{
				$this -> error("抱歉禁用失败");
			}
		}
	}	
}