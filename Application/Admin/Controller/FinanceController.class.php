<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Db;
class FinanceController extends CommonController {
	
	//加载财务主页
	public function index(){
		//实例化finance信息操作对象
		$mod = M("finance");
		//分页
		$page = new Page($mod->count(),10);//参数
		//设置配置样式
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$map['status'] =1;
		$res = $mod -> where($map) -> limit($page->firstRow,$page->listRows)->order('add_time desc')->select();
		// dump($res);die;
		//分页链接
		$url = $page ->show();
		//获取现在的月份
		$month = date('Y-m');
		//查询总流水数以及总金额
		//充值金额
		$map['status'] = 1;
		$map['project'] = '充值';
		$map['add_time'] = array('like',"%$month%");
		$data['account'] = (float)($mod -> where($map) -> sum('account'));
		//发布文章金额
		$mp['status'] = 1;
		$mp['project'] = '发布文章';
		$mp['add_time'] = array('like',"%$month%");
		$data['pay'] = (float)($mod -> where($mp) -> sum('account'));

		//查询总会员数
		//实例化vip信息表
		$modVip = M('vip');
		$p['add_time'] = array('like',"%$month%");
		$data['vip'] = $modVip -> where($p) -> count();
		//激活会员数
		$a['add_time'] = array('like',"%$month%");
		$a['status'] = 1;
		$data['payvip'] = $modVip -> where($a) -> count();
		$this -> assign('data',$data);
		$this -> assign('url',$url);
		//获取信息，放置模板
		$this -> assign("list",$res);
		//加载模板
		$this -> display("index");
	}

	//加载财务报表说明页
	public function directionsIndex(){
		//实例化forms表信息
		$mod = M('forms');
		$res = $mod -> select();
		//加载信息
		$this -> assign('list',$res);
		$data['sell'] = $mod -> sum('sell');
		$data['num'] = $mod -> sum('num');
		$data['pay'] = $mod -> sum('pay');
		$this -> assign('list1',$data);
		$this -> display('directionsIndex');
	}
	
	//加载添加财务报表页
	public function addDirections(){
		$this -> display('addDirections');
		

	}

	//执行添加财务报表页
	public function insert(){
		//获取数据
		$rules = array(
				array('account','require','总收入必填'),
				array('pay','require','总充值金额必填'),
				array('sell','require','交易金额必填'),
				array('num','require','总会员数必填'),
				array('sellnum','require','交易会员数必填'),
				array('month','require','月份必选'),
			);
		//实例化forms表信息
		$mod = M('forms');
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//添加数据
			$res = $mod -> add();
			if($res){
				$this -> success('恭喜添加成功!',U('Finance/index'));
			}else{
				$this -> error('抱歉添加失败');
			}
		}
	}

	//执行删除财务报表页
	public function del(){

	}
}