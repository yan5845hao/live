<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <div class="usercon981tit">明星信息</div>
            <div class="usercon981titline"><img src="css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981info">
                <div style="font-size:14px; font-weight:bolder; margin-bottom:5px;">明星海报</div>
                <div class="left">
                    <?php $face = $userInfo->face?$userInfo->face:cdn_bumeng_url() . 'webserver/css/img/userline.png'; ?>
                    <div>
                        <div id="imgshow" style="margin-bottom: -6px;"><img src="<?php echo $face;?>" width="205" height="205" /></div>
                        <div style="line-height: 30px; height: 30px; font-size: 14px; background: #ccc;"><?php $this->widget('application.widgets.Upload.UploadWidget');?></div>
                        <div id="imgError" style="color: red;"></div>
                    </div>
                </div>
            </div>
            <div class="vspace" style="height:30px;"></div>
            <div class="usercon981con"><span>简介</span></div>
            <div class="usercon981con mxinfo">
                <?php echo $userInfo->description->content;?>
            </div>
            <div class="usercon981con"><span>生日</span><input name="" value="<?php echo $userInfo->description->birthday;?>" type="text"/><em></em></div>
            <div class="usercon981con"><span>出生地</span><input name="" value="<?php echo $userInfo->description->address1;?>" type="text" /></div>
            <div class="usercon981con"><span>身高</span><input name="" value="<?php echo $userInfo->description->height;?>" type="text" /></div>
            <div class="usercon981con"><span>体重</span><input name="" value="<?php echo $userInfo->description->weight;?>" type="text" /></div>
            <div class="usercon981con"><span>职业</span><input name="" value="<?php echo $userInfo->description->occupation;?>" type="text" /></div>
            <div class="usercon981con"><span>他的词条</span><input name="" value="<?php echo $userInfo->description->tag;?>" type="text" /><em>请使用，分隔，否则不能显示</em></div>
            <?php
            $relation_star = CJSON::decode($userInfo->description->relation_star);
//            print_vars($relation_star);
            ?>
            <div class="mxcenter_tit">
                <div class="usercon981con"><img src="css/img/mxcenter_line.png" width="941" height="6" /></div>
                <div class="usercon981con" style="font-size:22px;">相关明星1</div>
                <div class="usercon981con"><span>姓名</span><input name="name" value="" type="text" /></div>
                <div class="usercon981con"><span>图片</span><input name="face" type="text" />
                    <a href="#"><img src="css/img/mxcenter_btn01.jpg" width="89" height="40" style="margin-bottom:-16px;"/></a></div>
                <div class="usercon981con"><img src="css/img/mxcenter_pic01.jpg" width="134" height="134" /></div>
                <div class="usercon981con"><span>链接地址</span><input name="" type="text" /></div>
            </div>
            <div class="mxcenter_tit">
                <div class="usercon981con"><img src="css/img/mxcenter_line.png" width="941" height="6" /></div>
                <div class="usercon981con" style="font-size:22px;">相关明星2</div>
                <div class="usercon981con"><span>姓名</span><input name="" type="text" /></div>
                <div class="usercon981con"><span>图片</span><input name="" type="text" />
                    <a href="#"><img src="css/img/mxcenter_btn01.jpg" width="89" height="40" style="margin-bottom:-16px;"/></a></div>
                <div class="usercon981con"><img src="css/img/mxcenter_pic01.jpg" width="134" height="134" /></div>
                <div class="usercon981con"><span>链接地址</span><input name="" type="text" /></div>
            </div>
            <div class="mxcenter_tit">
                <div class="usercon981con"><img src="css/img/mxcenter_line.png" width="941" height="6" /></div>
                <div class="usercon981con" style="font-size:22px;">相关明星3</div>
                <div class="usercon981con"><span>姓名</span><input name="" type="text" /></div>
                <div class="usercon981con"><span>图片</span><input name="" type="text" />
                    <a href="#"><img src="css/img/mxcenter_btn01.jpg" width="89" height="40" style="margin-bottom:-16px;"/></a></div>
                <div class="usercon981con"><img src="css/img/mxcenter_pic01.jpg" width="134" height="134" /></div>
                <div class="usercon981con"><span>链接地址</span><input name="" type="text" /></div>
            </div>

            <div class="usercon981con"><a href="#"><img src="css/img/userbtn01.jpg" width="260" height="40" /></a></div>
            <div class="vspace" style="height:20px;"></div>
        </div>
    </div>
</div>
