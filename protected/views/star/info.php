<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="#">首页</a><span>></span><a href="#">明星档</a><span>></span>周华健演唱会  </div>
</div>

<!--topnav end-->


<!-- begin-->
<div class="wrapper">
	<div class="col857 left">
        <div class="ind08" >
        	<div class="innerbox">
            	<div class="imgbox left"><img src="<?php echo $newsdata->img?>" /></div>
                <h2><?php echo $newsdata->title?></h2>
                <div class="time">发布时间：<?php echo date('Y-m-d',$newsdata->createtime);?>  </div>
                <p><span>时　　间：</span><?php echo date('Y-m-d',$newsdata->begintime);?> </p>
                <p><span>明　　星：</span><?php echo $newsdata->starname?></p>
                <p><span>场　　馆：</span><?php echo $newsdata->address?></p>
                <p><span>演出时长：</span><?php echo $newsdata->showtime?></p>
                <p><span>入场时间：</span>以现场为准</p>
                <p><a href="javascript:void(0);" class="collect">收藏</a></p>
                <div class="bdsharebuttonbox"><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
<script type="text/javascript">window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
            </div>
        </div>
        
    </div>
    <div class="col373 right">
   		<div class="md ">
            <div class="hd">
                <span class="title left d">热门明星档期<i></i></span>
                <span id="sort" class="more refresh right"><a href="javascript:void(0)"></a></span>
                 <script type="text/javascript">
                	$("#sort").click(function(){
						$(this).addClass("rotate180");
						var distimer = setTimeout(function(){$("#sort").removeClass("rotate180")},1000);
					});
                </script>
            </div>
            <div class="bd w">
                <div class="con11 small">
                        <?php if(defined('SCHEDULE_STAR_HOT_RIGHT2'))echo SCHEDULE_STAR_HOT_RIGHT1;?>        
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
	<div class="col857 left">
        <div class="md">
            <div class="hd">
                <span class="title left">档期介绍<i></i></span>
                <span class="more right" ><a href="#"  target="_blank">更多>></a></span>
              
            </div>
            <div class="bd w">
            		
               <div class="con16">
               <?php
               		 echo $newsdata->content;
               ?>
               </div>  	
               
              </div>
      </div>
      <div class="vspace" style="height:25px"></div>
     <!-- <div class="md">
            <div class="hd">
                <span class="title left">最新评论<i></i></span>
                <span class="more right" ><a href="#"  target="_blank">更多>></a></span>
              
            </div>
            <div class="bd w">
            		
                 	
               
              </div>
      </div>
      -->
    </div>
    <div class="col373 right">
   		 <div class="md ">
            <div class="hd">
                <span class="title left d">热门明星<i></i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd w">
                <div class="hotpop6">
                        	<?php if(defined('SCHEDULE_STAR_HOT_RIGHT2'))echo SCHEDULE_STAR_HOT_RIGHT2;?>
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