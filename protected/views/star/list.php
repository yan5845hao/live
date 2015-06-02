   <ul class="shownews">
				<?php
				   $data = $dataProvider->getData();
					if(empty($data)){ 
					}else{
          
                	foreach( $data as $val){ 
				
						$even= $even=='even'?'': 'even';
                	?>
	                    <li class="<?php echo $even?>">
	                        <div class="left l">
	                            <p  class="address"><?php  echo mb_substr($val['address'],0,3,'utf-8'); ?></p>
	                            <div class="time">
	                                <p><?php echo date('d',$val['begintime'])?></p>
	                                <span><?php echo date('Y年m月',$val['begintime'])?></span>
	                            </div>
	                        </div>
	                        <div class="right">
	                            <div class="headbox left">
	                                <img  src="<?php echo $val['img']?>@295w_348h_1e_1c_1x.jpg"/>
	                            </div>
	                            <h3><a href="<?php echo Yii::app()->createUrl('/star/info',array('id'=>$val['id']))?>" target="_blank"><?php echo $val['title']?></a></h3>
	                            <p><?php echo mb_substr($val['content'],0,278,'utf-8');?></p>
	                            <div class="numbers"><span class="left playicon"><a href="<?php echo Yii::app()->createUrl('/star/info',array('id'=>$val['id']))?>" target="_blank">浏览数：<i><?php echo $val[lookcount]?></i></a></span><!--<span class="left comment"><a >评论<i>10</i></a></span--></div>
	                        </div>
	                    </li>
                <?php
                    	}
                    }
                ?>
    </ul>
        <!--更多-->
         
				<div id="starmore">
				<?php
					if ((int)$dataProvider->pagination->itemCount > $dataProvider->pagination->pageSize) {
					
					  	$url = Yii::app()->createUrl('/star/index', array('page' => 2));
						
					    echo '<div class="morelist" id="dk_jiazai" data-url="' . $url . '"><a href="javascript:;" onclick="loadMore()">点击加载更多...</a></div>';
					}
				?>	
				</div>

		<!--更多-->