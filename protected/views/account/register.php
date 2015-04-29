<script language="javascript">
    function get_mobile_code() {
        $.post('/account/verifycode', {mobile: jQuery.trim($('#mobile').val()), send_code:<?php echo $_SESSION['send_code'];?>}, function (data) {
            if(data.message == '提交成功'){
                RemainTime();
                $("#verify_mobile").text();
            }else{
                $("#verify_mobile").html('<span class="error">'+data.message+'</span>');
            }
        },'json');
    }
    ;
    var iTime = 59;
    var Account;
    function RemainTime() {
        document.getElementById('zphone').disabled = true;
        var iSecond, sSecond = "", sTime = "";
        if (iTime >= 0) {
            iSecond = parseInt(iTime % 60);
            iMinute = parseInt(iTime / 60)
            if (iSecond >= 0) {
                if (iMinute > 0) {
                    sSecond = iMinute + "分" + iSecond + "秒";
                } else {
                    sSecond = iSecond + "秒";
                }
            }
            sTime = sSecond;
            if (iTime == 0) {
                clearTimeout(Account);
                sTime = '获取手机验证码';
                iTime = 59;
                document.getElementById('zphone').disabled = false;
            } else {
                Account = setTimeout("RemainTime()", 1000);
                iTime = iTime - 1;
            }
        } else {
            sTime = '没有倒计时';
        }
        document.getElementById('zphone').value = sTime;
    }
    function removeError()
    {
        $("#verify_mobile").text('');
        $("#verify_code").text('');
        $("#verify_password").text('');
        $("#verify_password_repeat").text('');
    }
    function verify() {
        var mobile = $('#mobile').val();
        var mobile_code = $('#mobile_code').val();
        var password = $('#password').val();
        var password_repeat = $('#password_repeat').val();
        removeError();
        if (mobile == '') {
            $("#verify_mobile").html('<span class="error">手机号码不能为空</span>');
            return false;
        } else if (mobile_code == '') {
            $("#verify_code").html('<span class="error">验证码不能为空</span>');
            return false;
        } else if (password == '') {
            $("#verify_password").html('<span class="error">密码不能为空</span>');
            return false;
        } else if (password_repeat == '') {
            $("#verify_password_repeat").html('<span class="error">确认密码不能为空</span>');
            return false;
        } else if (password_repeat != password) {
            $("#verify_password_repeat").html('<span class="error">确认密码不正确</span>');
            return false;
        } else {
            return true;
        }
    }
    function checkForm() {
        if (verify()) {
            $("#formUser").submit();
        }
    }
</script>
<body>
<form action="<?php echo Yii::app()->createUrl('/account/register'); ?>" method="post" name="formUser" id="formUser">
    <table width="100%" border="0" align="left" cellpadding="5" cellspacing="3">
        <tr>
            <td align="right">手机<span style="color:#FF0000"> *</span></td>
            <td>
                <input id="mobile" name="mobile" type="text" size="25" value="<?php echo $model->phone; ?>" class="inputBg"/>
                <input id="zphone" type="button" value=" 获取手机验证码 " onClick="get_mobile_code();">
                <span id="verify_mobile">
                <?php if ($model->hasErrors('mobile')) { ?>
                    <span class="error"><?php echo $model->getError('mobile') ?></span>
                <?php } ?>
                </span>
            </td>
        </tr>
        <tr>
            <td align="right">验证码<span style="color:#FF0000"> *</span></td>
            <td>
                <input type="text" size="8" name="mobile_code" id="mobile_code" class="inputBg" />
                <span id="verify_code">
                <?php if ($model->hasErrors('mobile_code')) { ?>
                    <span class="error"><?php echo $model->getError('mobile_code') ?></span>
                <?php } ?>
                </span>
            </td>
        </tr>
        <tr>
            <td align="right">登陆密码<span style="color:#FF0000"> *</span></td>
            <td>
                <input type="password" name="password" tabindex="4" id="password" class="inputBg" autocomplete="off" maxlength="12"/>
                <span id="verify_password">
                <?php if ($model->hasErrors('password')) { ?>
                    <span class="error"><?php echo $model->getError('password') ?></span>
                <?php } ?>
                </span>
            </td>
        </tr>
        <tr>
            <td align="right">确认密码<span style="color:#FF0000"> *</span></td>
            <td>
                <input type="password" name="password_repeat" tabindex="4" id="password_repeat" class="inputBg" autocomplete="off" maxlength="12"/>
                <span id="verify_password_repeat"></span>
            </td>
        </tr>
        <tr>
            <td align="right"></td>
            <td><input type="button" value=" 注册 " class="button" onclick="checkForm()"></td>
        </tr>
    </table>
</form>