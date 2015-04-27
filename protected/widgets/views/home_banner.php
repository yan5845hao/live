<?php if ($jsFile){ ?>
<script type="text/javascript" src="<?php echo $jsFile; ?>"></script>
<?php }?>

<?php if ($cssFile){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $cssFile; ?>" />
<?php }?>
<?php if (count($banner) > 0){ ?>
<div id="home-banner" class="<?php echo $cssClass; ?>">
    <p id="banner-data" style="top: 0px;">
        <?php
            switch($group){
                case 'Flight index 628x192':
                    $temSrc  = Yii::app()->staticUrl('/images/' . 'TheTemImgSrc', array('provider' => 'qiniu','mode' => '1','width' => '628','height' => '192','format' => 'jpg'));
                    break;
                case 'Integarl Mall Home Page':
                    $temSrc  = Yii::app()->staticUrl('/images/' . 'TheTemImgSrc', array('provider' => 'qiniu','mode' => '1','width' => '788','height' => '240','format' => 'jpg'));
                    break;
                case 'TFF Special Price Category Banner 580x220':
                    $temSrc  = Yii::app()->staticUrl('/images/' . 'TheTemImgSrc', array('provider' => 'qiniu','mode' => '1','width' => '580','height' => '220','format' => 'jpg'));
                    break;
                default:
                    $temSrc = '/images/' . 'TheTemImgSrc';
                    break;
            }
        ?>
        <?php foreach($banner as $b) {
                  if($this->group == 'Tour Customize Banner 980x270'){?>
                      <span><img src="<?php echo cdn_images_url() . $b['image']; ?>"/></span>
            <?php } else { ?>
                    <a target="_blank" title="<?php echo(CHtml::encode($b['title'])); ?>"
                        <?php if( !empty($b['url'])) { ?>
                                 href="<?php echo $this->controller->createUrl('banner/redirect', array('url'=>$b['url'], 'banner_id'=>$b['banner_id'])); ?>"
                        <?php } ?>
                       data-url="<?php echo str_replace('TheTemImgSrc', $b['image'], $temSrc); ?>"><img src="<?php echo str_replace('TheTemImgSrc', $b['image'], $temSrc); ?>" /></a>
            <?php }
              }
        ?>
    </p>
</div>
<?php } ?>
