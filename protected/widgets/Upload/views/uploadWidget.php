<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="file" id="jsup" style="margin: 0; padding: 0; z-index: 999;">
</form>
<!-- js上传配置文件 -->
<script type="text/javascript">
    $(function() {
        $('#jsup').uploadify({
            //固定配置项
            'swf'				: ASSET_URL + '/uploadify.swf',    //指定上传控件的主体文件
            'uploader'			: UPLOAD_URL,  //指定服务器端上传处理文件
            'fileObjName'     	: 'file',
            'buttonImage'		: '', //上传处理文件按钮背景图片
            'buttonText'        :'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改头像',
            'width'				: 205,
            'height'			: 30,
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
            content =  '<img width="205" height="205" src="'+url+'">';
            $('#imgshow').html(content);
            $('#face').val(url);
        }
        function onUploadError(file,data){
            var data = JSON.parse(data);
            $('#imgError').html('上传失败，图片超出大小');
        }
    });
</script>
