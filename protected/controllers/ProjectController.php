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
        $product_id = (int)Yii::app()->request->getParam('product_id');
        $product = Product::model()->findByPk($product_id);
        if ($product === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('detail', array('product' => $product));
    }
}