<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model { //request 对象
	//字段映射
	//自动验证
	protected $_validate = array(     
	array('vip_name','require','用户名必须填写！'), //默认情况下用正则进行验证     
	array('vip_name','','会员名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一当值不为空的时候判断是否在一个范围内 
	array('vip_name','/^[\w]{3,9}$/','用户名只能是a-z并包含0-9|用户名长度必须在3-9之间',1,'regex',3),//验证用户名格式    
	array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致     
	array('password','checkPwd','密码格式不正确|密码长度必须在6-20位之间',0,'function'), // 自定义函数验证密码格式 
	array('company','require','公司名称必须填写！'), //默认情况下用正则进行验证  
	array('address','require','公司地址必须填写！'), //默认情况下用正则进行验证  
	array('phone',"/^1[3-8][0-9][0-9]{8}$/",'手机号格式不正确',1,'regex',3),   
	array('qq',"/^[\d]{6-13}$/",'QQ号格式不正确',1,'regex',3),   
	);

	//验证密码函数
	public function checkPwd($pass){
		if($password.length>=6 && $password.length<=20){
			return true;
		}else{
			return false;
		}
	}
	
}

