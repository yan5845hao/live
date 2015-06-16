<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>开通会员</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div>
    开通会员:
    支付的账号：<?php echo Yii::app()->user->name;?>
    <form name=alipayment action="/pay/vip.shtml" method=post target="_blank">
        <input type="radio" checked value="1" name="total">一个月 （100金币/￥10元）
        <input type="radio" value="3" name="total">三个月 （300金币/￥30元）
        支付方式:
        <input type="radio" value="1" checked name="method">支付宝
        <input type="radio" value="2" name="method">余额支付
        <br>
        注：1人民币 = 10金币
        <button type="submit">确 认</button>
    </form>
</div>
</body>
</html>