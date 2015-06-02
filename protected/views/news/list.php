<ul class="shownews">
	<?php
	$data = $dataProvider->getData();
	if(empty($data)){ 
	}else{
		foreach($data as $v){ 
	?>
	        <li>
	            <div class="imgbox left"><a href="<?php echo Yii::app()->createUrl('/news/info',array('newsid'=>$v['id']))?>" target="_blank"><img src="<?php echo $v['image']?>" style="width:160px; height:160px"/></a></div>
	            <h4><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$v['id']))?>" target="_blank"><?php echo $v['title']?></a></h4>
	            <div class="time"><?php echo date('Y-m-d H:i:s',$v['createtime']);?></div>
	            <p><?php echo $v['introduce']?></p>
	            <p><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$v['id']))?>" target="_blank">查看详情</a></p>
	             <div class="bdsharebuttonbox"><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
	        </li>
	<?php
	    }
	}
	?> 
</ul>
<div id="bigShowsListMore" class="more">
<?php
if ((int)$dataProvider->pagination->itemCount > $dataProvider->pagination->pageSize) {
	if(isset($_GET['id'])){ 
		$url = Yii::app()->createUrl('/news/index', array('page' => 2, 'id' => intval($_GET['id'])));
	}else{
    	$url = Yii::app()->createUrl('/news/index', array('page' => 2));
	}
    echo '<div class="dk_jiazai" id="dk_jiazai" data-url="' . $url . '"><a href="javascript:;" onclick="loadMore()">点击加载更多...</a></div>';
}
?>
</div>