
<!-- begin-->
<div class="wrapper">
<div class="md">
<div class="hd">
    <span class="title left">大咖秀<i>你想见的男神、女神在这里！</i></span>
    <span class="more right"><a href="<?php echo Yii::app()->createUrl('/bigShots')?>" target="_blank">更多大咖秀场>></a></span>
</div>
<div class="bd">
<div class="col690 left">
<?php
 if(defined('BIG_SHOW_TJ')){
                    
     $bigshow = json_decode(BIG_SHOW_TJ,true);
     

 ?>
    <div class="ind01">
        <div class="imgbox"><a href="#" target="_blank"><img src="<?php echo $bigshow[0][images]?>" title="男团" alt="男团"  /></a></div>
        <div class="txtbg"></div>
        <div class="txt"><p class="left"><a href="<?php echo $bigshow[0][url]?>" target="_blank"><?php echo $bigshow[0][titles]?></a></p><span class="right">粉丝<i><?php echo $bigshow[0][ccount]?></i></span></div>
    </div>
<?php
	}
?>
</div>
<div class="col534 right">
<div class="md4" id="tab05">
<div class="hd">
    <span class="title left" id="tab"><a href="javascript:void(0);" class="cur">直播中</a><a href="javascript:void(0);">倒计时</a></span>
    <span class="more right"><a href="live">更多>></a></span>
</div>
<div class="bd">
<ul id="content">
<li>
    <div class="con09" id="tab04">
        <div class="tab right"><a href="javascript:void(0);" class="cur"><i>生日会</i></a><a href="javascript:void(0);"><i>探班会</i></a><a href="javascript:void(0);"><i>畅聊室</i></a></div>
        <div class="content left">
            <div class="con">
             <?php 
                 if(defined('LIVE_BIRTHDAY_CONTENT')){//生日会 
                 	$live_birthday = json_decode(LIVE_BIRTHDAY_CONTENT,true);
                 	$i=1;
                 	foreach($live_birthday as $v){
                 		$i++;
	                 	$num  =	$i%2;
	                 	$end= $num==1 ? $end='end' : '';
	                 	$str  = '<div class="imgbox '.$end.'">';
	                    $str .= '<div class="img">';
	                    $str .= '<a href="'.$v['url'].'" target="_blank"><img src="'.$v['images'].'"></a>';
	                    $str .= '<div class="txtbg"></div>';
	                    $str .= '<div class="txt"><a href="'.$v['url'].'" target="_blank">'.$v['titles'].'</a></div>';
	                    $str .= '<span class="only"></span>';
	                    $str .= '</div>';
	                    $str .= '<div class="numbers"><span class="comment">评论<i>'.$v['ccount'].'</i></span></div>';
	                	$str .= '</div>';
	                	echo $str;
                 	}
        			
                 } 
             ?>
            </div>
            <div class="con">
                <?php 
                 if(defined('LIVE_CLASS_CONTENT')){//生日会 
                 	$live_class = json_decode(LIVE_CLASS_CONTENT,true);
                 	$i=1;
                 	foreach($live_class as $v){
                 		$i++;
	                 	$num  =	$i%2;
	                 	$end= $num==1 ? $end='end' : '';
	                 	$str  = '<div class="imgbox '.$end.'">';
	                    $str .= '<div class="img">';
	                    $str .= '<a href="'.$v['url'].'" target="_blank"><img src="'.$v['images'].'"></a>';
	                    $str .= '<div class="txtbg"></div>';
	                    $str .= '<div class="txt"><a href="'.$v['url'].'" target="_blank">'.$v['titles'].'</a></div>';
	                    $str .= '<span class="only"></span>';
	                    $str .= '</div>';
	                    $str .= '<div class="numbers"><span class="comment">评论<i>'.$v['ccount'].'</i></span></div>';
	                	$str .= '</div>';
	                	echo $str;
                 	}       			
                 } 
             	?>
            </div>
            <div class="con">
                <?php 
                 if(defined('LIVE_CHAT_CONTENT')){//畅聊室
                 	$live_class = json_decode(LIVE_CHAT_CONTENT,true);
                 	$i=1;
                 	foreach($live_class as $v){
                 		$i++;
	                 	$num  =	$i%2;
	                 	$end= $num==1 ? $end='end' : '';
	                 	$str  = '<div class="imgbox '.$end.'">';
	                    $str .= '<div class="img">';
	                    $str .= '<a href="'.$v['url'].'" target="_blank"><img src="'.$v['images'].'"></a>';
	                    $str .= '<div class="txtbg"></div>';
	                    $str .= '<div class="txt"><a href="'.$v['url'].'" target="_blank">'.$v['titles'].'</a></div>';
	                    $str .= '<span class="only"></span>';
	                    $str .= '</div>';
	                    $str .= '<div class="numbers"><span class="comment">评论<i>'.$v['ccount'].'</i></span></div>';
	                	$str .= '</div>';
	                	echo $str;
                 	}       			
                 } 
             	?>             
            </div>
        </div>
    </div>
