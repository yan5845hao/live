<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="#">首页</a><span>></span><a href="#">大咖秀</a><span>></span><?php echo $videodata['title']?></div>
</div>

<!--topnav end-->


<!-- begin-->
<div class="wrapper">
	<div class="col857 left">
        <div> 
        	
        	<video width="800" height="520" controls>
			  <source src="/video/1.mp4" type="video/mp4">
			  <source src="movie.ogg" type="video/ogg">
			  <source src="movie.webm" type="video/webm">
			  <object data="/video/1.mp4" width="800" height="520">
			    <embed src="movie.swf" width="800" height="520">
			  </object>
			</video> 
        </div>
        <div class="vspace" style="height:25px;"></div>
        <div class="md md3">
            <div class="hd">
                <span class="title left">最新评论<i>明星娱乐商城，来这儿就够了</i></span>
                <span class="more right" ><a href="#"  target="_blank">详细>></a></span>
              
            </div>
            <div class="bd">
            		
                 	
               
              </div>
      </div>
    </div>
    <div class="col373 right">
   		 <div class="md ">
            <div class="hd">
                <span class="title left b">明星相关介绍<i></i></span>
                <span class="more right"><a href="#" target="_blank">详细>></a></span>
            </div>
            <div class="bd w">
                <div class="con14">
                    <div class="up">
                        <div class="imgbox left">
                        	<img src="<?php echo $stardata['face']?>" />
                        	<a href="javascript:void(0);" id="guanzhu">关注</a>
                            <a href="<?php echo Yii::app()->createUrl('/star/detail',array('id'=>$starinfodata['customer_id']))?>">TA的主页</a>
                         <script type="text/javascript">$("#guanzhu").click(function(){
							 $(this).toggleClass("cur");
							 })</script>
                        </div>
                        <h3><?php echo $stardata['user_name']?></h3>
                        <p><?php echo $starinfodata['content']?>...</p>
                    </div>
                    <div class="bottom">
                    	<p>粉丝总排名第9位</p>
                        <div class="numberbox"><span>0</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span class="last">点赞</span></div>
                    </div>
                </div>
            </div>
            </div>
   		<div class="vspace" style="height:20px;"></div>
         <div class="md ">
            <div class="hd">
                <span class="title left b">历史视频（内）<i></i></span>
                <span class="more right"><a href="#" target="_blank">更多>></a></span>
            </div>
            <div class="bd w">
                <div class="con15">
                	<ul>
                	<?php
                		foreach($videodatas as $v){ 
                		?>
                		<li>
                        	<div class="imgbox left">
                            	<a href="<?php echo Yii::app()->createUrl('/bigshots/playvideo',array('id'=>$v['product_id']))?>"><img  src="<?php echo $v['image']?>"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="<?php echo Yii::app()->createUrl('/bigshots/playvideo',array('id'=>$v['product_id']))?>" target="_blank"><?php echo $v['title']?></a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i><?php echo $v['play_total']?></i></a></span><span class="left comment"><a target="_blank" href="#">评论<i><?php echo $v['talk_total']?></i></a></span></div>
                        </li>

                	<?php	

                		 }
                	?>
                    	
                    
                    </ul>
                </div>
            </div>
            </div>
        <div class="vspace" style="height:20px;"></div>
         <div class="md ">
            <div class="hd">
                <span class="title left b">相关推荐<i></i></span>
                <span id="sort" class="more refresh right"><a href="javascript:void(0)"></a></span>
                 <script type="text/javascript">
                	$("#sort").click(function(){
						$(this).addClass("rotate180");
						var distimer = setTimeout(function(){$("#sort").removeClass("rotate180")},1000);
					});
                </script>
            </div>
            <div class="bd w">
                <div class="con15">
                	<ul>
                    	<?php if(defined('VIDEO_PALY_RIGHT_TJ')) echo VIDEO_PALY_RIGHT_TJ;?>
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
