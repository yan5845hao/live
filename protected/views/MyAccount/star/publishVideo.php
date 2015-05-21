<style>
select{background-color: #f0f0f0; border: 0 none;height: 40px;padding-left: 4px;width: 120px;}
</style>
<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <form action="<?php echo Yii::app()->createUrl('/myAccount/pubVideo');?>" method="post"  id="form1" enctype="multipart/form-data">
        <div class="usercon981 right">
                <div class="usercon981tit">发布视频</div>
                <div class="usercon981titline"><img src="/css/img/userline.png" width="939" height="2" /></div>
                <div class="usercon981con">
                    <span>视频标题</span><input name="title" value="<?php echo $product->title;?>" type="text" /><em>视频标题，30字以内</em>
                </div>
                <div class="mxcenter_tit"><div class="usercon981con"><span>图片</span><input name="image" value="" type="file" /></div></div>
                <div class="usercon981con">
                    <?php if($product->image){ ?>
                        <img src="<?php echo $product->image;?>" width="134" height="134" />
                    <?php } ?>
                </div>
				<div class="usercon981con">
                    <span>视频类别</span>
					<select name="video_type" >
					<option value="音乐" <?php echo $product->video_type=='音乐' ? 'selected' : '';?>>音乐</option>
					<option value="影视" <?php echo $product->video_type=='影视' ? 'selected' : '';?>>影视</option>
					<option value="综艺" <?php echo $product->video_type=='综艺' ? 'selected' : '';?>>综艺</option>
					<option value="其他" <?php echo $product->video_type=='其他' ? 'selected' : '';?>>其他</option>
					</select>
					<?php //echo $product->video_type;?>
                </div>
					<div class="usercon981con">
                    <span>活动类别</span>
					<select name="video_types" >
					<option value="生日会" <?php echo $product->video_types=='生日会' ? 'selected' : '';?>>生日会</option>
					<option value="畅聊室" <?php echo $product->video_types=='畅聊室' ? 'selected' : '';?>>畅聊室</option>
					<option value="探班会" <?php echo $product->video_types=='探班会' ? 'selected' : '';?>>探班会</option>
					<option value="其他" <?php echo $product->video_types=='其他' ? 'selected' : '';?>>其他</option>
					</select>
					<?php //echo $product->video_type;?>
                </div>
                <div class="mxcenter_tit">
                    <div class="usercon981con">
                        <span>视频地址</span>
                        <?php $this->widget('application.widgets.Upload.UploadWidget',array('type'=>'video'));?>
                        <input type="text" value="<?php echo $product->url;?>" name="url" id="videoUrl" style="width: 680px;">
                    </div>
                </div>
                <div class="usercon981con" style="clear: both;"><span>内容介绍 <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">输入视频内容介绍，2000字以内</b></span>
                    <textarea name="content" style="width:900px; height:250px; border:0px; background-color:#f0f0f0;"><?php echo $product->content;?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $product->product_id;?>">
                <div class="usercon981con"><a href="javascript:;" onclick="javascript:$('#form1').submit();"><img src="/css/img/userbtn01.jpg" width="260" height="40" /></a></div>
                <div class="vspace" style="height:20px;"></div>
        </div>
        </form>
    </div>
</div>