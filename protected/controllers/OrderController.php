<?php

/**
 * Class OrderController
 * @author Demi 992392919@qq.com
 */
class OrderController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->layout = 'blank_layout';
    }

    public function actionIndex()
    {
        $currency = new Currency();
        echo floor($currency->exchangeRate*10);
    }

    public function actionPayment()
    {
        echo 'order payment.';
    }
}