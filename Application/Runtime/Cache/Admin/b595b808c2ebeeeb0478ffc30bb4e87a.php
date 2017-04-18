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
                
                <li <?php if(in_array(3,$_SESSION['rid']) || in_array(1,$_SESSION['rid'])): ?>style="display:block" <?php else: ?> style="display:none"<?php endif; ?>>
                    <a class="dropdown-toggle">
                        <i class="icon-group"></i>
                        <span class="menu-text">古建百科管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li> <a href="<?php echo U('Media/index');?>"> <i class="icon-double-angle-right"></i> 古建百科列表 </a> </li>
                        <li> <a href="<?php echo U('Media/add');?>"> <i class="icon-double-angle-right"></i> 添加古建百科 </a> </li>
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
                <div class="row indexBox">
              <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3 class="red">
                            <i class="icon-volume-down icon-2x green"></i>
                            欢迎您！<i class="blue"><?php echo ($user); ?></i>
                        </h3>


                    </div>
                </div>
                <ul class="indexK">
                    <li class="blueBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-calendar"></i>
                        </span>
                        <span class="indexKRight">
                            <b><?php echo ($vo["account"]); ?></b>
                            当日充值金额
                        </span>
                    </li>
                    <li class="greenBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-bar-chart"></i>
                        </span>
                        <span class="indexKRight">
                            <b><?php echo ($vo["pay"]); ?></b>
                            当日交易金额
                        </span>
                    </li>
                    <li class="redBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-group"></i>
                        </span>
                        <span class="indexKRight">
                            <b><?php echo ($vo["vip"]); ?></b>
                            当日新增会员数
                        </span>
                    </li>
                    <li class="yellowBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-glass"></i>
                        </span>
                        <span class="indexKRight">
                            <b><?php echo ($vo["payvip"]); ?></b>
                            当日激活数
                        </span>
                    </li>
                </ul>
                <div class="indexTable">
                    <div class="indexTableRight">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>已付款订单列表</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="90px">用户名</th>
                                <th width="120px">订单号</th>
                                <th width="100px">时间</th>
                                <th width="60px">总价</th>
                                <th width="100px">类型</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($res)): foreach($res as $key=>$vo): ?><tr>
                                <td><?php echo ($vo['name']); ?></td>
                                <td><?php echo ($vo['order']); ?></td>
                                <td><?php echo ($vo['add_time']); ?></td>
                                <td><?php echo ($vo['account']); ?></td>
                                <td><?php echo ($vo['project']); ?></td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>新加入会员列表</span>
                        </h4>
                        <table>
                            <thead>
                                <tr><th width="60px">会员ID</th>
                                <th width="60px">会员名</th>
                                <th width="100px">时间</th>
                                <th width="60px">激活状态</th>
                                <th width="80px">余额</th>
                                <th width="60px">公司名称</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo["id"]); ?></td>
                                    <td><?php echo ($vo["vip_name"]); ?></td>
                                    <td><?php echo ($vo['add_time']); ?></td>
                                    <td>
                                        <?php switch($vo["status"]): case "1": ?><span style="color:red">*</span>&nbsp;已激活<?php break;?>
                                            <?php case "0": ?>未激活<?php break;?>
                                            <?php default: endswitch;?>
                                    </td>
                                    <td>￥<?php echo ($vo["account"]); ?></td>
                                    <td><?php echo ($vo["company"]); ?></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
                <!--/.box-->
            </div>
       <!-- /.page-content -->
        </div><!-- /.main-content -->
 </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
 
<script src="/commpany/build/Public/Admin/js/ace-extra.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/ace.min.js"></script> 

</body>
</html>