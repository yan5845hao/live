<?php $uri = strtolower(Yii::app()->request->getPathInfo());?>
<div class="usercon205 left">
    <div class="usercon205tit">明星中心</div>
    <div class="usercon205con">
        <dl>
            <dt><img src="/css/img/user04.jpg" width="24" height="22" />明星主页管理</dt>
            <dd <?php if($uri == 'myaccount'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount')?>">明星信息</a></dd>
            <dd <?php if($uri == 'myaccount/store'){ echo 'class="current"'; } ?>><a href="#">店铺维护管理</a></dd>
            <dd <?php if($uri == 'myaccount/evaluation'){ echo 'class="current"'; } ?>><a href="#">我收到的评价</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user02.jpg" width="24" height="22" />我的档期管理</dt>
            <dd><a href="#">发布档期</a></dd>
            <dd><a href="#">档期列表</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user03.jpg" width="24" height="22" />我的新闻管理</dt>
            <dd <?php if($uri == 'myaccount/pub'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/pub')?>">发布新闻</dd>
            <dd><a href="#">新闻列表</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/user03.jpg" width="24" height="22" />我的视频管理</dt>
            <dd><a href="#">内部视频</a></dd>
            <dd><a href="#">外部视频</a></dd>
        </dl>
    </div>
</div>