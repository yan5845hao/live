<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.datepicker.min.js',CClientScript::POS_END);?>
<script>
    $(document).ready(function() {
        $('#picker_1').datePicker({followOffset : [0, 24]});
        $('#picker_2').datePicker({followOffset : [0, 24]});
    });
</script>
<style type="text/css">
    .picker_year, .picker_month, .picker_day{
        margin: 12px 00;
    }
</style>
<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <form action="<?php echo Yii::app()->createUrl('/myAccount/pubProject');?>" method="post"  id="form1" enctype="multipart/form-data">
            <div class="usercon981tit">发布众筹</div>
            <div class="usercon981titline"><img src="/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981con"><span>标题</span>
                <input name="title" type="text" />
                <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">15字以内</b></div>
            <div class="usercon981con"><span>图片</span><input name="image" value="" type="file" /></div>
            <div class="usercon981con"><span>金额</span>
                <input name="project_price" type="text" /></div>
            <div class="usercon981con">
                <span>开始时间</span>
                <input name="begin_date" id="picker_1" type="text" />
            </div>
            <div class="usercon981con">
                <span>结束时间</span>
                <input name="end_date" type="text" id="picker_2" />
            </div>
            <div class="usercon981con">
                <span>类型</span>
                <select name="product_type_id" style="border: 1px solid #ccc;padding: 2px; width: 100px;">
                <?php
                foreach ($product_types as $type) {
                    echo "<option value='" . $type['product_type_id'] . "'>" . $type['name'] . "</option>";
                }?>
                </select>
            </div>
            <div class="usercon981con">
                <span>描述</span>
                <textarea name="product_content" cols="" rows="" style="width:900px; height:350px; border:0px; background-color:#f0f0f0;"></textarea>
            </div>
                <hr style="border: 1px solid #ccc; margin-bottom: 20px; clear: both;">
            <div class="usercon981con"><span>支持金额1</span>
                <input name="price[]" type="text" /></div>
            <div class="usercon981con"><span>人数/限</span>
                <input name="number_people[]" type="text" /></div>
            <div class="usercon981con"><span>回报说明 <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">设置支持金额的回报说明</b></span>
                <textarea name="content[]" cols="" rows="" style="width:900px; height:150px; border:0px; background-color:#f0f0f0;"></textarea>
            </div>

            <div class="usercon981con"><span>支持金额2</span>
                <input name="price[]" type="text" /></div>
            <div class="usercon981con"><span>人数/限</span>
                <input name="number_people[]" type="text" /></div>
            <div class="usercon981con"><span>回报说明 <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">设置支持金额的回报说明</b></span>
                <textarea name="content[]" cols="" rows="" style="width:900px; height:150px; border:0px; background-color:#f0f0f0;"></textarea>
            </div>

            <div class="usercon981con"><span>支持金额3</span>
                <input name="price[]" type="text" /></div>
            <div class="usercon981con"><span>人数/限</span>
                <input name="number_people[]" type="text" /></div>
            <div class="usercon981con"><span>回报说明 <b style="font-weight:normal; color:#c3c3c3; padding-left:10px;">设置支持金额的回报说明</b></span>
                <textarea name="content[]" cols="" rows="" style="width:900px; height:150px; border:0px; background-color:#f0f0f0;"></textarea>
            </div>

            <div class="usercon981con"><a href="javascript:;" onclick="$('#form1').submit();"><img src="/css/img/userbtn01.jpg" width="260" height="40" /></a></div>
            <div class="vspace" style="height:20px;"></div>
            </form>
    </div>
</div>