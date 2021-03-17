<?php

class QuarterlyFinancialReportController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','updatenextyearappropriation','updateappropriation','updateallotment','updateobligation','updateremarks'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionUpdatenextyearappropriation($id)
	{
		$model=QuarterlyFinancialReport::model()->findByPk($id);
		$model->next_year_appropriation=$_POST['next_year_appropriation'];
		$model->save();
	}

	public function actionUpdateremarks($id)
	{
		$model=QuarterlyFinancialReport::model()->findByPk($id);
		$model->remarks=$_POST['remarks'];
		$model->save();
	}
	
	public function actionUpdateappropriation($id)
	{
		$model=QuarterlyFinancialReport::model()->findByPk($id);
		$model->continuing_appropriation=$_POST['continuing_appropriation'];
		$model->current_appropriation=$_POST['current_appropriation'];
		$model->total_appropriation=$_POST['total_appropriation'];
		$model->balance_of_appropriation=$_POST['balance_of_appropriation'];
		$model->save();
		
	}

	public function actionUpdateallotment($id)
	{
		$model=QuarterlyFinancialReport::model()->findByPk($id);
		$model->previous_quarter_allotment_released=$_POST['previous_quarter_allotment_released'];
		$model->this_quarter_allotment_released=$_POST['this_quarter_allotment_released'];
		$model->total_allotment_released=$_POST['total_allotment_released'];
		$model->balance_of_appropriation=$_POST['balance_of_appropriation'];
		$model->unobligated_allotment=$_POST['unobligated_allotment'];
		$model->save();
	}
	
	public function actionUpdateobligation($id)
	{
		$model=QuarterlyFinancialReport::model()->findByPk($id);
		$model->previous_quarter_obligation_incurred=$_POST['previous_quarter_obligation_incurred'];
		$model->this_quarter_obligation_incurred=$_POST['this_quarter_obligation_incurred'];
		$model->total_obligation_incurred=$_POST['total_obligation_incurred'];
		$model->unobligated_allotment=$_POST['unobligated_allotment'];
		$model->save();
	}
	
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
		$model=new QuarterlyFinancialReport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QuarterlyFinancialReport']))
		{
			$model->attributes=$_POST['QuarterlyFinancialReport'];
			if($model->save())
				$this->redirect(array('/site/index','id'=>$model->id));
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

		if(isset($_POST['QuarterlyFinancialReport']))
		{
			$model->attributes=$_POST['QuarterlyFinancialReport'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('QuarterlyFinancialReport');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new QuarterlyFinancialReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QuarterlyFinancialReport']))
			$model->attributes=$_GET['QuarterlyFinancialReport'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QuarterlyFinancialReport the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QuarterlyFinancialReport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QuarterlyFinancialReport $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='quarterly-financial-report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
