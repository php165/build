<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//加载登陆页面
	public function index(){
            //检测数据库是否连接
		
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
      // var_dump($_POST);
      // 验证验证码
      $Verify = new \Think\Verify();
      $res = $Verify->check($_POST['code']);
      if($res){
      	//验证账号
      	$mod = M("admin");
      	$user = $mod -> where('admin="'.$_POST['admin'].'"')->find();
      	// dump($user);exit;
      	if($user){
      		//验证密码
      		if(md5($_POST['password'])==$user['password']){
      			//用户信息存储到session中
      			session('ad',$user);
                        //根据用户信息查询对应的权限
                        $uid = $user['id'];
                        $mod = M();
                        $res = $mod -> query('select n.action,n.fangfa from ad_admin_role as ar,ad_role_node as rn,ad_node as n where ar.uid='.$uid.' and ar.rid=rn.rid and rn.nid=n.id');
                        // dump($res);die;
                        // array (size=4)
                        //   0 => 
                        //     array (size=2)
                        //       'action' => string 'Media' (length=5)
                        //       'fangfa' => string 'index' (length=5)
                        //   1 => 
                        //     array (size=2)
                        //       'action' => string 'Media' (length=5)
                        //       'fangfa' => string 'add' (length=3)
                        //   2 => 
                        //     array (size=2)
                        //       'action' => string 'Media' (length=5)
                        //       'fangfa' => string 'edit' (length=4)
                        //   3 => 
                        //     array (size=2)
                        //       'action' => string 'Media' (length=5)
                        //       'fangfa' => string 'del' (length=3)

                        // array(
                        //       'Media' => array(index,add,edit,del ),

                        //       );
                  //封装数据
                     $nodelist=[];
                        foreach($res as $v){
                              if($v['fangfa']=='add'){
                                    $nodelist[$v['action']][]='insert';
                              }
                              if($v['fangfa']=='edit'){
                                    $nodelist[$v['action']][]='update';
                              }
                              $nodelist[$v['action']][]=$v['fangfa'];
                        }
                        $nodelist['Index'][]='index';
                        //把权限放入session
                        $_SESSION['nodelist']=$nodelist;

                        //查看用户权限并存入session
                        $adminRole = M('admin_role');
                        $uid = $user['id'];
                        $ar = $adminRole -> where('uid='.$uid) -> select();
                        //处理数据
                        $rid = [];
                        foreach ($ar as $k => $v) {
                              $rid[] = $v['rid'];
                              
                        }
                        session('rid',$rid);
      			$this -> redirect("/Admin/Index/index");
      			
      		}else{
      			$this -> error('密码错误');
      		}

      	}else{
      		$this -> error('账号不存在');
      	}
      }else{
      	//验证码失败
      	$this -> error('验证码失败');
      }

   }

   //退出登陆
	public function loginOut(){
		
      session('ad',null);
   $this -> redirect('Admin/Login/index');
   
    
	}
	

}