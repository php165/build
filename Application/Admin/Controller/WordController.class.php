<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class WordController extends CommonController {
	
	//加载过滤词列表页
	public function index(){
		//实例化stop_word信息操作对象
		$mod = M("stop_word");
		//搜索
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];
		//判断类型
		if($_GET['searchtype'] == 'id'){
			//用户输入的内容进行转换
			$id = intval($_GET['content']);
			$res = $mod -> where('id='.$id) -> select();
		}else{
			//分页
			$content = $_GET['content'];
			$data[$search] = array('like',"%$content%");

			$page = new Page($mod->where($data)->count(),10);//参数
			//设置配置样式
			$page -> setConfig('prev','上一页');
			$page -> setConfig('next','下一页');
			$res = $mod -> where($data) -> limit($page->firstRow,$page->listRows)->order('id desc')->select();

			//分页链接
			$url = $page ->show();
			// dump($url);exit;
			$this ->assign('url',$url);
		}
		$this -> assign('search',$search);
		$this -> assign('content',$content);
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
	}
	//加载过滤词添加页
	public function add(){
		$this -> display("add");
	}

	//执行添加过滤词
	public function insert(){
		// var_dump($_POST);die;
		//获取数据
		$rules = array(
				array('word','require','违禁词必须填写'),
			);
		//获取添加时间
		$_POST['add_time'] = date("Y-m-d H:i:s",time());
		$_POST['wid'] = session('ad')['id'];
		//实例化stop_word信息操作对象
		$mod = M('stop_word');
		//添加数据
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			$res = $mod -> add();
			if($res){
				$this -> success('添加成功',U("Word/index"));

			}else{
				$this -> error('添加失败');
			}
		}
	}

	//加载过滤词编辑表单
	public function edit(){
		//实例化stop_word信息操作对象
		$mod = M("stop_word");
		//判断用户权限
		$wid = session('ad')['id'];
		$widw = $mod -> where('id='.I('id')) -> getField('wid');
		if($wid != $widw){
			$this -> error('您没有权限操作');
		}
		//判断是否启用
		$status = $mod -> where('id='.I('id')) -> getField('status');
		if(empty($status)){
			$this -> error('该违禁词已经启用，请禁用之后在进行编辑');
		}
		//加载要修改的信息
		$this -> assign("vo",$mod->find(I('id')));
		//加载模板
		$this -> display("edit");
	}

	//执行编辑过滤词
	public function update(){
		//实例化stop_word信息的操作对象
		$mod = M("stop_word");
		//初始化封装
		$_POST['id'] = $_GET['id'];
		$rules = array(
				array('word','require','违禁词必须填写'),
				array('word','','违禁词已经存在',0,'unique',1),
			);
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//执行修改
			$res = $mod -> save();
			if($res){
				$this -> success('修改成功',U("Word/index"));
			}else{
				$this -> error('修改失败');
			}
		}
		
	}

	//删除过滤词
	public function del(){
		//实例化stop_word信息的操作对象
		$mod = M("stop_word");
		//判断用户权限
		$wid = session('ad')['id'];
		$widw = $mod -> where('id='.I('id')) -> getField('wid');
		if($wid != $widw){
			$this -> error('您没有权限操作');
		}
		//判断是否启用
		$status = $mod -> where('id='.I('id')) -> getField('status');
		if(empty($status)){
			$this -> error('该违禁词已经启用，请禁用之后在进行删除');
		}
		$map['id'] = $_GET['id'];
		$res = $mod -> where($map) -> delete();
		if($res){
			$this -> success('删除成功',U("Word/index"));
		}else{
			$this -> error('删除失败');
		}
	}

	//禁用过滤词
	public function stop(){
		// var_dump($_GET);die;
		//实例化stop_word表
		$mod = M("stop_word");
		//判断用户权限
		$wid = session('ad')['id'];
		$auth = session('ad')['id'];
		$widw = $mod -> where('id='.I('id')) -> getField('wid');
		if($wid == $widw || $auth ==1){
			$map['id'] = I('id');
			$map['status'] = 1;
			$res = $mod -> save($map);
			if($res){
				$this -> success('禁用成功',U('Word/index'));
			}else{
				$this -> error('禁用失败');
			}
		}else{
			$this -> error('您没有权限操作');
		}
		

	}
	//启用过滤词
	public function start(){
		// var_dump($_GET);die;
		//实例化stop_word表
		$mod = M("stop_word");
		//判断用户权限
		$wid = session('ad')['id'];
		$auth = session('ad')['id'];
		$widw = $mod -> where('id='.I('id')) -> getField('wid');
		if($wid == $widw || $auth ==1){
			$map['id'] = I('id');
			$map['status'] = 0;
			$res = $mod -> save($map);
			if($res){
				$this -> success('启用成功',U('Word/index'));
			}else{
				$this -> error('启用失败');
			}
		}else{
			$this -> error('您没有权限操作');
		}
		
	}

}