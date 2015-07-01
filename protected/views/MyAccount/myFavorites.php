<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="wrapper">
    <div class="userlj">当前位置：<a href="#">用户中心</a> >  我的收藏</div>
    <div class="usercon">
        <?php
        if (Yii::app()->user->type == 1) {
            include 'leftMenu.php';
        } else {
            include 'star/leftMenu.php';
        }
        ?>
        <div class="usercon981 right">
            <div class="usercon981tit">我的收藏</div>
            <div class="usercon981jinbi">
                <div class="usercon981bg">
                    <table>
                        <tr class="usercon981bghd">
                            <td style="width: 200px;">产品名称</td>
                            <td class="bgtime">价格</td>
                            <td style="width: 120px;">操作</td>
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
                    </table>
                    <div style="text-align: right;margin-top: 20px;">
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
            </div>
        </div>
    </div>
</div>