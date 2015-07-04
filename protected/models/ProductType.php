<?php

/**
 * This is the model class for table "product_type".
 *
 * The followings are the available columns in table 'product_type':
 * @property string $product_type_id
 * @property string $parent_product_type_id
 * @property string $name
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property ProductMultiDay[] $productMultiDays
 * @property ProductOneDay[] $productOneDays
 */
class ProductType extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductType the static model class
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
        return 'product_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent_product_type_id', 'length', 'max'=>10),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'product_type_id' => 'Product Type',
            'parent_product_type_id' => 'Parent Product Type',
            'name' => 'Name',
            'created' => 'Created',
        );
    }
} 