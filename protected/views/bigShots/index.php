<div class="wrapper">
<div class="content">
<div class=" clearfix">
    <div class="dkcol_w730 left">
        <div class="dkcol_w730title "></div>
        <div class="dkcol_flash "><img src="<?php echo $zhibo[0]['image'] ?>" width="730" height="485" /><span></span><i><a href="http://vtest.yooshow.com/<?php echo $zhibo[0]['liveIdentity']?>"><?php echo $zhibo[0]['title']?></a></i>
            <ul>
                <li><img src="images/daka_bofang.png" width="27" height="26" / >预约<em>0</em></li>
                <li><img src="images/daka_fensi.png"   width="18" height="26" />粉丝<em>0</em></li>
            </ul>
        </div>
    </div>
    <div class="dkcol_w501 right">
        <div class="dkcol_w501title "></div>
        <div class="dkcol_w501con">
            <ul>
			<?php
				if(defined('STAR_SHOW_TJ_RIGHT1')) echo STAR_SHOW_TJ_RIGHT1;
			?>
			</ul>
            <ul style="display:none;">
            <?php
				if(defined('STAR_SHOW_TJ_RIGHT2')) echo STAR_SHOW_TJ_RIGHT2;
			?>

            </ul>
            <ul style="display:none;">
   			<?php
				if(defined('STAR_SHOW_TJ_RIGHT3')) echo STAR_SHOW_TJ_RIGHT3;
			?>
            </ul>
            <div class="dkcol_w501btn left">
                <dl>
                    <dd class="current"><a>1</a></dd>
                    <dd><a >2</a></dd>
                    <dd><a >3</a></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="dksearch clearfix" id="search">
    <div class="dksearchtitle">
        <ul>
            <li class="current">全部</li>


        </ul>
        <div class="right"><a class="dkxlb"><img src="images/daka_xiala.jpg" width="76" height="77" /></a></div>
    </div>
    <div class="dksearchxx">
        <ul>
            <span >状态：</span>
            <li class="current">全部</li>
            <li><a href="#">直播中</a></li>
            <li><a href="#">直播中</a></li>
        </ul>
        <ul>
            <span>类型：</span>
            <li class="current">全部</li>
            <li><a href="#">生日会</a></li>
            <li><a href="#">畅聊室</a></li>
            <li><a href="#">探班会</a></li>
        </ul>
        <ul>
            <span>热门：</span>
            <li class="current">全部</li>
            <li><a >鹿晗</a></li>
            <li><a href="#">吴亦凡</a></li>
            <li><a href="#">Bigbang</a></li>
            <li><a href="#">0086男团</a></li>
        </ul>
    </div>
</div>
<div class="dklist clearfix">
<div class="dklist_list left">
<?php include('list.php');?>
</div>
<div class="dk_ph right">
<div class="dk_phtitle1">
    <ul>
        <li class="current"><a>周榜</a></li>
        <li><a>月榜</a></li>
        <li><a>总榜</a></li>
    </ul>
</div>
<div class="dk_phtitle2">
<!--周榜-->
<ul>
    <?php
    	if(defined('STAR_SHOW_TWO_RIGHT_WEEK')) echo STAR_SHOW_TWO_RIGHT_WEEK;
    ?>
</ul>


<!--月榜-->
<ul style=" display:none;">
        <?php
    	if(defined('STAR_SHOW_TWO_RIGHT_MONTH')) echo STAR_SHOW_TWO_RIGHT_MONTH;
    ?>
</ul>

<!--全部-->
<ul style=" display:none;">
     <?php
    	if(defined('STAR_SHOW_TWO_RIGHT_YEAR')) echo STAR_SHOW_TWO_RIGHT_YEAR;
    ?>

</ul>



</div>



<div class="dk_phtitle3">
    <span><a href="<?php echo Yii::app()->createUrl('/live')?>" >更多>></a></span>
</div>
<div class="dk_phtitle2" id="showdata">
    <ul>
    <?php
    	unset($zhibo[0]);
    	$i=0;
    	foreach($zhibo as $v){
    		$i++;

    ?>

        <li>
            <div class="dk_phtitle2_pic"><a href="http://vtest.yooshow.com/<?php echo $v['liveIdentity']?>"><img src="<?php echo $v['image']?>" width="62" height="63" /></a>
                <div class="<?php if($i <= 3){ echo 'dk_phtitle2_pic_ph';}else{ echo 'dk_phtitle2_pic_ph4'; }?>"><?php echo $i?></div>
            </div>
            <div class="dk_phtitle2_title"><a href="http://vtest.yooshow.com/<?php echo $v['liveIdentity']?>"><?php echo mb_substr($v['title'],0,7,'utf-8'); ?></a><span><img src="images/dklistfensi.jpg" width="16" height="15" />粉丝：<em>0</em><br>
                <img src="images/dklistbofang.png" width="16" height="15" />预约：<em>0</em></span></div>
            <div class="dk_phtitle2_btn"><a href="http://vtest.yooshow.com/<?php echo $v['liveIdentity']?>"><img src="images/dkxlistpic03.jpg" width="32" height="35" border="0" /></a></div>
            <div style="margin-top:10px; float:left;height:3px;" ><img src="images/dakalistxx.png" width="240" height="3" /></div>
        </li>
        <?php
        	}

        ?>
    </ul>


</div>
</div>
</div>
</div>
</div>
<!--大咖秀结束-->




<script text="text/javascript">
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
                    $("#bigShowsList .dklist_col").last().after(html);
                }
            })
    }
    //下拉窗口
    $(".dkxlb").on("click",function(){
        $(".dksearchxx").slideToggle();

    });
    //推荐视频
    $(".dkcol_w501btn dd").on("click",function(){
        var index = $(this).index();
        $(this).addClass("current").siblings("dd").removeClass("current");
        $(".dkcol_w501con ul").eq(index).show().siblings("ul").hide();
    });

    //排行榜
    $(".dk_phtitle1 li").on("click",function(){
        var index = $(this).index();
        $(this).addClass("current").siblings("li").removeClass("current");
        $(".dk_phtitle2 ul").eq(index).show().siblings("ul").hide();
    });
</script>