<script language="javascript">
    function get_mobile_code() {
        $.post('/account/verifycode', {mobile: jQuery.trim($('#mobile').val()), send_code:<?php echo $_SESSION['send_code'];?>}, function (msg) {
            alert(jQuery.trim(unescape(msg)));
            if (msg == '提交成功') {
                RemainTime();
            }
        });
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
    function verify() {
        verified_password = false;
        var mobile = $('#mobile').val();
        var mobile_code = $('#mobile_code').val();
        var password = $('#password').val();
        var password_repeat = $('#password_repeat').val();
        if (mobile == '') {
            alert('手机号码不能为空');
            return false;
        } else if (mobile_code == '') {
            alert('验证码不能为空');
            return false;
        } else if (password == '') {
            alert('密码不能为空');
            return false;
        } else if (password_repeat == '') {
            alert('确认密码不能为空');
            return false;
        } else if (password_repeat != password) {
            alert('确认密码不正确');
            return false;
        } else {
            return true;
        }
        //if(password.length < 5) return ;
//        if(password.length > 12 || password.length < 5){
//            verify.html('<span class="error">请输入5-12个字符的密码。</span>');
//            return false;
//        }
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
            <td align="right">手机
            <td>
                <input id="mobile" name="mobile" type="text" size="25" class="inputBg"/><span
                    style="color:#FF0000"> *</span>
                <input id="zphone" type="button" value=" 获取手机验证码 " onClick="get_mobile_code();"></td>
        </tr>
        <tr>
            <td align="right">验证码</td>
            <td>
                <input type="text" size="8" name="mobile_code" id="mobile_code" class="inputBg"/>
                <?php if ($model->hasErrors('mobile_code')) { ?>
                    <span class="error" id="mobile_code_error"><?php echo $model->getError('mobile_code') ?></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="right">登陆密码</td>
            <td>
                <input type="password" name="password" tabindex="4" id="password" class="inputBg" autocomplete="off"
                       maxlength="12"/>
                <?php if ($model->hasErrors('password')) { ?>
                    <span class="error"><?php echo $model->getError('password') ?></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="right">确认密码</td>
            <td>
                <input type="password" name="password_repeat" tabindex="4" id="password_repeat" class="inputBg"
                       autocomplete="off" maxlength="12"/>
                <span id="verify_password_repeat">
                <?php if ($model->hasErrors('password_repeat')) { ?>
                    <span class="error"
                          id="password_repeat_error"><?php echo $model->getError('password_repeat') ?></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="right"></td>
            <td><input type="button" value=" 注册 " class="button" onclick="checkForm()"></td>
        </tr>
    </table>
</form>