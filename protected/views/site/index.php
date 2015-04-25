<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/live_index.css");
?>
<div class="index-top-banner" id="banner">
    <?php $this->widget('application.widgets.BannerWidget',array('group'=>'Index Page Top850x390','slider_type'=>'image')); ?>
</div>
<div style="width: 1920px; height: 800px; border: 1px solid #ccc;">
    首页  | 大咖秀    |    明星档    |    星愿城     |     大牌店     |     粉社会
</div>