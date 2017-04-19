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
                        <span class="menu-text">管理员管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('User/index');?>"> <i class="icon-double-angle-right"></i> 管理员列表 </a> </li>
                        <li> <a href="<?php echo U('User/add');?>"> <i class="icon-double-angle-right"></i> 添加管理员 </a> </li>
                    </ul>

                </li>

                <li <?php if(in_array(2,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="#" class="dropdown-toggle" >
                        <i class="icon-group"></i>
                        <span class="menu-text">古建新闻管理</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('News/index');?>">
                            <i class="icon-double-angle-right"></i>
                            古建新闻列表

                        </a>

                        </li>
                        <li> <a href="<?php echo U('News/add');?>"><i class="icon-double-angle-right"></i>添加古建新闻</a></li>

                    </ul>
                </li>
                
                <li <?php if(in_array(2,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">古建百科管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Cyclopedia/index');?>"> <i class="icon-double-angle-right"></i> 古建百科列表 </a> </li>
                        <li> <a href="<?php echo U('Cyclopedia/add');?>"> <i class="icon-double-angle-right"></i> 添加古建百科 </a> </li>
                    </ul>

                </li>
                <li <?php if(in_array(2,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">古建保护管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Protect/index');?>"> <i class="icon-double-angle-right"></i> 古建保护列表 </a> </li>
                        <li> <a href="<?php echo U('Protect/add');?>"> <i class="icon-double-angle-right"></i> 添加古建保护文章 </a> </li>
                    </ul>
                </li>
                <li <?php if(in_array(2,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">古建欣赏管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Cyclopedia/index');?>"> <i class="icon-double-angle-right"></i> 古建百科列表 </a> </li>
                        <li> <a href="<?php echo U('Cyclopedia/add');?>"> <i class="icon-double-angle-right"></i> 添加古建百科 </a> </li>
                    </ul>
                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) || in_array(2,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">古建图库管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Word/index');?>"> <i class="icon-double-angle-right"></i> 古建图库列表 </a> </li>
                        <li> <a href="<?php echo U('Word/add');?>"> <i class="icon-double-angle-right"></i> 添加古建图库 </a> </li>
                    </ul>

                </li>
                <li <?php if(in_array(1,$_SESSION['rid']) || in_array(2,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">古建视频管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Notice/index');?>"> <i class="icon-double-angle-right"></i> 古建视频列表 </a> </li>
                        <li> <a href="<?php echo U('Notice/add');?>"> <i class="icon-double-angle-right"></i> 添加古建视频 </a> </li>
                    </ul>

                </li>
                <!-- <li <?php if(in_array(1,$_SESSION['rid']) ): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="<?php echo U('Admin/index');?>" >
                        <i class="icon-user"></i>
                        <span class="menu-text">管理员管理</span>

                    </a>

                </li> -->
                <!-- <li <?php if(in_array(1,$_SESSION['rid']) || in_array(4,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="<?php echo U('Finance/index');?>">
                        <i class="icon-magic"></i>
                        <span class="menu-text">财务管理</span>
                    </a>

                </li> -->
                <li <?php if(in_array(1,$_SESSION['rid']) ): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a href="#"  class="dropdown-toggle">
                        <i class="icon-cogs"></i>
                        <span class="menu-text">系统设置 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <!-- <ul class="submenu">
                        <li> <a href="<?php echo U('Set/setBase');?>"> <i class="icon-double-angle-right"></i> 基本设置 </a> </li>
                        <li> <a href="<?php echo U('Set/setDeploy');?>"> <i class="icon-double-angle-right"></i> 系统设置 </a> </li>
                        <!-- <li> <a href="<?php echo U('Set/setRank');?>"> <i class="icon-double-angle-right"></i> 等级设置 </a> </li> -->
                        <!-- <li> <a href="<?php echo U('Set/setCash');?>"> <i class="icon-double-angle-right"></i> 提现设置 </a> </li> -->

                       <!--  <li>
                            <a href="<?php echo U('Set/setPay');?>">
                            <i class="icon-double-angle-right"></i>

                              <span>支付方式</span>

                            </a>

                        </li> -->
                    <!-- </ul> --> 
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
                      <h4><span style="float:right;"><a href='/commpany/build/index.php/Admin/Cyclopedia/index'>返回</a></span></h4>
                        <div class="span10">
                            <dl class="zc_dl">
                              <dt>标题：</dt>
                              <dd>
                                <span style="color:red">*</span>&nbsp;
                                <input type="text" name="title" disabled="disabled" value="<?php echo ($res["title"]); ?>" class="zc_btn" size="100%" placeholder="请输入标题" valid='required|limit'  min="6" max="20" errmsg=""  />
                              </dd>
                            </dl>
                            <dl class="zc_dl">
                              <dt>类型：</dt>
                              <dd>
                                <span style="color:red">*</span>&nbsp;
                                <input type="text" disabled="disabled" name="type" class="zc_btn" value="<?php echo ($res["type"]); ?>" valid="required|limit"  min="20" max="40" errmsg="" />
                              </dd>
                            </dl>
                              <dl class="zc_dl">
                              <dt>内容：</dt><br/>
                              <div width="100%" height="100%">
                                <?php echo ($res["content"]); ?>
                              </div>
                              <!-- <dd>
                                <span style="color:red">*</span>&nbsp;
                                <div>
                                    <textarea id="editor" disabled="disabled" disabled="disabled" type="text/plain" name="content" style="width:100%;height:300px;"><?php echo ($res["content"]); ?></textarea>
                                </div>
                                <script type="text/javascript">
                                    //实例化编辑器
                                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                                    var ue = UE.getEditor('editor');
                                </script>
                                
                              </dd> -->                            
                            </dl>
                          </div>
                          <form/>
                    </div>

                <!--/.box-->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container-inner -->
    </div><!-- /.main-container -->
 </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
 
<script src="/commpany/build/Public/Admin/js/ace-extra.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/ace.min.js"></script> 

</body>
</html>