<!--topnav begin-->
<div class="wrapper">
    <div class="bread">当前位置：<a href="/star">明星档</a><span>></span>鹿晗的个人资料  </div>
</div>

<div class="wrapper">
<div class="content">
<div class="intro_info clearfix">
    <div class="intro_info_left left">
        <ul class="intro_info_tab clearfix">
            <li class="current">简介</li>
            <li class="line"></li>
            <li>基本资料</li>
            <li class="line"></li>
            <li>关系图谱</li>
        </ul>
        <div class="intro_info_left_con">
            <dl class="clearfix">
                <dt class="left"><img src="<?php echo $stardata[face]?>" width="190" height="245" /></dt>
                <dd class="right">
                    <h3><?php echo $stardata[user_name]?></h3>
                    <p class="c-gap-top"><?php echo $starinfodata[content]?></p>
                </dd>
            </dl>
            <div class="fensi_rank clearfix">
                <h4 class="c-gap-bottom">粉丝总排名第9位</h4>
                <p class="fensi_rank_num clearfix"><span>0</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><button></button></p>
            </div>
            <h5 class="him_word_title">他的词条</h5>
            <div class="him_word">
            <?php
            $tag=explode(',',$starinfodata[tag]);
            	foreach($tag as $v){ 

            			echo '<a >'.$v.'</a>';
            	}
            ?>
            
            </div>
        </div>
    </div>
    <div class="intro_info_mid left">
        <h2 class="latest_danan">最近档案<a href="" target="_blank">更多&gt;&gt;</a></h2>
        <div class="latest_danan_con" style="height:410px">
            <p><select class="c-gap-right"><option>2015</option></select><select><option>1月</option></select></p>
            <div class="month_cycle clearfix">
                <div class="month_cycle_layer">
                    <div class="month_cycle_btn_left"></div>
                    <ul class="month_cycle_list">
                    <?php
                  		$day=Yii::app()->getRequest()->getParam("day");
                  		$i=0;
                    	foreach($schedule as $k=>$v){ 

                    		if($i==0){ 
                    			$donum=$k;
                    		}
                    		if($i<5){ 
		                  		if(empty($day) && $i==0){ 
		                  			echo '<li class="current"><span><a href="'.Yii::app()->createUrl('/star/detail',array('id'=>$v[0]['starid'],'day'=>$k)).'" >'.$k.'</a></span><em></em></li>';
		                  		}else if($k==$day){ 
		                  			echo '<li class="current"><span><a href="'.Yii::app()->createUrl('/star/detail',array('id'=>$v[0]['starid'],'day'=>$k)).'" >'.$k.'</a></span><em></em></li>';
		                  		}else{ 
		                  			echo '<li><span><a href="'.Yii::app()->createUrl('/star/detail',array('id'=>$v[0]['starid'],'day'=>$k)).'" >'.$k.'</a></span><em></em></li>';

		                  		}
	                  		}
	                  		$i++;
                    	}

                    ?>
                    
                    </ul>
                    <div class="month_cycle_btn_right"></div>
                </div>
                <div class="cycle_line"></div>
            </div>
            <div class="danan_list">
            <?php
            if(empty($day) && isset($donum)){
            	$key=$donum;
            }else{ 
            	$key=intval($day);
            }
            $i=1;
            foreach($schedule[$key] as $val){ 
            	if($i>3)continue;
            ?>
            	  <dl>
                    <dd>
                        <p class="danan_list_title"><span><img src="/images/icon5.png" /><?php echo date('H:i',$val['begintime'])?></span><span><img src="/images/icon6.png" /><?php echo $val['address']?></span></p>
                        <p><a href="<?php echo Yii::app()->createUrl('star/info',array('id'=>$val['id']))?>"><?php echo $val['title']?></a></p>
                    </dd>
                </dl>

			<?php
				$i++;
            }
         
            ?>
            </div>
        </div>
    </div>
    <div class="intro_info_right right">
        <h2 class="latest_danan news_intro_info">最近新闻<a href="<?php echo Yii::app()->createUrl('/news/index',array('id'=>$getnews[0][star_id]))?>" target="_blank">更多&gt;&gt;</a></h2>
        <div class="him_news_con">
            <dl class="him_news clearfix">
                <dt><a href="" target="_blank"><img src="<?php echo $getnews[0][image]?>" width='94' height='117' /></a></dt>
                <dd>
                    <h4 class="c-gap-bottom"><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$getnews[0][id]))?>"><?php echo  mb_substr($getnews[0][title], 0, 20, 'utf-8')?></a></h4>
                    <p class="c-gap-bottom"><?php echo $getnews[0][introduce]?></p>
                    <p><span class="gray_color">浏览</span><em class="red_color c-gap-left"><?php echo $getnews[0][lookcount]?></em></p>
                </dd>
            </dl>
            <ul class="him_news_list">
            <?php
            unset($getnews[0]);
            	foreach($getnews as $v){ 
            ?>
               <li>
                    <p class="him_news_list_title"><a href="<?php echo Yii::app()->createUrl('/news/info',array('id'=>$v[id]))?>"><?php echo  mb_substr($v['title'], 0, 15, 'utf-8')?></a></p>
                    <p class="clearfix"><span class="left gray_color ">浏览 <em class="red_color c-gap-left"><?php echo $v['lookcount']?></em></span><span class="right gray_color"><?php echo date('Y-m-d',$v['lookcount'])?></span></p>
                </li>

            <?php
            	}

            ?>
          
            </ul>
        </div>
    </div>
