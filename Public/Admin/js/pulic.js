$(function(){
	$('#bsubmit').on('click', function () {
        var $btn = $(this).button('loading')
       // amend("修改成功")
    });
	$(".detail").click(function(){
		detail("确定要删除？")
	});
//图标
  $("#icon_i").click(function () {
      $("#all_Icon").toggle();
    });
    $(".icon_list li").click(function(){
        var $thisclass = $(this).children("i").attr("class");
       $("#icon_i").siblings("i").attr("class", $thisclass)
       $("#icon").val($thisclass);
       $("#all_Icon").hide();
    });
//导航颜色
  $("#icon_color").click(function () {
      $("#xz_color").toggle();
    });
    $("#xz_color span").click(function(){
        var $thisclass = $(this).attr("class");
        $("#icon_color").attr("class", $thisclass +" icon_color help-inline")
        $("#color_hide").val($thisclass);
       $("#xz_color").hide();
    });
//图标颜色
  $("#icon_cc").click(function () {
      $("#xx_color").toggle();
    });
    $("#xx_color span").click(function(){
        var $thisclass = $(this).attr("class");
        $("#icon_cc").attr("class", $thisclass +" icon_color help-inline")
        $("#color_hidec").val($thisclass);
       $("#xx_color").hide();
    });
//商品名称(上架 推荐  热卖)
  $("#product td").click(function(){
      $(this).find("i").toggleClass("green").toggleClass("red").toggleClass("icon-remove").toggleClass("icon-ok");
  })
//商品名称(返点设置)
  $("#product .input-mini").focus(function(){
      $(this).removeClass("none_input")
  });
  $("#product .input-mini").blur(function(){
      $(this).addClass("none_input")
  })
//会员管理
  function hyHeight(){
      var cc = $(".navbar").height();
      var aa = $(".box-title").height()+20;
      var bb = $(window).height();
      $("#table_hy").css({"max-height":bb-(aa+cc+150)});
  };
  hyHeight()
  $(window).resize(function(){
    hyHeight()
  });
//会员管理（取消资格）
  $(".cancel").click(function(){
      detail("确定要取消资格吗?")
  });
  //会员管理（发送消息）
  $(".information").click(function(){
      information("")
  })
  //二维码图片
  $(".img").click(function(){
      img("scene_1")
  });
  //取消订单
  $(".indent").click(function(){
      detail("您确定要取消订单？")
  });
  
   //发货
  $(".goods").click(function(){
      goods()
  });
   //确定收货
  $(".shouhuo").click(function(){
      detail("确定收货吗？")
  });
    //退货确认
  $(".tuihuo").click(function(){
      detail("确定退货？")
  });
//支付方式
  //支付方式
  $(".aplay").change(function(){
     $("#weixin,#alipay,#baidu").hide()
     $('#'+$(this).val()).show();
  })
});
function amend(message){
	var myDetail = ['<div class="modal fade" id="myAmend" style="overflow: visible;">',
                      	'<div class="modal-dialog modal-sm">',
                      		'<div class="modal-content">',
                      			'<div class="modal-header detail_header border">',
          							'<h4 class="modal-title" id="mySmallModalLabel">',
      									'<i class="icon-ok bigger-140" style="margin-right:10px;  width: 30px;height: 30px;background: #F4F4F4;border-radius: 100%;border: 1px solid #ccc;font-size: 18px;text-align: center;line-height: 30px;color: #B0B0B0;"></i>',
      									'<span>'+message+'</span>',
  									'</h4>',
        						'</div>',
                      		'</div>',
                      	'</div>',
                    '</div>'].join('\n');
	$("body").append(myDetail);
	$('#myAmend').modal()
		setTimeout(function(){
			$(".modal-backdrop,#myAmend").remove();
   		},900);	
}
function detail(message){
	var myDetail = ['<div class="modal fade" id="myModalDetail" style="overflow: visible;">',
                      	'<div class="modal-dialog modal-sm">',
                      		'<div class="modal-content">',
                      			'<div class="detail_header">',
          							'<h4 class="modal-title" id="mySmallModalLabel">',
      									/*'<i class="icon-trash bigger-160" style="margin-right:10px;"></i>',*/
      									'<span>'+message+'</span>',
  									'</h4>',
        						'</div>',
        						'<div class="modal-body detail_sm">',
          							'<button type="button" class="btn btn-sm btn-default"  id="cancel">取消</button>',
                    				'<button type="button" class="btn btn-sm btn-primary" id="del">确定</button>',
        						'</div>',
                      		'</div>',
                      	'</div>',
                    '</div>'].join('\n');
	$("body").append(myDetail);
	$('#myModalDetail').modal()
	$("#cancel").click(function(){
		$('#myModalDetail,.modal-backdrop').removeClass("in");
		setTimeout(function(){
			$(".modal-backdrop,#myModalDetail").remove();
   		},100);	
	})
  $("#del").click(function(){
    $('#myModalDetail,.modal-backdrop').removeClass("in");
    setTimeout(function(){
      $(".modal-backdrop,#myModalDetail").remove();
      },100); 
  })
}
function information(message){
  var information = ['<div class="modal fade" id="information" style="overflow: visible;">',
                        '<div class="modal-dialog modal-sm">',
                          '<div class="modal-content">',
                            '<div class="detail_header">',
                        '<h4 class="modal-title" id="mySmallModalLabel">',
                        '<textarea style="width:100%; height:100px; resize:none; padding:5px; line-height:20px;">'+message+'</textarea>',
                    '</h4>',
                    '</div>',
                    '<div class="modal-body detail_sm">',
                        '<button type="button" class="btn btn-sm btn-default"  id="cancel_cc">取消</button>',
                            '<button type="button" class="btn btn-sm btn-primary">确定</button>',
                    '</div>',
                          '</div>',
                        '</div>',
                    '</div>'].join('\n');
  $("body").append(information);
  $('#information').modal()
  $("#cancel_cc").click(function(){
    $('#information,.modal-backdrop').removeClass("in");
    setTimeout(function(){
      $(".modal-backdrop,#information").remove();
      },100); 
  })
}
function img(message){
  var img = ['<div class="modal fade" id="img" style="overflow: visible;">',
                        '<div class="modal-dialog modal-sm">',
                          '<div class="modal-content">',
                            '<div class="modal-header border_bot detail_header border" style="padding:0">',
                        '<h4 class="modal-title" id="mySmallModalLabel">',
                        '<img src="images/'+message+'.jpg">',
                    '</h4>',
                    '</div>',
                    /*'<div class="modal-body detail_sm">',
                        '<button type="button" class="btn btn-sm btn-default"  id="cancel_img">取消</button>',
                            '<button type="button" class="btn btn-sm btn-primary">确定</button>',
                    '</div>',*/
                          '</div>',
                        '</div>',
                    '</div>'].join('\n');
  $("body").append(img);
  $('#img').modal()
  $(".modal-backdrop").live("click",function(){
    alert(1)
    $('#img,.modal-backdrop').removeClass("in");
    setTimeout(function(){
      $(".modal-backdrop,#img").remove();
      },100); 
  })
}
//发货
function goods(message){
  var goods = ['<div class="modal fade" id="goods">',
                    '<div class="modal-dialog">',
                      '<div class="modal-content">',
                        '<div class="modal-header">',
                          '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                          '<h4 class="modal-title">快递信息</h4>',
                        '</div>',
                        '<div class="modal-body">',
                          '<form>',
                            '<div class="form-group">',
                              '<label for="recipient-name" class="control-label">快递公司:</label>',
                              '<input type="text" class="form-control">',
                            '</div>',
                           '<div class="form-group">',
                              '<label for="recipient-name" class="control-label">快递单号:</label>',
                              '<input type="text" class="form-control">',
                            '</div>',
                          '</form>',
                        '</div>',
                        '<div class="modal-footer">',
                          '<button type="button" class="btn btn-default" id="cancel_cc">取消</button>',
                          '<button type="button" class="btn btn-primary">确定</button>',
                        '</div>',
                      '</div>',
                    '</div>',
                  '</div>'].join('\n');
  $("body").append(goods);
  $('#goods').modal()
  $("#cancel_cc").click(function(){
    $('#goods,.modal-backdrop').removeClass("in");
    setTimeout(function(){
      $(".modal-backdrop,#goods").remove();
      },100); 
  })
}
