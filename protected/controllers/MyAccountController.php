<?php

/**
 * Class MyAccountController
 * @author Demi 992392919@qq.com
 */
class MyAccountController extends BaseController
{
    private $model;

    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
        $this->session = Yii::app()->session;

        //管理员模拟用户登陆
        if ($customer = $this->checkAdminId()) {
            $identify = new CustomerIdentity();
            $identify->assignCustomer($customer);
            Yii::app()->user->login($identify);
        }
        if (Yii::app()->user->isGuest) Yii::app()->user->loginRequired();
        //     $this->layout = 'sign_layout';
        //  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/account.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/page.css');
    }

    public function actionIndex()
    {

        Yii::app()->session['subtime'];
        $customer_id = Yii::app()->user->id;
        $userInfo = Customer::model()->findByPk($customer_id);
        if ($userInfo->customer_type == 2) {
            $this->render('star/index', array('userInfo' => $userInfo));
        } else {
            $this->render('index', array('userInfo' => $userInfo));
        }
    }

    public function actionGold()
    {
        $this->render('gold');
    }

    public function actionModify()
    {
        $this->render('modifyAccount');
    }

    public function actionMyData()
    {
        $this->render('index');
    }

    public function actionMyPassword()
    {
        $this->render('myPassword');
    }

    public function actionEditInfo()
    {
        $customer_id = Yii::app()->request->getParam('customer_id');
        $customer = Customer::model()->findByPk($customer_id);
        $customer->email = Yii::app()->request->getParam('email');
        $customer->user_name = Yii::app()->request->getParam('user_name');
        $customer->nick_name = Yii::app()->request->getParam('nick_name');
        $customer->gender = Yii::app()->request->getParam('gender');
        $customer->face = Yii::app()->request->getParam('face');
        if ($customer->save()) {
            echo CJSON::encode(array('ok' => true));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('ok' => true, 'message' => '保存失败，请联系管理员'));
            Yii::app()->end();
        }

    }

    private function checkAdminId()
    {
        $adminId = Yii::app()->request->getParam('p');
        $arr = explode('_', $adminId);
        if ($arr[1] == Yii::app()->params['admin']) {
            $customer_id = $arr[3];
            return Customer::model()->findByPk($customer_id);
        } else {
            return false;
        }
    }

    /**
     * 以下是明星管理相关
     */
    public function actionEditStar()
    {
        $customer_id = Yii::app()->user->id;
        $file = $_FILES['faces'];
        try {
            for ($i = 0; $i < count($file['tmp_name']); $i++) {
                if (!$file['tmp_name'][$i]) continue;
                $content = fopen($file['tmp_name'][$i], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name'][$i]);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name'][$i]) . '.' . $extName;
                $size = $file['size'][$i];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $_POST['relation_star'][$i]['face'] = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            $relation_star = CJSON::encode($_POST['relation_star']);
            $customer = Customer::model()->findByPk($customer_id);
            $customerInfo = CustomerInfo::model()->findByAttributes(array('customer_id' => $customer_id));
            if ($customerInfo) {
                $customerInfo->content = Yii::app()->request->getParam('content');
                $customerInfo->birthday = Yii::app()->request->getParam('birthday');
                $customerInfo->city = Yii::app()->request->getParam('city');
                $customerInfo->height = Yii::app()->request->getParam('height');
                $customerInfo->weight = Yii::app()->request->getParam('weight');
                $customerInfo->occupation = Yii::app()->request->getParam('occupation');
                $customerInfo->tag = Yii::app()->request->getParam('tag');
                $customerInfo->relation_star = $relation_star;
            } else {
                $customerInfo = new CustomerInfo();
                $data = array(
                    'content' => Yii::app()->request->getParam('content'),
                    'birthday' => Yii::app()->request->getParam('birthday'),
                    'city' => Yii::app()->request->getParam('city'),
                    'height' => Yii::app()->request->getParam('height'),
                    'weight' => Yii::app()->request->getParam('weight'),
                    'occupation' => Yii::app()->request->getParam('occupation'),
                    'tag' => Yii::app()->request->getParam('tag'),
                    'relation_star' => $relation_star,
                    'customer_id' => $customer_id
                );
                $customerInfo->setAttributes($data);
            }
            $customer->face = Yii::app()->request->getParam('face');
            $customer->save();
            $customerInfo->save();
            $this->redirect($this->createUrl('/myAccount'));
        } catch (Exception $e) {
            $this->redirect($this->createUrl('/myAccount'));
            $e->getMessage();
            return false;
        }
    }

    public function actionNews()
    {
        $star_id = Yii::app()->user->id;
        $criteria = new CDbCriteria();
        $criteria->addCondition("star_id = :star_id");
        $criteria->params[':star_id'] = $star_id;
        $criteria->order = 'createtime desc';
        $dataProvider = new CActiveDataProvider('StarNews', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        $this->render('star/news', array('dataProvider' => $dataProvider, 'data' => $dataProvider->getData()));
    }

    public function actionPubNews()
    {

        $stra_id = Yii::app()->user->id;
        $userdata = Customer::model()->findByPk($stra_id);
        $star_name = $userdata[user_name];

        $image = '';
        $id = Yii::app()->request->getParam('id');
        $starNews = StarNews::model()->findByPk($id);
        if ($_POST) {
            $createtime = time();

            $file = $_FILES['image'];
            if ($file['tmp_name']) {
                $content = fopen($file['tmp_name'], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name']);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
                $size = $file['size'];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $image = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            if ($starNews) {
                $starNews->title = Yii::app()->request->getParam('title');
                $starNews->content = Yii::app()->request->getParam('content');
                $starNews->introduce = Yii::app()->request->getParam('introduce');
                if ($image != '') {
                    $starNews->image = $image;
                }
                $starNews->createtime = $createtime;
            } else {
                $starNews = new StarNews();
                $data = array(
                    'title' => Yii::app()->request->getParam('title'),
                    'content' => Yii::app()->request->getParam('content'),
                    'star_id' => Yii::app()->user->id,
                    'introduce' => Yii::app()->request->getParam('introduce'),
                    'image' => $image,
                    'star_name' => $star_name,
                    'createtime' => $createtime,
                );
                $starNews->setAttributes($data);
            }
            $starNews->save(false);
            $this->redirect($this->createUrl('/myAccount/news'));
        }
        $this->render('star/publishNews', array('newsInfo' => $starNews));
    }


    public function actionSchedule()
    {
        $starid = Yii::app()->user->id;
        $criteria = new CDbCriteria();
        $criteria->addCondition("starid = :starid");
        $criteria->params[':starid'] = $starid;
        $criteria->order = 'createtime desc';
        $dataProvider = new CActiveDataProvider('StarSchedule', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 4,
            ),
        ));
        $this->render('star/schedule', array('dataProvider' => $dataProvider, 'data' => $dataProvider->getData()));
    }

    public function actionPubSchedule()
    {

        $image = '';
        $id = Yii::app()->request->getParam('id');
        $starNews = StarSchedule::model()->findByPk($id);

        if ($_POST) {

            $file = $_FILES['image'];
            if ($file['tmp_name']) {
                $content = fopen($file['tmp_name'], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name']);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
                $size = $file['size'];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $img = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            if ($starNews) {
                $createtime = time();
                $starNews->title = Yii::app()->request->getParam('title');
                $starNews->content = Yii::app()->request->getParam('content');
                $starNews->address = Yii::app()->request->getParam('address');
                $starNews->showtime = Yii::app()->request->getParam('showtime');
                $starNews->begintime = strtotime(Yii::app()->request->getParam('begintime'));
                if ($img != '') {
                    $starNews->img = $img;
                }
                $starNews->createtime = $createtime;
            } else {
                $starNews = new StarSchedule();
                $createtime = time();
                $data = array(
                    'title' => Yii::app()->request->getParam('title'),
                    'content' => Yii::app()->request->getParam('content'),
                    'address' => Yii::app()->request->getParam('address'),
                    'begintime' => Yii::app()->request->getParam('begintime'),
                    'showtime' => Yii::app()->request->getParam('showtime'),
                    'starid' => Yii::app()->user->id,
                    'starname' => Yii::app()->user->name,
                    'img' => $img,
                    'createtime' => $createtime,
                );
                $starNews->setAttributes($data);
            }
            $starNews->save(false);
            $this->redirect($this->createUrl('/myAccount/schedule'));
        }
        $this->render('star/pubschedule', array('newsInfo' => $starNews));
    }

    public function actionDeleteNews()
    {
        $id = Yii::app()->request->getParam('id');
        StarNews::model()->findByPk($id)->delete();
        $this->redirect($this->createUrl('/myAccount/news'));
    }

    public function actionStore()
    {
        $this->render('star/store');
    }

    public function actionEvaluation()
    {
        $this->render('star/evaluation');
    }

    public function actionVideo()
    {
        $customer_id = Yii::app()->user->id;
        $criteria = new CDbCriteria();
        $criteria->join = ' ,product_type pt';
        $criteria->addCondition("t.product_type_id = pt.product_type_id AND pt.parent_product_type_id = 2 AND t.customer_id = :customer_id");
        $criteria->order = 'created desc';
        $criteria->params[':customer_id'] = $customer_id;
        $dataProvider = new CActiveDataProvider('Product', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        $this->render('star/video', array('dataProvider' => $dataProvider, 'data' => $dataProvider->getData()));
    }


    public function actionPubVideo()
    {
        $image = '';
        $id = Yii::app()->request->getParam('id');
        $customer_id = Yii::app()->user->id;
        $product = Product::model()->findByPk($id);
        if ($_POST) {
            $file = $_FILES['image'];
            if ($file['tmp_name']) {
                $content = fopen($file['tmp_name'], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name']);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
                $size = $file['size'];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $image = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            if ($product) {

                $product->title = Yii::app()->request->getParam('title');
                $product->content = Yii::app()->request->getParam('content');
                $product->video_type = Yii::app()->request->getParam('video_type');
                $product->video_types = Yii::app()->request->getParam('video_types');
                if ($image != '') {
                    $product->image = $image;
                }
                $product->url = Yii::app()->request->getParam('url');
                $product->created = new CDbExpression('NOW()');
            } else {

                $product = new Product();
                $data = array(
                    'title' => Yii::app()->request->getParam('title'),
                    'content' => Yii::app()->request->getParam('content'),
                    'star_id' => Yii::app()->user->id,
                    'video_type' => Yii::app()->request->getParam('video_type'),
                    'video_types' => Yii::app()->request->getParam('video_types'),
                    'image' => $image,
                    'type' => 'video',
                    'url' => Yii::app()->request->getParam('url'),
                    'created' => new CDbExpression('NOW()'),
                );
                $product->setAttributes($data);
            }
            $product->customer_id = $customer_id;
            $product->save(false);
            $this->redirect($this->createUrl('/myAccount/video'));
        }
        $this->render('star/publishVideo', array('product' => $product));
    }

    public function actionDeleteVideo()
    {
        $id = Yii::app()->request->getParam('id');
        Product::model()->findByPk($id)->delete();
        $this->redirect($this->createUrl('/myAccount/video'));
    }

    public function actionMyOrders()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("customer_id = :customer_id");
        $criteria->params[':customer_id'] = Yii::app()->user->id;
        $criteria->order = 'status desc';
        $dataProvider = new CActiveDataProvider('Order', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
        $this->render('myOrders', array('dataProvider' => $dataProvider));
    }

    public function actionRechargeGold()
    {
        $this->layout = 'blank_layout';
        $this->render('recharge');
    }

    public function actionUpgradeVip()
    {
        if ($_POST) {
            $payment_info = '开通会员';
            $total = (int)Yii::app()->request->getParam('total');
            $method = (int)Yii::app()->request->getParam('method');
            $product_id = 30; //测试产品
//            $product_id = (int)Yii::app()->request->getParam('product_id');
            $product = Product::model()->findByPk($product_id);
            if ($product->product_type_id != Product::RECHARGE_VIP_TYPE_ID) {
//                $this->addFlash('认证失效！', self::MSG_NOTICE);
                $this->redirect($this->createUrl('myAccount/upgradeVip'));
            }
            if ($method == 1) { // 1：rmb支付，2：余额支付
                $cost = $total * $product->default_price;
            } elseif ($method == 2) {
//                $this->addFlash('账户金币不足，请选择其他支付方式！', self::MSG_NOTICE);
                $exchange_rate = Currency::model()->exchangeRate;
                $cost = ($total * $product->default_price) * $exchange_rate;
            }
            $order_data['product_id'] = $product_id;
            $order_data['payment_method'] = $method;
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
                    header( 'Content-Type:text/html;charset=utf-8 ');
                    echo "<script>alert('账户余额不足!');location.href='/pay/vip.shtml';</script>";
                }
            }
        } else {
            $this->layout = 'blank_layout';
            $this->render('vip');
        }
    }

    public function actionMyFavorites()
    {
        $criteria = new CDbCriteria();
        $criteria->join = ' , product AS p';
        $criteria->condition = " t.customer_id = :customer_id AND t.product_id=p.product_id AND p.active='1'";
        $criteria->params = array(":customer_id" => Yii::app()->user->id);
        $criteria->order = " t.created DESC";
        $count = CustomerFavorite::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 1;
        $pages->applyLimit($criteria);
        $result = CustomerFavorite::model()->findAll($criteria);
        $this->render('myFavorites', array(
            'count' => $count,
            'favorites' => $result,
            'pages' => $pages,
        ));
    }

    public function actionSaveFavorite()
    {
        $product_id = (int)Yii::app()->request->getParam('product_id');
        $customer_id = (int)$this->userID;
        $fav = CustomerFavorite::model()->findByAttributes(
            array('product_id' => $product_id, 'customer_id' => $customer_id)
        );
        if ($fav) {
            $fav->last_updated = date('Y-m-d H:i:s');
        } else {
            $fav = new CustomerFavorite;
            $fav->customer_id = $customer_id;
            $fav->product_id = $product_id;
            $fav->created = $fav->last_updated = date('Y-m-d H:i:s');
        }
        $fav->save();
        return true;
    }

    public function actionAddress()
    {
        $customer_id = Yii::app()->user->id;
        $customerInfo = CustomerInfo::model()->findByAttributes(array('customer_id' => $customer_id));
        if ($_POST) {
            $address = CJSON::encode($_POST['address']);
        }
        $this->render('address',array('customerInfo'=>$customerInfo));
    }

    public function actionDelFavorite()
    {
        $customer_favorite_id = (int)Yii::app()->request->getParam('customer_favorite_id');
        CustomerFavorite::model()->deleteByPk($customer_favorite_id, 'customer_id=:customer_id', array('customer_id' => Yii::app()->user->id));
        $this->redirect($this->createUrl('/myAccount/myFavorites'));
    }

    public function actionPubProject()
    {
        $this->render('star/pubProject');
    }

    public function actionProjects()
    {
        $this->render('star/myProjects');
    }

    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions' => array('EditStar', 'PubNews', 'News', 'DeleteVideo', 'PubVideo', 'Video', 'PubSchedule', 'Schedule'),
                'expression' => 'Yii::app()->user->type == 1?1:0',
                'message' => 'Access Denied.'
            ),
        );
    }
}