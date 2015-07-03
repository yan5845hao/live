<?php

/**
 * @title 文件上传
 * @author Demi.mo
 */
class ResourceController extends BaseController
{
    /**
     * 处理上传的控制器接口
     */
    public function actionUpload()
    {
        $file = $_FILES['file'];
        $content = fopen($file['tmp_name'], 'r');
        $extName = Yii::app()->aliyun->getExtName($file['name']);
        $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
        $size = $file['size'];
        $save = Yii::app()->aliyun->putResourceObject($key, $content, $size);
        if ($save) {
            echo json_encode(array('url' => Yii::app()->params['cdnUrl'] . '/' . $key));
        } else {
            return false;
        }
    }

    public function actionUploadFile()
    {
        $file = $_FILES['file'];
        $content = fopen($file['tmp_name'], 'r');
        $extName = Yii::app()->aliyun->getExtName($file['name']);
        $key = Yii::app()->aliyun->savePath . '/' . md5_file($file['tmp_name']) . '.' . $extName;
        $size = $file['size'];
        $save = Yii::app()->aliyun->putResourceObject($key, $content, $size);
        if ($save) {
            echo json_encode(array('url' => Yii::app()->params['cdnFileUrl'] . '/' . $key));
        } else {
            return false;
        }
    }

}