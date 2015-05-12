<div class="wrapper">
    <div class="userlj">当前位置：<a href="#">用户中心</a> > <a href="#">基本信息</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <div class="usercon981tit">我的资料</div>
            <div class="usercon981titline"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981info">
                <div class="usercon981pic left"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userpic.jpg" width="205" height="205" /><span></span><em><a href="#">修改头像</a></em></div>
                <div class="usercon981text left">
                    <dl>
                        <dt>美丽的传说</dt>
                        <dd>金币： 11112<a href="#"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userbtn02.jpg" width="52" height="24" /></a></dd>
                        <dd>积分： 112</dd>
                        <dd>手机已经验证：<?php echo Yii::app()->user->name?></dd>
                        <dd>用户注册时间：2013-08-03 10:55 </dd>
                        <dd>最后登录时间：<?php echo Yii::app()->session['subtime'];?> </dd>
                    </dl>
                </div>
            </div>
            <div class="vspace" style="height:30px;"></div>
            <!--<div class="usercon981con"><span>手机号</span><input name="" type="text"/><em><a >更换手机号</a></em></div>-->
            <div class="usercon981con"><span>昵称</span><input name="" type="text" /><em><a >更换昵称</a></em></div>
            <div class="usercon981con"><span>性别</span>
                <ul>
                    <li class="current"><a href="#">男</a></li>
                    <li><a href="#">女</a></li>
                </ul>
            </div>
            <div class="vspace" style="height:30px;"></div>
            <div class="usercon981con"><span>邮箱</span><input name="" type="text"/></div>
            <div class="usercon981con"><span>真实姓名</span><input name="" type="text"/></div>
            <div class="vspace" style="height:20px;"></div>
            <div class="usercon981con"><a href="#"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userbtn01.jpg" width="260" height="40" /></a></div>



        </div>
    </div>
</div>
