<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <form action="<?php echo Yii::app()->createUrl('/myAccount/pubNews');?>" method="post"  id="form1" enctype="multipart/form-data">
            <div class="usercon981tit">发布新闻</div>
            <div class="usercon981titline"><img src="/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981con"><span>新闻标题</span>
                <input name="title" value="<?php echo $newsInfo->title;?>" type="text" /><em>新闻标题，30字以内</em></div>
            <div class="mxcenter_tit"><div class="usercon981con"><span>图片</span><input name="image" value="" type="file" /></div></div>
            <div class="usercon981con">
                <?php if($newsInfo->image){ ?>
                    <img src="<?php echo $newsInfo->image;?>" width="134" height="134" />
                <?php } ?>
            </div>
            <div class="usercon981con"><span>新闻介绍 <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">输入新闻内容，2000字以内</b></span>
                <textarea name="content" cols="" rows="" style="width:900px; height:250px; border:0px; background-color:#f0f0f0;"><?php echo $newsInfo->content;?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $newsInfo->id?>">
            <div class="usercon981con"><a href="javascript:;" onclick="javascript:$('#form1').submit();"><img src="/css/img/userbtn01.jpg" width="260" height="40" /></a></div>
            <div class="vspace" style="height:20px;"></div>
            </form>
        </div>
    </div>
</div>