<?php
/**
 * Alipay payment
 */
class AlipayService
{
    const TRANSACTION_TIME_OUT = '30m';
    private $gateWayUrl;
    private $gateWayPid;
    private $gateWayName;
    private $gateWayKey;
    private $notify_url;
    private $return_url;
    private $gateWaySignType;
    private $https_verify_url = 'https://mapi.alipay.com/gateway.do?service=notify_verify&';
    private $http_verify_url = 'http://notify.alipay.com/trade/notify_query.do?';

    public function __construct()
    {
        $this->gateWayUrl = 'https://mapi.alipay.com/gateway.do';
        $this->gateWayName = 'fengjiayuan2013@163.com';
        $this->gateWayPid = '2088011640655767';
        $this->gateWayKey = 'q77ed7spluyc2n5czox5s0hd13msh3n1';
        $this->gateWaySignType = 'MD5';
        $this->notify_url = Yii::app()->createUrl('cart/AliPayNotify');
        $this->return_url = Yii::app()->createUrl('cart/AliPayReturn');


    }

    public function createPayForm($trans_order_id, $order_desc, $product_desc, $total_fee, $transaction_id, $customer_id, $source, $is_travel = false, $travel_id = null)
    {
        $out_trade_no = $trans_order_id;
        if ($is_travel) {
            $out_trade_no = $travel_id;
        }
        $tmp_order = explode('-', $out_trade_no);
        $order_id = (int)$tmp_order[0];
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $this->gateWayPid,
            "payment_type" => '1',
            "notify_url" => $this->notify_url,
            "return_url" => $this->return_url,
            "seller_email" => $this->gateWayName,
            "out_trade_no" => $out_trade_no,
            "subject" => $order_desc,
            "total_fee" => $total_fee,
            "body" => $product_desc,
            "show_url" => Yii::app()->createUrl('myAccount/myOrders', array('order_id' => $order_id)),
            "anti_phishing_key" => time(),
            "exter_invoke_ip" => $_SERVER['REMOTE_ADDR'],
            //"it_b_pay" => self::TRANSACTION_TIME_OUT,
            "_input_charset" => 'utf-8',
            "extra_common_param" => $customer_id . '||' . $source . '||' . $transaction_id
        );
        $params = $this->buildRequestData($parameter);
        $html = '<form action="'.$this->gateWayUrl.'" id="pay_form" name="pay_form" method="get">';
        foreach ($params AS $key=>$val){
            $html  .= "<input type='hidden' name='".$key."' value='".$val."' />";
        }
        $html .= '</form>';

