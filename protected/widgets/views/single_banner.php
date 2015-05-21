<?php
if ($jsFile) {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . $jsFile);
}
if ($cssFile) {
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . $cssFile);
}
if (is_array($banner) && count($banner)){
    ?>
<div class="<?php echo $cssClass;?>">
    <ul id="<?php echo $dotId;?>">
        <?php
        foreach($banner as $item){
            $alt = $item['html_text'] != '' ? mb_substr(CHtml::encode($item['html_text']), 0, 10, 'utf8') : mb_substr(CHtml::encode($item['title']), 0, 10, 'utf8');
            ?>
            <li style="background: <?php echo $item['bgcolor'];?>;">
                <a title="<?php echo(CHtml::encode($item['title'])); ?>" href="<?php  echo $item['url']; ?>" target="_blank" >
                    <img alt="<?php echo $alt; ?>" src="<?php echo cdn_bumeng_url().$item['image']; ?>" />
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="dot"></div>
</div>
<script type="text/javascript">
    var myfocus = new focus("<?php echo $dotId;?>");
</script>
<?php } ?>



