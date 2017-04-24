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
          <div class="breadcrumbs">
            <!-- <ul>
              <li class="active"> <a href="/commpany/build/index.php/Admin/Set/setBase">基本设置 </a></li>
              <li> <a href="/commpany/build/index.php/Admin/Set/setDeploy">系统配置 </a></li>
              <li> <a href="/commpany/build/index.php/Admin/Set/setRank">等级设置 </a></li>
              <li> <a href="/commpany/build/index.php/Admin/Set/setPay">支付方式 </a></li>
            </ul> -->
            <!-- .breadcrumb -->
          </div>
          <div class="page-content">
            <div class="row">
              <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>基本设置</h3>
                    </div>
                </div>
                <form action="/commpany/build/index.php/Admin/Set/update" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label">商城名称 : </label>
                    <div class="controls pull-left">
                      <input type="text"  name="name"  value="<?php echo ($vo["name"]); ?>" class="input-large">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">关键词 : </label>
                    <div class="controls pull-left">
                      <input type="text" name="keyword"  value="<?php echo ($vo["keyword"]); ?>" class="input-large">
                      <span class="help-inline"> 多个关键字请用空格分开 </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">网站LOGO: </label>
                    <div class="controls pull-left"> 
                      <img src="/commpany/build/Public<?php echo ($vo["logo"]); ?>"  style="max-height: 100px;"> 
                      <span class="help-inline">
                        <input type="file" name="logo"> 上传LOGO
                        <span class="help-inline"></span> 
                      </span> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">二维码: </label>
                    <div class="controls pull-left"> 
                      <img src="/commpany/build/Public<?php echo ($vo["mastermap"]); ?>"  style="max-height: 100px;"> 
                      <span class="help-inline">
                        <input type="file" name="mastermap"> 上传二维码
                        <span class="help-inline">建议尺寸：宽100像素，高100像素</span> 
                      </span> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">商城描述 : </label>
                    <div class="controls pull-left">
                      <textarea class="input-large" name="content"  style="margin: 0px; height: 115px; width: 530px;"><?php echo ($vo["content"]); ?></textarea>
                      <span class="help-inline"> 请输入不超过 20 字符. </span> </div>
                  </div>
                  <div class="form-actions">
                    <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
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