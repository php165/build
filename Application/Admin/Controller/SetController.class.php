<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class SetController extends CommonController {
	
	//加载基本设置页
	public function setBase(){
		//实例化base表信息
		$mod = M('base');
		$res = $mod -> find('1');
		$this -> assign('vo',$res);
		$this -> display('setBase');
	}

	//执行修改基本设置
	public function doSetBase(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize = 3145728 ;// 设置附件上传大小
	    $upload->exts    = array('jpg', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath = './Public';
	    $upload->savePath = './Uploads/'; // 设置附件上传目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {
	    	// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{
	    	//验证用户提交的信息
	    	$rules = array(
	    			array('shopname','require','商城名字不能为空'),
	    			array('keyword','require','关键字不能为空'),
	    			array('detail','require','商城描述不能为空'),
	    		);
	    	if(mb_strlen($_POST[detail]) > 20){
	    		$this -> error('商城描述不能超过20个字');
	    	}
	    	//获取数据
	    	$_POST['photo'] = ltrim($info['photo']['savepath'],'.').$info['photo']['savename'];
	    	$_POST['id'] = 1;
	    	//实例化shop表信息
	    	$mod = M('base');
	    	//添加信息
	    	if(!$mod -> validate($rules) -> create()){
	    		exit($mod -> getError());
	    	}else{
	    		$res = $mod -> save($_POST);
		    	if($res){
		    		$this -> success('商铺配置保存成功',U('Set/setBase'));
		    	}else{
		    		$this -> error('商铺配置保存失败');
		    	}

	    	}
	    	
	    }

	}
	
	//加载系统配置页
	public function setDeploy(){
		//实例化app表信息
		$mod = M('app');
		$res = $mod -> find('1');
		$this -> assign('vo',$res);
		$this -> display('setDeploy');
	}

	//执行添加系统配置
	public function doSetDeploy(){
		// dump($_POST);
		$rules = array(
				array('appid','require','appid必须填写'),
				array('appsecret','require','appsecret必须填写'),
				array('oldid','require','oldid必须填写'),
			);
		//实例化app表信息
		$_POST['id'] = 1;
		$mod = M('app');
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//添加信息
			$res = $mod -> save();
			if($res){
				$this -> success('恭喜保存成功！',U('Set/setDeploy'));
			}else{
				$this -> error('抱歉保存失败！');
			}
		}
	}

	//加载等级设置页
	public function setRank(){
		//实例化points表信息
		$mod = M('points');
		$res = $mod -> find('1');
		$this -> assign('vo',$res);
		$this -> display('setRank');
	}

	//执行等级添加
	public function doSetRank(){
		// dump($_POST);
		$rules = array(
				array('one','require','一级分销积分上限必须填写'),
				array('two','require','二级分销积分上限必须填写'),
				array('three','require','三级分销积分上限必须填写'),
				array('oneprice','require','一级分销积分折扣必须填写'),
				array('twoprice','require','二级分销积分折扣必须填写'),
				array('threeprice','require','三级分销积分折扣必须填写'),
			);
		//实例化sell表信息
		$mod = M('points');
		$_POST['id'] = 1;
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			//添加数据
			$res = $mod -> save();
			if($res){
				$this -> success('恭喜添加成功！',U('Set/setRank'));
			}else{
				$this -> error('抱歉添加失败！');
			}
		}

	}
	
	//加载支付方式页
	public function setPay(){
		//实例化pay表信息
		$mod = M('pay');
		$res = $mod -> select();
		$this -> assign('list',$res);
		$this -> display('setPay');
	}

	//加载支付方式添加页面
	public function setPayAdd(){
		$this -> display('setPayAdd');
	}

	//执行添加支付
	// public function setPayInsert(){
	// 	//实例化pay表信息
	// 	$mod = M('pay');
	// 	$auth = session('ad')['auth'];
	// 	if($_POST['name'] == 'weixin'){
	// 		$rules = array(
	// 				array('status','require','支付方式开启或者关闭必须选择'),
	// 				array('name','require','支付名称必须选择'),
	// 				array('appId','require','公众号身份的唯一标识必须填写'),
	// 				array('paySignKey','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 				array('AppSecret','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 				array('partnerId','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 			);
	// 		$_POST['auth'] = $auth;
	// 		if(!$mod -> validate($rules) -> create()){
	// 			exit($mod -> getError());
	// 		}else{
	// 			//添加数据
	// 			$res = $mod -> add();
	// 			if($res){
	// 				$this -> success('恭喜支付方式添加成功！',U('Set/setPay'));
	// 			}else{
	// 				$this -> error('抱歉支付方式添加失败！');
	// 			}
	// 		}
	// 	}else if($_POST['name'] == 'alipay'){
	// 		$rules = array(
	// 				array('status','require','支付方式开启或者关闭必须选择'),
	// 				array('name','require','支付名称必须选择'),
	// 				array('alipay','require','支付宝账户必须填写'),
	// 				array('alipayPID','require','PID必须填写'),
	// 				array('alipayKEY','require','KEY必须填写'),
	// 			);
	// 		$_POST['auth'] = $auth;
	// 		if(!$mod -> validate($rules) -> create()){
	// 			exit($mod -> getError());
	// 		}else{
	// 			//添加数据
	// 			$res = $mod -> add();
	// 			if($res){
	// 				$this -> success('恭喜支付方式添加成功！',U('Set/setPay'));
	// 			}else{
	// 				$this -> error('抱歉支付方式添加失败！');
	// 			}
	// 		}
	// 	}else if($_POST['name'] == 'baidu'){
	// 		$rules = array(
	// 				array('status','require','支付方式开启或者关闭必须选择'),
	// 				array('name','require','支付名称必须选择'),
	// 				array('baiduAppSecret','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 				array('baiduPartnerId','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 			);
	// 		$_POST['auth'] = $auth;
	// 		if(!$mod -> validate($rules) -> create()){
	// 			exit($mod -> getError());
	// 		}else{
	// 			//添加数据
	// 			$res = $mod -> add();
	// 			if($res){
	// 				$this -> success('恭喜支付方式添加成功！',U('Set/setPay'));
	// 			}else{
	// 				$this -> error('抱歉支付方式添加失败！');
	// 			}
	// 		}
	// 	}	
	// }

	//加载支付编辑页面
	public function setPayEdit(){
		//判断用户是否有权限
		//实例化pay表信息
		$mod = M('pay');
		$auth = session('ad')['auth'];
		$res = $mod -> find(I('id'));
		if($auth != $res['auth']){
			$this -> error('您没有权限操作此步骤');
		}
		$this -> assign('vo',$res);
		$this -> display('setPayEdit');
	}

	//执行修改动作
	public function setPayUpdate(){
		//实例化pay表信息

		$mod = M('pay');
		// if($_POST['name'] == 'weixin'){
		// 	$rules = array(
		// 			array('status','require','支付方式开启或者关闭必须选择'),
		// 			array('name','require','支付名称必须选择'),
		// 			array('appId','require','公众号身份的唯一标识必须填写'),
		// 			array('paySignKey','require','公众号支付请求中用于加密的密钥Key必须填写'),
		// 			array('AppSecret','require','公众号支付请求中用于加密的密钥Key必须填写'),
		// 			array('partnerId','require','公众号支付请求中用于加密的密钥Key必须填写'),
		// 		);
		// 	$_POST['id'] = $_GET['id'];
		// 	if(!$mod -> validate($rules) -> create()){
		// 		exit($mod -> getError());
		// 	}else{
		// 		//添加数据
		// 		$res = $mod -> save($_POST);
		// 		if($res){
		// 			$this -> success('恭喜支付方式修改成功！',U('Set/setPay'));
		// 		}else{
		// 			$this -> error('抱歉支付方式修改失败！');
		// 		}
		// 	}
		// }else if($_POST['name'] == 'alipay'){
			$rules = array(
					array('status','require','支付方式开启或者关闭必须选择'),
					array('name','require','支付名称必须选择'),
					array('alipay','require','支付宝账户必须填写'),
					array('alipayPID','require','PID必须填写'),
					array('alipayKEY','require','KEY必须填写'),
				);
			// $_POST['id'] = I('id');
			// dump($_POST);die;
			if(!$mod -> validate($rules) -> create()){
				exit($mod -> getError());
			}else{
				//添加数据
				$res = $mod -> save($_POST);
				if($res){
					$this -> success('恭喜支付方式修改成功！',U('Set/setPay'));
				}else{
					$this -> error('抱歉支付方式修改失败！');
				}
			}
	// 	}else if($_POST['name'] == 'baidu'){
	// 		$rules = array(
	// 				array('status','require','支付方式开启或者关闭必须选择'),
	// 				array('name','require','支付名称必须选择'),
	// 				array('baiduAppSecret','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 				array('baiduPartnerId','require','公众号支付请求中用于加密的密钥Key必须填写'),
	// 			);
	// 		$_POST['id'] = I('id');
	// 		if(!$mod -> validate($rules) -> create()){
	// 			exit($mod -> getError());
	// 		}else{
	// 			//添加数据
	// 			$res = $mod -> save($_POST);
	// 			if($res){
	// 				$this -> success('恭喜支付方式修改成功！',U('Set/setPay'));
	// 			}else{
	// 				$this -> error('抱歉支付方式修改失败！');
	// 			}
	// 		}
	// 	}	
	}
}