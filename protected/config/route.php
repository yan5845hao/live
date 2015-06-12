<?php
return array(
    'post/<id:\d+>/<title:.*?>'=>'post/view',
    'posts/<tag:.*?>'=>'post/index',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    'pay/index.shtml' => 'myAccount/rechargeGold',
    'pay/vip.shtml' => 'myAccount/upgradeVip',
);