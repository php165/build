<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>金玉海和后台管理系统</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="/commpany/build/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/commpany/build/Public/Admin/css/font-awesome.min.css" />
<link rel="stylesheet" href="/commpany/build/Public/Admin/css/ace.min.css" />
<link rel="stylesheet" type="text/css" href="/commpany/build/Public/Admin/css/style.css">

<script src='/commpany/build/Public/Admin/js/jquery-1.8.3.min.js'></script>

</head>
<body>
<div class="navbar navbar-default"> 
    <div class="navbar-container">
        <div class="navbar-header pull-left"> 
            <a href="<?php echo U('Index/index');?>" class="navbar-brand"> 
                <small>金玉海和管理后台 </small>
            </a>
         </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li > 
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle"> 
                        <i class="icon-user bigger-140"></i><?php echo $_SESSION['user']['username'];?>
                    </a>
                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="<?php echo U('Index/pass');?>">
                                <i class="icon-edit"></i>
                                修改密码
                            </a>
                        </li>
                    </ul>
                </li>
                <li > 
                    <a href="<?php echo U('Admin/Login/LoginOut');?>"> 
                        <i class="icon-off bigger-130"></i>退出
                    </a>
                </li>
            </ul><!-- /.ace-nav --> 
        </div><!-- /.navbar-header --> 
    </div><!-- /.navbar-container--> 
</div><!-- /.navbar--> 
<!--   -->

<div class="main-container">
    <div class="main-container-inner">
        <div class="sidebar" id="sidebar">
            <ul class="nav nav-list">
                <li class="active">
                    <a href="<?php echo U('Index/index');?>">
                        <i class="icon-home"></i>
                        <span class="menu-text">首页 </span>
                    </a>
                </li>
                
                <li <?php if((!empty($_SESSION['nodelist']['User']))): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">管理员管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('User/index');?>"> <i class="icon-double-angle-right"></i> 管理员列表 </a> </li>
                        <li> <a href="<?php echo U('User/add');?>"> <i class="icon-double-angle-right"></i> 添加管理员 </a> </li>
                    </ul>
                </li>

                <li <?php if((!empty($_SESSION['nodelist']['Role']))): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">角色管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Role/index');?>"> <i class="icon-double-angle-right"></i> 角色列表 </a> </li>
                        <li> <a href="<?php echo U('Role/add');?>"> <i class="icon-double-angle-right"></i> 添加角色 </a> </li>
                    </ul>
                </li>

                <li <?php if((!empty($_SESSION['nodelist']['Article']))): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">内容管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Article/index');?>"> <i class="icon-double-angle-right"></i> 内容列表 </a> </li>
                        <li> <a href="<?php echo U('Article/add');?>"> <i class="icon-double-angle-right"></i> 添加内容 </a> </li>
                    </ul>
                </li>

                <li <?php if((!empty($_SESSION['nodelist']['Type']))): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">分类管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Type/index');?>"> <i class="icon-double-angle-right"></i> 分类列表 </a> </li>
                        <li> <a href="<?php echo U('Type/add');?>"> <i class="icon-double-angle-right"></i> 添加分类 </a> </li>
                    </ul>
                </li>
                
                <li <?php if((!empty($_SESSION['nodelist']['Set'])) ): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="#"  class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text">系统设置 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                   <ul class="submenu">
                        <li> <a href="<?php echo U('Set/index');?>"> <i class="icon-double-angle-right"></i> 基本设置 </a> </li>
                        <li> <a href="<?php echo U('Set/addperson');?>"> <i class="icon-double-angle-right"></i> 联系人设置 </a> </li>
                        <li> <a href="<?php echo U('Pic/index');?>"> <i class="icon-double-angle-right"></i> 轮播图设置 </a> </li>
                        <!-- <li> <a href="<?php echo U('Set/setCash');?>"> <i class="icon-double-angle-right"></i> 提现设置 </a> </li> -->
                    </ul>
                </li>
            </ul>
       <!-- /.nav-list -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>


   
        <div class="main-content">
          <div class="page-content">
            <div class="row">
              <div class="page-content box">
              	<div class="box-title margin_bot_20">
                  	<div class="span10">
                   		<h3><i class="icon-cogs"></i>管理员管理 </h3>
                  	</div>
                </div>
                  <form class="form-horizontal" action="/commpany/build/index.php/Admin/User/index" method="get">
                      <div class="form-group">
                          <label class="control-label"  style="padding-top:0; margin-right:10px;">
                              <select name="searchtype" id="searchtype" value="<?php echo ($search); ?>" class="input-medium">
                                  <option value="0">--选择搜索类型--</option>

                                  <!-- <option <?php if($search == 'role'): ?>selected='selected' <?php else: endif; ?> value="role">管理员权限</option> -->
                                  <option <?php if($search == 'username'): ?>selected='selected' <?php else: endif; ?> value="username">管理员名称</option>

                              </select>
                          </label>
                          <div class="controls pull-left">
                              <input type="text" name="content" value="<?php echo ($content); ?>" class="input-medium">
                              <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                          </div>
                          <div align="right" style="margin-bottom:10px;">
                                  <a href="<?php echo U('User/add');?>" class="btn btn-primary btn-sm"><i class="icon-plus"></i>添加管理员</a>
                              </div>
                      </div>
                  </form>
                <div class="tableHead">
                    <table class="table table_img table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:5%;">ID</th>
                                <th style="width:5%;">管理员名称</th>
                                <th style="width:5%;">添加时间</th>
                                <th style="width:5%;">最近登录时间</th>
                                <th style="width:5%;">最近登录IP </th>
                                <th style="width:5%;">登录数</th>
                                <th style="width:5%;">状态</th>
                                <th style="width:5%;">操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="table_hy">
                    <table class="table table_img table-striped table-bordered  table-hover">
                         <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                            <td id="uid"><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td><?php echo ($vo["addtime"]); ?></td>
                            <td><?php echo ($vo["updatetime"]); ?></td>
                            <td><?php echo ($vo["loginip"]); ?></td>
                            <td><?php echo ($vo["num"]); ?></td>
                            <!-- <td>
                                <?php echo ($vo["pay"]); ?><br/>
                                <?php echo ($vo["consume"]); ?>
                            </td> -->
                            <td>
                                <?php switch($vo["status"]): case "0": ?>已启用<?php break;?>
                                  <?php case "1": ?>未启用<?php break;?>
                                  <?php default: endswitch;?>
                            </td>
                            <td class="green information">
                                <a href="/commpany/build/index.php/Admin/User/edit/id/<?php echo ($vo["id"]); ?>" class="green cancel">修改权限</a>
                                <a href="/commpany/build/index.php/Admin/User/status/id/<?php echo ($vo["id"]); ?>" class="green cancel">
                                      <?php if(($vo["status"] == 1) ): ?>启用
                                      <?php else: ?>禁用<?php endif; ?>
                                </a>
                                <a onclick="return confirm('您确定要删除吗')" href="/commpany/build/index.php/Admin/User/del/id/<?php echo ($vo["id"]); ?>" class="green cancel">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </table>
                </div> 
           
                <ul class="pagination pull-right" style="margin-top:20px; margin-bottom:0;">
                    <?php echo ($url); ?>
                    <!-- <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li> -->
                </ul>
              </div>
            </div>
            <!--/.box-->
          </div><!-- /.page-content -->
        </div><!-- /.main-content -->
 </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
 
<script src="/commpany/build/Public/Admin/js/ace-extra.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/ace.min.js"></script> 

</body>
</html>