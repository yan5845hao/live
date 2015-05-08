<?php
/**
 * $this->Widget('application.widgets.BannerWidget', array('group'=>'500x220 Home Page'))
 * $this->Widget('application.widgets.BannerWidget', array('image_path'=> cdn_images_url() . 'zurich-main.jpg, ' . cdn_images_url() . 'zurich-2.jpg', 'slider_type'=>'image'));
 * $this->Widget('application.widgets.BannerWidget', array('id'=>'149, 147, 151', 'slider_type'=>'home'));
 *
 * banner widget
 * @param string
 * @author panda
 */
class BannerWidget extends CWidget
{
    // need one, only one
    public $id = null;
    public $dotId = null;
    public $group = null;
    public $image_path = null; // image path
    // more
    public $slider_type = 'home'; // slider type
    public $config = null; // configuration array
    public $jsFile = null;
    public $cssFile = null;
    public $cssClass = null;
    public $banner_id = array();
    public $language = null;
    public $current_time = null;

    public function init()
    {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/active.js");
        $this->language = (LANGUAGE_ID == 'cn'||LANGUAGE_ID == 'sc'?'schinese':(LANGUAGE_ID == 'tw'?'tchinese':'all'));
        if ($this->language == ''){
            $this->language = 'tchinese';
        }
        $this->current_time = date('Y-m-d').' 00:00:00';
    }

    public function run()
    {
        $banner = $this->getBanner();
        // show banner
        // slider type default='home'
        switch ($this->slider_type)
        {
            case 'image':
                $view = 'single_banner';
                break;
            case 'home':
                $view = 'home_banner';
                break;
            default:
                $view = 'single_banner';
                break;
        }
//        $loadImg = Photo::model()->loadImg;
        $this->render($view, array(
            'banner' => $banner,
            'loadImg' => '',
            'dotId' => $this->dotId,
            'jsFile' => $this->jsFile,
            'cssFile' => $this->cssFile,
            'group' => $this->group,
            'cssClass' => $this->cssClass));
    }

