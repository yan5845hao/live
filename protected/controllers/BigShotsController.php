<?php

/**
 * Class BigShotsController
 * 大咖秀
 */
class BigShotsController extends BaseController
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