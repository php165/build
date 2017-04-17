<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class MediaController extends CommonController {
	//加载媒体列表页
	public function index(){
		//实例化media信息操作对象
		$mod = M("media");
		//搜索
		$search = empty($_GET['searchtype']) ? '' : $_GET['searchtype'];
		//判断用户权限
		$admin = M('admin');
		$id = session('ad')['id'];
		$auth = $admin -> where('id='.$id) -> getField('auth');
		if($auth != 1){
			$data['mid'] = $id;
		}
		//搜索内容
		$content = $_GET['content'];
		$data[$search] = array('like',"%$content%");
		//分页
		$page = new Page($mod->where($data)->count(),10);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$res = $mod ->where($data) -> limit($page->firstRow,$page->listRows)->order('add_time desc')->select();

		//分页链接
		$url = $page ->show();
		// dump($url);exit;
		$this -> assign('url',$url);
		$this -> assign('search',$search);
		$this -> assign('content',$content);
		//获取信息，放置模板
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
		// dump($_GET);
	}

	//加载媒体添加页
	public function add(){
		$this -> display("add");
	}

	//执行添加媒体
	public function insert(){
		// dump($_POST);die;
		$rules = array(     
		array('media','require','媒体名称必须填写！'),      
		array('type','require','媒体类型必须选择！'),      
		array('region','require','媒体地区必须填写'),      
		array('url','url','url地址不正确请重新输入'), 
		array('column','url','栏目接口地址不正确请重新输入'), 
		array('come_jiekou','url','发布接口地址不正确请重新输入'), 
		array('enter_jiekou','url','入口接口地址不正确请重新输入'), 
		array('account','require','媒体所需费用必须填写'), 
	);
		//判断金额是否超出限制值
		if(intval(I('account'))<1 || intval(I('account'))>9999){
			$this -> error('媒体费用超出了9999元或者少于0元');
		}
		//实例化media信息操作对象
		$media = M('media');
		$_POST['mid'] = session('ad')['id'];
		$_POST['add_time'] = date('Y-m-d H:i:s');
		//创建数据对象
		if(!$media -> validate($rules) -> create()){
			exit($media -> getError());
		}else{
			//添加数据
			$res = $media -> add();
			if($res){
				$this -> success('添加成功',U("Media/index"));

			}else{
				$this -> error('添加失败');
			}
		}
	}

	//加载媒体编辑表单
	public function edit(){
		//实例化media信息操作对象
		$mod = M("media");
		//判断媒体是否已经审核
		$mid = session('ad')['id'];
		$status = $mod -> where('id='.I('id')) -> getField('status');
		if($status == 1 || $status == 2){
			$this -> error('该媒体已经审核或者已经申请审核，不能编辑');
		}
		//判断用户是否有权限,但超级管理员有权限
		$mmid = $mod -> where('id='.I('id')) -> getField('mid');
		if($mid == $mmid || $mid == 1){
			//加载要修改的信息
			$this -> assign("vo",$mod->find($_GET['id']));
			//加载模板
			$this -> display("edit");
		}else{
			$this -> error('您没有权限操作此媒体');
		}	
	}

	//执行编辑媒体
	public function update(){
		//实例化media信息的操作对象
		$mod = M("media");
		$rules = array(     
		array('media','require','媒体名称必须填写！'),     
		array('type','require','媒体类型必须选择！'),    
		array('region','require','媒体地区必须填写'),    
		array('url','url','url地址不正确请重新输入'), 
		array('column','url','栏目接口地址不正确请重新输入'), 
		array('come_jiekou','url','发布接口地址不正确请重新输入'), 
		array('enter_jiekou','url','入口接口地址不正确请重新输入'), 
		array('account','require','媒体所需费用必须填写'), 
	);
		//判断金额是否超出限制值
		if(intval(I('account'))<1 || intval(I('account'))>9999){
			$this -> error('媒体费用超出了9999元或者少于0元');
		}
		//初始化封装
		$_POST['id'] = $_GET['id'];
		$_POST['mid'] = session('ad')['id'];
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//执行修改
			$res = $mod -> save();
			if($res){
				$this -> success('修改成功',U("Media/index"));
			}else{
				$this -> error('修改失败');
			}
		}	
	}

	//删除媒体
	public function del(){
		//实例化media信息的操作对象
		$mod = M("media");
		//判断媒体是否已经审核
		$mid = session('ad')['id'];
		$status = $mod -> where('id='.I('id')) -> getField('status');
		if($status == 1 || $status == 2){
			$this -> error('该媒体已经审核或者正在申请审核，不能删除');
		}
		//判断用户是否有权限,但超级管理员有权限
		$mmid = $mod -> where('id='.I('id')) -> getField('mid');
		if($mid == $mmid || $mid = 1){
			$map['id'] = I('id');
			$res = $mod -> where($map) -> delete();
			if($res){
				$this -> success('删除成功',U("Media/index"));
			}else{
				$this -> error('删除失败');
			}
		}else{
			$this -> error('您没有权限操作此媒体');
		}	
	}

	//禁止向此媒体发布稿件
	public function stop(){
		// var_dump($_GET);die;
		//实例化media表
		$mod = M("media");
		$map['id'] = I('id');
		$map['status'] = 0;
		$res = $mod -> save($map);
		if($res){
			$this -> success('禁用成功',U('Media/index'));
		}else{
			$this -> error('禁用失败');
		}
	}

	//媒体审核可以在此发布
	public function start(){
		// var_dump($_GET);die;
		//实例化media表
		$mod = M("media");
		$map['id'] = I('id');
		$map['status'] = 1;
		$res = $mod -> save($map);
		if($res){
			$this -> success('审核成功',U('Media/index'));
		}else{
			$this -> error('审核失败');
		}
	}

	//媒体申请审核
	public function ask(){
		//实例化media表
		$mod = M('media');
		//判断用户有没有权限
		$mid = session('ad')['id'];
		$mmid = $mod -> where('id='.I('id')) -> getField('mid');
		if($mid != $mmid){
			$this -> error('您没有权限操作此媒体');
		}else{
			$map['status'] = 2;
			$map['id'] = I('id');
			$map['add_time'] = date('Y-m-d H:i:s');
			$res = $mod -> save($map);
			if($res){
				$this -> success('申请审核成功',U('Media/index'));
			}else{
				$this -> error('申请审核失败');
			}
		}
	}
}