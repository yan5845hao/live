// JavaScript Document
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