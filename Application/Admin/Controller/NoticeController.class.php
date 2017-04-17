<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class NoticeController extends CommonController {
	//加载公告列表页
	public function index(){
		//实例化notice信息操作对象
		$mod = M("notice");
		//搜索
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];

		$content = $_GET['content'];
		$data[$search] = array('like',"%$content%");
		//分页
		$page = new Page($mod->where($data)->count(),4);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$res = $mod -> where($data) -> limit($page->firstRow,$page->listRows)->order('id desc')->select();

		//分页链接
		$url = $page ->show();
		// dump($url);exit;
		$this ->assign('url',$url);
		$this -> assign('search',$search);
		$this -> assign('content',$content);
		//获取信息，放置模板
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
	}
	//加载公告添加页
	public function add(){
		$this -> display("add");
	}

	//执行添加公告
	public function insert(){
		// var_dump($_POST);die;
		$rules = array(
				array('title','require','公告标题必须填写'),
				array('contents','require','公告内容必须填写'),
			);
		//获取添加时间
		$_POST['add_time'] = date("Y-m-d H:i:s",time());
		$_POST['nid'] = session('ad')['id'];
		//实例化notice信息操作对象
		$mod = M('notice');
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//添加数据
			$res = $mod -> add();
			if($res){
				$this -> success('添加成功',U("Notice/index"));

			}else{
				$this -> error('添加失败');
			}
		}
	}

	//加载公告编辑表单
	public function edit(){
		//实例化notice信息操作对象
		$mod = M("notice");
		//判断用户权限
		$nid = session('ad')['id'];
		$nidn = $mod -> where('id='.I('id')) -> getField('nid');
		//判断是否为超级管理员
		$admin = M('admin');
		$auth = $admin -> where('id='.$nid) -> getField('auth');
		if($nid == $nidn || $auth ==1){
			//加载要修改的信息
			$this -> assign("vo",$mod->find(I('id')));
			//加载模板
			$this -> display("edit");
		}else{
			$this -> error('您没有权限');
		}
		
	}

	//执行编辑公告
	public function update(){
		//实例化notice信息的操作对象
		$mod = M("notice");
		$rules = array(
				array('title','require','公告标题必须填写'),
				array('contents','require','公告内容必须填写'),
			);
		//初始化封装
		$_POST['id'] = $_GET['id'];
		if(!$mod -> validate($rules) -> create($_POST)){
			exit($mod -> getError());
		}else{
			//执行修改
			$res = $mod -> save();
			if($res){
				$this -> success('修改成功',U("Notice/index"));
			}else{
				$this -> error('修改失败');
			}
		}
		
	}

	//删除公告
	public function del(){
		//实例化notice信息的操作对象
		$mod = M("notice");
		//判断用户是否有权限
		$nid = session('ad')['id'];
		$nidn = $mod -> where('id='.I('id')) -> getField('nid');
		//判断用户是不是超级管理员
		$admin = M('admin');
		$auth = $admin -> where('id='.$nid) -> getField('auth');
		if($nid == $nidn || $auth == 1){
			$map['id'] = $_GET['id'];
			$res = $mod -> where($map) -> delete();
			if($res){
				$this -> success('删除成功',U("Notice/index"));
			}else{
				$this -> error('删除失败');
			}
		}else{
			$this -> error('您没有权限');
		}
	}
}