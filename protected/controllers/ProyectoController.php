<?php

class ProyectoController extends Controller
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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>Usuario::model()->getSuperUsers(),
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
		$model=new Proyecto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//print_r($_POST);
		if(isset($_POST['Proyecto']))
		{
			$model->attributes=$_POST['Proyecto'];
			if($model->save())
			{
				$videos=explode(',',$_POST['Proyecto']['videos']);
				
				foreach($videos as $video)
				{
					$videoproyecto = new VideosPorProyecto;
					$videoproyecto->video_id=$video;
					$videoproyecto->proyecto_id=$model->id;
					$videoproyecto->estatus_id=$model->estatus_id;
					$videoproyecto->save();
				}
				
				$this->redirect(array('view','id'=>$model->id));
			}
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

		if(isset($_POST['Proyecto']))
		{
			$model->attributes=$_POST['Proyecto'];
			if($model->save()){
				$videos=explode(',',$_POST['Proyecto']['videos']);
				
				$cursor = VideosPorProyecto::model()->findAll('proyecto_id=:proyecto_id',array(':proyecto_id'=>$model->id));
				foreach($cursor as $videoaeliminar)
				{
					$estatus = Estatus::model()->find('nombre=:nombre',array(':nombre'=>'Inactivo'));
					$videoaeliminar->estatus_id=$estatus->id;
					$videoaeliminar->save();
				}
				foreach($videos as $video)
				{
					$videoproyecto = new VideosPorProyecto;
					$videoproyecto->video_id=$video;
					$videoproyecto->proyecto_id=$model->id;
					$videoproyecto->estatus_id=$model->estatus_id;
					$videoviejo= VideosPorProyecto::model()->find('proyecto_id=:proyecto_id and video_id=:video_id',array(':proyecto_id'=>$model->id,':video_id'=>$video));
					if(isset($videoviejo))
					{
						$videoviejo->estatus_id=$model->estatus_id;
						$videoviejo->save();
					}	
					else
					{
						$videoproyecto->save();
					}
				}
				
				$this->redirect(array('view','id'=>$model->id));
			}
				
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
		$dataProvider=new CActiveDataProvider('Proyecto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Proyecto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Proyecto']))
			$model->attributes=$_GET['Proyecto'];

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
		$model=Proyecto::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='proyecto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
