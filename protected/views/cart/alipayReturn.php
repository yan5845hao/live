<?php
include('alipayOrderProcess.php');
if ($pay_status) {
    $this->redirect($this->createUrl('cart/checkoutSuccess', array('order_id'=>$order_id, 'source'=>$source)));
} else {
    $this->redirect($this->createUrl('site/index'));
}