</li>
<li>
    <div class="con11">
        <?php 
        if(defined('LIVE_OTIME_CONTENT')){
        	$live_otime = json_decode(LIVE_OTIME_CONTENT,true);
        	foreach($live_otime as $v){ 

        	$str  = '<div class="line">';
            $str .= '<div class="headbox left"><a target="_blank" href="'.$v['url'].'"><img src="'.$v['images'].'"></a></div>';
            $str .= '<h5><a target="_blank" href="'.$v['url'].'">'.$v['titles'].'</a></h5>';
            $str .= '<p class="numbers"><span class="comment">粉    丝：<i>'.$v['ccount'].'</i></span></p>';
            $str .= '<p><span class="playicon">直播时间：'.$v['lcount'].'</span></p>';
        	$str .= '</div>';
        	echo $str;

        	}

     	}

        ?>
    </div>
</li>
</ul>
</div>
<script type="text/javascript">
    var tab05 = new changeTab("tab05");
    var tab04 = new changeTabV("tab04");
</script>

</div>


</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->


<!-- begin-->
<div class="wrapper">
<div class="col798 left">
<div class="md1" id="tab01">
<div class="hd">
    <span class="title left hot">HOT<i>大咖秀热播</i></span>
    <span class="more right" id="tab"><a href="javascript:void(0);" class="cur">全部</a><a href="javascript:void(0);" >音乐</a><a href="javascript:void(0);" >影视</a><a href="javascript:void(0);"  >综艺</a></span>
</div>
<div class="bd">
<ul class="ind03" id="content">
<li>
    <!--大咖秀热播全部-->
    <?php 

    if(defined('BIG_SHOW_ALL')){
     	$big_show = json_decode(BIG_SHOW_ALL,true); 
    	$i=0;
    	foreach($big_show as $v){ 
    		$i++;
    		if($i==1){
    			$str  = '<div class="imgbox big">';
    		}else if($i<=5){ 
    			$str  = '<div class="imgbox">';
    		}else{ 
    			$str  = '<div class="imgbox col3">';
    		}	
       		$str .= '<div class="img">';
            $str .= '<a target="_blank" href="#"><img src="'.$v['images'].'"></a>';
            $str .= '<div class="txtbg"></div>';
            $str .= '<div class="txt"><a target="_blank" href="'.$v['url'].'">'.$v['title'].'</a></div>';
        	$str .= '</div>';
        	$str .= '<div class="numbers"><span class="left playicon">播放<i>'.$v['lcount'].'</i></span><span class="right comment">粉丝<i>'.$v['ccount'].'</i></span></div>';
    		$str .= '</div>';
    		echo $str;
    	}	 	  	
    }
    ?>  
</li>
<li>
    <!--大咖秀热播音乐-->
    <?php 

    if(defined('BIG_SHOW_MUSIC')){
     	$big_show = json_decode(BIG_SHOW_MUSIC,true); 
    	$i=0;
    	foreach($big_show as $v){ 
    		$i++;
    		if($i==1){
    			$str  = '<div class="imgbox big">';
    		}else if($i<=5){ 
    			$str  = '<div class="imgbox">';
    		}else{ 
    			$str  = '<div class="imgbox col3">';
    		}	
       		$str .= '<div class="img">';
            $str .= '<a target="_blank" href="#"><img src="'.$v['images'].'"></a>';
            $str .= '<div class="txtbg"></div>';
            $str .= '<div class="txt"><a target="_blank" href="'.$v['url'].'">'.$v['title'].'</a></div>';
        	$str .= '</div>';
        	$str .= '<div class="numbers"><span class="left playicon">播放<i>'.$v['lcount'].'</i></span><span class="right comment">粉丝<i>'.$v['ccount'].'</i></span></div>';
    		$str .= '</div>';
    		echo $str;
    	}	 	  	
    }
    ?>  
   
