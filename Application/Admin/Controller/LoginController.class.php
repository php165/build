<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Net\IpLocation;//获取客户ip地址的类
class LoginController extends Controller {
	//加载登陆页面
	public function index(){
		
		$this -> display();
	}

	//输出验证码
	public function code(){
		$Verify = new \Think\Verify();
		$Verify->fontSize = 30;
		$Verify->length   = 3;
		$Verify->useNoise = false;
		$Verify->entry();
	}
		
	//执行登陆
	public function login(){
            // var_dump($_POST);die;
            // 验证验证码
            $Verify = new \Think\Verify();
            $res = $Verify->check($_POST['code']);
            if(!$res){
                  //验证码失败
                  $this -> error('验证码不正确');
            }
            //验证账号和密码
            $mod = M('users');
            $user = $mod -> where('username="'.$_POST['username'].'"') -> find();
            if(!$user){
                  $this -> error('用户名不存在，请重新输入');
            }
            $password = md5(md5(I('password')).$user['salt']);
            if($password != $user['password']){
                  $this -> error('密码输入错误，请重新输入');
            }
            //判断用户是否启用
            if($user['status'] == 1){
                  $this -> error('该用户未启用，请联系管理员处理');
            }

            //用户信息存到session中
            session('user',$user);
            //根据用户信息查询对应的权限
            $uid = intval($user['id']);
            // echo $auth;die;
            $m = M();
            $res = $m -> query('select n.action,n.fangfa from anc_users_role as ur, anc_node as n, anc_role_node as rn where ur.uid="'.$uid.'" and ur.rid=rn.rid and rn.nid=n.id');
            // dump($res);die;
            
            //封装数据
            $nodelist=[];
            foreach ($res as $v) {
                  if($v['fangfa']=='add'){
                        $nodelist[$v['action']][]='insert';
                  }
                  if($v['fangfa']=='edit'){
                        $nodelist[$v['action']][]='update';
                  }
                  $nodelist[$v['action']][]=$v['fangfa'];
            }
            $nodelist['Index'][]='index';
            $nodelist['Index'][]='pass';
            $nodelist['Index'][]='updatepass';
            //把权限数组放入session
            session('nodelist',$nodelist);
            //添加登陆时间
            $data['updatetime'] = date("Y-m-d H:i:s");
            $data['loginip'] = get_client_ip();
            $data['num'] = $user['num'] + 1;
            $rr = $mod -> where('id="'.$uid.'"') -> save($data);
            if($rr){
                  $this -> success('恭喜登陆成功',U("Index/index"));
            }else{
                  $this -> error('抱歉登陆失败，请重新登陆', U("Login/index"));
            }
            
   }

   //退出登陆
	public function loginOut(){
		
      session_unset();
      session_destroy();
   $this -> success('恭喜退出成功',U("Login/index"));
   
    
	}
	

}