<?php

class PostsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','draft','trash'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','delall','multiTrash'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Posts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Posts');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Posts('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Posts']))
			$model->attributes=$_GET['Posts'];
		
		$model->status_id = POST_STATE_PUBLISHED;  //不在垃圾箱
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Posts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='posts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	public function actionDelall()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$criteria= new CDbCriteria;
			$criteria->addInCondition('id', $_POST['id']);
			Posts::model()->deleteAll($criteria);//Words换成你的模型
			
			if(isset(Yii::app()->request->isAjaxRequest)) {
				echo CJSON::encode(array('success' => true));die();
				
			} 
			else
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	/**
	 * 批量将文章扔到回收站
	 * @param array $ids ID数组
	 * @param string $callback jsonp回调函数，自动赋值
	 */
	public function actionMultiTrash()
	{
	    if (Yii::app()->request->isPostRequest)
		{
			Posts::model()->updateByPk($_POST['id'], array('status_id'=>POST_STATE_TRASH));//移至回收站
			if(isset(Yii::app()->request->isAjaxRequest)) {
				echo CJSON::encode(array('success' => true));die();
			} 
			else
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	
	public function actionDraft()
	{
		$model=new Posts('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Posts']))
			$model->attributes=$_GET['Posts'];
		
		$model->status_id = POST_STATE_DRAFT;  //草稿
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionTrash()
	{
		$model=new Posts('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Posts']))
			$model->attributes=$_GET['Posts'];
		
		$model->status_id = POST_STATE_TRASH;  //回收站
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
}
