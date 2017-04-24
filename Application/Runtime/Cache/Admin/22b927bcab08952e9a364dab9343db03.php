<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>帮你修后台管理系统</title>
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
                <small>帮你修管理后台 </small>
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


   
<script type="text/javascript" charset="utf-8" src="/commpany/build/Public/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/commpany/build/Public/UEditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/commpany/build/Public/UEditor/lang/zh-cn/zh-cn.js"></script>
    <div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
              <div class="box-title margin_bot_20">
                    <div class="span10">
                    <h4><span style="float:right;"><a href='/commpany/build/index.php/Admin/Type/index'>返回</a></span></h4>
                        <h3><i class="icon-magic"></i>添加分类</h3>
                    </div>
                </div>
                  <form action="/commpany/build/index.php/Admin/Type/insert" method="post" class="form-horizontal">
                      <div class="form-group">
                          <label class="control-label">分类名 : </label>
                          <div class="controls pull-left">
                              <input type="text" class="input-large" name="type">
                              <span class="help-inline red"> * </span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">分类描述 : </label>
                          <textarea class="input-large" style="margin: 0px; height: 115px; width: 530px;" name="content"></textarea>
                      </div>
                      <div class="form-group">
                          <label class="control-label">是否启用 : </label>
                          <input type="radio" name="status" value="1">&nbsp;是&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="status" value="0">&nbsp;否
                      </div>
                      <div>
                          <label class="control-label"></label>
                          <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">添加</button>
                      </div>
                  </form>
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