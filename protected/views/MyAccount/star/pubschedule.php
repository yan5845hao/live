<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <form action="<?php echo Yii::app()->createUrl('/myAccount/pubschedule');?>" method="post"  id="form1" enctype="multipart/form-data">
            <div class="usercon981tit">发布档期</div>
            <div class="usercon981titline"><img src="/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981con"><span>档期标题</span>
                <input name="title" value="<?php echo $newsInfo->title;?>" type="text" /><em>档期标题，30字以内</em></div>
            <div class="usercon981con"><span>地点</span>
                <input name="address" value="<?php echo $newsInfo->address;?>" type="text" /><em>档期地点，30字以内</em></div>
              <div class="usercon981con"><span>开始时间</span>
                <input name="begintime" value="<?php echo !empty($newsInfo->begintime) ? date('Y-m-d H:i:s',$newsInfo->begintime) : '';?>" type="text" /><em>档期时间格式(2015-05-12 17:58:00)</em></div>
                <div class="usercon981con"><span>时长</span>
                <input name="showtime" value="<?php echo $newsInfo->showtime;?>" type="text" /><em>10字以内</em></div>
            <div class="mxcenter_tit"><div class="usercon981con"><span>图片<b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">尺寸400×800</b></span><input name="img" value="" type="file" /></div></div>
            <div class="usercon981con">
                <?php if($newsInfo->img){ ?>
                    <img src="<?php echo $newsInfo->img;?>" width="134" height="134" />
                <?php } ?>
            </div>
            <div class="usercon981con"><span>档期介绍 <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">输入新闻内容，2000字以内</b></span>
                     <code>
                    <?php $this->widget('application.widgets.Ueditor.UeditorWidget'); ?>
                     <textarea class="tff_ueditor" id="content" name="content"  style="width:800px;height:300px;"><?php echo $newsInfo->content;?></textarea>
                    </code> 
            </div>
            <input type="hidden" name="id" value="<?php echo $newsInfo->id?>">
            <div class="usercon981con"><a href="javascript:;" onclick="javascript:$('#form1').submit();"><img src="/css/img/userbtn01.jpg" width="260" height="40" /></a></div>
            <div class="vspace" style="height:20px;"></div>
            </form>
        </div>
    </div>
</div>