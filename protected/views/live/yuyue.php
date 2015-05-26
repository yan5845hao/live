<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="<?php echo Yii::app()->createUrl('/site')?>">首页</a><span>></span><a href="<?php echo Yii::app()->createUrl('/live')?>">直播</a><span>></span><?php echo $livedata['title']?></div>
</div>

<!--topnav end-->


<!-- begin-->
<div class="wrapper">
	<div class="ind09">
    	<div class="imgbox">
        	<div  class="img left"><img src="<?php echo $livedata['image'];?>"/></div>
            <div class="info left">
            	 <h4><?php echo $livedata['title']?></h4>
                 <div class="bdsharebuttonbox right"><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a href="#" class="bds_more" data-cmd="more"></a>
                       </div>
<script type="text/javascript">window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
            
            </div>
                   
		<div style="height:280px;">            
      		<?php echo $livedata['description'];?>
      	</div>
        <div class="link"> <a href="<?php echo Yii::app()->createUrl('/live/yuyue',array('id'=>$livedata['id'],'act'=>'yuyue'))?>" target="_blank"><?php echo $yuyue?></a><a href="<?php echo Yii::app()->params['liveLUrl'].'/'.$livedata['liveIdentity'];?>" target="_blank" class="yellow">进入房间</a></div>


        </div>
        <div class="timebox">
        	<p class="z"><?php echo $livedata['prestarttime']?></p>
            <p><?php echo $livedata['title']?></p>
        </div>
    </div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->



