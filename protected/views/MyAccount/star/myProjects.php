<div class="wrapper">
    <div class="userlj">当前位置：<a href="#">用户中心</a> >  我的订单</div>
    <div class="usercon">
        <?php include 'leftMenu.php';?>
        <div class="usercon981 right">
            <div class="usercon981tit">众筹列表</div>
            <div class="usercon981titline"><img src="/css/img/userline.png" width="939" height="2" /></div>
            <div class="usercon981bg">
                <table>
                    <tr class="usercon981bghd">
                        <td style="width:300px;">众筹主题</td>
                        <td  style="width:170px;">开始时间</td>
                        <td style="width:170px;">结束时间	</td>
                        <td style="width:80px;">状态</td>
                        <td >操作</td>
                    </tr>
                    <?php foreach($projects as $prodcut){ ?>
                    <tr class="usercon981bgcon">
                        <td class="usercon981bgcon_td"><a href="<?php echo Yii::app()->createUrl('/project/detail?product_id='.$prodcut->product_id);?>" target="_blank"><?php echo $prodcut->title;?></a></td>
                        <td class="usercon981bgcon_td"><?php echo $prodcut->begin_date;?></td>
                        <td class="usercon981bgcon_td"><?php echo $prodcut->end_date;?></td>
                        <td class="usercon981bgcon_td">
                            <?php if(strtotime($prodcut->end_date) > time()){
                                echo '进行中';
                            }else{
                                echo '已结束';
                            } ;?>
                        </td>
                        <td class="usercon981bgcon_td">
                            <img width="18" height="18" src="/css/img/mxcenter_sc.png" style=" vertical-align:middle; margin-right:2px;">
                            <a href="javascript:;" onclick="remove_confirm(<?php echo $prodcut->product_id;?>)">删除</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="vspace" style="height: 20px;"></div>
                <div>
                    <?php
                    $this->widget('CLinkPager', array(
                        'cssFile'=>false,
                        'header'=>'',
                        'maxButtonCount'=>8,
                        'firstPageLabel'=>false,
                        'lastPageLabel'=>false,
                        'nextPageLabel'=>'下一页',
                        'prevPageLabel'=>'上一页',
                        'pages' => $pages
                    ));
                    ?>
                </div>
            </div>
            <div class="vspace"></div>
            <!--浮层-删除-->
            <div class="mxcenter_del" style="display: none;">
                <div class="mxcenter_del_tit">提示</div>
                <div class="mxcenter_del_clo"><a href="javascript:;" class="mxcenter_cancel"><img src="/css/img/mxcenterbtn01.png" width="26" height="26" /></a></div>
                <div class="vspace"></div>
                <div class="mxcenter_del_item"> &nbsp;&nbsp;您确定删除该数据吗？ </div>
                <div class="mxcenter_del_item">
                    &nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="remove_product()"><img src="/css/img/mxcenter_btn02.jpg" width="89" height="35" /></a>
                    <a href="javascript:;" class="mxcenter_cancel"><img src="/css/img/mxcenter_btn03.jpg" width="89" height="35" /></a></div>
                <input type="hidden" value="" id="remove_id">
            </div>
        </div>
    </div>
</div>
<script text="text/javascript">
function remove_product()
{
    var url = '/myAccount/delProject';
    var id = $("#remove_id").val();
    $.get(url, 'id=' + id, function (data) {
        var href_url = "<?php echo Yii::app()->createUrl('/myAccount/projects',array('page'=>Yii::app()->request->getParam('page')))?>";
        window.location.href = href_url;
    })
}
</script>
