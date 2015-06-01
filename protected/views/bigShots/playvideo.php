<!--topnav begin-->
<div class="wrapper">
	<div class="bread">当前位置：<a href="#">首页</a><span>></span><a href="<?php echo Yii::app()->createUrl('/bigShots')?>">大咖秀</a><span>></span><?php echo $videodata['title']?></div>
</div>

<!--topnav end-->


<!-- begin-->
<div class="wrapper">
	<div class="col857 left">
        <div style="text-align: center; min-height: 520px;">

		<div id="contentbody" style="font-size:16px;" class="p01">
						<script src="/videoplay/flowplayer-3.2.4.min.js"></script>
<p><a id="player" style="display: block; width: 840px; height: 600px; border: 1px solid #cccccc;" href="<?php echo  $videodata[url];?>"> </a></p>
<script src="/videoplay/flowplayerVideo.js"></script>
					</div>
       
        </div>
        <div class="vspace" style="height:25px;"></div>
        <div class="md md3">
            <div class="hd">
                <span class="title left">最新评论<i>明星娱乐商城，来这儿就够了</i></span>
                <span class="more right" ></span>
              
            </div>
            <div class="bd">
            		<div class="vspace"></div>
            	<div class="con21" style="min-height:825px">
					<div class="reply" id="comments">
						<form id="form1" method="post" action="/api/addcomment">
						<div class="imgbox"><a target="_blank" href=""><img width="62" height="62" src="<?php echo isset(Yii::app()->user->face)?Yii::app()->user->face.'@62w_62h_1e_1c_1x.jpg':'/images/default.jpg'?>" ></a></div>
						<div class="box">
							<div class="user"><div class="left"><span class="c-gap-right"><?php echo Yii::app()->user->name ?></span><img src="/images/mxindex/icon9.png"></div><div class="right">至多输入140字</div></div>
                           	<div class="vspace"></div>
							<div class="textbox"><textarea name="content" id="content1" ></textarea></div>
                            <div class="vspace"></div>
							<div class="expression">
								<img src="/images/mxindex/icon8.png"><a id="face1" class="faceBtn">表情</a>
							</div>

								<input type="hidden" id="starid"  name="starid" value="<?php echo $stardata[customer_id]?>" />
                   				<input id="customerid" type="hidden" name="customerid" value="<?php echo Yii::app()->user->id?>" />
                   				<input type="hidden" name="starname" value="<?php echo $stardata[user_name]?>">
                   				<input id="type" type="hidden" name="type" value="video" />
								<div class="fabiao_btn right"><submit style="background: #f1f1f1 none repeat scroll 0 0;border: medium none;padding: 5px 10px;"  id="fabiao_btn" >发表评论</submit></div>

						</div>
						</form>

					</div>
					<script type="text/javascript" src="/js/jquery.qqFace.min.js"></script>
              		<script type="text/javascript">
						//实例化表情插件
						$(function(){
							$('#face1').qqFace({
								id : 'facebox1', //表情盒子的ID
								assign:'content1', //给那个控件赋值
								path:'/images/face/'	//表情存放的路径
							});
							/*
							$('#face2').qqFace({
								id : 'facebox2',
								assign:'content2',
								path:'/images/face/'
							});*/
						});

						//查看结果
						function view(id){
							var str = $('#'+id).val();
							str = str.replace(/\</g,'&lt;');
							str = str.replace(/\>/g,'&gt;');
							str = str.replace(/\n/g,'<br/>');
							str = str.replace(/\[\/表情([0-9]*)\]/g,'<img src="face/$1.gif" border="0" />');
							$('#result').html($('#result').html() + str);
						}
					</script>
                  
						<?php foreach($dataProvider->getData() as $data)
							{
								$fbtime=time()-$data['create_time'];
								if($fbtime>86400){ 
									$fbtime=intval($fbtime/86400);
									$fbtime.='天前';
								}else if($fbtime<86400 && $fbtime>3600){ 
									$fbtime=intval($fbtime/3600);
									$fbtime.='小时前';
								}else{ 
									 $fbtime= intval($fbtime/60);	
									 $fbtime .= '分钟前';	
								}
								
								$data['url'] = $data['url']?$data['url'].'@62w_62h_1e_1c_1x.jpg':'/images/default.jpg';

						?>
						<div class="replylist">
                    <div class="vspace"></div>
						<div class="imgbox"><a><img src="<?php echo $data['url']?>" class="left"></a></div>	
						<div class="replybox">
							<div class="username"><a><?php echo $data['author']?></a></div>
							<p><?php echo $data['content']?></p>
							<div class="clear"><div class="retime left"><span class="c-gap-right"><?php echo $fbtime?></span><span>来自捕梦网</span></div><div class="right repeat"><a class="c-gap-right" target="_blank" href="">转发</a></div></div>
						</div>
                        <div class="vspace"></div>
					</div>

					<?php
					}
					?>
				
             
          
           
                    
                    <div class="page_list">
                    <div style="height:20px;" class="vspace"></div>		
                    <?php $this->widget('CLinkPager', array('cssFile'=>false,'header'=>'', 'firstPageLabel' => '首页',
			               'lastPageLabel' => '末页',
			               'prevPageLabel' => '上一页',
			               'nextPageLabel' => '下一页',
			               'pages' => $dataProvider->pagination,
			               'maxButtonCount'=>10));
			        ?>
               </div>
				</div>		
                 	
               
                 	
               
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
                        	<img src="<?php echo $stardata['face']?>@w127_h148.jpg" />
                        	<?php 
                        	echo $isattention==false ? "<a onclick=attention($videodata->customer_id) id='guanzhu'>关注</a>" : '<a id="guanzhu">已关注</a>';
                        	?>
                        	</span>
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
                            	<a href="<?php echo Yii::app()->createUrl('/bigshots/playvideo',array('id'=>$v['product_id']))?>"><img  src="<?php echo $v['image']?>@150w_80h_1e_1c_1x.jpg"/></a>
                                <div class="txtbg gq"></div>
                                <div class="txt">超清</div>
                            </div>
                            <p><a href="<?php echo Yii::app()->createUrl('/bigshots/playvideo',array('id'=>$v['product_id']))?>" target="_blank"><?php echo $v['title']?></a></p>
                            <div class="source"></div>
							<div class="numbers"><span class="left playicon"><a target="_blank" href="<?php echo Yii::app()->createUrl('/bigshots/playvideo',array('id'=>$v['product_id']))?>">播放<i><?php echo $v['play_total']?></i></a></span><span class="left comment"><a target="_blank" href="<?php echo Yii::app()->createUrl('/bigshots/playvideo',array('id'=>$v['product_id']))?>">评论<i><?php echo $v['talk_total']?></i></a></span></div>
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
<script>
function attention(id){ 
$.post("/api/attention",{id:id},function(result){
   if(result==1){ 
   		$("#attention").html('<a id="guanzhu">已关注</a>');
   }
  });
}


</script>
<script type="text/javascript" src="/js/comments.js"></script>
