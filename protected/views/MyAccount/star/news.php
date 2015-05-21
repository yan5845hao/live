<div class="wrapper">
    <div class="userlj">当前位置：<a href="<?php echo Yii::app()->createUrl('/myAccount')?>">用户中心</a> > 我的资料</div>
    <div class="usercon">
        <?php include 'leftMenu.php' ;?>
        <div class="usercon981 right">
            <table style="width: 100%; text-align: center; line-height: 30px;">
                <tbody><tr style="font-size: 14px;">
                    <th>ID</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>图片</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                <?php
                foreach ($data as $list) {
                    $url = Yii::app()->createUrl('/myAccount/deleteNews',array('id'=>$list['id']));
                ?>
                <tr>
                    <td><?php echo $list['id'];?></td>
                    <td><a href="<?php echo Yii::app()->createUrl('/news/info',array('newsid'=>$list['id']))?>"  target="_blank" ><?php echo $list['title'];?></a></td>
                    <td style="width: 300px;"><?php echo mb_substr($list['content'],0,300,'utf-8');?></td>
                    <td><img width="100" height="80" src="<?php echo $list['image'];?>"></td>
                    <td><?php echo $list['createtime'];?></td>
                    <td><a href="<?php echo Yii::app()->createUrl('/myAccount/pubNews',array('id'=>$list['id']))?>">修改</a> | <a href='javascript:if(confirm("确实要删除该内容吗?"))location="<?php echo $url;?>"'>删除</a></td>
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