    public function getBanner(){

        // expiration date
        $now = date('Y-m-d H:i:s');
        $expiration = ' AND ((scheduled <="'.$now.'" || scheduled="0000-00-00 00:00:00") AND (expiration >="'.$now.'" || expiration="0000-00-00 00:00:00"))';
        // only one image or image array
        if ($this->image_path)
        {
            $banner = explode(',' ,$this->image_path);
        }
        // get more than iamges, by banner_id

        elseif ($this->id)
        {
            $banner_id = array_map('intval', explode(',' ,$this->id));
            if (count($banner_id) > 0){
                $banner_id_str = implode(',', $banner_id);
                $where = " active = 1 AND banner_id IN (".$banner_id_str.") AND (language = :language OR language = 'all')" . $expiration;
                if ($this->slider_type == 'image'){
                    $banner_row = Yii::app()->db->createCommand()->select('banner_id,title,html_text,image,url,domestic_ip')->from('banner')->where($where, array(
                            ':language' => $this->language
                        )
                    )->order('sort_order DESC')->queryRow();
                    $banner = array();
                    $banner[0]['banner_id'] = $banner_row['banner_id'];
                    $banner[0]['title'] = $banner_row['title'];
                    $banner[0]['html_text'] = $banner_row['html_text'];
                    $banner[0]['image'] = $banner_row['image'];
                    $banner[0]['url'] = $banner_row['url'];

                    $this->banner_id[] = $banner_row['banner_id'];
                }else{
                    $banner = Yii::app()->db->createCommand()->select('banner_id,title,html_text,image,url,domestic_ip')->from('banner')->where($where, array(
                            ':language' => $this->language
                        )
                    )->order('sort_order DESC')->queryAll();
                    foreach ($banner as $a){
                        $this->banner_id[] = $a['banner_id'];
                    }
                }
                $this->showCount();
            }
        }

        // get more than iamges, by banner group
        elseif ($this->group)
        {
            // check_reg_group // by zyme
            $this->check_reg_group($this->group);
            $where = 'active = 1 AND (language = :language OR language = "all") AND `group` = :group ' . $expiration;

            $banner = Yii::app()->db->createCommand()->select('bgcolor,banner_id,title,html_text,image,url,domestic_ip')->from('banner')->where($where, array(
                ':language' => $this->language,
                ':group' => $this->group
            ))->order('sort_order DESC')->queryAll();
            // showCount
            foreach ($banner as $a)
            {
                $this->banner_id[] = $a['banner_id'];
            }
            $this->showCount();
        }
        // no banner
        else
        {
            return;
        }
        if (is_array($banner)){
            $bannerobj = array();
            $i = 0;
            foreach($banner as $item){
                if ($item['domestic_ip'] != '0'){
                    $ip_in_range = 1;
                    // $ip_in_range: 1为中国内,0为中国外,注意内网ip成了国外
                    if (!$ip_in_range){
                        // 访问者为国外，且未禁止国外
                        if ($item['domestic_ip']!='2' )
                        {
                            $bannerobj[$i]['banner_id'] = $item['banner_id'];
                            $bannerobj[$i]['title'] = $item['title'];
                            $bannerobj[$i]['html_text'] = $item['html_text'];
                            $bannerobj[$i]['image'] = $item['image'];
                            $bannerobj[$i]['url'] = $item['url'];
                            $bannerobj[$i]['domestic_ip'] = $item['domestic_ip'];
                            $bannerobj[$i]['bgcolor'] = $item['bgcolor'];
                        }
                    }
                    else
                    {
                        // 访问者为国内，且未禁止国内
                        if ( $item['domestic_ip']!='1' )
                        {
                            $bannerobj[$i]['banner_id'] = $item['banner_id'];
                            $bannerobj[$i]['title'] = $item['title'];
                            $bannerobj[$i]['html_text'] = $item['html_text'];
                            $bannerobj[$i]['image'] = $item['image'];
                            $bannerobj[$i]['url'] = $item['url'];
                            $bannerobj[$i]['domestic_ip'] = $item['domestic_ip'];
                            $bannerobj[$i]['bgcolor'] = $item['bgcolor'];
                        }
                    }
                }else{
                    $bannerobj[$i]['banner_id'] = $item['banner_id'];
                    $bannerobj[$i]['title'] = $item['title'];
                    $bannerobj[$i]['html_text'] = $item['html_text'];
                    $bannerobj[$i]['image'] = $item['image'];
                    $bannerobj[$i]['url'] = $item['url'];
                    $bannerobj[$i]['domestic_ip'] = $item['domestic_ip'];
                    $bannerobj[$i]['bgcolor'] = $item['bgcolor'];
                }
                $i++;
            }
            $banner = $bannerobj;
        }
        return $banner;
    }

    /**
     * @desc baner show count
     * @author darren
     */
    private function showCount()
    {
        //去掉banner的显示次数统计
        //2014-09-09  aaron.yang
//        foreach ($this->banner_id as $banner_id)
//        {
//            $banner_id = (int)$banner_id;
//            if (!$banner_id) continue;
//            $history = new CDbCriteria();
//            $history->addCondition('banner_id = '.$banner_id);
//            $banner = BannersHistory::model()->findByAttributes(array(), $history);
//
//            if ($banner)
//            {
//                $banner->shown = $banner->shown + 1;
//            }
//            else
//            {
//                $banner = new BannersHistory;
//                $banner->shown = 1;
//                $banner->history_date = date('Y-m-d H:i:s');
//                $banner->banner_id = $banner_id;
//            }
//            $banner->save();
//        }
    }

    /**
     * @desc check and auto registration group
     * @author zyme
     */
    private function check_reg_group($group)
    {
        $model = Banners::model()->findByAttributes(array('group' => $group));
        if (!$model)
        {
            $banner = new Banners;
            $banner->active = 0;
            $banner->group = $group;
            $banner->save(false);
        }
    }
}
