<?php

class ProjectController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
    }

    public function actionIndex()
    {
        $type_id = (int)Yii::app()->request->getParam('id');
        $criteria = new CDbCriteria();
        $criteria->order = 'created desc';
        if ($type_id > 0) {
            $criteria->addCondition("product_type_id = $type_id");
        } else {
            $criteria->join = ' ,product_type pt';
            $criteria->addCondition("t.product_type_id = pt.product_type_id AND pt.parent_product_type_id = 102");
        }
        $dataProvider = new CActiveDataProvider('Product', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 40,
                'pageVar' => 'page'
            ),
        ));
        if (Yii::app()->request->isAjaxRequest) {
            $this->layout = 'blank_layout';
            Yii::app()->clientScript->reset();
            $this->render('list_ajax', array('dataProvider' => $dataProvider, 'currentPage' => ($dataProvider->pagination->currentPage + 1)));
        } else {
            $this->render('index', array('dataProvider' => $dataProvider));
        }
    }

    public function actionDetail()
    {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/page.css');
        $product_id = (int)Yii::app()->request->getParam('product_id');
        $product = Product::model()->findByPk($product_id);
        if ($product === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->setPageTitle($product->title);
        $projectDescription = ProductProjectDescription::model()->findAllByAttributes(array('product_id' => $product_id));
        $criteria = new CDbCriteria();
        $criteria->addCondition("product_id = $product_id");
        $dataProvider = new CActiveDataProvider('Order', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
                'pageVar' => 'page'
            ),
        ));
        $this->render('detail', array('product' => $product, 'dataProvider' => $dataProvider, 'projectDescription' => $projectDescription));
    }

    public function actionPayment()
    {
        if (Yii::app()->user->isGuest) Yii::app()->user->loginRequired();
        if ($_POST) {
            $payment_info = '众筹';
            $total = (int)Yii::app()->request->getParam('total');
            $method = 1;
            $product_id = (int)Yii::app()->request->getParam('product_id'); //测试产品
//            if ($product->product_type_id != Product::PRODUCT_PROJECT_TYPE_ID) {
////                $this->addFlash('认证失效！', self::MSG_NOTICE);
//                $this->redirect($this->createUrl('myAccount/upgradeVip'));
//            }
            if ($method == 1) { // 1：rmb支付，2：余额支付
                $cost = $total;
            } elseif ($method == 2) {
//                $this->addFlash('账户金币不足，请选择其他支付方式！', self::MSG_NOTICE);
                $exchange_rate = Currency::model()->exchangeRate;
                $cost = $total * $exchange_rate;
            }
            $order_data['product_id'] = $product_id;
            $order_data['payment_method'] = $method;
            $order_data['product_project_description_id'] = Yii::app()->request->getParam('product_project_description_id');
            $order_data['cost'] = $cost;
            $order_data['payment_info'] = $payment_info;
            if ($order_id = Order::model()->addOrder($order_data)) {
                if ($method == 1) {
                    //支付宝支付
                    Yii::import('application.extensions.alipay.AlipayApi');
                    $params['order_id'] = $order_id;
                    $params['subject'] = $payment_info;
                    $params['total_fee'] = $cost;
                    $params['description'] = $payment_info;
                    $params['show_url'] = Yii::app()->createUrl('myAccount/myOrders', array('order_id' => $order_id));
                    $alipay = new AlipayApi();
                    $alipay->createPayForm($params);
                } elseif ($method == 2) {
                    //用户金币支付
                    //update customer_shopping_gb - cost
                }
            }
        } else {
            $id = (int)Yii::app()->request->getParam('id');
            $customer = Customer::model()->findByPk(Yii::app()->user->id);
            $project_description = ProductProjectDescription::model()->findByPk($id);
            if (!$project_description) {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            $product = Product::model()->findByPk($project_description->product_id);
            $this->layout = 'blank_layout';
            $this->render('payment', array('description' => $project_description, 'product'=>$product, 'customer'=>$customer));
        }
    }
}