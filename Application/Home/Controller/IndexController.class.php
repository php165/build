<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	
    	echo "这是网站前台";

    	$url = U("Admin/Index/index");
    	echo "<h3><a href='{$url}'>这是网站后台<a/></h3>";
    }
}