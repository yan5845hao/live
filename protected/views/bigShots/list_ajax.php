<?php
$data = $dataProvider->getData();
foreach ((array)$data as $v) {
    ?>
    <div class="dklist_col">
        <img src="<?php echo $v[image]?>@213w_175h_1e_1c_1x.jpg" /><span></span><i><a href="<?php echo Yii::app()->createUrl('/bigShots/playvideo',array('id'=>$v['product_id']))?>"><?php echo mb_substr($v[title],0,12,'utf-8');?></a>
            <br>
            <img src="images/daka_minifensi.png" width="11" height="15">粉丝：<em><?php echo $v['fans_total']?></em> <img src="images/daka_miniplay.png" width="16" height="15">播放：<em><?php echo $v['play_total']?></em></i>
    </div>
<?php
}
?>
<div id="bigShowsListMore">
<?php
$count = (int)$dataProvider->pagination->itemCount;
$page = floor($count / $dataProvider->pagination->pageSize);
$nextPage = intval($_GET['page']) + 1;
if ($nextPage > $page) {
    echo '<div class="dk_jiazai"><a href="#">没有更多了</a></p></div>';
} else {
    $url = Yii::app()->createUrl('/bigShots/index', array('page' => $nextPage));
    echo '<div class="dk_jiazai" data-url="' . $url . '" id="dk_jiazai"><a href="javascript:;" onclick="loadMore()">点击加载更多...</a></div>';
}
?>
</div>