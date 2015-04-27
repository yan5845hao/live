<?php
if (is_array($banner) && count($banner)){
?>
    <div class="top-big-banner">
        <ul class="img-list">
        <?php
        foreach($banner as $item){
            $url = $this->controller->createUrl('banner/redirect', array('url'=>$item['url'], 'banner_id'=>$item['banner_id']));
            $alt = $item['html_text'] != '' ? mb_substr(CHtml::encode($item['html_text']), 0, 10, 'utf8') : mb_substr(CHtml::encode($item['title']), 0, 10, 'utf8');
        ?>
            <li style="background: <?php echo $item['bgcolor'];?>;">
                <a id="<?php echo md5($url . 'home_new_banner'); ?>"  title="<?php echo(CHtml::encode($item['title'])); ?>" href="<?php  echo $url; ?>" target="_blank" onClick="_gaq.push(['_trackEvent', '主页事件', 'Click', $(this).attr('title')]);">
                    <img width="850" height="390" alt="<?php echo $alt; ?>" src="<?php echo $item['image']; ?>" data-original="<?php echo $item['image']; ?>"/>
                </a>
            </li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>

