/**
 * Created by Administrator on 2017/4/17.
 */

$(document).ready(function(){
    $(".nav > ul> li > a ").each(function(){
        $this = $(this).parent('li');
        if(this.href==window.location.href){
            $this.addClass("navon");
        }

    });
});


// 视频切换开始
$(document).ready(function() {
    $('#img_a').on('click', function () {
        showVideo('youkuplayer','XMTg3NTc0NjE2NA==');
    });
    $('#youkuplayer span').on('click', function () {
        $(this).hide();
        showVideo('youkuplayer','XMTg3NTc0NjE2NA==');

    });
});

$("#qiehuan li").click(function () {
    if($(this).index()==0){
        $('#youkuplayer').html('<img id="img_a" src="images/shi3.jpg" /><span></span>');
        $('#img_a').on('click', function () {
            showVideo('youkuplayer','XMTg3NTc0NjE2NA==');
        });
        $('#youkuplayer span').on('click', function () {
            showVideo('youkuplayer','XMTg3NTc0NjE2NA==');
        });
    }else if($(this).index()==1){

        $('#youkuplayer').html('<img id="img_a" src="images/shi4.jpg"  /> <span></span>');
        $('#img_a').on('click', function () {
            showVideo('youkuplayer','XMTg3NzU1NDk0NA==');
        });
        $('#youkuplayer span').on('click', function () {
            showVideo('youkuplayer','XMTg3NzU1NDk0NA==');
        });
    }else if($(this).index()==2){
        $('#youkuplayer').html('<img id="img_a" src="images/shi5.jpg" /><span></span>');
        $('#img_a').on('click', function () {
            showVideo('youkuplayer','XMTg3NTc2MTUwOA==');
        });
        $('#youkuplayer span').on('click', function () {
            showVideo('youkuplayer','XMTg3NTc2MTUwOA==');
        });

    }else if($(this).index()==3){

        $('#youkuplayer').html('<img id="img_a" src="images/shi6.jpg"  /> <span></span>');
        $('#img_a').on('click', function () {
            showVideo('youkuplayer','XMTg3NzU1NDk0NA==');
        });
        $('#youkuplayer span').on('click', function () {
            showVideo('youkuplayer','XMTg3NzU1NDk0NA==');
        });
    }else if($(this).index()==4) {
        $('#youkuplayer').html('<img id="img_a" src="images/shi3.jpg" /><span></span>');
        $('#img_a').on('click', function () {
            showVideo('youkuplayer', 'XMTg3NTc2MTUwOA==');
        });
        $('#youkuplayer span').on('click', function () {
            showVideo('youkuplayer', 'XMTg3NTc2MTUwOA==');
        });
    }
});
function showVideo(videoid,vid) {
    var player = new YKU.Player('youkuplayer',{
        styleid: '0',
        client_id: '368f4a3942851ec2',
        vid: vid,
        flashext: '<param name="wmode" value="Opaque">',
        newPlayer: true,
        show_related: false,
        autoplay: true
    });
}