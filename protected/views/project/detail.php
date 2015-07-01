<script>
    $(document).ready(function(){
        $("#showbtn_showbox").click(function(){
            $(".allbg,.showbox").show();
        });
    });
</script>
<!--topnav begin-->
<div class="wrapper">
    <div class="bread">当前位置：<a href="/">首页</a><span>></span><a href="<?php echo Yii::app()->createUrl('/project/index')?>">星愿城</a><span>></span><?php echo $product->title;?></div>
</div>

<!--topnav end-->


<!-- begin-->
<?php
$project = ProductProject::model()->findByAttributes(array('product_id' => $product->product_id));
?>
<div class="wrapper">
    <div class="ind13">
        <h1><?php echo $product->title;?></h1>
        <p><?php echo date('Y/m/d',strtotime($product->begin_date));?> - <?php echo date('Y/m/d',strtotime($product->end_date));?> 火热筹款中</p>
    </div>
    <div class="col840 left">
        <div class="newsContent01">
            <div id="content">
                <?php echo $product->content;?>
            </div>
        </div>
        <div class="vspace" style="height:25px;"></div>
<!--        <div class="md md3">-->
<!--            <div class="hd">-->
<!--                <span class="title left">最新评论<i>明星娱乐商城，来这儿就够了</i></span>-->
<!--                <span class="more right" ><a href="javascript:;" style="color: #ccc;">详细>></a></span>-->
<!---->
<!--            </div>-->
<!--            <div class="bd">-->
<!---->
<!---->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="vspace" style="height:35px;"></div>-->
        <?php
        $data = $dataProvider->getData();
        if(!empty($data)){
        ?>
        <div class="md">
            <div class="hd">
                <span class="title left">支持者<i></i></span>
                <span class="more right" ><a href="javascript:;" style="color: #ccc;">更多>></a></span>

            </div>
            <div class="bd">
                <div class="con23">
                    <ul id="con23">
                        <?php
                        foreach($data as $list){
                        $customer = Customer::model()->findByPk($list['customer_id']);
                        $phone = @substr($customer->phone, 0, 3) . '****' . @substr($customer->phone, 7, 11);
                        $displayName = $customer->nick_name ? $customer->nick_name : $phone;
                        //发起产品总数
                        $projectReleaseMap = Product::model()->getProjectReleaseMap();
                        //支持数
                        $sql = "select count(*) from `order` where customer_id = ".$list['customer_id'] . " and payment_info = '众筹'";
                        $supporter_count = Yii::app()->db->createCommand($sql)->queryScalar();
                        ?>
                        <li>
                            <div class="headbox left"><a target="_blank" href="#"><img style="width: 70px;" src="<?php echo staticUrl($customer->face,array('mode' => 2, 'width' => '70','height' => '70'));?>"></a></div>
                            <h5><a target="_blank" href="#"><?php echo $displayName;?></a></h5>
                            <p>支持项目￥<?php echo (int)$list['cost']?> 元</p>
                            <p class="numbers">
                                <span>发起：<i><?php echo isset($projectReleaseMap[$customer['customer_id']])?$projectReleaseMap[$customer['customer_id']]:0;?></i></span>
                                <span>支持：<i><?php echo $supporter_count;?></i></span>
                            </p>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="clear"></div>
                    <div style="text-align: right; margin-right: 20px;">
                    <?php
                    $this->widget('CLinkPager', array(
                        'cssFile'=>false,
                        'header'=>'',
                        'maxButtonCount'=>8,
                        'firstPageLabel'=>false,
                        'lastPageLabel'=>false,
                        'nextPageLabel'=>'下一页',
                        'prevPageLabel'=>'上一页',
                        'pages' => $dataProvider->pagination
                    ));
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php
    $product_total = 0;
    $proportion = '0';
    $project = $product->getProject($product->product_id);
    if ($project) {
        $product_total = $project->product_total;
    }
    if ($product_total > 0) {
        $proportion = (($product_total / $product->project_price) * 100);
        if($proportion > 100)
            $proportion = 100;
    }
    $day = ceil((strtotime($product->end_date) - strtotime($product->begin_date)) / 86400);
    ?>
    <div class="col380 right">
        <div class="ind14">
            <p>目前累计金额</p>
            <h3><em><?php echo $project->product_total?$project->product_total:0;?></em>元</h3>
            <p>众筹金额：<span><?php echo $product->project_price;?>元</span></p>
            <p><em>发起人</em>：<span><?php echo $product->customer->nick_name?$product->customer->nick_name:$product->customer->user_name;?></span></p>
            <p>项目进度：<span>进行中</span></p>
            <div class="progress">
                <div style="width:<?php echo $proportion;?>%" class="yellow"></div>
                <span><?php echo $proportion;?>%</span>
            </div>
            <div class="pro">
                        <span>
                            <em><?php echo $day;?></em><br>
                            <i>剩余天数</i>
                        </span>
                        <span>
                            <em><?php echo $product->projectOrderCount;?></em><br>
                            <i>支持者</i>
                        </span>
                        <span>
                            <em>0</em><br>
                            <i>喜欢</i>
                        </span>
            </div>
            <div class="msg">在<span><?php echo date('Y年m月d日',strtotime($product->end_date))?></span>前得到<span><?php echo $product->project_price;?></span><span>元</span>的支持才可成功</div>
            <div class="more"><a id="showbtn_showbox" class="zcbtn" href="javascript:void(0);">我要支持</a></div>

            <div class="bdsharebuttonbox"> <em class="left">我要分享：</em>
                <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
                <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
                <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
                <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
                <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
                <a href="#" class="bds_more" data-cmd="more"></a>
            </div>
            <script type="text/javascript">window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
            </script>
        </div>
        <div class="vspace" style="height:20px;"></div>
        <?php
        foreach($projectDescription as $list){
            $sql = "select count(*) from `order` where product_project_description_id = ".$list['product_project_description_id'];
            $supporter_all_count = Yii::app()->db->createCommand($sql)->queryScalar();
            if ($list['number_people'] > 0) {
                $np_value = '限' . $list['number_people'] . '位';
            } else {
                $np_value = '不限量';
            }
        ?>
        <div class="ind15">
            <div class="hd">
                <span class="title left">支持<?php echo $list['price']?>元<i></i></span>
                <span class="more right"><?php echo $supporter_all_count;?>位支持者/<?php echo $np_value?></span>
            </div>
            <div class="con">
                <?php echo $list['content']?>
                <a class="zcbtn w93" href="<?php echo Yii::app()->createUrl('/project/payment',array('id'=>$list['product_project_description_id']));?>" target="_blank">支持</a>
            </div>
        </div>
        <div class="vspace" style="height:20px;"></div>
        <?php } ?>
    </div>
    <div class="clear"></div>
</div>
<div class="vspace" style="height:35px"></div>
<!-- end-->

<!--支持弹出层-->
<div class="allbg" style="display: none;"></div>
<div class="showbox" style="display: none;">
    <div class="tt">选择你的预购回报</div>
    <div class="close" id="closebtn_showbox"></div>
    <ul>
        <?php
        foreach($projectDescription as $list){
            $sql = "select count(*) from `order` where product_project_description_id = ".$list['product_project_description_id'];
            $supporter_all_count = Yii::app()->db->createCommand($sql)->queryScalar();
            if ($list['number_people'] > 0) {
                $np_value = '限' . $list['number_people'] . '位';
            } else {
                $np_value = '不限量';
            }
        ?>
        <li>
            <div class="hd">
                <span class="title left">支持<?php echo $list['price'];?>元<i></i></span>
            </div>
            <div class="con">
                <?php echo $list['content']?>
                <div><a class="zcbtn w93 short left" href="<?php echo Yii::app()->createUrl('/project/payment',array('id'=>$list['product_project_description_id']));?>" target="_blank">支持</a><span class="num right"><?php echo $supporter_all_count;?>位支持者/<?php echo $np_value?></span></div>
            </div>
        </li>
        <?php } ?>
    </ul>
</div>
<script>
    $(document).ready(function(){
        var _w =$(document.body).width();
        var _h =$(document.body).height();
        $(".allbg").css({"width":_w+"px","height":_h+"px"});
        $("#closebtn_showbox").click(function(){
            $(".allbg,.showbox").hide();
        });
    });
</script>
<!---->





<!-- begin-->
<div class="wrapper">
    <div class="gototop" id="gototop1"><span></span></div>
    <script type="text/javascript">var mygototop = new gototop("gototop1")</script>
</div>

<!-- end-->