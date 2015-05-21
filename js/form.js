	function loginTrigger(){
        $("#loginyh").click();
        $("#closeReg").click();
    }

    function regTrigger(){
        $("#regyh").click();
        $("#closeBtn").click();
    }
    function keydownEvent() {
        var e = window.event || arguments.callee.caller.arguments[0];
        if (e && e.keyCode == 13 ) {
            search();
        }
    }
    function search()
    {
        var keyword = $("#topSearch").val();
        var tag = "#search";
        if (keyword == '') {
            tag = '';
        }
        window.location.href = '/bigShots?keyword=' + keyword + tag;
    }

//    $("#regyh").trigger("click");
	function check_phone() {
			  var phone = $.trim($('#dphone').val());
			  if (phone == '') {
				$('#derroe').text('用户是必填项');
				return false;
				 } else if (!/(?:13\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/.test(phone)) {
				$('#derroe').text('手机格式不正确!')
				return false;
			  };
			  $('#derroe').text('');
			  return true;
			}

			function check_password(){
				var password = $.trim($('#dpassword').val());
				if (password == '') {
					$('#derroe').text('密码不能为空');
					return false;
				 } else if (password.length<6) {
					$('#derroe').text('密码小于6位!')
					return false;
			  }
			  $('#derroe').text('');
			  return true;

			}
		
			
			$("#dphone").change(function(){
				check_phone();
			});
			$("#dpassword").change(function(){
				check_password();
			});
			$("#dpost").click(function(){
				if(check_password() == true && check_phone() == true ){
					 $.post('/api/login/',$("#custom_option").serialize(),function(result){
						if(result==1){
							location.reload();
						}else{
							$('#derroe').text('账号或密码错误!')
						}		
					  });
				}
			});
	
		



	 function get_mobile_code() {
        $.post('/account/verifycode', {mobile: jQuery.trim($('#rphone').val()), send_code:276857}, function (data) {
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

		function check_phones() {
			
			  var phone = $.trim($('#rphone').val());
			  if (phone == '') {
				$('#rerror').text('用户是必填项');
				return false;
				 } else if (!/(?:13\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/.test(phone)) {
				$('#rerror').text('手机格式不正确!')
				return false;
			  };
			  $('#rerror').text('');
			  return true;
			}
			function check_passwords(){
				var password = $.trim($('#rpassword').val());
				var rpassword_repeat = $.trim($('#rpassword_repeat').val());
				if (password == '') {
					$('#rerror').text('密码不能为空');
					return false;
				 } else if(password.length<6) {
					$('#rerror').text('密码不能小于6位!')
					return false;
				  }else if(password != rpassword_repeat){
					 $('#rerror').text('密码不一致!')
					 return false;

				  }
			  $('#rerror').text('');
			  return true;
			}
			function check_code(){
				var code = $.trim($('#mobile_code').val());
				if(code.length<2){
					 $('#rerror').text('验证码错误!')
					 return false;
				}
				 $('#rerror').text('');
				return true;

			}
			$("#rphone").change(function(){
				check_phones();
			});
			$("#rpassword").change(function(){
				check_passwords();
			});
			$("#rpassword_repeat").change(function(){
				check_passwords();
			});
			$("#mobile_code").change(function(){
				check_code();
			});

			$("#rpost").click(function(){
				
				if(check_phones()==true && check_passwords()==true && check_code()==true ){
					
					$.post('/api/register/',$("#rcustom_option").serialize(),function(result){
			
							if(result==1){
								location.reload();
							}else if(result==2){
								$('#derroe').text('该手机号已经是本站会员');
							}else if(result==3){
								$('#derroe').text('验证码错误');	
								}
					  });
				}
			});

			//结束