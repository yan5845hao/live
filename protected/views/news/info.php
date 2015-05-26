<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="#">首页</a><span>></span><a href="<?php echo Yii::app()->createUrl('/star/detail',array('id'=>$newsdata->star_id))?>"><?php echo $stardata[user_name]?>明星主页</a><span>></span><a href="<?php echo Yii::app()->createUrl('/news/index',array('id'=>$newsdata->star_id))?>">全部新闻</a><span>></span>正文页  </div>
</div>

<!--topnav end-->


<!-- begin-->
<div class="wrapper">
	<div class="col783 left">
       <div class="newsContent">
                    	<h1><?php echo $newsdata->title?></h1>
                        <div class="source"><span><?php echo date('Y-m-d',$newsdata->createtime);?></span><span> 来源：<?php echo $newsdata->star_name?></span></div>
                       <div class="bdsharebuttonbox"><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a href="#" class="bds_more" data-cmd="more"></a>
                       	<span class="right">评论<?php echo $newsdata->commentcount?></span>
                       </div>
<script type="text/javascript">window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>

                        <div class="main"><?php echo $newsdata['introduce']?></div>
                        <div id="content">
                        	
                      			<?php echo $newsdata['content']?>
                       
                        </div>
                        <div class="tag"><span>标签：</span>  
                        <?php
			            $tag=explode(',',$starinfodata[tag]);
			            	foreach($tag as $v){ 

			            			echo '<a >'.$v.'</a>';
			            	}
			            ?>
            			</div>
                        <div class="other">
                        	<!--<div class="pre left">
                            	<p>&lt;上一篇 </p>
                                <p class="title"><a href="#" target="_blank">冯德伦与舒淇假期同爱大自然 默契十足</a></p>
                            </div>
                            <div class="next right">
                            	<p>下一篇&gt;</p>
                                <p class="title"><a href="#" target="_blank">杨幂见面会上撒糖 粉丝疯抢险酿祸端</a></p>
                            </div>-->
                        </div>
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
    <div class="col448 right">
   		 <div class="md ">
            <div class="hd">
                <span class="title left d">明星相关介绍<i></i></span>
                <span class="more right"><a href="<?php echo Yii::app()->createUrl('/star/detail',array('id'=>$newsdata->star_id))?>" target="_blank">详细>></a></span>
            </div>
            <div class="bd w" style="height:451px">
                <div class="con14">
                    <div class="up">
                        <div class="imgbox left">
                        	<img src="<?php echo $stardata[face]?>" width="175" height="205" />
                        	<?php 
                        	echo $isattention==false ? "<a onclick=attention($newsdata->star_id) id='guanzhu'>关注</a>" : '<a id="guanzhu">已关注</a>';
                        	?>
                            <a href="<?php echo Yii::app()->createUrl('/star/detail',array('id'=>$newsdata->star_id))?>">TA的主页</a>
                         <script type="text/javascript">$("#guanzhu").click(function(){
							 $(this).toggleClass("cur");
							 })</script>
                        </div>
                        <h3><?php echo $stardata[user_name]?></h3>
                        <p><?php echo $starinfodata[content]?></p>
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
                <span class="title left d">热门明星<i></i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd w">
                    <?php if(defined('NEWS_INFO_HOT_STAR')) echo NEWS_INFO_HOT_STAR;?>            </div>
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
<script>
function attention(id){ 
$.post("/api/attention",{id:id},function(result){
   alert(result);
   // $("span").html(result);
  });

}


</script>