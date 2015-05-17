<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <div class="usercon981tit">我的资料</div>
            <?php $face = $userInfo->face?$userInfo->face:cdn_bumeng_url() . 'webserver/css/img/userline.png'; ?>
            <div class="usercon981titline"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981info">
                <div class="left">
<!--                    <span></span><em><a href="#">修改头像</a></em>-->
                    <div>
                        <div id="imgshow" style="margin-bottom: -6px;"><img src="<?php echo $face;?>" width="205" height="205" /></div>
                        <div style="line-height: 30px; height: 30px; font-size: 14px; background: #f0f0f0;"><?php $this->widget('application.widgets.Upload.UploadWidget');?></div>
                        <div id="imgError" style="color: red;"></div>
                    </div>
                </div>
                <div class="usercon981text left">
                    <dl>
                        <dt id="nick_name"><?php echo $userInfo->nick_name;?></dt>
                        <dd>金币： 11112<a href="#"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userbtn02.jpg" width="52" height="24" /></a></dd>
                        <dd>积分： 112</dd>
                        <dd>手机已经验证：<?php echo $userInfo->phone;?></dd>
                        <dd>用户注册时间：<?php echo $userInfo->created;?> </dd>
                        <dd>最后登录时间：<?php echo Yii::app()->session['subtime'];?> </dd>
                    </dl>
                </div>
            </div>
            <form url="<?php echo Yii::app()->createUrl('/myAccount/editInfo')?>" id="form1">
            <div class="vspace" style="height:30px;"></div>
            <div class="usercon981con"><span>昵称</span><input name="nick_name" value="<?php echo $userInfo->nick_name;?>" type="text" /><em>更换昵称</em></div>
            <div class="usercon981con"><span>性别</span>
                <ul>
                    <li class="current"><a href="#">男</a></li>
                    <li><a href="#">女</a></li>
                </ul>
            </div>
            <input name="gender" value="<?php echo $userInfo->gender;?>" type="hidden">
            <input name="customer_id" value="<?php echo $userInfo->customer_id;?>" type="hidden">
            <input name="face" id="face" value="<?php echo $userInfo->face;?>" type="hidden">
            <div class="vspace" style="height:30px;"></div>
            <div class="usercon981con"><span>邮箱</span><input name="email" value="<?php echo $userInfo->email;?>" type="text"/></div>
            <div class="usercon981con"><span>真实姓名</span><input name="user_name" value="<?php echo $userInfo->user_name;?>" type="text"/></div>
            <div class="vspace" style="height:20px;"></div>
            <div class="usercon981con"><a href="javascript:;" onclick="form_submit()"><img src="<?php echo Yii::app()->params['cdnUrl']?>/bumengpc/webserver/css/img/userbtn01.jpg" width="260" height="40" /></a></div>
            </form>


        </div>
    </div>
</div>
<script language="JavaScript">
    var form_submit = function()
    {
        var url = $("#form1").attr("url");
        var postData = $("#form1").serialize();
        var nickName = $("input[name = 'nick_name']").val();
        var email = $("input[name = 'email']").val();
        if(nickName == ''){
            alert('请填写昵称');
            return false;
        }
        if(email == ''){
            alert('请填写邮件信息');
            return false;
        }
        if(!isEmail(email)){
            alert('请填写正确的邮件格式');
            return false;
        }
        $("#nick_name").text(nickName);
        $.post(url,postData,function(result){
            if(result.ok){
                alert('资料修改成功!');
            }
        },'json');
    }
    var isEmail = function(mail){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (filter.test(mail)) {
            return true;
        } else {
            return false;
        }
    }
</script>
