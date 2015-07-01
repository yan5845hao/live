<?php $uri = strtolower(Yii::app()->request->getPathInfo());?>
<div class="usercon205 left">
    <div class="usercon205tit">明星中心</div>
    <div class="usercon205con">
        <dl>
            <dt><img src="/css/img/user04.jpg" width="24" height="22" />明星主页管理</dt>
            <dd <?php if($uri == 'myaccount'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount')?>">明星信息</a></dd>
			<!--
            <dd <?php if($uri == 'myaccount/store'){ echo 'class="current"'; } ?>><a href="#">店铺维护管理</a></dd>
            <dd <?php if($uri == 'myaccount/evaluation'){ echo 'class="current"'; } ?>><a href="#">我收到的评价</a></dd>
			-->
        </dl>
        <dl>
            <dt><img src="/css/img/user02.jpg" width="24" height="22" />订单管理</dt>
            <dd <?php if($uri == 'myaccount/myorders'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/myOrders')?>">我的订单</a></dd>
            <dd <?php if($uri == 'myaccount/address'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/address')?>">收货地址</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user03.jpg" width="24" height="22" />我的收藏</dt>
            <dd <?php if($uri == 'myaccount/myfavorites'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/myFavorites')?>">我的收藏夹</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user02.jpg" width="24" height="22" />我的档期管理</dt>
            <dd><a href="<?php echo Yii::app()->createUrl('/myAccount/schedule')?>">档期列表</a></dd>
            <dd><a href="<?php echo Yii::app()->createUrl('/myAccount/pubschedule')?>">发布档期</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user03.jpg" width="24" height="22" />我的新闻管理</dt>
            <dd <?php if($uri == 'myaccount/news'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/news')?>">新闻列表</dd>
            <dd <?php if($uri == 'myaccount/pubnews'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/pubNews')?>">发布新闻</dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user03.jpg" width="24" height="22" />我的视频管理</dt>
            <dd <?php if($uri == 'myaccount/video'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/video')?>">视频列表</a></dd>
            <dd <?php if($uri == 'myaccount/pubvideo'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/pubVideo')?>">发布视频</a></dd>
        </dl>
    </div>
</div>