<?php

class SiteController extends Controller
{
	
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
	public $layout='//layouts/login';
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  //未登录用户允许操作的action
					'actions'=>array('login','logout','register'),
					'users'=>array('*'),
			),
			array('allow',   //登录用户允许操作全部action
					'users'=>array('@')
			),
			array('deny',  // allow all users to perform 'index' and 'view' actions
					'users'=>array('*'),
			),
	   );
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}



	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	//切换语言
	// public function init()
	// {
		// if(isset($_GET['lang']) && $_GET['lang'] != "")
		// {
			// Yii::app()->language = $_GET['lang'];
			// Yii::app()->request->cookies['lang'] = new CHttpCookie('lang', $_GET['lang']);
		// }
		// else if(!empty(Yii::app()->request->cookies['lang']))
		// {
			// Yii::app()->language = Yii::app()->request->cookies['lang'];
		// }
		// else
		// {
			// $lang = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
			// Yii::app()->language = strtolower(str_replace('-', '_', $lang[0]));
		// }
	// }
	
	
}