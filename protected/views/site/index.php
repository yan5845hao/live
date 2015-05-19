<!-- begin-->
<div class="wrapper">
<div class="md">
<div class="hd">
    <span class="title left">大咖秀<i>你想见的男神、女神在这里！</i></span>
    <span class="more right"><a href="#" target="_blank">更多大咖秀场>></a></span>
</div>
<div class="bd">
<div class="col690 left">
    <div class="ind01">
      
        <?php 
                 if(defined('HOME_PAGE_ONE_GUANGGAO')) echo HOME_PAGE_ONE_GUANGGAO; 
             ?>
    </div>
</div>
<div class="col534 right">
<div class="md4" id="tab05">
<div class="hd">
    <span class="title left" id="tab"><a href="javascript:void(0);" class="cur">直播中</a><a href="javascript:void(0);">倒计时</a></span>
    <span class="more right"><a href="#">更多>></a></span>
</div>
<div class="bd">
<ul id="content">
<li>
    <div class="con09" id="tab04">
        <div class="tab right"><a href="javascript:void(0);" class="cur"><i>生日会</i></a><a href="javascript:void(0);"><i>探班会</i></a><a href="javascript:void(0);"><i>畅聊室</i></a></div>
        <div class="content left">
            <div class="con">
             <?php 
                 if(defined('HOME_PAGE_BIRTHDAY_CONTENT')) echo HOME_PAGE_BIRTHDAY_CONTENT; 
             ?>
            </div>
            <div class="con">
              <?php if(defined('HOME_PAGE_BIRTHDAY_CONTENT')) echo HOME_PAGE_CLASS_CONTENT; ?>
            </div>
            <div class="con">
                <?php if(defined('HOME_PAGE_CHAT_CONTENT')) echo HOME_PAGE_CHAT_CONTENT; ?>
              
            </div>
        </div>
    </div>
</li>
<li>
    <div class="con11">
        <?php if(defined('HOME_PAGE_CHAT_CONTENT')) echo HOME_PAGE_TIME_CONTENT; ?>
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
    <?php if(defined('HOME_HOT_BIGSHOW_LEFT_1')) echo HOME_HOT_BIGSHOW_LEFT_1; ?>  
</li>
<li>
    <!--大咖秀热播音乐-->
    <?php if(defined('HOME_HOT_BIGSHOW_LEFT_1')) echo HOME_HOT_BIGSHOW_LEFT_2; ?>  
   
</li>
<li>
 <!--大咖秀热播影视-->
    <?php if(defined('HOME_HOT_BIGSHOW_LEFT_1')) echo HOME_HOT_BIGSHOW_LEFT_3; ?>  
   
</li>
<li>
   <!--大咖秀热播综艺-->
    <?php if(defined('HOME_HOT_BIGSHOW_LEFT_1')) echo HOME_HOT_BIGSHOW_LEFT_4; ?>  
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
        <li>
            <div class="hotpop5">
            <?php if(defined('HOME_TWO_HOT_ALL')) echo HOME_TWO_HOT_ALL; ?>  
              
            </div>
        </li>
        <li>
            <div class="hotpop5">
                <?php if(defined('HOME_TWO_HOT_MUSIC')) echo HOME_TWO_HOT_MUSIC; ?>   
            </div>
        </li>
        <li>
            <div class="hotpop5">
               <?php if(defined('HOME_TWO_HOT_TV')) echo HOME_TWO_HOT_TV; ?>  
            </div>
        </li>
        <li>
            <div class="hotpop5">
               <?php if(defined('HOME_TWO_HOT_TV')) echo HOME_TWO_HOT_ZY; ?> 
            </div>
        </li>
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
                    <?php if(defined('HOME_STAR_DREAM_LEFT')) echo HOME_STAR_DREAM_LEFT; ?>  
                     
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
                        <?php if(defined('HOME_STAR_DREAM_RIGHT_1')) echo HOME_STAR_DREAM_RIGHT_1; ?>
                              <!--公益贡献榜-->
                        <?php if(defined('HOME_STAR_DREAM_RIGHT_1')) echo HOME_STAR_DREAM_RIGHT_2; ?>  

                    </ul>
                </div>
                <script type="text/javascript">var tab06 = new changeTab("tab06",true);</script>
                <div class="ind06">
                          <!--项目金额-->
                        <?php if(defined('HOME_STAR_DREAM_RIGHT_1')) echo HOME_STAR_DREAM_RIGHT_3; ?>  
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
                <?php if(defined('HOME_STAR_NEWS_MODDLE')) echo  HOME_STAR_NEWS_MODDLE; ?>  
             
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

            //娱乐厂牌
                 if(defined('HOME_STAR_YULE_RIGHT')) echo  HOME_STAR_YULE_RIGHT;   

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
        <?php
            //大牌店
                 if(defined('HOME_STAR_SHOP_LEFT1')) echo  HOME_STAR_SHOP_LEFT1;  
                 if(defined('HOME_STAR_SHOP_LEFT1')) echo  HOME_STAR_SHOP_LEFT2;  
                 if(defined('HOME_STAR_SHOP_LEFT1')) echo  HOME_STAR_SHOP_LEFT3;  
                 if(defined('HOME_STAR_SHOP_LEFT1')) echo  HOME_STAR_SHOP_LEFT4;  
                 if(defined('HOME_STAR_SHOP_LEFT1')) echo  HOME_STAR_SHOP_LEFT5;  
         ?>
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
            
               if(defined('HOME_WEIBO_IN')) echo  HOME_WEIBO_IN; 
               ?>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>

</div>
<!--end-->