<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class PicController extends CommonController {
	

	//加载轮播图列表
	public function index(){
		//获取数据
		// dump($_SESSION);
		$mod = M("pic");
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
		$this -> assign("res",$res);
		//加载模板
		$this -> display("index");
	}

	//加载轮播图添加页
	public function add(){
		$this -> display('add');
	}

	//执行轮播图添加
	public function insert(){
		// dump($_POST);dump($_FILES);die;
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
	    $_POST['pic'] = ltrim($info['pic']['savepath'],'.').$info['pic']['savename'];
	    $_POST['addtime'] = date('Y-m-d');
	    //实例化表
	    $mod = M('pic');
	    $rules = array( 
			array('content','require','内容必须填写！'), 
			array('status','require','是否启用必须选择！'), 
			);
	    if(empty($_POST['status'])){
	    	$this -> error('状态必须选择');
	    }
	    if(!$mod -> validate($rules) -> create()){
	    	exit($mod -> getError());
	    }else{
	    	//执行添加
	    	$res = $mod -> add();
	    	if($res){
	    		$this -> success('恭喜添加成功',U('Pic/index'));
	    	}else{
	    		$this -> error('抱歉添加失败');
	    	}
	    }
	}

	//加载轮播图修改页
	public function edit(){
		//实例化表信息
		$mod = M('pic');
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('抱歉没有这张轮播图');
		}
		$this -> assign('res',$res);
		$this -> display('edit');
	}

	//执行轮播图修改
	public function update(){
		// dump($_POST);dump($_FILES);die;
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
	    $_POST['pic'] = ltrim($info['pic']['savepath'],'.').$info['pic']['savename'];
	    $_POST['updatetime'] = date('Y-m-d');
	    //实例化表
	    $mod = M('pic');
	    $rules = array( 
			array('content','require','内容必须填写！'), 
			array('status','require','是否启用必须选择！'), 
			);
	    if(empty($_POST['status'])){
	    	$this -> error('状态必须选择');
	    }
	    if(!$mod -> validate($rules) -> create()){
	    	exit($mod -> getError());
	    }else{
	    	//执行添加
	    	$res = $mod -> save();
	    	if($res){
	    		$this -> success('恭喜修改成功',U('Pic/index'));
	    	}else{
	    		$this -> error('抱歉修改失败');
	    	}
	    }
	}
	
	//删除轮播图
	public function del(){
		$mod = M('pic');
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此图片不存在');
		}
		//执行删除
		$r = $mod -> delete($id);
		if($r){
			$this -> success('恭喜删除成功',U('Pic/index'));
		}else{
			$this -> error('抱歉删除失败');
		}
	}

	//执行启用
	public function status(){
		$mod = M('pic');
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此图片不存在');
		}else{
			if($res['status']==0){
				//执行启用
				$data['status'] = 1;
				$data['id'] = $id;
				$r = $mod -> save($data);
				if($r){
					$this -> success('恭喜启用成功',U('Pic/index'));
				}else{
					$this -> error('抱歉启用失败');
				}
			}elseif($res['status']==1){
				//执行禁用
				$data['status'] = 0;
				$data['id'] = $id;
				$r = $mod -> save($data);
				if($r){
					$this -> success('恭喜禁用成功',U('Pic/index'));
				}else{
					$this -> error('抱歉禁用失败');
				}
			}
		}

	}

}