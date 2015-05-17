<!-- begin-->
<div class="wrapper">
    <div class="col950 left">
        <div class="ind07 left">
            <div class="focus"  id="myalbum1">
                <div class="imgbox">
                    <ul class="imgline">
                    <?php 
                 	if(defined('STAR_SCHEDULE_TOP')) echo STAR_SCHEDULE_TOP; 
             		?>

                    </ul>
                </div>
                <a class="prev"></a><a class="next"></a>
            </div>
            <script type="text/javascript">var myalbum1 = new album("myalbum1",1);</script>
        </div>
    </div>
    <div class="col280 right">
        <div class="md md3">
            <div class="hd">
                <span class="title left d">最新动态<i></i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd w">
                <div class="con01 small">
                    <div class="up">

                        <div class="imgbox left"><a href="/star/detail"><img src="<?php echo $newsstar[0][img]?>" /></a></div>
                        <h3><?php echo $newsstar[0][title]?></h3>
                        <div class="date"><?php echo date('Y-m-d H:i:s',$newsstar[0][begintime]);?></div>
                        <p><?php echo mb_substr($newsstar[0][content],0,18,'utf-8');?>...<a href="<?php echo Yii::app()->createUrl('/star/info',array('id'=>$newsstar[0]['id']))?>" target="_blank">[详细]</a></p>
                        <div class="bline"><span class="left">粉丝<i>2368</i></span><span class="right">评论<i>2356</i></span></div>
                    </div>
                    <ul class="list">
                    <?php //print_r($newsstar) ?>
                    	<?php
                    		$i=0;
                    		foreach($newsstar as $v){  
                    			if($i<>0){ 
                    	?>
		                    	<li>
		                            <div class="des left">
		                                <h4><a href="<?php echo Yii::app()->createUrl('/star/info',array('id'=>$v['id']))?>" target="_blank"><?php echo $v['title']?></a></h4>
		                                <div class="bline"> <span class="left">粉丝<i>2368</i></span><span class="left">评论<i>2356</i></span></div>
		                            </div>
		                        </li>
                    	<?php
                    			}
                    			$i++;
                    		}

                    	?>
                       

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
    <div class="md md3">
        <div class="hd">
            <span class="title left">档期安排<i>明星娱乐商城，来这儿就够了</i></span>
            <span class="more asc  right" id="sort" ><a href="javascript:void(0)" >排序</a></span>
            <script type="text/javascript">
                $("#sort").click(function(){
                    if($(this).hasClass("asc")){
                        $(this).removeClass("asc").addClass("desc");
                    }else{
                        $(this).removeClass("desc").addClass("asc");
                    }
                });
            </script>
        </div>
        <div class="bd">
            <div class="con12">
                <a href="javascript:void(0);" class="cur">全部</a><a href="javascript:void(0);">一周内</a><a href="javascript:void(0);">一月内</a><a href="javascript:void(0);">半年内</a><a href="javascript:void(0);">一年内</a><a href="javascript:void(0);">历史</a>
            </div>
            <script type="text/javascript">
                $(".con12 a").click(function(){
                    $(this).addClass("cur").siblings("a").removeClass("cur");

                });
            </script>
            <div class="con13">
                <ul>
                <?php
                	foreach($newsstarall as $val){ 
	
                	?>
                    <li>
                        <div class="left l">
                            <p  class="address"><?php  echo mb_substr($val['address'],0,3,'utf-8'); ?></p>
                            <div class="time">
                                <p><?php echo date('d',$val['begintime'])?></p>
                                <span><?php echo date('Y年m月',$val['begintime'])?></span>
                            </div>
                        </div>
                        <div class="right">
                            <div class="headbox left">
                                <img  src="/images/yangzishan.jpg"/>
                            </div>
                            <h3><a href="<?php echo Yii::app()->createUrl('/star/info',array('id'=>$val['id']))?>" target="_blank"><?php echo $val['title']?></a></h3>
                            <p><?php echo mb_substr($val['content'],0,278,'utf-8');?></p>
                            <div class="numbers"><span class="left playicon"><a href="#" target="_blank">播放<i>15156</i></a></span><span class="left comment"><a href="#" target="_blank">评论<i>15156</i></a></span></div>
                        </div>
                    </li>
                    <?php

                    	}
                    	?>
                    <li class="even">
                        <div class="left l">
                            <p  class="address">哈尔滨</p>
                            <div class="time">
                                <p>16</p>
                                <span>2015年06月</span>
                            </div>
                        </div>
                        <div class="right">
                            <div class="headbox left">
                                <img  src="/images/yangzishan.jpg"/>
                            </div>
                            <h3>鹿晗杨子姗跑站宣传《重返20岁》"祖孙"齐卖萌</h3>
                            <p>《重返20岁》是由韩国CJ E&M 株式会社、北京文传世纪文化传媒有限公司、天津世纪乐成文化传播有限公司和北京世纪乐成文化传媒有限公司联合出品的喜剧电影。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。影片讲述了一位七旬老太太不可思议变身为妙龄少女后，以新身份回到日常生活，引发的一系列啼笑。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。</p>
                            <div class="numbers"><span class="left playicon"><a href="#" target="_blank">播放<i>15156</i></a></span><span class="left comment"><a href="#" target="_blank">评论<i>15156</i></a></span></div>
                        </div>
                    </li>
                    <li class="">
                        <div class="left l">
                            <p  class="address">成都</p>
                            <div class="time">
                                <p>16</p>
                                <span>2015年06月</span>
                            </div>
                        </div>
                        <div class="right">
                            <div class="headbox left">
                                <img  src="/images/yangzishan.jpg"/>
                            </div>
                            <h3>鹿晗杨子姗跑站宣传《重返20岁》"祖孙"齐卖萌</h3>
                            <p>《重返20岁》是由韩国CJ E&M 株式会社、北京文传世纪文化传媒有限公司、天津世纪乐成文化传播有限公司和北京世纪乐成文化传媒有限公司联合出品的喜剧电影。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。影片讲述了一位七旬老太太不可思议变身为妙龄少女后，以新身份回到日常生活，引发的一系列啼笑。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。</p>
                            <div class="numbers"><span class="left playicon"><a href="#" target="_blank">播放<i>15156</i></a></span><span class="left comment"><a href="#" target="_blank">评论<i>15156</i></a></span></div>
                        </div>
                    </li>
                    <li class="even">
                        <div class="left l">
                            <p  class="address">北京</p>
                            <div class="time">
                                <p>16</p>
                                <span>2015年06月</span>
                            </div>
                        </div>
                        <div class="right">
                            <div class="headbox left">
                                <img  src="/images/yangzishan.jpg"/>
                            </div>
                            <h3>鹿晗杨子姗跑站宣传《重返20岁》"祖孙"齐卖萌</h3>
                            <p>《重返20岁》是由韩国CJ E&M 株式会社、北京文传世纪文化传媒有限公司、天津世纪乐成文化传播有限公司和北京世纪乐成文化传媒有限公司联合出品的喜剧电影。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。影片讲述了一位七旬老太太不可思议变身为妙龄少女后，以新身份回到日常生活，引发的一系列啼笑。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。由陈正道执导，杨子姗、归亚蕾、陈柏霖、鹿晗主演。</p>
                            <div class="numbers"><span class="left playicon"><a href="#" target="_blank">播放<i>15156</i></a></span><span class="left comment"><a href="#" target="_blank">评论<i>15156</i></a></span></div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>



    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>
</div>

<!-- end-->




<!-- begin-->
<div class="wrapper">
    <div class="gototop" id="gototop1"><span></span></div>
    <script type="text/javascript">var mygototop = new gototop("gototop1")</script>
</div>