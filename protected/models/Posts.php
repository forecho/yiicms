<?php

/**
 * This is the model class for table "{{posts}}".
 *
 * The followings are the available columns in table '{{posts}}':
 * @property integer $id
 * @property string $author_name
 * @property string $content
 * @property string $title
 * @property integer $type_id
 * @property integer $status_id
 * @property string $create_time
 * @property string $keywords
 * @property string $description
 * @property integer $order_id
 */
class Posts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
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
		return '{{posts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_name, content, title, type_id, status_id, create_time, order_id', 'required'),
			array('type_id, status_id, order_id', 'numerical', 'integerOnly'=>true),
			array('author_name', 'length', 'max'=>10),
			array('title', 'length', 'max'=>200),
			array('keywords', 'length', 'max'=>10),
			array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, author_name, content, title, type_id, status_id, create_time, keywords, description, order_id', 'safe', 'on'=>'search'),
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
			'typeName'=>array(self::BELONGS_TO,'Category','type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'author_name' => '作者',
			'content' => '内容',
			'title' => '标题',
			'type_id' => '类型',
			'status_id' => '状态',
			'create_time' => '添加时间',
			'keywords' => '关键字',
			'description' => '描述',
			'order_id' => '排序',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author_name',$this->author_name,true);
		$criteria->compare('type_id',$this->type_id,true);
		$criteria->compare('status_id',$this->status_id,false);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'sort'=>array(
	            'defaultOrder'=>'create_time DESC', //设置默认排序是created倒序
	        ),
			'criteria'=>$criteria,
		));
	}
	
	public static function stateLabels()
    {
        return array(
            POST_STATE_PUBLISHED => Yii::t('admin', 'Published'),
            POST_STATE_DRAFT => Yii::t('admin', 'Save Draft'),
            POST_STATE_TRASH => Yii::t('admin', 'Move to Trash'),
        );
    }
	
	public function state($state)
	{
		return $state;
	}
	
	public function getUrl()
	{
		return Yii::app()->createUrl('posts/view', array(
				'id'=>$this->id,
				'title'=>str_replace('','-',trim($this->title)),
		));
	}
	
}