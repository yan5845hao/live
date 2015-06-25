<div id="bigShowsList">
<?php
$data = $dataProvider->getData();
if (empty($data)) {
    echo '<div style="height:300px;text-align:center;font-size:18px;"><br><br><br><br><br>很抱歉！没有找到“<span style="color:red;">'.$_GET['keyword'].'</span>”相关的内容<br><br><p><a href="/bigShots">返回顶部</a></p></div>';
}else{
    foreach($data as $v){
        ?>
        <div class="dklist_col">
            <img src="<?php echo $v[image]?>@213w_175h_1e_1c_1x.jpg" /><span></span><i><a href="<?php echo Yii::app()->createUrl('/bigShots/playvideo',array('id'=>$v['product_id']))?>"><?php echo mb_substr($v[title],0,12,'utf-8');?></a>
                <br>
                <img src="/images/daka_minifensi.png" width="11" height="15">粉丝：<em><?php echo $v['fans_total']?></em> <img src="/images/daka_miniplay.png" width="16" height="15">播放：<em><?php echo $v['play_total']?></em></i>
        </div>
    <?php
    }
}
?>
</div>
<div id="bigShowsListMore">
<?php
if ((int)$dataProvider->pagination->itemCount > $dataProvider->pagination->pageSize) {
    $url = Yii::app()->createUrl('/bigShots/index', array('page' => 2));
    echo '<div class="dk_jiazai" id="dk_jiazai" data-url="' . $url . '"><a href="javascript:;" onclick="loadMore()">点击加载更多...</a></div>';
}
?>
</div>