</div>
<div class="him_vedio clearfix">
    <div class="him_vedio_title clearfix c-gap-bottom"><img class="left" src="/images/icon7.png" /><span class="left">TA的视频</span><a class="right" href="" target="_blank">更多&gt;&gt;</a></div>
    <div class="him_vedio_con clearfix">
        <div class="him_vedio_left">
            <img src="/images/pic4.png" />
            <a href="" target="_blank" class="vedio_play_btn"><img src="/images/videoicon1.png"  /></a>
            <p class="clearfix c-gap-top-small him_vedio_left_intro"><span class="left"><img src="/images/videoicon2.png" class="c-gap-right" />EXO粉丝见面会</span><em class="right">粉丝数：<i class="red_color">1121</i></em><em class="right c-gap-right">播放次数：<i class="red_color">255554</i></em></p>
        </div>
        <div class="him_vedio_right">
            <div class="him_vedio_history_title clearfix"><span class="left">历史视频(内)</span><a class="right" target="_blank" href="">更多&gt;&gt;</a></div>
            <ul>
                <li class="clearfix">
                    <div class="left him_vedio_history_pic"><img src="/images/pic.png"  /><i>超清</i><span class="him_vedio_history_pic_tag"></span></div>
                    <div class="right him_vedio_history_txt">
                        <h3><a href="" target="_blank">EXO-M-History练习室版[12]</a></h3>
                        <p class="him_vedio_icon"><img src="/images/icon14.png" /><span class="c-gap-right-small gray_color">686,599</span><img src="/images/icon15.png" /><span class="gray_color">123,489</span></p>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="left him_vedio_history_pic"><img src="/images/pic.png"  /><i>超清</i><span class="him_vedio_history_pic_tag"></span></div>
                    <div class="right him_vedio_history_txt">
                        <h3><a href="" target="_blank">EXO-M-History练习室版[12]</a></h3>
                        <p class="him_vedio_icon"><img src="/images/icon14.png" /><span class="c-gap-right-small gray_color">686,599</span><img src="/images/icon15.png" /><span class="gray_color">123,489</span></p>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="left him_vedio_history_pic"><img src="/images/pic.png"  /><i>超清</i><span class="him_vedio_history_pic_tag"></span></div>
                    <div class="right him_vedio_history_txt">
                        <h3><a href="" target="_blank">EXO-M-History练习室版[12]</a></h3>
                        <p class="him_vedio_icon"><img src="/images/icon14.png" /><span class="c-gap-right-small gray_color">686,599</span><img src="/images/icon15.png" /><span class="gray_color">123,489</span></p>
                    </div>
                </li>
            </ul>
            <div class="him_vedio_history_title clearfix"><span class="left">历史视频(内)</span></div>
            <ul>
                <li class="clearfix">
                    <div class="left him_vedio_history_pic"><img src="/images/pic.png"  /><i>超清</i><span class="him_vedio_history_pic_tag"></span></div>
                    <div class="right him_vedio_history_txt">
                        <h3><a href="" target="_blank">EXO-M-History练习室版[12]</a></h3>
                        <p class="him_vedio_link"><a href="" target="_blank">来源：优酷</a></p>
                    </div>
                </li>
                <li class="clearfix">
                    <div class="left him_vedio_history_pic"><img src="/images/pic.png"  /><i>超清</i><span class="him_vedio_history_pic_tag"></span></div>
                    <div class="right him_vedio_history_txt">
                        <h3><a href="" target="_blank">EXO-M-History练习室版[12]</a></h3>
                        <p class="him_vedio_link"><a href="" target="_blank">来源：优酷</a></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="him_wish clearfix">

    <div class="him_wish_left">
        <div class="him_vedio_title clearfix c-gap-bottom"><img class="left" src="/images/icon7.png" /><span class="left">TA的视频</span><a class="right" href="" target="_blank">更多&gt;&gt;</a></div>
        <ul class="clearfix">
            <li>
                <div class="him_wish_pic"><img class="left" src="/images/pic2.png" /><span></span><i><小王子>等20本好书</i></div>
                <div class="him_wish_txt c-gap-top">
                    <p class="choukuan_tip">已筹款<span class="c-gap-left">6470金币</span></p>
                    <p class="choukuan_progress c-gap-top-small"><span></span></p>
                    <p class="choukuan_time clearfix c-gap-top-small"><span class="left">70%</span><span class="right">剩余36天</span></p>
                </div>
            </li>
            <li>
                <div class="him_wish_pic"><img class="left" src="/images/pic2.png" /><span></span><i><小王子>等20本好书</i></div>
                <div class="him_wish_txt c-gap-top">
                    <p class="choukuan_tip">已筹款<span class="c-gap-left">6470金币</span></p>
                    <p class="choukuan_progress c-gap-top-small"><span></span></p>
                    <p class="choukuan_time clearfix c-gap-top-small"><span class="left">70%</span><span class="right">剩余36天</span></p>
                </div>
            </li>
            <li>
                <div class="him_wish_pic"><img class="left" src="/images/pic2.png" /><span></span><i><小王子>等20本好书</i></div>
                <div class="him_wish_txt c-gap-top">
                    <p class="choukuan_tip">已筹款<span class="c-gap-left">6470金币</span></p>
                    <p class="choukuan_progress c-gap-top-small"><span></span></p>
                    <p class="choukuan_time clearfix c-gap-top-small"><span class="left">70%</span><span class="right">剩余36天</span></p>
                </div>
            </li>
            <li>
                <div class="him_wish_pic"><img class="left" src="/images/pic2.png" /><span></span><i><小王子>等20本好书</i></div>
                <div class="him_wish_txt c-gap-top">
                    <p class="choukuan_tip">已筹款<span class="c-gap-left">6470金币</span></p>
                    <p class="choukuan_progress c-gap-top-small"><span></span></p>
                    <p class="choukuan_time clearfix c-gap-top-small"><span class="left">70%</span><span class="right">剩余36天</span></p>
                </div>
            </li>
        </ul>
    </div>
    <div class="him_wish_right ">
        <div class="fensi_title clearfix"><div class="fensi_title_left left">粉丝贡献</div><ul class="right"><li>周榜</li><li class="li_line"></li><li>月榜</li><li class="li_line"></li><li>总榜</li><li class="li_line"></li></ul></div>
        <div class="gongxian_list c-gap-top">
            <ul>
                <li class="clearfix">
                    <div class="left gongxian_list_pic clearfix">
                        <div class="left"><img src="/images/pic5.png" /></div>
                        <div class="right gongxian_list_pic_txt">
                            <p class="gongxian_list_pic_txt_title">海.阳光</p>
                            <p class="c-gap-top-small"><span class="gongxian_icon"></span></p>
                        </div>
                    </div>
                    <div class="right gongxian_list_txt">贡献值：<span>256582</span></div>
                </li>
                <li class="clearfix">
                    <div class="left gongxian_list_pic clearfix">
                        <div class="left"><img src="/images/pic5.png" /></div>
                        <div class="right gongxian_list_pic_txt">
                            <p class="gongxian_list_pic_txt_title">海.阳光</p>
                            <p class="c-gap-top-small"><span class="gongxian_icon"></span></p>
                        </div>
                    </div>
                    <div class="right gongxian_list_txt">贡献值：<span>256582</span></div>
                </li>
                <li class="clearfix">
                    <div class="left gongxian_list_pic clearfix">
                        <div class="left"><img src="/images/pic5.png" /></div>
                        <div class="right gongxian_list_pic_txt">
                            <p class="gongxian_list_pic_txt_title">海.阳光</p>
                            <p class="c-gap-top-small"><span class="gongxian_icon"></span></p>
                        </div>
                    </div>
                    <div class="right gongxian_list_txt">贡献值：<span>256582</span></div>
                </li>
                <li class="clearfix">
                    <div class="left gongxian_list_pic clearfix">
                        <div class="left"><img src="/images/pic5.png" /></div>
                        <div class="right gongxian_list_pic_txt">
                            <p class="gongxian_list_pic_txt_title">海.阳光</p>
                            <p class="c-gap-top-small"><span class="gongxian_icon"></span></p>
                        </div>
                    </div>
                    <div class="right gongxian_list_txt">贡献值：<span>256582</span></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="him_dianpu clearfix">
    <div class="him_vedio_title clearfix c-gap-bottom"><img class="left" src="/images/icon7.png" /><span class="left">TA的店铺</span></div>
    <div class="him_dianpu_left">
        <div class="him_dianpu_left_title">
            <ul class="clearfix">
                <li>MV</li>
                <li class="dianpu_line"></li>
                <li>音乐</li>
                <li class="dianpu_line"></li>
                <li>CD</li>
                <li class="dianpu_line"></li>
                <li>视频</li>
                <li class="dianpu_line"></li>
                <li>其它</li>
            </ul>
        </div>
        <div class="him_dianpu_left_con">
            <ul class="clearfix">
                <li><img  src="/images/pic7.png" /><span></span><i><小王子>等20本好书</i></li>
                <li><img  src="/images/pic7.png" /><span></span><i><小王子>等20本好书</i></li>
                <li><img  src="/images/pic7.png" /><span></span><i><小王子>等20本好书</i></li>
                <li><img  src="/images/pic7.png" /><span></span><i><小王子>等20本好书</i></li>
                <li><img  src="/images/pic7.png" /><span></span><i><小王子>等20本好书</i></li>
                <li><img  src="/images/pic7.png" /><span></span><i><小王子>等20本好书</i></li>
            </ul>
        </div>
    </div>
    <div class="him_dianpu_right">
        <div class="him_vedio_history_title clearfix"><span class="left">猜你喜欢</span><a class="right" target="_blank" href="">换一批&gt;&gt;</a></div>
        <div class="him_dianpu_con clearfix">
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装	饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
            <dl class="guess_youlike clearfix">
                <dt><a href="" target="_blank"><img  src="/images/pic8.png" /></a></dt>
                <dd>
                    <p>EXO韩流服装店</p>
                    <p>主营:服装、饰品</p>
                    <p class="clearfix"><span class="left">质量好</span><span class="right">很漂亮</span></p>
                </dd>
            </dl>
        </div>
    </div>
