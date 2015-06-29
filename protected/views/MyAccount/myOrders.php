<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="wrapper">
    <div class="userlj">当前位置：<a href="#">用户中心</a> >  我的订单</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <div class="usercon981tit">我的订单</div>
            <div class="usercon981titline"><img src="css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981jinbi">
                <div class="usercon981bg">
                    <table>
                        <tr class="usercon981bghd">
                            <td style="width: 100px;">订单编号</td>
                            <td class="bgtime">订单信息</td>
                            <td style="width: 120px;">订单金额</td>
                            <td class="bgchongzhi">最新三个月</td>
                            <td class="bgjinbi">全部状态</td>
                            <td style="width: 120px;">操作</td>
                        </tr>
                        <?php
                        foreach ((array)$dataProvider->getData() as $list) {
                            $url = Yii::app()->createUrl('/myAccount/deleteNews',array('id'=>$list['order_id']));
                            ?>
                            <tr class="usercon981bgcon">
                                <td><?php echo $list['order_id'];?></td>
                                <td><?php echo $list['payment_info'];?></td>
                                <td><?php echo $list['cost'];?></td>
                                <td><?php echo $list['last_updated']; ?></td>
                                <td><?php echo Product::$productStatus[$list['status']]?></td>
                                <td>修改 | 取消</td>
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
                        'pages' => $dataProvider->pagination
                    ));
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>