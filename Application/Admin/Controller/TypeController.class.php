<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class TypeController extends CommonController {
	
	public function index(){
		//实例化信息操作对象
		// dump($_SESSION);
		$mod = M("type");
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
		$res = $mod->where($data)->limit($page->firstRow,$page->listRows)->order(' path asc')->select();
		// dump($res);die;
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
		
		$this -> display("add");
	}

	//添加分类
	public function insert(){
		// dump($_POST);
		//验证用户提交的信息
		$rules = array(
				array('type','require','分类名必须填写'),
				array('content','require','分类描述必须填写'),
			);
		//添加时间
		$_POST['addtime'] = date("Y-m-d");
		$_POST['pid'] = 0;
		$_POST['salt'] = 1;//一级分类
		$mod = M('type');
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//执行添加
			$res = $mod -> add();
			//添加路径
			$data['path'] = '0'.'-'.$res;
			$data['id'] = $res;
			$r = $mod -> save($data);
			if($res && $r){
				$this -> success('恭喜添加分类成功',U('Type/index'));
			}else{
				$this -> error('抱歉添加失败');
			}
		}

	}

	//添加子分类
	public function addchild(){
		$id = intval($_GET['id']);
		//获取父分类信息
		$mod = M('type');
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此分类不存在',U('Type/index'));
		}
		//判断是否有一级分类
		if($res['salt']==2){
			//查一级分类信息
			$res1 = $mod -> where('id="'.$res['pid'].'"') -> find();
			if($res1){
				$this -> assign('res1',$res1);
			}
		}
		// dump($res1);die;
		// //判断父分类是否启用
		// if($res['status'] == 0){
		// 	$this -> error("请先启用父分类，再进行添加");
		// }
		$this -> assign('res',$res);
		$this -> display('addchild');
	}

	//执行添加子分类
	public function insertchild(){
		// dump($_POST);die;
		//验证用户提交的信息
		$rules = array(
				array('childtype','require','子分类名必须填写'),
				array('childcontent','require','子分类描述必须填写'),
			);
		//添加时间
		$data['addtime'] = date("Y-m-d");
		$data['pid'] = intval(I('id'));
		$data['type'] = I('childtype');
		$data['content'] = I('childcontent');
		$data['path'] = I('path');
		$data['status'] = I('status');
		$data['isshow'] = I('isshow');
		$data['salt'] = intval(I('salt')+1);//分类级别
		// dump($data);die;
		$mod = M('type');

		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//执行添加
			if($data['salt'] == 2){
				$res = $mod -> add($data);
				$da['path'] = $data['path'].'-'.$res;
				$da['id'] = $res;
				$r = $mod -> save($da);
				if($res && $r){
					$this -> success('恭喜添加成功',U('Type/index'));
				}else{
					$this -> error('抱歉添加失败');
				}
			}elseif ($data['salt'] == 3) {
				$res1 = $mod -> add($data);
				$da['path'] = $data['path'].'-'.$res1;
				$da['id'] = $res1;
				$r = $mod -> save($da);
				if($res1 && $r){
					$this -> success('恭喜添加成功',U('Type/index'));
				}else{
					$this -> error('抱歉添加失败');
				}
			}
			
			
		}
	}

	//加载编辑表单
	public function edit(){
		//实例化信息操作对象
		$mod = M("type");
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此分类不存在',U('Type/index'));
		}
		// //判断是否已经启用
		// if($res['status'] == 1){
		// 	$this -> error('该分类已启用，请禁用后再编辑');
		// }
		//加载要修改的信息
		// dump($res);die;
		$this -> assign("res",$res);
		//加载模板
		$this -> display("edit");
	}

	//执行编辑
	public function update(){
		//实例化信息的操作对象
		// dump($_POST);die;
		$mod = M("type");
		$id = intval($_GET['id']);
		$s = $mod -> find($id);

		//如果编辑时直接启用子分类，需要验证父分类是否已经启用
		// if($_POST['status']==1){
		// 	$sta = $mod -> where('id="'.$s['pid'].'"') -> select();
		// 	if($sta['status']==0){
		// 		$this -> error('请先启用父分类，再进行编辑启用子分类');
		// 	}
		// }
		// dump($id);die;
		//验证提交的数据
		$rules = array(
				array('type','require','分类名必须填写'),
				array('content','require','子分类描述必须填写'),
				array('status','require','是否取用必须选择'),
			);
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//执行修改
			$_POST['id'] = $id;
			$res = $mod -> save($_POST);
			if($res){
				$this -> success('恭喜修改成功!',U("Type/index"));
			}else{
				$this -> error('抱歉修改失败!');
			}
		}
		
	}

	//删除分类
	public function del(){
		//实例化信息的操作对象
		$mod = M("type");
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此分类不存在',U('Type/index'));
		}
		// dump($res);die;
		// //判断栏目是否启用
		// if($res['status'] == 1){
		// 	$this -> error('分类已经启用，请禁用之后删除');
		// }
		//判断其是否含有子栏目
		$r = $mod -> where('pid="'.$id.'"') -> select();
		if($r){
			$this -> error('该分类有子类，不能删除');
		}
		
		//执行删除
		$r = $mod -> delete($id);
		if($r){
			$this -> success('恭喜删除成功', U('Type/index'));
		}else{
			$this -> error('抱歉删除失败');
		}
		
	}

	//分类的禁止与启用
	public function status(){
		// var_dump($_GET);die;
		//实例化表
		$mod = M("type");
		//执行禁用与启用
		$id = intval(I('id'));
		$res = $mod -> find($id);
		if(!$res){
			$this -> error('此分类不存在',U('Type/index'));
		}
		//各条件进行判断
		if($res['status'] == 0){
			//执行启用，需判断有无启用的父分类
			$res1 = $mod -> where('id="'.$res['pid'].'"') -> select();
			// dump($res1);die;
			//处理数据
			$status=[];
			foreach ($res1 as $v) {
				$status[] = $v['status'];
			}
			if(!$status || in_array(1, $status)){
				$data['status'] = 1;
				$data['id'] = $id;
				$r = $mod -> save($data);
				if($r){
					$this -> success('恭喜启用成功',U("Type/index"));
				}else{
					$this -> error('抱歉启用失败');
				}
			}else{
				$this -> error('请先启用父分类');
			}
			
		}elseif($res['status'] == 1){
			//执行禁用，需判断有无启用的子分类
			$res2 = $mod -> where('pid="'.$res['id'].'"') -> select();
			// dump($res2);die;
			//处理数据
			$status=[];
			foreach ($res2 as $v) {
				$status[] = $v['status'];
			}
			// dump($status);die;
			if(!$status || !in_array(1, $status)){
				$data['status'] = 0;
				$data['id'] = $id;
				$r = $mod -> save($data);
				if($r){
					$this -> success('恭喜禁用成功',U("Type/index"));
				}else{
					$this -> error('抱歉禁用失败');
				}
			}else{
				$this -> error('请先禁用子分类');
			}
		}
	}
		
}