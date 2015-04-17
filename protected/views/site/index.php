<div class="welcome">
    Welcome,
    <?php echo Yii::app()->user->name;?>
    |<a href="<?php echo $this->createUrl('site/logout')?>">Log off</a>
</div>