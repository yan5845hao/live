// JavaScript Document
//焦点图

var myfocus = function(id,isNumber,isImg){
    var index=0,
        obj=$("#"+id+" li"),
        length = obj.length;
    var change=function(num){
        obj.eq(num).siblings("li").fadeOut(900).css("z-index","0");
        obj.eq(num).fadeIn(600);
        obj.eq(num).css({"background-color":obj.eq(num).attr("data-color"),"z-index":"99"})
        $("#"+id).siblings(".dot").find("span").eq(num).addClass("cur").siblings("span").removeClass("cur");
    };
    var prev =function(){
        if(index>0){
            index--;
        }
        if(index<0)index=length-1;
        change(index);
    };
    var next = function(){
        if(index<length){
            index++;
        }
        if(index>length-1)index=0;
        change(index);
    };
    var init =function(){
        if(!isImg){
            for(var i=0;i<length;i++){
                if(isNumber){
                    var html = "<span>"+(i+1)+"</span>";
                }else{
                    var html = "<span></span>";
                }
                $("#"+id).siblings(".dot").append(html);
            }
        }

        var dotline = $("#"+id).siblings(".dot").find("span");
        dotline.on("click",function(){
            var n = $(this).index();
            change(n);
            index = n;
            clearInterval(timer);
            timer = setInterval(function(){next ();},6000);
        });

        obj.on("mouseover",function(){
            clearInterval(timer);
        });
        obj.on("mouseout",function(){
            timer = setInterval(function(){next ();},6000);
        });
        change(index);
    };

    init();
    var timer = setInterval(function(){next ();},6000);
}
/*标签切换*/
var changeTab =function(id,isspan){

    var o = $("#"+id);
    o.title = o.find("#tab a");
    o.con = o.find("#content li");
    o.title.on("click",function(){
        $(this).addClass("cur").siblings("a").removeClass("cur");
        var i = $(this).index();
        if(isspan){
            i = i>0?i/2:0;
        }
        o.con.eq(i).show().siblings("li").hide();
    })
}
/*竖版标签切换*/
var changeTabV = function(id,isspan){
    var o = $("#"+id);
    o.title = o.find(".tab a");
    o.con = o.find(".content .con");
    o.title.on("click",function(){
        $(this).addClass("cur").siblings("a").removeClass("cur");
        var i = $(this).index();
        if(isspan){
            i = i>0?i/2:0;
        }
        o.con.eq(i).show().siblings().hide();
    })
}
/*图集*/
var album = function(id,maxshow){

    var o = $("#"+id);
    var index =0,ul = o.find("ul"),li = o.find("li"),length = li.length,prev = o.find(".prev"),next=o.find(".next");
    var perWidth = parseInt(li.css("width"))+parseInt(li.css("margin-right"))+parseInt(li.css("margin-left"));
    var w = perWidth*length;
    ul.css("width",w+"px");
    var nextF =function(){
        index++;
        if(index>(length-maxshow)){
            index = length-maxshow;
            return false;
        }else{
            var moveW = index*perWidth;
            ul.animate({"left":"-"+moveW+"px"});
        }
    }
    var prevF =function(){
        index--;
        if(index<0){
            index = 0;
            return false;
        }else{
            var moveW = index*perWidth;
            ul.animate({"left":"-"+moveW+"px"});
        }
    }
    prev.on("click",function(){
        prevF();
    });
    next.on("click",function(){
        nextF();
    });
}
/*回到顶部*/
var gototop = function(id){
    var screenHeight = $(window).height();

    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        if(scrollTop>=screenHeight){
            $("#"+id).show();
        }else{
            $("#"+id).hide();
        }
    });
    $("#"+id).click(function(){
        $(window).scrollTop(0);
    });
}




//login
$(function ($) {
    //弹出登录
    $("#loginyh").on('click', function () {
        $("body").append("<div id='mask'></div>");
        $("#mask").addClass("mask").fadeIn("slow");
        $("#LoginBox").fadeIn("slow");
    });

    //关闭
    $("#closeBtn").on('click', function () {
        $("#LoginBox").fadeOut("fast");
        $("#mask").css({ display: 'none' });
    });
});


//reg
$(function ($) {
    //弹出注册
    $("#regyh").on('click', function () {
        $("body").append("<div id='mask'></div>");
        $("#mask").addClass("mask").fadeIn("slow");
        $("#RegBox").fadeIn("slow");
    });

    //关闭
    $("#closeReg").on('click', function () {
        $("#RegBox").fadeOut("fast");
        $("#mask").css({ display: 'none' });
    });
});
	