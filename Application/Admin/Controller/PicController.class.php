<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class PicController extends CommonController {
	//加载稿件主页
	public function index(){
		//实例化表信息操作对象
		// dump($_SESSION);
		$mod = M("pic");
		// 设置查询
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];
		//分页
		//添加搜索内容
		$content = $_GET['content'];
		$data[$search] = array('like',"%$content%");

		$page = new Page($mod->where($data)->count(),10);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$res = $mod->where($data)->limit($page->firstRow,$page->listRows)->order(' addtime desc, id desc')->select();
		
		//分页链接
		$url = $page ->show();
		// dump($url);exit;
		$this -> assign('search',$search);
		$this -> assign('content',$content);
		$this ->assign('url',$url);
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
	}
	
	//加载稿件添加页
	public function add(){
		$this -> display("add");
	}

	//添加新闻
	public function insert(){
		// dump($_POST);dump($_FILES);die;
		//如果有图片的话处理图片
		if($_POST['type'] == "考古发现"){
		    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     './Public'; // 设置附件上传根目录
		    $upload->savePath  =     './Uploads/'; // 设置附件上传（子）目录
		    // 上传文件 
		    $info   =   $upload->upload();
		    if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		    }
		    $_POST['mastermap'] = ltrim($info['mastermap']['savepath'],'.').$info['mastermap']['savename'];
		}
		//获取添加时间
		$_POST['addtime'] = date("Y-m-d");
		//验证用户提交的信息
		$rules = array(
			array('title','require','标题必须填写！'), 
			array('content','require','新闻内容必须填写！'), 
			);
		//判断新闻类型是否选择
		if(empty($_POST['type'])){
			$this -> error('新闻类型必须选择，请选择');
		}
		//实例化news信息操作对象
		$mod = M('pic');
		//添加数据
		if(!$mod -> validate($rules) -> create()){
			//如果创建失败，表示验证没有成功
			exit($mod -> getError());
		}else{
			$res = $mod -> add($_POST);
			if($res){
				$this -> success('恭喜添加新闻成功',U("Pic/index"));

			}else{
				$this -> error('抱歉添加新闻失败');
			}
		}
	}

	//加载编辑表单
	public function edit(){
		//实例化信息操作对象
		$mod = M("pic");
		//判断用户是否有权限
		$this -> sta();
		$id = intval(I('id'));
		$res = $mod -> find($id);
		//判断新闻是否已经启用
		if($res['status'] == 1){
			$this -> error('该新闻已启用，请禁用后再编辑');
		}
		//判断新闻归属
		if($res['username'] != session('user')['username']){
			$this -> error('抱歉您没有权限');
		}
		//加载类别
		$type = M('news_type');
		$list = $type -> select();
		$this -> assign('list',$list);
		//加载要修改的信息
		$this -> assign("res",$res);
		//加载模板
		$this -> display("edit");
	}

	//执行编辑稿件
	public function update(){
		//实例化news信息的操作对象
		// dump($_POST);die;
		//如果有图片的话处理图片
		if($_POST['type'] == "考古发现"){
		    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     './Public'; // 设置附件上传根目录
		    $upload->savePath  =     './Uploads/'; // 设置附件上传（子）目录
		    // 上传文件 
		    $info   =   $upload->upload();
		    if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		    }
		    $_POST['mastermap'] = ltrim($info['mastermap']['savepath'],'.').$info['mastermap']['savename'];
		}

		$mod = M("pic");
		$id = intval($_GET['id']);
		$_POST['updatetime'] = date("Y-m-d");
		$rules = array(
			array('title','require','标题必须填写！'), 
			array('content','require','新闻内容必须填写！'), 
			);
		//判断新闻类型是否选择
		if(empty($_POST['type'])){
			$this -> error('新闻类型必须选择，请选择');
		}
		//执行修改
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//先删除原有数据再进行添加
			$r = $mod -> delete($id);
			$res = $mod -> add($_POST);
			if($res && $r){
				$this -> success('恭喜修改成功', U("Pic/index"));
			}else{
				$this -> error('抱歉修改失败');
			}
		}

		
	}

	//删除新闻
	public function del(){
		//实例化news信息的操作对象
		$mod = M("pic");
		//判断用户是否有权限
		$this -> sta();
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if($res['username'] != session('user')['username']){
			$this -> error('抱歉您没有权限');
		}
		//判断新闻是否启用
		if($res['status'] == 1){
			$this -> error('新闻已经启用，请禁用之后删除');
		}
		//执行删除
		$r = $mod -> delete($id);
		if($r){
			$this -> success('恭喜删除成功', U('Pic/index'));
		}else{
			$this -> error('抱歉删除失败');
		}
		
	}

	//新闻的禁止与启用
	public function status(){
		// var_dump($_GET);die;
		//实例化news表
		$mod = M("pic");
		//判断用户是否有权限操作
		$this -> sta();
		//执行禁用与启用
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if($res['status'] == 0){
			$data['id'] = $id;
			$data['status'] = 1;
			$r = $mod -> save($data);
			if($r){
				$this -> success('恭喜启用成功', U("Pic/index"));
			}else{
				$this -> error('抱歉启用失败');
			}
		}elseif($res['status'] == 1){
			$data['id'] = $id;
			$data['status'] = 0;
			$r = $mod -> save($data);
			if($r){
				$this -> success('恭喜禁用成功', U("Pic/index"));
			}else{
				$this -> error('抱歉禁用失败');
			}
		}

	}

	//判断用户是否有权限
	public function sta(){
		$uid = session('user')['id'];
		$sta = M("users_role");
		$status = $sta -> where('uid="'.$uid.'"') -> select();
		$rid = [];
		foreach ($status as $v) {
			$rid[] = $v['rid'];
		}
		if(!in_array(1, $rid) && !in_array(2, $rid)){
			$this -> error("抱歉您没有权限!");
		}
	}
		
	//查看新闻
	public function look(){
		$id = intval(I('id'));
		//实例化表信息
		$mod = M('pic');
		//判断用户是否有权限
		$this -> sta();
		$res = $mod -> find($id);
		if($res){
			$this -> assign('res',$res);
			$this -> display('look');
		}else{
			$this -> error('抱歉查看失败！');
		}
	}
}