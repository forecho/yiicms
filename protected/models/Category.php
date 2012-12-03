<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property string $path
 * @property integer $type
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, pid, path, type', 'required'),
			array('name, pid, type', 'required'),
			array('pid, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			//array('path', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pid, path, type', 'safe', 'on'=>'search'),
			//array('id, name, pid, type', 'safe', 'on'=>'search'),
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
			'name' => '分类名',
			'pid' => '父级分类',
			'path' => 'Path',
			'type' => '分类类型',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pid',$this->pid);
		//$criteria->compare('path',$this->path,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	//public $bpath;
	// 获取父级type
	public function getAllCategoryName() {
		//$allCategoryName = Category::model()->findAll();
		$allCategoryName =  Category::model()->findAllBySql("SELECT id, path, name,  CONCAT( path,  '-', id ) AS bpath FROM  `yii_category` ORDER BY bpath");
		foreach($allCategoryName as $row) {
			$count = count(explode('-',$row->path));
			$data[$row->id] = str_repeat("--", $count).$row->name;
        }
        return $data;
	}

	// public function getCategoryPath() {
		////$allCategoryName = Category::model()->findAll();
		// $allCategoryName =  Category::model()->findAllBySql("SELECT id, path, name,  CONCAT( path,  '-', id ) AS bpath FROM  `fe_category` ORDER BY bpath");
		// foreach($allCategoryName as $row) {
			// $count = count(explode('-',$row->path));
			// $data[$row->id] = str_repeat("--", $count).$row->name;
        // }
        // return $data;
	// }
}