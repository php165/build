<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Org\Net\IpLocation;//获取客户ip地址的类
class RoleController extends CommonController {
	
	//加载会员列表页
	public function index(){
		//实例化信息操作对象
		$mod = M("role");
		//设置查询
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];
		//判断搜索类型
		if($_GET['searchtype'] == 'id'){
			//用户输入的内容进行转换
			$id = intval($_GET['content']);
			$res = $mod -> where('id='.$id) -> select();
		}else{
			$content = $_GET['content'];
			$data[$search] = array('like' , "%$content%");
			//分页
			$page = new Page($mod->where($data)->count(),5);//参数
			//设置配置样式
			$page -> setConfig('prev','上一页');
			$page -> setConfig('next','下一页');
			$res = $mod -> where($data) -> limit($page->firstRow,$page->listRows)->order('addtime desc')->select();
			// dump($res);
			//分页链接
			$url = $page ->show();
			$this -> assign('content',$content);
			$this -> assign('search',$search); 
			$this ->assign('url',$url);
		}
		
		//获取信息，放置模板
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
		// dump($_GET);
	}
	//加载角色添加页
	public function add(){
		//获取权限数据
		$mod = M('node');
		$node = $mod -> where('salt=1') -> select();
		// dump($node);die;
		//处理数据
		$data=[];
		foreach ($node as $v) {
			$data[$v['name']] = $mod -> where('pid="'.$v['id'].'"') -> select();

		}
		$this -> assign('list',$data);
		$this -> display("add");
	}

	//执行添加角色
	public function insert(){
		// dump($_POST);
		//实例化users信息操作对象
		$mod = M('role');
		//获取数据
		$rules = array(     
			array('role','require','角色名必须填写！'), 
			array('role','','角色名已经存在！',0,'unique',1),
		);
		if(!$_POST['nid']){
			$this -> error('角色权限必须选择');
		}
		//获取添加时间
		$_POST['addtime'] = date("Y-m-d");
				
		//添加数据
		if(!$mod -> validate($rules) -> create()){
			//验证规则失败时
			exit($mod -> getError());
		}else{
			//验证通过时
			$res = $mod -> add();
			//添加角色权限
			$rid = $res;
			$data = [];
			foreach ($_POST['nid'] as $v) {
				$data['nid'] = $v;
				$data['rid'] = $rid;
				//执行添加权限
				$rr = M('role_node') -> add($data);
				// dump($data);die;
			}
			if($res && $rr){
				$this -> success('恭喜添加成功',U("Role/index"));
			}else{
				$this -> error('抱歉添加失败');
			}
		}
		
	}

	//加载编辑表单
	public function edit(){
		//实例化表信息
		$mod = M('role');
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此角色不存在，请重新选择',U('Role/index'));
		}
		// //判断角色是否启用
		// if($res['status']==0){
		// 	$this -> error('该角色已启用，请先禁用');
		// }
		$this -> assign('res',$res);
		$this -> display('edit');
	}

	//执行修改
	public function update(){
		//验证信息
		$rules = array(     
			array('role','require','角色名必须填写！'), 
			array('role','','角色名已经存在！',0,'unique',1),
		); 
		$mod = M("role");
		//修改
		$_POST['updatetime'] = date("Y-m-d");
		$_POST['id'] = $_GET['id'];
		// dump($_POST);die;
		if(!$mod -> validate($rules) -> create()){
			//验证规则失败时
			exit($mod -> getError());
		}else{
			//验证通过时
			$res = $mod -> save($_POST);
			if($res){
				$this -> success('恭喜修改成功',U("Role/index"));
			}else{
				$this -> error('抱歉修改失败');
			}
		}
	}

	//删除角色员
	public function del(){
		//实例化信息的操作对象
		$mod = M("role");
		$id = intval(I('id'));
		$u = $mod -> find($id);
		if(!$u){
			$this -> error('此角色不存在，请重新选择', U('Role/index'));
		}

		$status = M('users_role as ur') -> join('__USERS__ as u on u.id = ur.uid') -> where('u.id="'.session('user')['id'].'"') -> select();
		$rid = [];
		foreach ($status as $v ) {
			$rid[] = $v['rid'];
		}
		//判断用户是否有权限删除
		if(!in_array(1, $rid)){
			$this -> error('抱歉您没有权限操作',U('Role/index'));
		}
		// //判断要删除的管理员是否启用
		// if($u['status'] == 0){
		// 	$this -> error("该角色已启用，请先禁用");
		// }
		//执行删除
		$res = $mod -> delete($id);
		//删除角色权限
		$r = M('role_node') -> where('rid="'.$id.'"') -> delete();
		if($res && $r){
			$this -> success("恭喜删除成功!", U("Role/index"));
		}else{
			$this -> error("抱歉删除失败");
		}
	}

	//禁用角色
	public function status(){
		//判断是否存在此角色
		$user = M('role');
		$id = intval(I('id'));
		$u = $user -> find($id);
		if(!$u){
			$this -> error('此角色不存在，请重新选择', U('Role/index'));
		}
		if($u['status'] == 1){
			//角色未启用，现在启用
			$data['status'] = 0;
			$data['id'] = $id;
			$res = $user -> save($data);
			if($res){
				$this -> success("恭喜启用成功", U("Role/index"));
			}else{
				$this -> error("抱歉启用失败");
			}
		}
		if($u['status'] == 0){
			$data['status'] = 1;
			$data['id'] = $id;
			$res = $user -> save($data);
			if($res){
				$this -> success("恭喜禁用成功", U("Role/index"));
			}else{
				$this -> error("抱歉禁用失败");
			}
		}
	}
		
}