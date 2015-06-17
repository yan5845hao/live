<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="wrapper">
    <div class="userlj">当前位置：<a href="#">用户中心</a> >  我的收藏</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <table style="width: 100%; text-align: center; line-height: 30px;">
                <tbody><tr style="font-size: 14px;">
                    <th>产品名称</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
                <?php
                foreach ($favorites as $list) {
                    $product = Product::model()->findByPk($list['product_id']);
                    ?>
                    <tr>
                        <td><?php echo $product['title'];?></td>
                        <td><?php echo $product['default_price'];?></td>
                        <td>查看 | <a href="<?php echo Yii::app()->createUrl('/myAccount/delFavorite', array('customer_favorite_id' => $list['customer_favorite_id'])); ?>">移除</a></td>
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
                'pages' => $pages
            ));
            ?>
        </div>
    </div>