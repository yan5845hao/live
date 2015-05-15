<?php

class UploadWidget extends CWidget
{
    public function run()
    {
        $assetUrl = Yii::app()->assetManager->publish(__DIR__ . DIRECTORY_SEPARATOR . '/resource');
        $uploadUrl = Yii::app()->createUrl('Resource/upload');
        $js = <<<ASSET_URL
        var ASSET_URL = '{$assetUrl}';
        var UPLOAD_URL = '{$uploadUrl}';
ASSET_URL;
        Yii::app()->clientScript->registerScript('assetUrl', $js, CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile($assetUrl . '/jquery.uploadify.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile($assetUrl . '/uploadify.css');
        $this->render("uploadWidget", array('uploadUrl' => $uploadUrl));
    }
}

?>