<!-- begin-->
<div class="wrapper">
	<div class="col857 left">
        <div class="md ">
            <div class="hd">
                <span class="title left">直播说明<i></i></span>
                <span class="more right" ><a href="#"  target="_blank">更多>></a></span>
              
            </div>
            <div class="bd w">
            		<div class="con20">
                    	<?php echo $livedata['description'];?>
                        
                    </div>
                 	
               
              </div>
      </div>
      
      <div class="vspace" style="height:20px;"></div>
      <div class="md md3">
            <div class="hd">
                <span class="title left">最新评论<i></i></span>
                <span class="more right" ><a href="#"  target="_blank">更多>></a></span>
              
            </div>
            <div class="bd">
            	<div class="vspace"></div>
            	<div class="con21">
					<div class="reply">
						
						<div class="box">
							<div class="user"><div class="left"></div><div class="right">至少输入140字</div></div>
                           	<div class="vspace"></div>
							<div class="textbox"><textarea>有什么感想你也来说说吧</textarea></div>
                            <div class="vspace"></div>
							
								<div class="expression"><img src="/images/mxindex/icon8.png"><a target="_blank" href="">表情</a></div>
								<div class="fabiao_btn right"><button>发表评论</button></div>

						</div>
					</div>
                    <div class="replylist">
                    <div class="vspace"></div>
						<div class="imgbox"><a target="_blank" href=""><img src="/images/mxindex/pic5.png" class="left"></a></div>
						<div class="replybox">
							<div class="username"><a target="_blank" href="">nns</a></div>
							<p>大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO大爱EXO</p>
							<div class="clear"><div class="retime left"><span class="c-gap-right">1小时前</span><span>来自优酷</span></div><div class="right repeat"><a class="c-gap-right" target="_blank" href="">转发</a><a class="remsg">回复</a></div></div>
						</div>
                        <div class="vspace"></div>
					</div>
             
          
           
                    
                    <div class="page_list">
                    <div style="height:20px;" class="vspace"></div><a target="_blank" href="" class="current">1</a><a target="_blank" href="">2</a><a target="_blank" href="">3</a><a target="_blank" href="">4</a><a target="_blank" href="">5</a><a target="_blank" href="">5</a><a target="_blank" href="">6</a><a target="_blank" href="">7</a><a target="_blank" href="">9</a><a target="_blank" href="">10</a><a class="prev_page" target="_blank" href="">上一页</a><a class="next_page page_focus" target="_blank" href="">下一页</a></div>
				</div>	
              
             <script>
             //回复js
			 $(".textbox textarea, .rebox textarea").one("click",function(){
				 	$(this).html("");
				 })
				var rename = ''; 
				var repeat = ''
			 $(".remsg").live("click",function(){
				 rename  = $(this).parents(".clear").siblings(".username").find("a").text();
				 repeat = $(this).parents(".repeat")
				 repeat.hide();
				 $(this).siblings().parents(".replylist").remove(".rebox");
				 $(this).parents(".replylist").append('&lt;div class="rebox"&gt;&lt;div class="vspace"&gt;&lt;/div&gt;&lt;p class="username"&gt;&lt;a href="" target="_blank"&gt;穆穆&lt;/a&gt;&lt;/p&gt;&lt;div class="vspace"&gt;&lt;/div&gt;&lt;textarea&gt;会员就是爽啊,一元免费看&lt;/textarea&gt;&lt;div class="vspace"&gt;&lt;/div&gt;&lt;div class="icon"&gt;&lt;div class="biaoqing left"&gt;&lt;img src="images/mxindex/icon8.png"&gt;&lt;a href="" target="_blank"&gt;表情&lt;/a&gt;&lt;/div&gt;&lt;div class="fabiao_btn right clearfix"&gt;&lt;button class="left btn_focus c-gap-right answer"&gt;回复&lt;/button&gt;&lt;button class="left cancel"&gt;取消&lt;/button&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class="vspace"&gt;&lt;/div&gt;');			 
				 })
				$(".answer").live("click",function(){
				 var msg = $(".answer").parents(".rebox").find("textarea").val();
				$(this).parents(".con21").find(".replylist").eq(0).prepend('&lt;div class="replylist"&gt;&lt;div class="vspace"&gt;&lt;/div&gt;&lt;div class="imgbox"&gt;&lt;a href="" target="_blank"&gt;&lt;img class="left" src="images/mxindex/pic5.png"&gt;&lt;/a&gt;&lt;/div&gt;&lt;div class="replybox"&gt;&lt;div class="username"&gt;&lt;a href="" target="_blank"&gt;@'+rename+'&lt;/a&gt;&lt;/div&gt;&lt;p&gt;'+msg+'&lt;/p&gt;&lt;div class="clear"&gt;&lt;div class="retime left"&gt;&lt;span class="c-gap-right"&gt;1小时前&lt;/span&gt;&lt;span&gt;来自优酷&lt;/span&gt;&lt;/div&gt;&lt;div class="right repeat"&gt;&lt;a href="" target="_blank" class="c-gap-right"&gt;转发&lt;/a&gt;&lt;a class="remsg"&gt;回复&lt;/a&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;div class="vspace"&gt;&lt;/div&gt;&lt;/div&gt;'); 
				  $(this).parents(".rebox").remove();
				  repeat.show();
				  })
				  $(".cancel").live("click",function(){
					  $(this).parents(".rebox").remove();
					   repeat.show();
				  })
				  
             </script>  	
            </div>
      </div>
    </div>
    <div class="col373 right">
   		<div class="md ">
            <div class="hd">
                <span class="title left d">为您推荐<i></i></span>
                <span id="sort" class="more refresh right"><a href="javascript:void(0)"></a></span>
                 <script type="text/javascript">
                	$("#sort").click(function(){
						$(this).addClass("rotate180");
						var distimer = setTimeout(function(){$("#sort").removeClass("rotate180")},1000);
					});
                </script>
            </div>
            <div class="bd w">
                <div class="con11 smallpadding">
                                	<div class="line">
                                    	<div class="headbox left"><a href="#"  target="_blank"><img  src="/images/baby.jpg"/></a></div>
                                        <h5><a  href="#" target="_blank">杨颖2015六一特别签售会倒计时15天</a></h5>
                                        <p class="numbers"><span class="comment">粉    丝：<i>1212133</i></span></p>
                                        <p><span class="playicon">直播时间：2015-5-1<i>9 19:00</i></span></p>

                                    </div>
                                    <div class="line">
                                    	<div class="headbox left"><a href="#"  target="_blank"><img  src="/images/baby.jpg"/></a></div>
                                        <h5><a  href="#" target="_blank">杨颖2015六一特别签售会倒计时15天</a></h5>
                                        <p class="numbers"><span class="comment">粉    丝：<i>1212133</i></span></p>
                                        <p><span class="playicon">直播时间：2015-5-1<i>9 19:00</i></span></p>

                                    </div>
                                    <div class="line">
                                    	<div class="headbox left"><a href="#"  target="_blank"><img  src="/images/baby.jpg"/></a></div>
                                        <h5><a  href="#" target="_blank">杨颖2015六一特别签售会倒计时15天</a></h5>
                                        <p class="numbers"><span class="comment">粉    丝：<i>1212133</i></span></p>
                                        <p><span class="playicon">直播时间：2015-5-1<i>9 19:00</i></span></p>

                                    </div>
                                    <div class="line last">
                                    	<div class="headbox left"><a href="#"  target="_blank"><img  src="/images/baby.jpg"/></a></div>
                                        <h5><a  href="#" target="_blank">杨颖2015六一特别签售会倒计时15天</a></h5>
                                        <p class="numbers"><span class="comment">粉    丝：<i>1212133</i></span></p>
                                        <p><span class="playicon">直播时间：2015-5-1<i>9 19:00</i></span></p>

                                    </div>
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