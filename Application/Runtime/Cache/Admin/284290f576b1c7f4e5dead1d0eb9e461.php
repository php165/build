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
                        <h3><i class="icon-magic"></i>轮播图管理</h3>
                    </div>
                    
                </div>
                <div align="left" style="margin-bottom:10px;">
                    <form class="form-horizontal" action="/commpany/build/index.php/Admin/Pic/index" method="get">
                          <div class="form-group">
                              <label class="control-label"  style="padding-top:0; margin-right:10px;">
                                  <select name="searchtype" id="searchtype" class="input-medium">
                                      <option value="0">--选择搜索类型--</option>

                                      <option <?php if($search == 'content'): ?>selected="selected" <?php else: endif; ?> value="content">图片介绍</option>
                                      <!-- <option <?php if($search == 'type'): ?>selected="selected" <?php else: endif; ?> value="type">分类名</option> -->

                                  </select>
                              </label>
                              <div class="controls pull-left">
                                  <input type="text" class="input-medium" name="contents" value="<?php echo ($contents); ?>">
                                  <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                              </div>
                              <div align="right" style="margin-bottom:10px;">
                                  <a href="<?php echo U('Pic/add');?>" class="btn btn-primary btn-sm"><i class="icon-plus"></i>添加轮播图</a>
                              </div>
                          </div>
                      </form>
                
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="3%">轮播图ID</th>
                        <th width="10%">轮播图</th>
                        <th width="5%">添加时间</th>
                        <th width="5%">图片介绍</th>
                        <th width="3%">状态</th>
                        <th width="5%">操作</th>
                    </tr></thead>
                    <tbody>
                    <form action="/commpany/build/index.php/Admin/Posts/dorecycle" method="post" id="batches">
                    <?php if(is_array($res)): foreach($res as $key=>$vo): ?><tr>
                        <td class="id"><?php echo ($vo["id"]); ?></td>
                        <td><img src="/commpany/build/Public<?php echo ($vo["pic"]); ?>" style="width:200px"></td>
                        <td><?php echo ($vo["addtime"]); ?></td>
                        <td><?php echo ($vo["content"]); ?></td>
                        <td>
                          <?php if(($vo['status'] == 0)): ?>未启用
                          <?php elseif(($vo['status'] == 1)): ?>已启用
                          <?php else: endif; ?>
                        </td>
                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">

                                <a class="status" name="status" href="/commpany/build/index.php/Admin/Pic/status/id/<?php echo ($vo["id"]); ?>">
                                  <?php if(($vo['status'] == 0)): ?>启用
                                  <?php elseif(($vo['status'] == 1)): ?>禁用
                                  <?php else: endif; ?>
                                </a>
                                <a class="green oppost" href="/commpany/build/index.php/Admin/Pic/edit/id/<?php echo ($vo["id"]); ?>">
                                <i class="icon-pencil bigger-130"></i>&nbsp;编辑</a>
                                <a class="oppost red" onclick="return confirm('您确定要删除吗')" href="/commpany/build/index.php/Admin/Pic/del/id/<?php echo ($vo["id"]); ?>"><i class="icon-remove bigger-130"></i>&nbsp;删除</a>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    </form>
                    </tbody>
                </table>
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
<!-- <script type="text/javascript">
  $(function(){
    $(".status").click(function(){
      var id = $(this).next().val();
      $(this).html()="sajlfj";
      $.ajax({
        type: "POST",
        url: "<?php echo U('Type/status');?>",
        data: {'id':id},
        dataType: 'JSON',
        success: function(data){
          if(data.error == 1){
            $(this).html("启用");

            $(this).parent().parent().html("未启用");

          }else if(data.error == 2){
            $(this).html("禁用");

            $(this).parent().parent().html("已启用");
          }
        }
      });
    });

  })
</script> -->
 </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
 
<script src="/commpany/build/Public/Admin/js/ace-extra.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/commpany/build/Public/Admin/js/ace.min.js"></script> 

</body>
</html>