<?php

class UploadWidget extends CWidget
{
    public $type = null;

    public function run()
    {
        $assetUrl = Yii::app()->assetManager->publish(__DIR__ . DIRECTORY_SEPARATOR . '/resource');
        $uploadUrl = Yii::app()->createUrl('Resource/uploadFile');
        $maxFileSize = ini_get('upload_max_filesize');
        $js = <<<ASSET_URL
        var ASSET_URL = '{$assetUrl}';
        var UPLOAD_URL = '{$uploadUrl}';
        var MAX_FILE_SIZE = '{$maxFileSize}';
ASSET_URL;
        Yii::app()->clientScript->registerScript('assetUrl', $js, CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile($assetUrl . '/jquery.uploadify.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile($assetUrl . '/uploadify.css');
        if ($this->type == 'video') {
            $tmp = 'videoUploadWidget';
        } else {
            $tmp = 'uploadWidget';
        }
        $this->render($tmp, array('uploadUrl' => $uploadUrl));
    }
}

?>