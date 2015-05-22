<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="">首页</a><span>></span><a href="#">大咖秀</a><span>></span>倒计时  </div>
</div>

<!--topnav end-->

<!-- begin-->
<div class="wrapper">
	<div class="col857 left">
        <div class="md">
            <div class="hd">
                <span class="title left d">倒计时<i></i></span>
                <span class="more right" ><a href="#"  target="_blank"></a></span>
            </div>
            <div class="bd">
            		<div class="con19 small">
                    	<ul>
                    	<script type="text/javascript">

						    function showtime(EndTimes){
						    	var EndTimesarr=new Array();

						       var EndTimesarr = EndTimes.split('_');
						      
						       var EndTime= EndTimesarr[0] * 1000;
						     
						       var NowTime = new Date();
						       var t =EndTime - NowTime.getTime();
						  		
						       var d=Math.floor(t/1000/60/60/24);
						       var h=Math.floor(t/1000/60/60%24);
						       var m=Math.floor(t/1000/60%60);
						       var s=Math.floor(t/1000%60);

						       if(EndTime>= NowTime){
						       		var sid="#tc_"+EndTimes;
						       		
						       		$(sid).html("倒计时:" + d + "天" + h + "时" + m + "分" + s + "秒");
						       		//document.getElementById(sid).innerHTML = d + "天" + h + "时" + m + "分" + s + "秒";
						       		//this.span
						   		}else{ 

						   			document.getElementById("t_"+EndTimes).innerHTML = "直播中";
						   		}
						   		setTimeout(function() {
										showtime(EndTimes)
									},
									EndTime)
						      
						   }
					 
						</script>
                    	<?php
                    		$i=0;
                    		foreach($dataProvider as $v){ 
                    			$i++;
                    			//$v['image']=str_replace('http://files.yooshow.com', 'http://ali-img.yooshow.com', $v['image'])
                    			$endtime=strtotime($v['prestarttime']);
                    			$js_id=$endtime.'_'.$i;
                    	?>
                    		
                    		<li class="">
                            	<div class="imgbox">
                                    <a href="#" target="_blank"><img src="<?php echo $v['image']?>" /></a>
                                    <a class="imgbg" href="#"></a>
                                    <a class="yuyue" href="#"></a>
                                </div>
                                <h4><a href="#" target="_blank"><?php echo $v['title']?></a></h4>
								<div class="numbers"><span class="left fansi"><a target="_blank" href="#">预约:<i>1</i></a></span><span class="left playtime"><a target="_blank" id="tc_<?php echo $js_id;?>" href="#">倒计时：<?php echo $v['prestarttime']?>
</a></span></div>                 
                            </li>
                            <script type="text/javascript">
                    					 showtime("<?php echo $js_id?>");
                    		</script>
                    	<?php	
                    		}
                    	?>
                        
                         <script type="text/javascript">showtime(1432814400);</script>
                         
                        </ul>
                    	<div class="more"><a href="javascript:void(0);">点击加载更多</a></div>
						<script type="text/javascript">
                        	$(".con19 li").live("mouseover",function(){
								$(this).addClass("hover");	
							});
							$(".con19 li").live("mouseout",function(){
								$(this).removeClass("hover");	
							});
                        </script>
                    </div>
                 	
               
              </div>
      </div>
      
     
    </div>
    <div class="col373 right">
   		<div class="md ">
            <div class="hd">
                <span class="title left d">热门明星<i></i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd w">
                <div class="con18 big">
                	<ul>
                    	<li>
                        	<div class="imgbox">
                            	<a href="#"><img  src="/images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">范冰冰</div>
                            </div>
                        </li>
                    	<li  class="end">
                        	<div class="imgbox"  >
                            	<a href="#"><img  src="/images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">范冰冰</div>
                            </div>
                        </li>
                    	<li>
                        	<div class="imgbox">
                            	<a href="#"><img  src="/images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">范冰冰</div>
                            </div>
                        </li>
                    	<li  class="end">
                        	<div class="imgbox">
                            	<a href="#"><img  src="/images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">范冰冰</div>
                            </div>
                        </li>   
                    	<li>
                        	<div class="imgbox">
                            	<a href="#"><img  src="/images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">范冰冰</div>
                            </div>
                        </li>
                    	<li class="end">
                        	<div class="imgbox">
                            	<a href="#"><img  src="/images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">范冰冰</div>
                            </div>
                        </li>        
                                                
                    </ul>
                </div>
            </div>
            </div>
         
    </div>
    <div class="clear"></div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->







<!-- begin-->
<div class="wrapper">
	<div class="gototop" id="gototop1"><span></span></div>
    <script type="text/javascript">var mygototop = new gototop("gototop1")</script>
</div>

<!-- end-->