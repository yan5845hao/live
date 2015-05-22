<?php
/**
 * This is the model class for table "banners".
 *
 */
class StarNews extends CActiveRecord
{
        /**
         * Returns the static model of the specified AR class.
         * @return Banners the static model class
         */
        public static function model($className=__CLASS__)
        {
                return parent::model($className);
        }
        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
                return 'star_news';
        }
        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                	     array('star_id,title,content', 'required'),
                         array('star_id,star_name,title,content,image,createtime,lookcount,commentcount,introduce','safe')
                        );
        }
        /**
         * @return array relational rules.
         */
        public function relations()
        {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                );
        }
        /*
        * star news paging
        */
       public function getNews($page,$star_id=null){
       		$size=10;
       		if($page<2){
       			$l=0;
       		}else{
       			$l=5*($page-1);
       		}

       		$criteria = new CDbCriteria;
       		if($star_id==null){ 
       			$sql = "SELECT * FROM star_news";
       		}else{ 
       			$sql = "SELECT * FROM star_news where star_id = '{$star_id}'";
       		}
			
			$model= Yii::app()->db->createCommand($sql)->queryAll();
			$pages = new CPagination(count($model));
			
			
			$pages->pageSize = $size;
			$pages->currentPage = $pages;
			$pages->applylimit($criteria);
			$model=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
			$model->bindValue(':offset', $pages->currentPage*$pages->pageSize);
			$model->bindValue(':limit', $pages->pageSize);
			$model=$model->queryAll();

			return $model;

    	}

		public function updatelook($id){
			$model=StarNews::model()->findByPk($id);
			$model->lookcount = ($model->lookcount+1);
			$model->save();
		}
    }