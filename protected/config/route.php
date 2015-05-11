<?php
return array(
    'post/<id:\d+>/<title:.*?>'=>'post/view',
    'posts/<tag:.*?>'=>'post/index',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    'account.php' => 'myAccount/gold',
);