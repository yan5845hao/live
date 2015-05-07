// JavaScript Document
//焦点图

var focus = function (id,isNumber){
	var index=0;
	var _this = this;
	_this.obj=$("#"+id+" li");
	var length = _this.obj.length;

	_this.change=function(num){
		_this.obj.eq(num).siblings("li").fadeOut(900).css("z-index","0");
		_this.obj.eq(num).fadeIn(600);
		_this.obj.eq(num).css({"background-color":_this.obj.eq(num).attr("data-color"),"z-index":"99"})
		$("#"+id).siblings(".dot").find("span").eq(num).addClass("cur").siblings("span").removeClass("cur");
	};
	_this.prev =function(){
		if(index>0){
			index--;
		}
		if(index<0)index=this.length-1;
		_this.change(index);
	};
	_this.next = function(){
		if(index<length){
			index++;
		}
		if(index>length-1)index=0;
		_this.change(index);
	};
	_this.init =function(){
		for(var i=0;i<length;i++){
			if(isNumber){
				var html = "<span>"+(i+1)+"</span>";
			}else{
				var html = "<span></span>";
			}

			$("#"+id).siblings(".dot").append(html);			
		}
		$(".dot span").live("click",function(){
			var n = $(this).index();
			_this.change(n);
			index = n;
			clearInterval(timer);
			timer = setInterval(function(){_this.next ();},6000);
		})
	  _this.change(index);
	};

	_this.init();
	var timer = setInterval(function(){_this.next ();},6000);
}
/*标签切换*/
var changeTab =function(id){
	var o = $("#"+id);
	o.title = o.find("#tab a");
	o.con = o.find("#content li");
	o.title.on("click",function(){
		$(this).addClass("cur").siblings("a").removeClass("cur");
		var i = $(this).index();
		o.con.eq(i).show().siblings("li").hide();	
	})	
}