</div>
<div class="him_fensi clearfix">
    <div class="him_fensi_left">
        <div class="him_vedio_title clearfix c-gap-bottom"><img class="left" src="/images/icon7.png" /><span class="left">TA的粉丝圈</span><a class="right" href="" target="_blank">更多&gt;&gt;</a></div>
        <div class="fensi_hudong">
            <div class="him_fensi_left_con cur clearfix">
                <div class="him_fensi_pic"><a href="" target="_blank"><img class="left" src="/images/pic5.png" /></a></div>
                <div class="him_fensi_biaodan">
                    <div class="him_fensi_title clearfix"><div class="left"><span class="c-gap-right">海天.阳光</span><img src="/images/icon9.png" /></div><div class="right">至少输入140字</div></div>
                    <div class="him_fensi_textarea"><textarea>有什么感想你也来说说吧</textarea></div>
                    <div class="him_fensi_biaodan_oper c-gap-top clearfix">
                        <div class="biaoqing left"><img src="/images/icon8.png" /><a href="" target="_blank">表情</a></div>
                        <div class="fabiao_btn right"><button>发表评论</button></div>
                    </div>
                </div>
            </div>
            <div class="him_fensi_left_con clearfix">
                <div class="him_fensi_pic"><a href="" target="_blank"><img class="left" src="/images/pic5.png" /></a></div>
                <div class="him_fensi_biaodan">
                    <div class="him_fensi_name"><a href="" target="_blank">怎么说如何做</a></div>
                    <p>大爱EXO</p>
                    <div class="clearfix"><div class="him_fensi_operator left"><span class="c-gap-right">1小时前</span><span>来自优酷</span></div><div class="right him_fensi_zhufa"><a href="" target="_blank" class="c-gap-right">转发</a><a href="" target="_blank">回复</a></div></div>
                </div>
            </div>
            <div class="him_fensi_left_con clearfix">
                <div class="him_fensi_pic"><a href="" target="_blank"><img class="left" src="/images/pic5.png" /></a></div>
                <div class="him_fensi_biaodan">
                    <div class="him_fensi_name"><a href="" target="_blank">怎么说如何做</a></div>
                    <p>大爱EXO</p>
                    <div class="clearfix"><div class="him_fensi_operator left"><span class="c-gap-right">1小时前</span><span>来自优酷</span></div><div class="right him_fensi_zhufa"><a href="" target="_blank" class="c-gap-right">转发</a><a href="" target="_blank">回复</a></div></div>
                </div>
            </div>
            <div class="him_fensi_left_con clearfix">
                <div class="him_fensi_pic"><a href="" target="_blank"><img class="left" src="/images/pic5.png" /></a></div>
                <div class="him_fensi_biaodan">
                    <div class="him_fensi_name"><a href="" target="_blank">怎么说如何做</a></div>
                    <p>大爱EXO</p>
                    <div class="clearfix"><div class="him_fensi_operator left"><span class="c-gap-right">1小时前</span><span>来自优酷</span></div><div class="right him_fensi_zhufa"><a href="" target="_blank" class="c-gap-right">转发</a><a href="" target="_blank">回复</a></div></div>
                </div>
            </div>
            <div class="answer_box">
                <p class="him_fensi_name"><a href="" target="_blank">穆穆</a></p>
                <textarea>会员就是爽啊,一元免费看</textarea>
                <div class="him_fensi_biaodan_oper c-gap-top clearfix">
                    <div class="biaoqing left"><img src="/images/icon8.png" /><a href="" target="_blank">表情</a></div>
                    <div class="fabiao_btn right clearfix"><button class="left btn_focus c-gap-right">回复</button><button class="left">取消</button></div>
                </div>
            </div>
            <div class="page_list"><a class="current" href="" target="_blank">1</a><a href="" target="_blank">2</a><a href="" target="_blank">3</a><a href="" target="_blank">4</a><a href="" target="_blank">5</a><a href="" target="_blank">5</a><a href="" target="_blank">6</a><a href="" target="_blank">7</a><a href="" target="_blank">9</a><a href="" target="_blank">10</a><a href="" target="_blank" class="prev_page">上一页</a><a href="" target="_blank" class="next_page page_focus">下一页</a></div>
        </div>
    </div>
    <div class="him_fensi_right">
        <div class="fensi_title clearfix"><div class="fensi_title_left left">粉丝贡献</div><a class="right" target="_blank" href="">更多&gt;&gt;</a></div>
        <ul class="fensi_jiazu_list">
            <li class="current"><img src="/images/pic1.jpg" /><span></span><em class="clearfix"><i class="left">爱鹿晗粉丝团</i><i class="right">1212万</i></em></li>
            <li class="clearfix"><span class="left xuhao">2</span><span class="left">前进鹿小七</span><em class="right"><i>112</i>粉丝</em></li>
            <li class="clearfix"><span class="left xuhao">3</span><span class="left">前进鹿小七</span><em class="right"><i>112</i>粉丝</em></li>
            <li class="clearfix"><span class="left xuhao">4</span><span class="left">前进鹿小七</span><em class="right"><i>112</i>粉丝</em></li>
            <li class="clearfix"><span class="left xuhao">5</span><span class="left">前进鹿小七</span><em class="right"><i>112</i>粉丝</em></li>
        </ul>
    </div>
    <div class="him_fensi_right">
        <div class="fensi_title clearfix"><div class="fensi_title_left left">土豪粉丝榜</div><a class="right" target="_blank" href="">更多&gt;&gt;</a></div>
        <ul class="fensi_jiazu_list">
            <li class="tuhao_current"><span class="left"><img src="/images/one.jpg" /></span><img class="c-gap-left-small c-gap-right-small left" src="/images/pic5.png"><div><p class="c-gap-bottom-small">海.阳光</p><img src="/images/icon9.png" /></div></li>
            <li class="clearfix"><span class="left xuhao">2</span><span class="left">前进鹿小七</span></li>
            <li class="clearfix"><span class="left xuhao">3</span><span class="left">前进鹿小七</span></li>
            <li class="clearfix"><span class="left xuhao">4</span><span class="left">前进鹿小七</span></li>
            <li class="clearfix"><span class="left xuhao">5</span><span class="left">前进鹿小七</span></li>
        </ul>
    </div>
</div>
</div>
</div>