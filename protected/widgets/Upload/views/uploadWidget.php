<!-- js上传 -->
<form action="" enctype="multipart/form-data" method="post">
    js上传<br/>
    <input type="file" name="file" id="jsup">
</form>
<div id="imgshow"></div>
<!-- js上传配置文件 -->
<script type="text/javascript">
    $(function() {
        $('#jsup').uploadify({
            //固定配置项
            'swf'				: ASSET_URL + '/uploadify.swf',    //指定上传控件的主体文件
            'uploader'			: UPLOAD_URL,  //指定服务器端上传处理文件
            'fileObjName'     	: 'file',
            'buttonImage'		: ASSET_URL + '/uploadify-upload.png', //上传处理文件按钮背景图片
            'width'				: 108,
            'height'			: 28,
            //'buttonClass'		: 'class', //上传class
            //'buttonText'      	: '上传文件',
            //其他配置项
            'fileSizeLimit'		: '0',	//上传文件限制 0问无限制
            'fileTypeDesc'		: 'Image Files', //文件类型
            'fileTypeExts'		: '*.jpg',	//文件后缀
            'onUploadSuccess' 	: uploadSuccess,
            'onUploadError'		: onUploadError,
            'onFallback' 		: function() {
                alert('未检测到兼容版本的Flash.');
            }
        });
        function uploadSuccess(file,data){
            var data = JSON.parse(data);
            var url = data['url'];
             content =  '<img src="'+url+'">';
             $('#imgshow').html(content);
        }
        function onUploadError(file,data){
            var data = JSON.parse(data);
            $('#imgshow').html('上传失败，请联系管理员');
        }
    });
</script>
