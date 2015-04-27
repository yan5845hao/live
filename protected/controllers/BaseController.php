<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BaseController extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'commonLayout';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $baseUrl = null;
    public $imagesUrl = null;
    public $current_uri = null;
    public $session = null;
    public $cookie_domain = null;
    public $cookie_path = null;
    public $error = array();

    public function __construct($id, $module = null)
    {

        parent::__construct($id, $module);
        Yii::app()->charset = 'UTF-8';
        $this->layout = 'main';
        $this->breadcrumbs = new Breadcrumbs();
        $this->breadcrumbs->add('首页', $this->createUrl('site/index'));
        $this->imagesUrl = cdn_images_url();
        $this->baseUrl = Yii::app()->baseUrl;
        $this->session = Yii::app()->getSession();
        $this->session->open();
        $this->cookie_path = '/';
        $this->cookie_domain = Yii::app()->params['cookieDomain'];
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.js");
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/live_common.js");
    }
}