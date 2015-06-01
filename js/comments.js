$("#fabiao_btn").click(function(){ 

	$.post('/api/addcomment/',$("#form1").serialize(),function(data){ 
		var msg=data.message;
		
		if(data.code == '4001' ){ 
			$("body").append("<div id='mask'></div>");
			$("#mask").addClass("mask").fadeIn("slow");
			$("#LoginBox").fadeIn("slow");
			letDivCenter('#LoginBox');
		}else if(data.code == '4000'){
			$(document).masks(msg).click(function(){$(document).unmasks()});
			$("#comments").after(data.content);

		}else{ 	
			$(document).masks(msg).click(function(){$(document).unmasks()});
		}
	},'json');

});

   function letDivCenter(divName){   
        var top = ($(window).height() - $(divName).height())/2;   
        var left = ($(window).width() - $(divName).width())/2;   
        var scrollTop = $(document).scrollTop();   
        var scrollLeft = $(document).scrollLeft();   
        $(divName).css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show();  
    }  

(function(){
$.extend($.fn,{
masks: function(msg,maskDivClass){
this.unmasks();
// 参数
var op = {
opacity: 0.8,
z: 10000,
bgcolor: '#ccc'
};
var original=$(document.body);
var position={top:0,left:0};
if(this[0] && this[0]!==window.document){
original=this;
position=original.position();
}
// 创建一个 Mask 层，追加到对象中
var maskDiv=$('<div class="maskdivgen"> </div>');
maskDiv.appendTo(original);
var maskWidth=original.outerWidth();
if(!maskWidth){
maskWidth=original.width();
}
var maskHeight=original.outerHeight();
if(!maskHeight){
maskHeight=original.height();
}
maskDiv.css({
position: 'absolute',
top: position.top,
left: position.left,
'z-index': op.z,
width: maskWidth,
height:maskHeight,
'background-color': op.bgcolor,
opacity: 0
});
if(maskDivClass){
maskDiv.addClass(maskDivClass);
}
if(msg){
var msgDiv=$('<div id="showmsg"  style="position:absolute;border:#6593cf 1px solid; padding:2px;background:#444"><div style="line-height:80px;text-align: center; width:200px;font-size:24px; border:#a3bad9 1px solid;background:white;padding:2px 10px 2px 10px">'+msg+'</div></div>');
msgDiv.appendTo(maskDiv);
var widthspace=(maskDiv.width()-msgDiv.width());
var heightspace=(maskDiv.height()-msgDiv.height());
 var top = $(window).height() - msgDiv.height()/2;   
 var left = $(window).width() - msgDiv.width()/2;   
  var scrollTop = $(document).scrollTop()+200;   
var scrollLeft = $(document).scrollLeft()+500;   

msgDiv.css({
cursor:'wait',
top:(scrollTop),
left:(scrollLeft)
});
}
maskDiv.fadeIn('fast', function(){
// 淡入淡出效果
$(this).fadeTo('slow', op.opacity);
})
return maskDiv;
},
unmasks: function(){
var original=$(document.body);
if(this[0] && this[0]!==window.document){
original=$(this[0]);
}
original.find("> div.maskdivgen").fadeOut('slow',0,function(){
$(this).remove();
});
}
});
})();
   