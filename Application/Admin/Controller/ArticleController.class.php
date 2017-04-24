<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class ArticleController extends CommonController {
	
	public function index(){
		//实例化表信息操作对象
		// dump($_SESSION);
		$mod = M("article");
		// 设置查询
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];
		//分页
		//添加搜索内容
		$contents = $_GET['contents'];
		$data[$search] = array('like',"%$contents%");

		$page = new Page($mod->where($data)->count(),10);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$res = $mod->where($data)->limit($page->firstRow,$page->listRows)->order(' addtime desc, id desc')->select();
		
		//分页链接
		$url = $page ->show();
		// dump($url);exit;
		$this -> assign('search',$search);
		$this -> assign('contents',$contents);
		$this ->assign('url',$url);
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
	}
	
	//加载添加页
	public function add(){
		//分类信息
		$mod = M('type');
		$data['status'] = 1;
		$data['salt'] = 1;
		$res1 = $mod -> where($data) -> order('path asc') -> select();
		$this -> assign('res1',$res1);
		$this -> display("add");
	}

	//ajaxType三级分类联动
	public function ajaxType(){
		//实例化表信息
		$mod = M('type');
		if(I(salt)==2){
			//二级分类获取
			$id = I('id');
			$data['pid'] = $id;
			$data['status'] = 1;
			$res = $mod -> where($data) -> select();
			if($res){
				$this -> ajaxReturn($res);
			}
		}
		elseif(I(salt)==3){
			//三级分类获取
			$id = I('id');
			$data['pid'] = $id;
			$data['status'] = 1;
			$res = $mod -> where($data) -> select();
			if($res){
				$this -> ajaxReturn($res);
			}
		}

	}

	//添加
	public function insert(){
		// dump($_POST);dump($_FILES);die;
		//如果有图片处理图片
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
		// dump($_POST);die;
		//获取添加时间
		$_POST['addtime'] = date("Y-m-d");
		//验证用户提交的信息
		$rules = array(
			array('title','require','标题必须填写！'), 
			array('content','require','内容必须填写！'), 
			array('columnone','require','分类必须选择！'), 
			);
		//实例化表信息操作对象
		$mod = M('article');
		//添加数据
		if(!$mod -> validate($rules) -> create()){
			//如果创建失败，表示验证没有成功
			exit($mod -> getError());
		}else{
			$res = $mod -> add($_POST);
			if($res){
				$this -> success('恭喜添加内容成功',U("Article/index"));

			}else{
				$this -> error('抱歉添加内容失败');
			}
		}
	}

	//加载编辑表单
	public function edit(){
		//实例化信息操作对象
		$mod = M("article");
		//判断用户是否有权限
		$this -> sta();
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此文章不存在');
		}
		// //判断是否已经启用
		// if($res['status'] == 1){
		// 	$this -> error('该文章已启用，请禁用后再编辑');
		// }
		//判断归属
		if($res['username'] != session('user')['username']){
			$this -> error('抱歉您没有权限');
		}
		//加载要修改的信息
		$this -> assign("res",$res);
		//加载模板
		$this -> display("edit");
	}

	//执行编辑稿件
	public function update(){
		//实例化信息的操作对象
		// dump($_POST);die;
		//处理图片
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
		

		$mod = M("article");
		$id = intval($_GET['id']);
		$_POST['id'] = $id;
		$_POST['updatetime'] = date("Y-m-d");
		$rules = array(
			array('title','require','标题必须填写！'), 
			array('content','require','内容描述必须填写！'),  
			);
		//执行修改
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			$res = $mod -> save($_POST);
			if($res){
				$this -> success('恭喜修改成功', U("Article/index"));
			}else{
				$this -> error('抱歉修改失败');
			}
		}

		
	}

	//删除
	public function del(){
		//实例化信息的操作对象
		$mod = M("article");
		//判断用户是否有权限
		$this -> sta();
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此文章不存在');
		}
		if($res['username'] != session('user')['username']){
			$this -> error('抱歉您没有权限');
		}
		// //判断是否启用
		// if($res['status'] == 1){
		// 	$this -> error('文章已经启用，请禁用之后删除');
		// }
		//执行删除
		$r = $mod -> delete($id);
		if($r){
			$this -> success('恭喜删除成功');
		}else{
			$this -> error('抱歉删除失败');
		}
		
	}

	//禁止与启用
	public function status(){
		// var_dump($_GET);die;
		//实例化表
		$mod = M("article");
		//判断用户是否有权限操作
		$this -> sta();
		//执行禁用与启用
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此文章不存在');
		}
		if($res['status'] == 0){
			$data['id'] = $id;
			$data['status'] = 1;
			$r = $mod -> save($data);
			if($r){
				$this -> success('恭喜启用成功', U("Article/index"));
			}else{
				$this -> error('抱歉启用失败');
			}
		}elseif($res['status'] == 1){
			$data['id'] = $id;
			$data['status'] = 0;
			$r = $mod -> save($data);
			if($r){
				$this -> success('恭喜禁用成功');
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
		
	//查看文章
	public function look(){
		$id = intval(I('id'));
		//实例化表信息
		$mod = M('article');
		//判断用户是否有权限
		$this -> sta();
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此文章不存在');
		}
		if($res){
			$this -> assign('res',$res);
			$this -> display('look');
		}else{
			$this -> error('抱歉查看失败！');
		}
	}

	//文章是否在首页显示
	public function istop(){
		//实例化表
		$mod = M('article');
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此文章不存在');
		}
		if($res['istop']==0){
			//执行显示
			$data['istop'] = 1;
			$data['id'] = $id;
			$r = $mod -> save($data);
			if($r){
				$this -> success('恭喜显示成功',U('Article/index'));
			}else{
				$this -> error('抱歉显示失败');
			}
		}elseif ($res['istop'] == 1) {
			//执行不显示
			$data['istop'] = 0;
			$data['id'] = $id;
			$r = $mod -> save($data);
			if($r){
				$this -> success('恭喜禁止显示成功',U('Article/index'));
			}else{
				$this -> error('抱歉禁止显示失败');
			}
		}
	}
}