</li>
<li>
 <!--大咖秀热播影视-->
    <?php 

    if(defined('BIG_SHOW_MOVIE')){
     	$big_show = json_decode(BIG_SHOW_MOVIE,true); 
    	$i=0;
    	foreach($big_show as $v){ 
    		$i++;
    		if($i==1){
    			$str  = '<div class="imgbox big">';
    		}else if($i<=5){ 
    			$str  = '<div class="imgbox">';
    		}else{ 
    			$str  = '<div class="imgbox col3">';
    		}	
       		$str .= '<div class="img">';
            $str .= '<a target="_blank" href="#"><img src="'.$v['images'].'"></a>';
            $str .= '<div class="txtbg"></div>';
            $str .= '<div class="txt"><a target="_blank" href="'.$v['url'].'">'.$v['title'].'</a></div>';
        	$str .= '</div>';
        	$str .= '<div class="numbers"><span class="left playicon">播放<i>'.$v['lcount'].'</i></span><span class="right comment">粉丝<i>'.$v['ccount'].'</i></span></div>';
    		$str .= '</div>';
    		echo $str;
    	}	 	  	
    }
    ?>   
   
</li>
<li>
   <!--大咖秀热播综艺-->
    <?php 

    if(defined('BIG_SHOW_VRTS')){
     	$big_show = json_decode(BIG_SHOW_VRTS,true); 
    	$i=0;
    	foreach($big_show as $v){ 
    		$i++;
    		if($i==1){
    			$str  = '<div class="imgbox big">';
    		}else if($i<=5){ 
    			$str  = '<div class="imgbox">';
    		}else{ 
    			$str  = '<div class="imgbox col3">';
    		}	
       		$str .= '<div class="img">';
            $str .= '<a target="_blank" href="#"><img src="'.$v['images'].'"></a>';
            $str .= '<div class="txtbg"></div>';
            $str .= '<div class="txt"><a target="_blank" href="'.$v['url'].'">'.$v['title'].'</a></div>';
        	$str .= '</div>';
        	$str .= '<div class="numbers"><span class="left playicon">播放<i>'.$v['lcount'].'</i></span><span class="right comment">粉丝<i>'.$v['ccount'].'</i></span></div>';
    		$str .= '</div>';
    		echo $str;
    	}	 	  	
    }
    ?>   
</li>
</ul>
</div>
</div>
<script type="text/javascript">var tab01 = new changeTab("tab01");</script>
</div>
<div class="col430 right">
<div class="md1"  id="tab02">
<div class="hd">
    <span class="title left" style="background:url(css/img/hotpoptitlebg.jpg) 19px center no-repeat scroll transparent;padding-left:34px;">热度榜<i></i></span>
    <span class="more right" id="tab"><a href="javascript:void(0);" class="cur">全部</a><a href="javascript:void(0);" >音乐</a><a href="javascript:void(0);" >影视</a><a href="javascript:void(0);"  >综艺</a></span>
</div>
<div class="bd">
    <ul id="content">
    <?php
    if(is_array($rankvalue)){
    foreach($rankvalue as $val){
    ?>
        <li>
            <div class="hotpop5">
            <?php 
            $i=0;

            foreach($val as $v){
            	$i++;	
            	
	            $str = '<div class="item">';
	            $str .= '<i class="left">'.$i.'</i>';
	            $str .= '<div class="imgbox left"><img src="'.$v['image'].'"></div>';
	            $str .= '<div class="des left">';
	            $str .= '<h3>'.$v['title'].'</h3>';
	            $str .= '<div class="numbers"><span class="left playicon">播放<i>'.$v['play_total'].'</i></span><span class="left comment">评论<i>'.$v['talk_total'].'</i></span></div>';
	            $str .= '</div>';
	            $str .= '<div class="play left"><a title="点击播放" href="'.$this->createUrl('/bigshots/playvideo',array('id'=>$v['product_id'])).'">点击播放</a></div>';
	            $str .= '</div>';
	            echo $str;
            }
            ?>  
              
            </div>
        </li>
        <?php
        	}
        }
        ?>

    </ul>

