<?php
namespace Admin\Model;
use Think\Model;
class StoryModel extends Model { //request 对象
	//字段映射
	//自动验证
	protected $_validate = array(     
			array('title',"require",'标题必须填写！'),     
			array('keyword',"require",'关键字必须填写'),  
			array('describe',"require",'描述必须填写'), 
			array('from',"require",'来源必须填写'), 
			array('content',"require",'稿件内容必须填写'),
			// array('title','badWord','稿件包含违禁词请重新输入',0,'function'), 
	);

	//判断是否有违禁词的函数
	function badWord($title){
		
		//获取违禁词
		$word = M('stop_word');
		$badword = $word -> field('word') -> where('status=0') -> select();
		//处理数据
		foreach ($badword as $k => $v) {
			$bad[] = $v['word'];
		}
		$badlist = "/".implode("|",$bad)."/";
		if(preg_match($badlist,$title)){
			return false;
		}else{
			return true;
		}
	}
	
}