        return $html;
    }

    public function payResponse()
    {
        if (!count($_REQUEST)) {
            return false;
        }
        $signParam = $this->getSignParam($_REQUEST);
        $arg  = "";
        while (list($key, $val) = each($signParam)) {
            $arg.=$key."=".$val."&";
        }
        $arg = substr($arg,0,count($arg)-2);
        if (get_magic_quotes_gpc()) {
            $arg = stripslashes($arg);
        }
        if ($this->verifySign($arg, $_REQUEST['sign'], $this->gateWayKey)) {
            // 检查是否是支付宝发起的请求
            if ($this->isSSL()) {
                $veryfy_url = $this->https_verify_url;
            } else {
                $veryfy_url = $this->http_verify_url;
            }
            $veryfy_url = $veryfy_url."partner=" . $this->gateWayPid . "&notify_id=" . $signParam['notify_id'];
            $responseTxt = $this->getHttpResponseGET($veryfy_url);
            if (preg_match("/true$/i",$responseTxt)) {
                return $signParam;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function buildRequestData($params)
    {
        $para_filter = $this->getSignParam($params);
        $arg  = "";
        while (list ($key, $val) = each($para_filter)) {
            $arg.=$key."=".$val."&";
        }

        //去掉最后一个&字符
        $arg = substr($arg,0,count($arg)-2);

        //如果存在转义字符，那么去掉转义
        if (get_magic_quotes_gpc()) {
            $arg = stripslashes($arg);
        }
        $sign = '';
        if (strtoupper($this->gateWaySignType) == 'MD5') {
            $sign = md5($arg . $this->gateWayKey);
        }

        $para_filter['sign'] = $sign;
        $para_filter['sign_type'] = $this->gateWaySignType;
        return $para_filter;
    }


    public function getSignParam($params)
    {
        $para_filter = array();
        if (count($params)) {
            while (list ($key, $val) = each($params)) {
                if($key == "sign" || $key == "sign_type" || $val == "")
                    continue;
                else
                    $para_filter[$key] = $params[$key];
            }
            ksort($para_filter);
            reset($para_filter);
        }
        return $para_filter;
    }

    public function verifySign($prestr, $sign, $key)
    {
        $prestr = $prestr . $key;
        $mysgin = md5($prestr);

        if ($mysgin == $sign) {
            return true;
        } else {
            return false;
        }
    }

    public function getHttpResponseGET($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0); // 过滤HTTP头
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
        //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
        //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
        //curl_setopt($curl, CURLOPT_CAINFO, getcwd().'\\cacert.pem');//证书地址
        $responseText = curl_exec($curl);
        //var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
        curl_close($curl);

        return $responseText;
    }

    /*
    * 检测链接是否是SSL连接
    * @return bool
    */
    public function isSSL()
    {
        if (!isset($_SERVER['HTTPS'])) {
            return false;
        }
        if ($_SERVER['HTTPS'] === 1) {  //Apache
            return true;
        } elseif ($_SERVER['HTTPS'] === 'on') { //IIS
            return true;
        } elseif ($_SERVER['SERVER_PORT'] == 443) { //其他
            return true;
        }
        return false;
    }

    /**
     * update order status
     */
    public function updateOrderStatus($order_id, $order_status, $order_status_comment, $customer_notified = '0')
    {
        if (empty($order_id) || empty($order_status)) return false;
        //Orders
        Yii::app()->db->createCommand( "update `order` set status = '".(int)$order_status."', last_updated = ".new CDbExpression('NOW()')." where order_id = '".(int)$order_id."'" )->execute();
        //Orders Status History
        $sql_data_array = array(
            'order_id' => (int)$order_id,
            'order_status_id' => (int)$order_status,
            'updated_by' => Yii::t('main',CUSTOMER_SERVICE_SYSTEM_ACCOUNT_ID),
            'customer_notified' => $customer_notified,
            'comments' => $order_status_comment,
            'created' => new CDbExpression('NOW()'),
        );

        $model_status_history = new OrderStatusHistory;
        $model_status_history->attributes = $sql_data_array;
        $model_status_history->insert();
    }

   // follow add by leo for refund
    public function getRefundFormData($batch_no,$detail_data)
    {
        $parameter = array(
            "service" => "refund_fastpay_by_platform_pwd",
            "partner" => $this->gateWayPid,
            "notify_url"	=> 'http://cn.toursforfun.com/cart/alipayRefundResult',
            "seller_email"	=> $this->gateWayName,
            "refund_date"	=> date('Y-m-d H:i:s'),
            "batch_no"	=> $batch_no,
            "batch_num"	=> 1,
            "detail_data"	=> $detail_data,
            "_input_charset"	=> trim(strtolower('utf-8'))
        );
        return $parameter;
    }

    public function createRefundFormHtml($para_temp, $method, $button_name)
    {
        //待请求参数数组
        $para = $this->buildRequestData($para_temp);
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='" . $this->gateWayUrl . "' method='" . $method . "'>";
        foreach ($para as $key => $val) {
            $sHtml .= "<input type='hidden' name='" . $key . "' value='" . $val . "'/>";
        }
        //submit按钮控件请不要含有name属性
        $sHtml = $sHtml . "<input type='submit' value='" . $button_name . "'></form>";
        $sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

        return $sHtml;
    }
    public function verifyRefundNotify()
    {
        if (empty($_POST)) {
            return false;
        }
        $signParam = $this->getSignParam($_POST);
        $arg = "";
        while (list($key, $val) = each($signParam)) {
            $arg .= $key . "=" . $val . "&";
        }
        $arg = substr($arg, 0, count($arg) - 2);
        if (get_magic_quotes_gpc()) {
            $arg = stripslashes($arg);
        }
        if ($this->verifySign($arg, $_POST['sign'], $this->gateWayKey)) {
            return $signParam;
            // 检查是否是支付宝发起的请求
           /* if ($this->isSSL()) {
                $veryfy_url = $this->https_verify_url;
            } else {
                $veryfy_url = $this->http_verify_url;
            }
            $veryfy_url = $veryfy_url . "partner=" . $this->gateWayPid . "&notify_id=" . $signParam['notify_id'];
            $responseTxt = $this->getHttpResponseGET($veryfy_url);
            if (preg_match("/true$/i", $responseTxt)) {
                return $signParam;
            }
            return false;*/
        }
        return false;
    }
}