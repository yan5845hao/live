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
        $this->layout = 'sign_layout';
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/account.css');
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

    public function actionmydata()
    {
        $this->render('index');
    }

    public function actionmypassword()
    {
        $this->render('mypassword');
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
            echo CJSON::encode(array('ok' => true, 'message' => '保持失败，请联系管理员'));
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
        try{
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
            if($customerInfo){
                $customerInfo->content = Yii::app()->request->getParam('content');
                $customerInfo->birthday = Yii::app()->request->getParam('birthday');
                $customerInfo->address1 = Yii::app()->request->getParam('address1');
                $customerInfo->height = Yii::app()->request->getParam('height');
                $customerInfo->weight = Yii::app()->request->getParam('weight');
                $customerInfo->occupation = Yii::app()->request->getParam('occupation');
                $customerInfo->tag = Yii::app()->request->getParam('tag');
                $customerInfo->relation_star = $relation_star;
            }else{
                $customerInfo = new CustomerInfo();
                $data = array(
                    'content' => Yii::app()->request->getParam('content'),
                    'birthday' => Yii::app()->request->getParam('birthday'),
                    'address1' => Yii::app()->request->getParam('address1'),
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
        }catch(Exception $e){
            $this->redirect($this->createUrl('/myAccount'));
            $e->getMessage();
            return false;
        }
    }

    public function actionNews()
    {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/page.css');
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
        $this->render('star/news', array('dataProvider' => $dataProvider,'data' => $dataProvider->getData()));
    }
    public function actionPubNews()
    {
        $image = '';
        $id = Yii::app()->request->getParam('id');
        $starNews = StarNews::model()->findByPk($id);
        if($_POST){
            $file = $_FILES['image'];
            if($file['tmp_name']){
                $content = fopen($file['tmp_name'], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name']);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
                $size = $file['size'];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $image = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            if($starNews){
                $starNews->title = Yii::app()->request->getParam('title');
                $starNews->content = Yii::app()->request->getParam('content');
                if($image != ''){
                $starNews->image = $image;
                }
                $starNews->createtime = new CDbExpression('NOW()');
            }else{
                $starNews = new StarNews();
                $data = array(
                    'title' => Yii::app()->request->getParam('title'),
                    'content' => Yii::app()->request->getParam('content'),
                    'star_id' => Yii::app()->user->id,
                    'image' => $image,
                    'createtime' =>  new CDbExpression('NOW()'),
                );
                $starNews->setAttributes($data);
            }
            $starNews->save(false);
            $this->redirect($this->createUrl('/myAccount/news'));
        }
        $this->render('star/publishNews',array('newsInfo'=>$starNews));
    }


    public function actionSchedule()
    {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/page.css');
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
        $this->render('star/schedule', array('dataProvider' => $dataProvider,'data' => $dataProvider->getData()));
    }

     public function actionPubschedule()
    {

        $image = '';
        $id = Yii::app()->request->getParam('id');
        $starNews = StarSchedule::model()->findByPk($id);

        if($_POST){
        	
            $file = $_FILES['image'];
            if($file['tmp_name']){
                $content = fopen($file['tmp_name'], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name']);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
                $size = $file['size'];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $img = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            if($starNews){
            	$createtime = time();
                $starNews->title = Yii::app()->request->getParam('title');
                $starNews->content = Yii::app()->request->getParam('content');
                $starNews->address = Yii::app()->request->getParam('address');
                $starNews->showtime = Yii::app()->request->getParam('showtime');
                $starNews->begintime = strtotime(Yii::app()->request->getParam('begintime'));
                if($img != ''){
                	$starNews->img = $img;
                }
                $starNews->createtime = $createtime;
            }else{
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
                    'createtime' =>  $createtime,
                );
                $starNews->setAttributes($data);
            }
            $starNews->save(false);
            $this->redirect($this->createUrl('/myAccount/schedule'));
        }
        $this->render('star/pubschedule',array('newsInfo'=>$starNews));
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
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/page.css');
        $customer_id = Yii::app()->user->id;
        $criteria = new CDbCriteria();
        $criteria->addCondition("customer_id = :customer_id");
        $criteria->params[':customer_id'] = $customer_id;
        $criteria->addCondition("type = :type");
        $criteria->params[':type'] = 'video';
        $criteria->order = 'created desc';
        $dataProvider = new CActiveDataProvider('Product', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        $this->render('star/video', array('dataProvider' => $dataProvider,'data' => $dataProvider->getData()));
    }

    public function actionPubVideo()
    {
        $image = '';
        $id = Yii::app()->request->getParam('id');
        $customer_id = Yii::app()->user->id;
        $product = Product::model()->findByPk($id);
        if($_POST){
            $file = $_FILES['image'];
            if($file['tmp_name']){
                $content = fopen($file['tmp_name'], 'r');
                $extName = Yii::app()->aliyun->getExtName($file['name']);
                $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
                $size = $file['size'];
                Yii::app()->aliyun->putResourceObject($key, $content, $size);
                $image = Yii::app()->params['cdnUrl'] . '/' . $key;
            }
            if($product){
                $product->title = Yii::app()->request->getParam('title');
                $product->content = Yii::app()->request->getParam('content');
                if($image != ''){
                    $product->image = $image;
                }
                $product->url = Yii::app()->request->getParam('url');
                $product->created = new CDbExpression('NOW()');
            }else{
                $product = new Product();
                $data = array(
                    'title' => Yii::app()->request->getParam('title'),
                    'content' => Yii::app()->request->getParam('content'),
                    'star_id' => Yii::app()->user->id,
                    'image' => $image,
                    'type'=> 'video',
                    'url' => Yii::app()->request->getParam('url'),
                    'created' =>  new CDbExpression('NOW()'),
                );
                $product->setAttributes($data);
            }
            $product->customer_id = $customer_id;
            $product->save(false);
            $this->redirect($this->createUrl('/myAccount/video'));
        }
        $this->render('star/publishVideo',array('product'=>$product));
    }

    public function actionDeleteVideo()
    {
        $id = Yii::app()->request->getParam('id');
        Product::model()->findByPk($id)->delete();
        $this->redirect($this->createUrl('/myAccount/video'));
    }
    public function loadModel()
    {
        $customer_id = Yii::app()->user->id;
        $model = Customer::model()->findByPk($customer_id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}