</div>
</div>
<script type="text/javascript">var tab02 = new changeTab("tab02");</script>
</div>
<div class="clear"></div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->






<!-- begin-->
<div class="wrapper">
    <div class="col815 left">
        <div class="md">
            <div class="hd">
                <span class="title left">星愿城<i>和你的idol分担梦想分担爱</i></span>
                <span class="more right"><a href="#" target="_blank"></a></span>
            </div>
            <div class="bd">
                <div class="ind02">
                    <ul>

                     <!--星愿城-->
                    <?php 
                    if(defined('STAR_HOPE_CONTENT')){
                    
     					$star_hope = json_decode(STAR_HOPE_CONTENT,true);
     					$i=0; 
	     				foreach($star_hope as $v){
		                     $i++;
		                    $lastclass = $i%4 == 0 ? 'last':'';
		                     $str  = '<li class="'.$lastclass.'"><div class="imgbox">';
		                     $str .= '<a target="_blank" href="#"><img title="Boyfriend" alt="Boyfriend" src="/images/picshow02.jpg"></a>';
		                     $str .= '<div class="txtbg"></div>';
		                     $str .= '<p><a target="_blank" href="#">'.$v['titles'].'</a></p>';
		                     $str .= '</div>';
		                     $str .= '<div class="numberbox">';
		                     $str .= '<p>已筹款<span>'.$v[lcount].'金币</span></p>';
		                     $str .= '<div class="progress">';
		                     $str .= '<div style="width:'.$v[ccount].'%" class="yellow"></div></div>';
		                     $str .= '<div class="des"><span class="left">'.$v[ccount].'%</span><span class="right">剩余'.$v['overday'].'天</span></div></div></li>';
		                     echo $str;
	                      }
                    }

                     ?>  
                     
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col410 right">
        <div class="md2" id="tab06">
            <div class="hd">
                <span class="title left" id="tab"><a href="javascript:void(0);" class="cur">星愿排行榜</a><i>/</i><a href="javascript:void(0);">公益贡献榜</a></span>
                <span class="more right"><a href="#" target="_blank">更多>></a></span>
            </div>
            <div class="bd">
                <div class="ind05">
                    <ul id="content">
                         <!--星愿排行榜-->
                         <li style="display: none;">                       
                        <?php
                        for($i=0;$i<9;$i++){
                        	echo '<div><i>'.$i.'</i><a target="_blank" href="#">和Boyfriend联手开展“童年公益计划”</a></div>';
                        } 
                        ?>
                        </li>
                       <!--公益贡献榜-->
                        <li style="display: list-item;">    
                        <?php
                        for($i=1;$i<10;$i++){
                        	echo '<div><i>'.$i.'</i><a target="_blank" href="#">和Boyfriend联手开展“童年公益计划”</a></div>';
                        } 
                        ?>
                        </li>

                    </ul>
                </div>
                <script type="text/javascript">var tab06 = new changeTab("tab06",true);</script>
                <div class="ind06">
                          <!--项目金额-->
                         <p>支持总金额<span>368</span></p>
                    	<div class="item left"><h6>项目总数</h6><div>7689</div></div>
                    	<div class="item right"><h6>项目总数</h6><div>7689</div></div>  
                </div>
                <?php $this->widget('application.widgets.BannerWidget', array('group'=> 'Index Page Bottom366x128','slider_type'=>'image','dotId'=>'focus1','cssClass'=>'picshow'))  ?>
            </div>
        </div>



    </div>
    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>

</div>
<!-- end-->
<!-- begin-->
<div class="wrapper">
<div class="col625 left">
<div class="md md3">
<div class="hd">
    <span class="title left">明星档<i>随时关注星动态，追你的最爱</i></span>
    <span class="more right"><a href="#" target="_blank"></a></span>
</div>
<div class="bd">
<div class="ind04">
<div class="s_title">

    <a href="javascript:void(0);"  class="cur t">全部</a><span>|</span><a href="javascript:void(0);"  class="t">音乐</a><span>|</span><a href="javascript:void(0);" class="t">影视</a><span>|</span><a href="javascript:void(0);" class="t" >综艺</a>
    <span class="right more"><a href="#" target="_blank">更多>></a></span>

