<?php

class CartController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
    }

    public function actionOrderVerify()
    {
        $product_id = Yii::app()->request->getParam('product_id');
        $product = Product::model()->findAllByPk($product_id);
        if (!$product) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('orderVerify', array('product' => $product));
    }

    public function actionCheckoutPayment()
    {
        $this->render('checkoutPayment');
    }
}
