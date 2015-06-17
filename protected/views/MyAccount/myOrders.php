<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="wrapper">
    <div class="userlj">当前位置：<a href="#">用户中心</a> >  我的订单</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <table style="width: 100%; text-align: center; line-height: 30px;">
                <tbody><tr style="font-size: 14px;">
                    <th>订单信息</th>
                    <th>订单金额</th>
                    <th>最新三个月</th>
                    <th>全部状态</th>
                    <th>操作</th>
                </tr>
                <?php
                foreach ((array)$dataProvider->getData() as $list) {
                    $url = Yii::app()->createUrl('/myAccount/deleteNews',array('id'=>$list['order_id']));
                    ?>
                    <tr>
                        <td><?php echo $list['order_id'].'&nbsp;'.$list['payment_info'];?></td>
                        <td><?php echo $list['cost'];?></td>
                        <td><?php echo $list['last_updated']; ?></td>
                        <td><?php echo Product::$productStatus[$list['status']]?></td>
                        <td>修改 | 取消</td>
                    </tr>
                <?php } ?>
                </tbody></table>
            <?php
            $this->widget('CLinkPager', array(
                'cssFile'=>false,
                'header'=>'',
                'maxButtonCount'=>8,
                'firstPageLabel'=>'首页',
                'lastPageLabel'=>'尾页',
                'nextPageLabel'=>'下一页',
                'prevPageLabel'=>'上一页',
                'pages' => $dataProvider->pagination
            ));
            ?>
        </div>
    </div>