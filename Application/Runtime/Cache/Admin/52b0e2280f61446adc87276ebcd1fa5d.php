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
                
                <li <?php if(in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">会员管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('User/index');?>"> <i class="icon-double-angle-right"></i> 会员列表 </a> </li>
                        <li> <a href="<?php echo U('User/add');?>"> <i class="icon-double-angle-right"></i> 新增会员 </a> </li>
                    </ul>

                </li>
                
                <li <?php if(in_array(2,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="#" class="dropdown-toggle" >
                        <i class="icon-tablet"></i>
                        <span class="menu-text">内容管理</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Story/index');?>">
                            <i class="icon-double-angle-right"></i>
                            稿件列表

                        </a>

                        </li>
                        <li> <a href="<?php echo U('Story/add');?>"><i class="icon-double-angle-right"></i>添加稿件</a></li>

                    </ul>
                </li>
                
                <li <?php if(in_array(3,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">媒体管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Media/index');?>"> <i class="icon-double-angle-right"></i> 媒体列表 </a> </li>
                        <li> <a href="<?php echo U('Media/add');?>"> <i class="icon-double-angle-right"></i> 新增媒体 </a> </li>
                    </ul>

                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) || in_array(2,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">违禁词管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Word/index');?>"> <i class="icon-double-angle-right"></i> 违禁词列表 </a> </li>
                        <li> <a href="<?php echo U('Word/add');?>"> <i class="icon-double-angle-right"></i> 新增违禁词 </a> </li>
                    </ul>

                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) || in_array(2,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">公告管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Notice/index');?>"> <i class="icon-double-angle-right"></i> 公告列表 </a> </li>
                        <li> <a href="<?php echo U('Notice/add');?>"> <i class="icon-double-angle-right"></i> 新增公告 </a> </li>
                    </ul>

                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) ): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="<?php echo U('Admin/index');?>" >
                        <i class="icon-user"></i>
                        <span class="menu-text">管理员管理</span>

                    </a>

                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) || in_array(4,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="<?php echo U('Finance/index');?>">
                        <i class="icon-magic"></i>
                        <span class="menu-text">财务管理</span>
                    </a>

                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) ): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="#"  class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text">系统设置 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Set/setBase');?>"> <i class="icon-double-angle-right"></i> 基本设置 </a> </li>
                        <li> <a href="<?php echo U('Set/setDeploy');?>"> <i class="icon-double-angle-right"></i> 系统设置 </a> </li>
                        <li> <a href="<?php echo U('Set/setRank');?>"> <i class="icon-double-angle-right"></i> 等级设置 </a> </li>
                        <!-- <li> <a href="<?php echo U('Set/setCash');?>"> <i class="icon-double-angle-right"></i> 提现设置 </a> </li> -->

                        <li>
                            <a href="<?php echo U('Set/setPay');?>">
                            <i class="icon-double-angle-right"></i>

                              <span>支付方式</span>

                            </a>

                        </li>
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
                  <h4><span style="float:right;"><a href='/commpany/build/index.php/Admin/Index/index'>返回</a></span></h4>
                  	<div class="span10">
                <form method="post" action="/commpany/build/index.php/Admin/Index/updatePass/">     
                <dl class="zc_dl">
                  <dt>尊敬的<?php echo ($user); ?>用户：</dt><br/>
                  <dd>
                    <span style="color:red">*</span>&nbsp;请输入初始密码:
                    <input type="password" name="oldpass" value="" class="zc_btn" placeholder="请输入初始密码" />
                  </dd><br/>
                  <dd>
                    <span style="color:red">*</span>&nbsp;请&nbsp;输&nbsp;入&nbsp;新&nbsp;密&nbsp;码:
                    <input type="password" name="newpass" value="" class="zc_btn" placeholder="请输入新密码" />
                  </dd><br/>
                  <dd>
                    <span style="color:red">*</span>&nbsp;请再次输入新密码:
                    <input type="password" name="repass" value="" class="zc_btn" placeholder="请再次输入新密码" />
                  </dd><br/>
                </dl>
                
                <dd>
                  <span style="color:red">*</span>&nbsp;
                  <input type="submit" class="zc_btn" value="提交"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="reset" class="zc_btn" value="重置"  />
                </dd>
              </div>
              <form/>
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