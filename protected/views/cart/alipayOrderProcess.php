<?php
Yii::import('application.extensions.alipay.AlipayService');
$alipay = new AlipayService();
$payResponse = $alipay->payResponse();
$pay_status = false;
if (is_array($payResponse)) {
    $tmp_order = explode('-', $payResponse['out_trade_no']);
    $order_id = (int)$tmp_order[0];
    $tmp_params = explode('||', $payResponse['extra_common_param']);
    $source = $tmp_params[1];
    $payment_customer_id = (int)$tmp_params[0];
    $transaction_id = $tmp_params[2]; //交易号
    // 检查是否有相同交易号的成功记录
    print_vars($payResponse);
    if (($payResponse['trade_status'] == 'TRADE_FINISHED' || $payResponse['trade_status'] == 'TRADE_SUCCESS') && ($payResponse['total_fee'] * 100) > 0) {
        $pay_status = true;
    } else {
        //修改订单状态为失败

    }
}

