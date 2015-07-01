<?php

/**
 * Class CompanyController
 * @author Demi 992392919@qq.com
 */
class CompanyController extends BaseController
{
    public function __construct($id, $module = null)
    {
        parent::__construct($id, $module);
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionDetail()
    {
        $this->render('detail');
    }
}