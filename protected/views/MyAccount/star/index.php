<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <form action="<?php echo Yii::app()->createUrl('/myAccount/editStar');?>" method="post" id="form1" enctype="multipart/form-data">
        <div class="usercon981 right">
            <div class="usercon981tit">明星信息</div>
            <div class="usercon981titline"><img src="/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981info">
                <div style="font-size:14px; font-weight:bolder; margin-bottom:5px;">明星海报</div>
                <div class="left">
                    <?php $face = $userInfo->face?$userInfo->face:'/images/default.png'; ?>
                    <div>
                        <div id="imgshow" style="margin-bottom: -6px;"><img src="<?php echo $face;?>" width="205" height="205" /></div>
                        <div style="line-height: 30px; height: 30px; font-size: 14px; background: #f0f0f0;"><?php $this->widget('application.widgets.Upload.UploadWidget');?></div>
                        <div id="imgError" style="color: red;"></div>
                    </div>
                </div>
                <div class="left" style="color: #ccc;"><br><br><br><br><br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;图片大小不成超过2M</div>
                <input type="hidden" id="face" name="face" value="<?php echo $userInfo->face;?>" >
            </div>
            <div class="vspace" style="height:30px;"></div>
            <div class="usercon981con"><span>简介</span></div>
            <div class="usercon981con mxinfo">
                <textarea name="content" style="width: 600px; height: 64px; resize:none; "><?php echo $userInfo->description->content;?></textarea>
            </div>
            <div class="usercon981con"><span>生日</span><input name="birthday" value="<?php echo $userInfo->description->birthday;?>" type="text"/><em style="color: #ccc;">请填写日期格式，如：1990-04-20</em></div>
            <div class="usercon981con"><span>出生地</span><input name="address1" value="<?php echo $userInfo->description->address1;?>" type="text" /></div>
            <div class="usercon981con"><span>身高</span><input name="height" value="<?php echo $userInfo->description->height;?>" type="text" /></div>
            <div class="usercon981con"><span>体重</span><input name="weight" value="<?php echo $userInfo->description->weight;?>" type="text" /></div>
            <div class="usercon981con"><span>职业</span><input name="occupation" value="<?php echo $userInfo->description->occupation;?>" type="text" /></div>
            <div class="usercon981con"><span>他的词条</span><input name="tag" value="<?php echo $userInfo->description->tag;?>" type="text" /><em style="color: #ccc;">请使用（,）分隔，如：高富帅,歌手</em></div>
            <?php $relation_star = CJSON::decode($userInfo->description->relation_star); ?>
            <div class="mxcenter_tit">
                <div class="usercon981con"><img src="/css/img/mxcenter_line.png" width="941" height="6" /></div>
                <div class="usercon981con" style="font-size:22px;">相关明星1</div>
                <div class="usercon981con"><span>姓名</span><input name="relation_star[0][name]" value="<?php echo $relation_star[0]['name']?>" type="text" /></div>
                <div class="usercon981con"><span>图片</span><input name="faces[]" type="file" /></div>
                <div class="usercon981con">
                    <?php if(isset($relation_star[0]['face']) && $relation_star[0]['face']){ ?>
                    <img src="<?php echo $relation_star[0]['face'];?>" width="134" height="134" />
                    <?php } ?>
                    <input type="hidden" name="relation_star[0][face]" value="<?php echo $relation_star[0]['face'];?>">
                </div>
                <div class="usercon981con"><span>链接地址</span><input name="relation_star[0][link]" value="<?php echo $relation_star[0]['link']?>" type="text" /></div>
            </div>
            <div class="mxcenter_tit">
                <div class="usercon981con"><img src="/css/img/mxcenter_line.png" width="941" height="6" /></div>
                <div class="usercon981con" style="font-size:22px;">相关明星2</div>
                <div class="usercon981con"><span>姓名</span><input name="relation_star[1][name]" value="<?php echo $relation_star[1]['name']?>" type="text" /></div>
                <div class="usercon981con"><span>图片</span><input name="faces[]" type="file" /></div>
                <div class="usercon981con">
                    <?php if(isset($relation_star[1]['face']) && $relation_star[1]['face']){ ?>
                        <img src="<?php echo $relation_star[1]['face'];?>" width="134" height="134" />
                    <?php } ?>
                    <input type="hidden" name="relation_star[1][face]" value="<?php echo $relation_star[1]['face'];?>">
                </div>
                <div class="usercon981con"><span>链接地址</span><input name="relation_star[1][link]" value="<?php echo $relation_star[1]['link']?>" type="text" /></div>
            </div>
            <div class="mxcenter_tit">
                <div class="usercon981con"><img src="/css/img/mxcenter_line.png" width="941" height="6" /></div>
                <div class="usercon981con" style="font-size:22px;">相关明星3</div>
                <div class="usercon981con"><span>姓名</span><input name="relation_star[2][name]" value="<?php echo $relation_star[2]['name']?>" type="text" /></div>
                <div class="usercon981con"><span>图片</span><input name="faces[]" type="file" /></div>
                <div class="usercon981con">
                    <?php if(isset($relation_star[2]['face']) && $relation_star[2]['face']){ ?>
                        <img src="<?php echo $relation_star[2]['face'];?>" width="134" height="134" />
                    <?php } ?>
                    <input type="hidden" name="relation_star[2][face]" value="<?php echo $relation_star[2]['face']?>">
                </div>
                <div class="usercon981con"><span>链接地址</span><input name="relation_star[2][link]" type="text" value="<?php echo $relation_star[2]['link']?>" /></div>
            </div>
            <div class="usercon981con"><a href="javascript:;" onclick="javascript:$('#form1').submit();"><img src="/css/img/userbtn01.jpg" width="260" height="40" /></a></div>
            <input type="hidden" name="customer_id" value="<?php echo $userInfo['customer_id'];?>"
            <div class="vspace" style="height:20px;"></div>
        </div>
        </form>
    </div>
</div>
