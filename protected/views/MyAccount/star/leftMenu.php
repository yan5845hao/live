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
            <dt><img src="/css/img/mxcenter_06.jpg" width="24" height="22" />我的档期管理</dt>
            <dd><a href="<?php echo Yii::app()->createUrl('/myAccount/schedule')?>">档期列表</a></dd>
            <dd><a href="<?php echo Yii::app()->createUrl('/myAccount/pubschedule')?>">发布档期</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/mxcenter_07.jpg" width="24" height="22" />我的新闻管理</dt>
            <dd <?php if($uri == 'myaccount/news'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/news')?>">新闻列表</dd>
            <dd <?php if($uri == 'myaccount/pubnews'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/pubNews')?>">发布新闻</dd>
        </dl>
        <dl>
            <dt><img src="/css/img/mxcenter_08.jpg" width="24" height="22" />我的视频管理</dt>
            <dd <?php if($uri == 'myaccount/video'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/video')?>">视频列表</a></dd>
            <dd <?php if($uri == 'myaccount/pubvideo'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/pubVideo')?>">发布视频</a></dd>
        </dl>
        <dl>
            <dt><img src="/css/img/mxcenter_09.jpg" width="24" height="22" />我的众筹管理</dt>
            <dd <?php if($uri == 'myaccount/pubproject'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/pubProject')?>">发布众筹</a></dd>
            <dd <?php if($uri == 'myaccount/projects'){ echo 'class="current"'; } ?>><a href="<?php echo Yii::app()->createUrl('/myAccount/projects')?>">众筹列表</a></dd>
        </dl>
    </div>
</div>