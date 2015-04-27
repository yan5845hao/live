<?php if ($jsFile){ ?>
<script type="text/javascript" src="<?php echo $jsFile; ?>"></script>
<?php }?>

<?php if ($cssFile){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $cssFile; ?>" />
<?php }?>
<?php
if (is_array($banner) && count($banner)){
?>
    <div class="<?php echo $cssClass ?>">
        <?php
        foreach($banner as $key => $item){
            if (($key + 1) == count($banner)) {
                $class = 'class="last"';
            }
    $link_url = $this->controller->createUrl('banner/redirect', array('url'=>$item['url'], 'banner_id'=>$item['banner_id']));
            ?>

        <a <?php echo $class;?>  title="<?php echo(CHtml::encode($item['title'])); ?>" href="<?php  echo $link_url; ?>"
                                     target="_blank" ><img alt="<?php echo $item['html_text'] != '' ? CHtml::encode($item['html_text']) : CHtml::encode($item['title']); ?>"
           src="<?php echo $item['image'];?>"/></a>
        <?php
        }
        ?>
    </div>
<?php
}
?>


