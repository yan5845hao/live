<?php
/**
*阿里云操作类
*/
require_once dirname(__FILE__) . '/Aliyun/aliyun.php';
use \Aliyun\OSS\OSSClient;

class Aliyun
{
    public $keyId;
    public $keySecret;
    public $bucket;
    public $savePath;
    private $client;

    public function init()
    {
        if (!$this->client) {
            $this->client = $this->createClient();
        }
    }

    public function createClient()
    {
        return OSSClient::factory(array(
            'AccessKeyId' => $this->keyId,
            'AccessKeySecret' => $this->keySecret,
        ));
    }

    function listObjects()
    {
        $result = $this->client->listObjects(array(
            'Bucket' => $this->bucket,
        ));
        foreach ($result->getObjectSummarys() as $summary) {
            echo 'Object key: ' . $summary->getKey() . "\n";
        }
    }

    function putStringObject($key, $content)
    {
        $result = $this->client->putObject(array(
            'Bucket' => $this->bucket,
            'Key' => $key,
            'Content' => $content,
        ));
        return 'Put object etag: ' . $result->getETag();
    }

    function putResourceObject($key, $content, $size)
    {
        $result =  $this->client->putObject(array(
            'Bucket' =>  $this->bucket,
            'Key' => $key,
            'Content' => $content,
            'ContentLength' => $size,
        ));
        return 'Put object etag: ' . $result->getETag();
    }

    function getObject($key) {
        $object =  $this->client->getObject(array(
            'Bucket' =>  $this->bucket,
            'Key' => $key,
        ));
        return "Key: " . $object->getKey() . "\n";
//        echo "Update Date: " . $object->getLastModified()->getTimestamp() . "\n";
//        echo "Content: \n";
//        echo stream_get_contents($object->getObjectContent()); // Print object's content.
    }

    function deleteObject($key) {
        $this->client->deleteObject(array(
            'Bucket' => $this->bucket,
            'Key' => $key,
        ));
    }

    function getNewName($filename)
    {
        $extName = "." . $this->getExtName($filename);
        $newName = md5($filename) . $extName;
        return $newName;
    }

    //取得文件扩展名
    function getExtName($filename)
    {
        $fileParts = pathinfo($filename);
        return strtolower($fileParts['extension']);
    }
}