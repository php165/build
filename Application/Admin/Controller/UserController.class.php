<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Org\Net\IpLocation;//获取客户ip地址的类
class UserController extends CommonController {
	
	//加载会员列表页
	public function index(){
		//实例化story信息操作对象
		$mod = M("vip");
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
			$res = $mod -> where($data) -> limit($page->firstRow,$page->listRows)->order('add_time desc')->select();
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
	//加载会员添加页
	public function add(){
		$this -> display("add");
	}

	//执行添加会员
	public function insert(){
		// dump($_POST);die;
		//实例化vip信息操作对象
		$mod = M('vip');
		//获取数据
		$rules = array(     
			array('vip_name','require','用户名必须填写！'), 
			array('vip_name','','会员名称已经存在！',0,'unique',1), 
			array('vip_name','/^[\w]{3,9}$/','用户名只能是a-z并包含0-9|用户名长度必须在3-9之间',1,'regex',3), 
			array('company','require','公司名称必须填写！'),  
			array('address','require','公司地址必须填写！'),  
			array('phone',"/^1[3-8][0-9][0-9]{8}$/",'手机号格式不正确',1),   
			array('qq',"/[\d]{6,11}/",'QQ号格式不正确',1),   
		);
		//判断密码是否一致
		if(I('password') != I('repassword')){
			$this -> error('确认密码不正确');
		}

		$_POST['password'] = md5($_POST['password']);

		//获取添加时间
		$_POST['add_time'] = date("Y-m-d H:i:s",time());
		//获取注册ip
		$_POST['register_ip'] = get_client_ip();
		// var_dump($data);
		
		//添加数据
		if(!$mod -> validate($rules) -> create()){
			//验证规则失败时
			exit($mod -> getError());
		}else{
			//验证通过时
			$res = $mod -> add();
			if($res){
				//添加信息到userdetail表中
				$user['uid'] = $res;
				$user['vip_name'] = I('vip_name');
				$u = M('userdetail');
				$u -> add($user);
				$this -> success('新增成功',U("User/index"));
			}else{
				$this -> error('新增失败');
			}
		}
		
	}

	//加载会员编辑表单
	public function edit(){
		//实例化vip信息操作对象
		$mod = M("vip");
		//判断用户是否登陆过
		$num = $mod -> where('id='.I('id')) -> getField('num');
		if($num>0){
			$this -> error('用户已经开始使用，不能编辑');
		}
		//判断用户提交的数据是否正确
		if(empty($res = $mod -> find(I('id')))){
			$this -> error('该用户不存在，不能编辑');
		}
		//加载要修改的信息
		$this -> assign("vo",$mod->find($_GET['id']));
		//加载模板
		$this -> display("edit");
	}

	//执行编辑会员
	public function update(){
		//实例化vip信息的操作对象
		$mod = M("vip");

		//验证用户提交的数据
		$rules = array(     
			array('vip_name','require','用户名必须填写！'),      
			array('vip_name','','会员名称已经存在！',0,'unique',2), 
			array('vip_name','/^[\w]{3,9}$/','用户名只能是a-z并包含0-9|用户名长度必须在3-9之间',1,'regex',3),  
			array('company','require','公司名称必须填写！'),
			array('address','require','公司地址必须填写！'), 
			array('phone',"/^1[3-8][0-9][0-9]{8}$/",'手机号格式不正确',1),   
			array('qq',"/[\d]{6,11}/",'QQ号格式不正确',1),   
		);
		//判断两次密码输入是否一致
		if(I('password') != I('repassword')){
			$this -> error('确认密码不正确，请重新输入');
		}
		$_POST['password'] = md5(I('password'));
		if(!$mod -> validate($rules) -> create($_POST)){
			//验证不通过，获取失败信息
			exit($mod -> getError());
		}else{
			//验证通过
			$res = $mod -> save();
			if($res){
				$this -> success('修改成功',U("User/index"));
			}else{
				$this -> error('修改失败');
			}
		}
		
	}

	//删除会员
	public function del(){
		//实例化vip信息的操作对象
		$mod = M("vip");
		//判断用户是否已经登陆过
		$mres = $mod -> find(I('id'));
		if($mres['num']>0){
			$this -> error('用户已经开始使用，不能删除');
		}
		//判断用户是否激活
		if($mres['status'] == 1){
			$this -> error('用户已经激活，不能删除');
		}

		$map['id'] = $_GET['id'];
		$res = $mod -> where($map) -> delete();
		//删除userdetail表中的相关数据
		$m = M('userdetail');
		$ma['uid'] = $_GET['id'];
		$r = $m -> where($ma) -> delete();
		if($res){
			$this -> success('删除成功',U("User/index"));
		}else{
			$this -> error('删除失败');
		}
	}

	//会员所发布的稿件
	public function article(){
		//获取稿件的uid
		$uid = I('id');
		//实例化story表信息
		$mod = M('story');
		//判断会员是否添加过文章
		$res = $mod -> where('uid='.$uid) -> select();
		if($res){
			//分页
			$page = new Page($mod->where('uid='.$uid)->count(),10);
			//设置配置样式
			$page -> setConfig('prev','上一页');
			$page -> setConfig('next','下一页');
			$res = $mod -> where('uid='.$uid) -> limit($page->firstRow,$page->listRows)->order('add_time desc') ->select();
			//分页链接
			$url = $page ->show();
			// $this -> assign('search',$search);
			// $this -> assign('num',$num); 
			$this ->assign('url',$url);
			$this -> assign('list',$res);
			$this -> display('article');
		}else{
			$this -> error('该会员还没有添加过文章');
		}


	}

	//查看会员消费明细的detail方法
	public function detail(){
			$uid = I('id');
			//实例化finance表信息
			$mod = M('finance');
			//分页
			$page = new Page($mod->where('uid='.$uid)->count(),10);
			//设置配置样式
			$page -> setConfig('prev','上一页');
			$page -> setConfig('next','下一页');
			$m['uid'] = $uid;
			$m['status'] = 1;
			$res = $mod -> where($m) -> limit($page->firstRow,$page->listRows)->order('add_time desc') -> select();
			
			if($res){
				//查询该用户总交易流水
				$map['uid'] = $uid;
				$map['project'] = '充值';
				$account['pay'] = (float)($mod -> where($map) -> sum('account'));
				$ma['uid'] = $uid;
				$ma['project'] = '发布文章';
				$account['project'] = (float)($mod -> where($ma) -> sum('account'));
				$this -> assign('account',$account);
				//分页链接
				$url = $page ->show(); 
				$this ->assign('url',$url);
				$this -> assign('list',$res);
				//加载模板
				$this -> display('detail');
			}else{
				$this -> error('该会员没有交易');
			}

		}

		// //加载修改密码页
		// public function editPass(){
		// 	//实例化vip表信息
		// 	$mod = M('vip');
		// 	$res = $mod -> find(I('id'));
		// 	if($res){
		// 		$this -> assign('vo',$res);
		// 		$this -> display('editPass');
		// 	}else{
		// 		$this -> error('修改密码失败');
		// 	}
		// }

		// //执行修改密码
		// public function updatePass(){
		// 	//
		// }

		//加载充值页面
		public function pay(){
			$id = I('id');
			$mod = M('vip');
			$res = $mod -> find($id);
			$this -> assign('vo',$res);
			$this -> display('pay');
		}

		//执行充值
		public function doPay(){
			// dump($_POST);die;
			//判断用户提交的数据
			if(empty(I('account')) || empty(I('pay'))){
				$this -> error('请选择充值金额和充值方式');
			}
			//实例化vip表信息
			$mod = M('vip');
			$map['id'] = I('id');
			//执行充值操作，开始事务
			$mod -> startTrans();
			//给用户充值
			//获取用户信息
			$res = $mod -> find(I('id'));
			$map['account'] = $res['account'] + I('account');
			$map['status'] = 1;
			//执行充值并激活用户
			$vippay = $mod -> save($map);

			//添加充值记录
			//获取一个随机的且唯一的订单号
			function getOrder(){
				$order = "pay".time().rand(100000,999999).session('user')['id'];
				$mod = M('finance');
				$res = $mod -> where("'order'='".$order."'") -> select();
				if($res){
					getOrder();
				}else{
					return $order;
				}
			}
			$data['order'] = getOrder();
			$data['uid'] = I('id');//用户id
			$data['add_time'] = date('Y-m-d H:i:s');
			$data['name'] = I('name');
			$data['project'] = '充值';
			$data['status'] = 1;
			$data['account'] = I('account');
			$data['beizhu'] = I('pay');
			//添加订单
			$ord = M('finance');
			$order = $ord -> add($data);

			//给公司账户增加金额
			$company = M('admin');
			$compay = $company -> where('id=9') -> getField('account');
			$com['account'] = $compay + I('account');
			//执行修改
			$comres = $company -> where('id=9') -> save($com);
			if($comres && $order && $vippay){
				//成功提交事务
				$mod -> commit();
				$this -> success('恭喜充值成功',U('User/index'));
			}else{
				//失败回滚事务
				$mod -> rollback();
				$this -> error('抱歉充值失败');
			}
			
		}
	

}