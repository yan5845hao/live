<?php $uri = strtolower(Yii::app()->request->getPathInfo());?>
<div class="usercon205 left">
    <div class="usercon205tit">用户中心</div>
    <div class="usercon205con">
        <dl>
            <dt><img src="/css/img/user04.jpg" width="24" height="22" />基本信息</dt>
            <dd <?php if($uri == 'myaccount'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount')?>">我的资料</a></dd>
            <dd <?php if($uri == 'myaccount/modify'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/modify')?>">修改密码</a></dd>
            <dd <?php if($uri == 'myaccount/gold'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/gold')?>">我的金币</a></dd>
            <dd><a href="#">我的积分</dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user02.jpg" width="24" height="22" />订单管理</dt>
            <dd <?php if($uri == 'myaccount/myorders'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/myOrders')?>">我的订单</a></dd>
            <dd <?php if($uri == 'myaccount/address'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/address')?>">收货地址</a></dd>
        </dl>
<!--        <dl>-->
<!--            <dt><img src="/css/img/user02.jpg" width="24" height="22" />直播管理</dt>-->
<!--            <dd><a href="#">我的守护记录</a></dd>-->
<!--            <dd><a href="#">我的互动记录</a></dd>-->
<!--            <dd><a href="#">我的座驾</a></dd>-->
<!--            <dd><a href="#">我的道具</a></dd>-->
<!--            <dd><a href="#">我的预约</a></dd>-->
<!--        </dl>-->
        <dl>
            <dt><img src="/css/img/user03.jpg" width="24" height="22" />我的收藏</dt>
            <dd <?php if($uri == 'myaccount/myfavorites'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/myFavorites')?>">我的收藏夹</a></dd>
        </dl>
    </div>
</div>