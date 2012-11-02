<?php

/**
 * This is the model class for table "{{posts}}".
 *
 * The followings are the available columns in table '{{posts}}':
 * @property integer $id
 * @property string $author_name
 * @property string $posts_content
 * @property string $posts_title
 * @property integer $type_id
 * @property integer $status_id
 * @property string $create_time
 * @property string $update_time
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
			array('author_name, posts_content, posts_title, type_id, status_id, create_time, update_time, order_id', 'required'),
			array('type_id, status_id, order_id', 'numerical', 'integerOnly'=>true),
			array('author_name', 'length', 'max'=>10),
			array('posts_title', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, author_name, posts_content, posts_title, type_id, status_id, create_time, update_time, order_id', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'author_name' => '作者',
			'posts_content' => '内容',
			'posts_title' => '标题',
			'type_id' => '类型',
			'status_id' => '状态',
			'create_time' => '添加时间',
			'update_time' => '修改时间',
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
		$criteria->compare('author_name',$this->author_name,true);
		$criteria->compare('posts_content',$this->posts_content,true);
		$criteria->compare('posts_title',$this->posts_title,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('order_id',$this->order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}