<script type="text/javascript">

    var loadMore = function () {
        var url = $("#project_loading").attr('data-url');
        $.ajax({
            type:"GET",
            url:url,
            beforeSend:function(){
                $("#project_loading").html('<a href="javascript:;">数据加载中...</a>');
            },
            success:function(html){
//                $("#starmore").remove();
//                $(".shownews").last().after(html);
            }
        })
    }

</script>
<div class="wrapper">
    <div class="ind07 left small" id="myfocus02">
        <div class="focus tab">
            <div class="imgbox">
                <ul class="imgline">
                    <li class="cur">
                        <a href="#"><img src="images/pic061701.jpg"/></a>
                        <div class="txt"><a href="#">冯绍峰倪妮赴云南做公益  陪孩子跳舞谈梦想</a></div>
                        <div class="txtbg"></div>
                    </li>
                    <li>
                        <a href="#"><img src="images/pic22.jpg"/></a>
                        <div class="txt"><a href="#">冯绍峰倪妮赴云南做公益  陪孩子跳舞谈梦想</a></div>
                        <div class="txtbg"></div>
                    </li>
                    <li>
                        <a href="#"><img src="images/picshow01.jpg"/></a>
                        <div class="txt"><a href="#">冯绍峰倪妮赴云南做公益  陪孩子跳舞谈梦想</a></div>
                        <div class="txtbg"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dot ind10 right">
            	<span>
                	<div class="imgbox"><img  src="images/pic061701.jpg"/></div>
                    <div class="txtbg"></div>
                    <p class="txt">Baby最新行程曝光 出席微博之夜</p>
                </span>
                <span>
                	<div class="imgbox"><img  src="images/pic22.jpg"/></div>
                    <div class="txtbg"></div>
                    <p class="txt">Baby最新行程曝光 出席微博之夜</p>
                </span>
                <span>
                	<div class="imgbox"><img  src="images/picshow01.jpg"/></div>
                    <div class="txtbg"></div>
                    <p class="txt">Baby最新行程曝光 出席微博之夜</p>
                </span>
    </div>
    <script type="text/javascript">
        var myfocus02 = new myfocus("myfocus02", false,true);
    </script>
    <div class="clear"></div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->

<!-- begin-->
<div class="wrapper" id="tab">
    <div class="ind11">
        <div class="">
            <span>我们已经做到</span>
            <dl>
                <dt class="first">
                <p>累计成功项目</p>
                <div><i>16.4</i><em>万</em></div>
                </dt>
                <dt>
                <p>累计支持人数</p>
                <div><i>1654</i><em>万</em></div>
                </dt>
                <dt class="last">
                <p>累计筹款总额</p>
                <div><i>1634</i><em>万</em></div>
                </dt>
            </dl>
        </div>
        <div class="vspace" style="height:40px;"></div>
        <div>
            <span>发起项目流程</span>
            <ul>
                <li class="first">明星发起项目</li>
                <li class="d"></li>
                <li class="second">项目获得支持</li>
                <li class="d"></li>
                <li class="third">明星发放回报</li>
                <li class="d"></li>
                <li class="fourth">用户获得回报</li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->


<!-- begin-->
<?php
$id = (int)Yii::app()->request->getParam('id');
?>
<div class="wrapper">
    <div class="ind12">
        <div class="tab">
            <span>最新上线</span>
            <a <?php if(!$id){ echo 'class="cur"';}?> href="/project#tab">全部</a>
            <a <?php if($id == 103){ echo 'class="cur"';}?> href="<?php echo Yii::app()->createUrl('/project?id=103#tab');?>">公益</a>
            <a <?php if($id == 104){ echo 'class="cur"';}?> href="<?php echo Yii::app()->createUrl('/project?id=104#tab');?>">音乐</a>
            <a <?php if($id == 105){ echo 'class="cur"';}?> href="<?php echo Yii::app()->createUrl('/project?id=105#tab');?>">影视</a>
            <a <?php if($id == 106){ echo 'class="cur"';}?> href="<?php echo Yii::app()->createUrl('/project?id=106#tab');?>">综艺</a>
            <script type="text/javascript">
                $(document).ready(function(){
                    $(".ind12 .tab a").click(function(){
                        $(this).addClass("cur").siblings().removeClass("cur");
                    });
                });
            </script>
        </div>
        <div id="list">
            <?php include('list.php');?>
        </div>
    </div>

    <div class="clear"></div>
    <div class="vspace" style="height:35px"></div>
</div>

<!-- end-->




<div class="vspace" style="height:30px;"></div>

<!-- begin-->
<div class="wrapper">
    <div class="gototop" id="gototop1"><span></span></div>
    <script type="text/javascript">var mygototop = new gototop("gototop1")</script>
</div>
