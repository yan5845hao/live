<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <table style="width: 100%; text-align: center; line-height: 30px;">
                <tbody><tr style="font-size: 14px;">
                    <th>ID</th>
                    <th>标题</th>
                    <th>地点</th>
                    <th>开始时间</th>
                     <th>时长</th>
                    <th>图片</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                <?php
                foreach ($data as $list) {
                    $url = Yii::app()->createUrl('/myAccount/deleteNews',array('id'=>$list['id']));
                ?>
                <tr>
                    <td><?php echo $list['id'];?></td>
                    <td><?php echo $list['title'];?></td>
                    <td style="width: 100px;"><?php echo $list['address'];?></td>
                    <td style="width: 100px;"><?php echo date('Y-d-m',$list['begintime']);?></td>
                     <td style="width: 100px;"><?php echo $list['showtime'];?></td>
                    <td><img width="100" height="80" src="<?php echo $list['img'];?>"></td>
                    <td><?php echo date('Y-d-m',$list['createtime']);?></td>
                    <td><a href="<?php echo Yii::app()->createUrl('/myAccount/pubschedule',array('id'=>$list['id']))?>">修改</a> | <a href='javascript:if(confirm("确实要删除该内容吗?"))location="<?php echo $url;?>"'>删除</a></td>
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
</div>