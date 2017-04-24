<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
class SetController extends CommonController {
	
	//加载基本设置页
	public function index(){
		//实例化表信息
		$mod = M('seting');
		$res = $mod -> find('1');
		$this -> assign('vo',$res);
		$this -> display('index');
	}

	//执行修改基本设置
	public function update(){
		// dump($_POST);dump($_FILES);die;
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
	    			array('name','require','商城名字不能为空'),
	    			array('keyword','require','关键字不能为空'),
	    			array('content','require','商城描述不能为空'),
	    		);
	    	if(mb_strlen($_POST['content']) > 20){
	    		$this -> error('商城描述不能超过20个字');
	    	}
	    	//获取数据
	    	$_POST['logo'] = ltrim($info['logo']['savepath'],'.').$info['logo']['savename'];
	    	$_POST['mastermap'] = ltrim($info['mastermap']['savepath'],'.').$info['mastermap']['savename'];
	    	$_POST['id'] = 1;
	    	//实例化shop表信息
	    	$mod = M('seting');
	    	//添加信息
	    	if(!$mod -> validate($rules) -> create()){
	    		exit($mod -> getError());
	    	}else{
	    		$res = $mod -> save($_POST);
		    	if($res){
		    		$this -> success('商铺配置保存成功',U('Set/index'));
		    	}else{
		    		$this -> error('商铺配置保存失败');
		    	}
	    	}
	    }
	}
	
	//加载联系人添加页
	public function addperson(){
		$mod = M('seting');
		$res = $mod -> find(1);
		$this -> assign('vo',$res);
		$this -> display('addperson');
	}

	//执行修改联系人
	public function updateperson(){
		// dump($_POST);
		//验证提交的信息
		$rules = array(
				array('linkman','require','联系人名字不能为空'),
				array('phone','require','手机格式不正确'),
				array('address','require','地址不能为空'),
			);
		$mod = M('seting');
		$_POST['id'] = 1;
		if(!$mod -> validate($rules) -> create()){
			exit($mod -> getError());
		}else{
			$res = $mod -> save($_POST);
			if($res){
				$this -> success('恭喜保存成功',U('Set/addperson'));
			}else{
				$this -> error('抱歉保存失败');
			}
		}
	}
}