</div>
<script type="text/javascript">
    $(".ind04 .s_title a.t").on("click",function(){
        $(this).addClass("cur").siblings("a").removeClass("cur");
    });
</script>
<div class="con">
<div class="col_left left">
<table cellpadding="0" cellspacing="0" id="1">
    <tbody>
    <tr>
        <td>
            <style>

                table{border:0}
                #cal{width:420px;font-size:12px;margin:18px 0 0 7px}
                #cal #top{height:29px;line-height:29px;color:#003784;}
                #cal #top select{font-size:12px; background:#f9f9f9; border:1px solid #cbcbcb; width:145px; height:32px; margin-right:12px;}
                #cal #top input{padding:0}
                #cal ul#wk{margin:0;padding:0;height:25px}
                #cal ul#wk li{float:left;width:60px;text-align:center;line-height:52px;list-style:none}
                #cal ul#wk li b{font-weight:normal;color:#c60b02}
                #cal #cm{clear:left;border-top:1px solid #ddd;position:relative}
                #cal #cm .cell{position:absolute;width:60px;height:42px;text-align:center;border-bottom:1px solid #ddd; padding-top:10px;}
                #cal #cm .cell .so{font:bold 16px arial;}
                #cal #bm{text-align:right;height:24px;line-height:24px;padding:0 13px 0 0}
                #cal #bm a{color:7977ce}
                #cal #fd{display:none;position:absolute;border:1px solid #dddddf;background:#feffcd;padding:10px;line-height:21px;width:150px}
                #cal #fd b{font-weight:normal;color:#c60a00}

                #cal #cm .cur{position:absolute;width:60px;height:42px;text-align:center;border-bottom:1px solid #ddd; padding-top:10px; background:#ffbb00}
                #cal #cm .cur .so{font:bold 16px arial;}
                #cal #cm .cur .c-313131{ color:#fff}
                #cal #cm .cur .c-999999{ color:#fff}
                .c-c60b02{ color:#c60b02;font:bold 16px arial;}
                .c-313131{ color:#313131;font:bold 16px arial;}
                .c-999999{ color:#999999;}


            </style>
            <!--[if IE]>
                            <style>
                                    #cal #top{padding-top:4px} #cal #top input{width:65px} #cal #fd{width:170px}
                                </style>
                        <![endif]-->
            <div id="cal">

                <div id="top">

                    <select> </select>  <!--年-->
                    <select> </select>  <!--月--> <!--农历-->
                    <span> </span>  <!--年 [-->
                    <span> </span> <!--年 ]-->
                    <input type="button" value="回到今天" title="点击后跳转回今天" style="padding:0px; display:none" />
                </div>
                <ul id="wk"><li>一</li><li>二</li><li>三</li><li>四</li><li>五</li><li><b>六</b></li><li><b>日</b></li></ul>
                <div id="cm">

                </div>
                <div id="bm">

                </div>
            </div> </td>
    </tr>
    </tbody>
</table>

<script type="text/javascript" src="http://bumeng-default.oss-cn-hangzhou.aliyuncs.com/bumengpc/webserver/js/date.js"></script>


</div>
<div class="col_right right" id="showstartime">
    <p><?php echo date('Y-m-d')?><span><?php $weekarray=array("日","一","二","三","四","五","六");echo "星期".$weekarray[date("w")];?></span></p>
    <div class="date"><?php echo date('d')?></div>
    <ul>
    <?php
    if(!empty($scheduledata)){
        foreach($scheduledata as $v){
            $str.=  '<li><div class="headbox left">';
                $str.=  '<a href="star/detail?id='.$v['starid'].'" target="_blank"><img  src="'.$v['img'].'"/></a>';
                $str.=  '<div class="bg"></div>';
                $str.=  '</div>';
                $str.=  '<div class="des left">';
                $str.=  '<h5>'.$v['title'].'</h5>';
                $str.= '<div><span class="time">'.date('H:i',$v['begintime']).'</span><span class="address">'.$v['address'].'</span></div></div></li>';

        }
        echo $str;
    }


    ?>
    </ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col310 left">
    <div class="md md3">
        <div class="hd">
            <span class="title left s">星闻<i>最关心的明星八卦</i></span>
            <span class="more right"><a href="#" target="_blank"></a></span>
        </div>
        <div class="bd w">
            <div class="con01">
                 <!--星闻-->
                <?php 

                if(defined('STAR_NEWS_CONTENT')){
                	$starnews= json_decode(STAR_NEWS_CONTENT,true); 
                	$i=0;

                	foreach($starnews as $v){                		
                		$i++;
                		if($i==1){ 
                		$str  = '<div class="up">';
                    	$str .= '<div class="imgbox left"><img src="'.$v['images'].'"></div>';
                    	$str .= '<h3>'.$v['titles'].'</h3>';
                    	$str .= '<p>'.mb_strcut($v['intro'], 0, 60, 'utf-8').'<a target="_blank" href="'.$v['url'].'">[详细]</a></p>';
                    	$str .= '<div class="bline"><span class="left">浏览<i>'.$v['lcount'].'</i></span><span class="right">评论<i>'.$v['ccount'].'</i></span></div>';
                		$str .= '</div>';
                		}else{ 
                			if($i==2) $str .= '<ul class="list">';
                			$str .= '<li><div class="des left">';
                            $str .= '<h4><a target="_blank" href="'.$v['url'].'">'.$v['titles'].'</a></h4>';
                            $str .= '<div class="bline"> <span class="left">浏览<i>'.$v['lcount'].'</i></span><span class="left">评论<i>'.$v['ccount'].'</i></span></div>';
                        	$str .= '</div><div class="time right"><p>2014</p><p>09/22</p></div></li>';
                		}

                	}
                	$str .= '</ul>';
                	echo $str;
                	
                }
                ?>  
             </div>
        </div>
    </div>
</div>
<div class="col278 right">
    <div class="md md3">
        <div class="hd">
            <span class="title left s">粉社会<i>找明星，找社会</i></span>
            <span class="more right"><a href="#" target="_blank"></a></span>
        </div>
        <div class="bd w">
            <div class="con02">
                <a href="#"><img  src="css/img/subject.jpg"/></a><a href="#"><img  src="css/img/album.jpg"/></a>
            </div>
        </div>
    </div>
    <div class="md md3">
        <div class="hd s" style="background:#fff;">
            <span class="title left s">粉丝土豪榜<i></i></span>
            <span class="more right"><a href="#" target="_blank">更多>></a></span>
        </div>
        <div class="bd w">
            <ul class="con03">
                <li class="first">
                    <i class="left">1</i>
                    <div class="headbox left"><img  src="/images/dkxlistpic04.jpg"/><div class="headbg"></div></div>
                    <h2 class=""><a href="#" target="_blank">海.阳光</a></h2>
                    <p class=""><img  src="css/img/jiangpai1.jpg"/></p>

                </li>
                <li><i class="left">2</i><a href="#" target="_blank" class="left">兜一圈 </a> <img  src="css/img/jiangpai1.jpg" class="right"/></li>
                <li><i class="left">3</i><a href="#" target="_blank" class="left">兜一圈 </a> <img  src="css/img/jiangpai2.jpg" class="right"/></li>
                <li><i class="left">4</i><a href="#" target="_blank" class="left">兜一圈 </a> <img  src="css/img/jiangpai3.jpg" class="right"/></li>
                <li><i class="left">5</i><a href="#" target="_blank" class="left">兜一圈 </a> <img  src="css/img/jiangpai5.jpg" class="right"/></li>
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
    <div class="md">
        <div class="hd">
            <span class="title left">娱乐厂牌<i>明星娱乐商城，来这儿就够了</i></span>
            <span class="more right"><a href="#" target="_blank">更多娱乐厂牌>></a></span>
        </div>
        <div class="bd w n">
        <?php 
            $this->widget('application.widgets.BannerWidget', array('group'=> 'Index Page Bottom574x396','slider_type'=>'image','dotId'=>'focus3','cssClass'=>'picshow con08 left')); 
            $colorarr=array('dark','red','black','orange','green','blue');
            //娱乐厂牌
            foreach($colorarr as $v){
        ?>
	        <div class="con10 left <?php echo $v?>">
	                <div class="album">
	                    <h5>新亚洲娱乐集团有限公司</h5>
	                    <p><img src="/images/company1.jpg"></p>
	                    <div id="myalbum1" class="focus">
	                        <div class="imgbox">
	                            <ul class="imgline" style="width: 360px;">
	                                <li><p>黄晓明</p><img src="/images/huangxiaoming.jpg"></li>
	                                <li><p>张柏芝</p><img src="/images/zhangbaizhi.jpg"></li>
	                                <li><p>黄德伟</p><img src="/images/huangdewei.jpg"></li>
	                                <li><p>黄晓明</p><img src="/images/huangxiaoming.jpg"></li>
	                                <li><p>张柏芝</p><img src="/images/zhangbaizhi.jpg"></li>
	                                <li><p>黄德伟</p><img src="/images/huangdewei.jpg"></li>
	                            </ul>
	                        </div>
	                        <a class="prev"></a><a class="next"></a>
	                    </div>
	                </div>
	                <script type="text/javascript">var myalbum1 = new album("myalbum1",3);</script>
	            </div>

        <?php
    	}
        ?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>
</div>

<!-- end-->




<!-- begin-->
<div class="wrapper">
<div class="md">
<div class="hd">
    <span class="title left">大牌店<i>明星热卖周边店</i></span>
    <span class="more right"><a href="#" target="_blank">更多>></a></span>
</div>
<div class="bd">
<div class="col815 left">
    <div class="ind04" id="tab03">
        <div class="s_title">
          <a href="javascript:void(0);"  class="cur t">全部</a><span>|</span>   <a href="javascript:void(0);"  class="t">MV</a><span>|</span> <a href="javascript:void(0);"  class="t">音乐</a><span>|</span><a href="javascript:void(0);" class="t" >饰品</a><span>|</span>
            <a href="javascript:void(0);"  class="t">其他</a><span class="right more"><a href="#" target="_blank">更多>></a></span>
        </div>
        <script type="text/javascript">
            (function(){
                $("#tab03 .s_title a.t").on("click",function(){
                    var index = $(this).index();
                    var i = index>0?index/2:0
                    $(this).addClass("cur").siblings("a.t").removeClass("cur");
                    $("#tab03_content li").eq(i).show().siblings("li").hide();
                });
            })();

        </script>
    </div>

    <div class="con04">
        <ul id="tab03_content">
        <?php for($i=0;$i<5;$i++){ ?>
         <li>
        <?php
            //大牌店
     		for($i=0;$i<6;$i++){
         ?>
        
                <div class="imgbox">
                    <a href="#" target="_blank"><img src="/images/pic1.jpg" alt="Boyfriend" title="Boyfriend"></a>
                    <div class="txtbg"></div>
                    <p><a href="#" target="_blank">全部Boyfriend的应援公告及福利</a></p>
                </div>

          
          <?php
      		}

          ?>
          </li>
          <?php } ?>
        </ul>
    </div>

</div>
<div class="col410 right">
    <div class="ind04">
        <div class="s_title">
            <a href="javascript:void(0);" >最新上线</a>
            <span class="right more"><a href="#" target="_blank"></a></span>

        </div>

    </div>
    <?php $this->widget('application.widgets.BannerWidget', array('group'=> 'Index Page Bottom379x166','slider_type'=>'image','dotId'=>'focus2','cssClass'=>'picshow con05'))  ?>
    <div class="con06">
        <a href="#" target="_blank"><img  src="/images/pic1.jpg"/></a>
        <div class="txtbg"></div>
        <div class="txt"><img  src="css/img/fansiluntan.png"/></div>

    </div>
</div>

</div>
</div>



<div class="clear"></div>
<div class="vspace" style="height:35px"></div>
</div>

<!-- end-->

<!--beagin-->
<div class="wrapper">
    <div class="col45 left">
        <div class="shd">
            <div class="s_title"><span class="title"><i>微</i>入口</span></div>
            <div class="more"><span><a href="#" target="_blank">更多</a></span></div>
        </div>
    </div>
    <div class="col1185 right">
        <div class="con07">
            <ul>
            <?php
            //微入口
            	for($i=0;$i<6;$i++){ 
            		echo '<li>
                    <div class="txtbg"></div>
                    <p>范冰冰</p>
                    <div class="head"><img src="/images/fanbingbing.jpg"></div>
                    <div class="codeimg"><img src="/images/code1.jpg"></div>
                	</li>';
            	}
           	
               ?>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>

</div>
<!--end-->