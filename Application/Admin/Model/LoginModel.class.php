<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model { //request 对象
	//自动验证
	protected $_validate = array(     
	array('username','require','用户名必须填写！'),  
	array('password','require','密码必须填写！'),    
	);
}

