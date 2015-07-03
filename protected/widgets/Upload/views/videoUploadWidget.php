<style>
    .uploadify-queue-item {
        background-color: #F5F5F5;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        font: 11px Verdana, Geneva, sans-serif;
        max-width: 500px;
    }
</style>
<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="file" id="jsup">
</form>
<!-- js上传配置文件 -->
<script type="text/javascript">
    $(function() {
        $('#jsup').uploadify({
            //固定配置项
            'swf'				: ASSET_URL + '/uploadify.swf',    //指定上传控件的主体文件
            'uploader'			: UPLOAD_URL,  //指定服务器端上传处理文件
            'fileObjName'     	: 'file',
            'buttonImage'		: ASSET_URL + '/uploadify-upload.png', //上传处理文件按钮背景图片
            'buttonText'        :'选择视频',
            'width'				: 108,
            'height'			: 28,
            progressData        :'all',
            //'buttonClass'		: 'class', //上传class
            //'buttonText'      	: '上传文件',
            //其他配置项
            queueSizeLimit      : 1,
            'fileSizeLimit'		: 512*1024,	//上传文件限制 0问无限制
            'fileTypeDesc'		: 'video Files', //文件类型
            'fileTypeExts'		: '*.mp4;*.xv',	//文件后缀
            'onUploadSuccess' 	: uploadSuccess,
            'onUploadError'		: onUploadError,
            'onFallback' 		: function() {
                alert('未检测到兼容版本的Flash.');
            }
        });
        function uploadSuccess(file,data){
            var data = JSON.parse(data);
            $('#videoUrl').val(data['url']);
        }
        function onUploadError(file,errorCode,errorMsg,errorString){
            alert('上传失败，错误代码:' + errorCode + ',请联系管理员!');
        }
    });
</script>
