<div class="con">
    <ul>
        <?php
        $data = $dataProvider->getData();
        if (empty($data)) {
            echo '<div style="height:300px;text-align:center;font-size:18px;"><br><br><br><br><br>暂时没有相关的内容<br><br><p><a href="/bigShots">返回顶部</a></p></div>';
        }else{
            foreach($data as $product){
                $product_total = 0;
                $proportion = '0';
                $product_project = ProductProject::model()->findByAttributes(array('product_id' => $product->product_id));
                if ($product_project) {
                    $product_total = $product_project->product_total;
                }
                if($product_total > 0){
                    $proportion = (($product_total / $product->project_price) * 100);
                }
                $day = ceil((strtotime($product->end_date) - strtotime($product->begin_date))/86400);
        ?>
            <li <?php if ($proportion > 100){echo 'class="f"';}else{ echo '';}?>>
                <div class="imgbox">
                    <div class="img"><a href="#"><img  src="<?php echo $product->image;?>" /></a>
                        <span><?php if ($proportion > 100){echo '筹款成功';}else{ echo '筹款中';}?></span>
                    </div>
                    <p><a href="#"><?php echo $product->title;?></a></p>
                </div>
                <div class="dotline"></div>
                <div class="pro">
                    <span>
                        <em><?php echo $proportion;?>%</em><br/>
                        <i>已达</i>
                    </span>
                    <span>
                        <em>¥<?php echo $product_total;?></em><br/>
                        <i>已筹</i>
                    </span>
                    <span>
                        <em><?php echo $day;?>天</em><br/>
                        <i>剩余时间</i>
                    </span>
                </div>
            </li>
        <?php
            }
        }
        ?>
    </ul>
    <div class="clear"></div>
    <div class="more"><a href="javascript:void(0);">点击加载更多</a></div>
    <?php
    if ((int)$dataProvider->pagination->itemCount > $dataProvider->pagination->pageSize) {

        $url = Yii::app()->createUrl('/star/index', array('page' => 2));
        echo '<div class="more" id="project_loading" data-url="' . $url . '"><a href="javascript:void(0);"  onclick="loadMore()">点击加载更多</a></div>';
    }
    ?>
</div>