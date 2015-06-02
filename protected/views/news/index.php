


<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="<?php echo Yii::app()->createUrl('/site')?>">首页</a><span>></span>明星新闻<span>  </div>
</div>

<!--topnav end-->


<!-- begin-->
<div class="wrapper">
	<div class="col857 left">
       <div class="md">
            <div class="hd">
                <span class="title left d">全部新闻<i></i></span>
                <span class="more right" ><a href="<?php echo Yii::app()->createUrl('/news')?>"  target="_blank"></a></span>
            </div>
            <div class="bd w">
            		<div class="con17" id="bigShowsList">
                    <?php include('list.php');?>
<script type="text/javascript">
	window._bd_share_config={ "common":
									 {"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},
							  "share":{}
							 };					 
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];					 
</script>
                    </div>
                 	
               
              </div>
      </div>
<!--        <div class="vspace" style="height:25px;"></div>
        <div class="md md3">
            <div class="hd">
                <span class="title left">最新评论<i>明星娱乐商城，来这儿就够了</i></span>
                <span class="more right" ><a href="#"  target="_blank">详细>></a></span>
              
            </div>
            <div class="bd">
            		
                 	
               
              </div>
      </div>-->
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
                        	<img src="<?php echo $stardata[face]?>" width="175" height="205"/>
                        	<a href="javascript:void(0);" id="guanzhu">关注</a>
                            <a href="<?php echo Yii::app()->createUrl('/star/detail',array('id'=>$newsdata->star_id))?>">TA的主页</a>
                         <script type="text/javascript">$("#guanzhu").click(function(){
							 $(this).toggleClass("cur");
							 })</script>
                        </div>
                        <h3><?php echo $stardata[user_name]?></h3>
                        <p><?php echo $starinfodata[content]?>...</p>
                    </div>
                    <div class="bottom">
                    	<p>粉丝总排名第9位</p>
                        <div class="numberbox"><span>0</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span class="last">点赞</span></div>
                    </div>
                </div>
            </div>
            </div>
   		<div class="vspace" style="height:20px;"></div>
         <!--<div class="md ">
            <div class="hd">
                <span class="title left b">历史视频（内）<i></i></span>
                <span class="more right"><a href="#" target="_blank">更多>></a></span>
            </div>
            <div class="bd w">
                <div class="con15">
                	<ul>
                    	<li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                        <li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg cq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                         <li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
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
                    	<li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source">来源：优酷</div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                        <li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg cq">酷</div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source">来源：优</div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                         <li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source">来源：爱奇艺</div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                          <li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                          <li>
                        	<div class="imgbox left">
                            	<a href="#"><img  src="images/daka_flash.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="#" target="_blank">星映话-《重返20岁：别样青春》</a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="#">播放<i>15156</i></a></span><span class="left comment"><a target="_blank" href="#">评论<i>15156</i></a></span></div>
                        </li>
                    </ul>
                </div>
            </div>
            </div>-->
        <div class="md ">
            <div class="hd">
                <span class="title left d">热门明星<i></i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd w">
                <div class="hotpop6">
                        <?php if(defined('NEWS_LIST_HOT_STAR')) echo NEWS_LIST_HOT_STAR;?>
                          
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
<script type="text/javascript">
	
    var loadMore = function () {
        var url = $("#dk_jiazai").attr('data-url');
        $.ajax({
                type:"GET",
                url:url,
                beforeSend:function(){
                    $("#dk_jiazai").html('<a href="javascript:;">数据加载中...</a>');
                },
                success:function(html){
                    $("#bigShowsListMore").remove();
                    $("#bigShowsList .shownews").last().after(html);
                }
            })
    }

</script>


