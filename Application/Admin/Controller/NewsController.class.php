<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class NewsController extends CommonController {
	//加载稿件主页
	public function index(){
		//实例化story信息操作对象
		// dump($_SESSION);
		$mod = M("news");
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
		$res = $mod -> where($data) -> limit($page->firstRow,$page->listRows)->order('addtime desc')->select();
		
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

	//添加稿件
	public function insert(){
	    	//获取用户名
			$_POST['username'] = $_SESSION['ad']['admin'];
			//获取用户id
			$_POST['uid'] = $_SESSION['ad']['id'];
			//获取添加时间
			$_POST['add_time'] = date("Y-m-d H:i:s",time());
			// 判断是否含有违禁词
			foreach ($_POST as $k => $v) {
				$this -> badWord($v);
			}
			

			//实例化story信息操作对象
			$story = D('story');
			//添加数据
			if(!$story -> create($_POST)){
				//如果创建失败，表示验证没有成功
				exit($story -> getError());
			}else{
				$res = $story -> add();
				if($res){
					$this -> success('新增成功',U("Story/index"));

				}else{
					$this -> error('新增失败',U("Story/insert"));
				}
			}
	    
		
		
	}

	//违禁词判断函数
	//获取违禁词
	public function badWord($str){
		$word = M('stop_word');
		$badword = $word -> field('word') -> where('status=0') -> select();
		//处理数据
		foreach ($badword as $k => $v) {
			$bad[] = $v['word'];
		}
		$badlist = "/".implode("|",$bad)."/";
		if(preg_match($badlist,$str,$matches)){
			$this -> error("稿件*{$str}*<br/>包含有({$badlist})中的词，请重新编写");
		}
	}
		

	//加载编辑表单
	public function edit(){
		//实例化story信息操作对象
		$story = M("story");
		//判断用户是否有权限
		$this -> isStatus(I('id'));
		//判断稿件是否已经审核
		$this -> isSt(I('id'));
		//加载要修改的信息
		$this -> assign("vo",$story->find(I('id')));
		//加载模板
		$this -> display("edit");
	}

	//判断用户是否有权限操作的方法
	public function isStatus($id){
		$story = M("story");
		//判断用户是否有权限
		$uid = session('ad')['id'];
		$suid = $story -> where('id='.$id) -> getField('uid');
		if($suid != $uid){
			$this -> error('您没有权限操作此稿件');
		}
	}

	//判断稿件是否已经审核
	public function isSt($id){
		$story = M('story');
		$status = $story -> where('id='.$id) -> getField('status');
		if($status == 1){
			$this -> error('该稿件已经审核不能进行编辑');
		}
	}

	//判断稿件是否已经发布
	public function isRelease($id){
		$story = M('story');
		$release = $story -> where('id='.$id) -> getField('release');
		if($release == 1){
			$this -> error('该稿件已经发布不能删除，请联系管理员退回');
		}
	}

	//执行编辑稿件
	public function update(){
		//实例化story信息的操作对象
		$story = D("story");
		//初始化封装
		$_POST['id'] = $_GET['id'];
		//判断有没有违禁词
		foreach ($_POST as $k => $v) {
			$this -> badWord($v);
		}
		
		if(!$story -> create($_POST)){
			exit($story -> getError());
		}else{
			//执行修改
			$res = $story -> save();
			if($res){
				$this -> success('修改成功',U("Story/index"));
			}else{
				$this -> error('修改失败');
			}

		}
	}

	//删除稿件
	public function del(){
		//实例化story信息的操作对象
		$story = M("story");
		//判断用户是否有权限
		$this -> isStatus(I('id'));
		//判断该稿件是否已经发布
		$this -> isRelease(I('id'));

		$map['id'] = $_GET['id'];
		$res = $story -> where($map) -> delete();
		if($res){
			$this -> success('删除成功',U("Story/index"));
		}else{
			$this -> error('删除失败');
		}
	}

	//禁止发布稿件
	public function stop(){
		// var_dump($_GET);die;
		//实例化story表
		$mod = M("story");
		$map['id'] = I('id');
		$map['status'] = 0;
		$res = $mod -> save($map);
		if($res){
			$this -> success('禁止发布成功',U('Story/index'));
		}else{
			$this -> error('禁用失败');
		}

	}

	//查看用户申请审核的稿件
	public function see(){
		$id = I('id');
		//实例化story表信息
		$mod = M('story');
		$res = $mod -> find($id);
		if($res){
			$this -> assign('vo',$res);
			$this -> display('see');
		}else{
			$this -> error('抱歉查看失败！');
		}
	}

	//稿件审核可以发布
	public function start(){
		// var_dump($_GET);die;
		//实例化story表
		$mod = M("story");
		$map['id'] = I('id');
		$map['status'] = 1;
		$res = $mod -> save($map);
		if($res){
			$this -> success('审核成功',U('Story/index'));
		}else{
			$this -> error('审核失败');
		}
	}

	//稿件发布
	public function project(){
		// dump(I());die;
		//获取稿件内容
		$id = I('id');
		$story = M('story');

		//判断用户是否有权限
		$this -> isStatus($id);

		$gaojian = $story -> where('id='.$id) -> find();
		//判断稿件是否已经审核
		if($gaojian['status']==0){
			$this -> error('稿件未审核，请先进行审核');
		}
		//选择媒体获取媒体列表
		$media = M('media');
		$map['status'] = 1;
		$map['type'] = 1;
		$res = $media -> where($map) -> select();
		//获取媒体名称
		// dump($gaojian);die;
		$this -> assign('gaojian',$gaojian);
		$this -> assign('media',$res);
		//加载添加媒体模板
		$this -> display('project');
	}

	//执行稿件发布
	public function action(){
		// dump(I());die;
		//查询稿件内容
		$id = I('id');
		$story = M('story');
		//判断用户是否提交了空数据
		if(empty(I('sid'))){
			$this -> error('请选择要发布的媒体');
		}
		$gaojian = $story -> where('id='.$id) -> find();
		// dump($gaojian);die;
		//获取需要的内容
		$data['storyid'] = $id;
		$data['title'] = $gaojian['title'];
		$data['keyword'] = $gaojian['keyword'];
		$data['describe'] = $gaojian['describe'];
		$data['from'] = $gaojian['from'];
		$data['content'] = $gaojian['content'];
		$data['username'] = $gaojian['username'];
		//获取媒体的内容
		$m = I('sid');
		foreach ($m as $k => $v) {
			$mod = M('media');
			$res = $mod -> where('id='.$v) -> find();
			//获取需要的内容
			$data['mediaid'] = $res['id'];
			$data['media'] = $res['media'];
			$data['region'] = $res['region'];
			$data['type'] = $res['type'];
			$data['add_time'] = date('Y-m-d H:i:s',time());
			//生成订单id
			$data['orderid'] = time().rand(100000,999999);
			//插入数据
			$a = M('action');
			$r = $a -> add($data);

			//写入流水
				//收集数据
				$dataFi['adminid'] =  session('ad')['id'];
				$dataFi['name'] = session('ad')['admin'];
				$dataFi['pay'] = 1;
				$dataFi['add_time'] = date('Y-m-d H:i:s',time());
				$dataFi['project'] = "发布文章";
				$dataFi['beizhu'] = "来自订单:".$data['orderid'];
				$dataFi['order'] = $data['orderid'];
				$dataFi['status'] = 1;
				//实例化表
				$df = M('finance');
				//添加数据到finance表
				$rdf = $df -> add($dataFi);
			
			}
		if($r){
			//更改稿件是否发布状态
			$release['release'] = 1;
			$story -> where('id='.I('id')) ->save($release);
			$this -> success('恭喜发布成功',U('Story/index'));

			}else{
				$this -> error('抱歉发布失败');
			}
	}

	//退回发布的稿件
	public function sendBack(){
		//判断稿件是否发布
		$id = I('id');
		//实例化story表信息
		$mod = M('story');
		$res = $mod -> find($id);
		if($res['release'] != 1){
			$this -> error('抱歉该稿件未发布,不能退回');
		}
		//判断有没有权限进行退回
		$uid = session('ad')['id'];
		if($uid == $res['uid'] || $res['status'] ==3 ){
			//执行退回操作
			//实例化action表信息
			$action = M('action');
			$acres = $action -> where('storyid='.$id) -> delete();
			if($acres){
				//修改稿件发布状态及审核状态
				$map['release'] = 0;
				$map['status'] =0;
				$map['id'] = $id;
				$mod -> save($map); 
				$this -> success('恭喜退回成功!',U('Story/index'));
			}else{
				$this -> error('抱歉退回失败');
			}
		}else{
			$this -> error('抱歉您没有权限操作此稿件');
		}
		
	}

	//媒体类型选择
	public function ajaxType(){
		$type = I('type');
		//实例化media表信息
		$mod = M('media');
		$res = $mod -> where('type='.$type) -> select();
		if($res){
			$this -> ajaxReturn($res);
		}
		
	}

	
	
}