<?php

class ClienteController extends Controller
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
				'actions'=>array('create','update','autocompletesearch'),
				'users'=>array('@'),
			),*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','autocompletesearch','admin','delete'),
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
		$model=new Cliente;
		$usuario=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cliente']) && isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Cliente'];
			$usuario->attributes=$_POST['Usuario'];
			
			$estatus = Estatus::model()->find('nombre=:nombre',array(':nombre'=>'Activo'));
			$tipoUsuario = TipoUsuario::model()->find('nombre=:nombre',array(':nombre'=>'Cliente'));
			$usuario->estatus_id = $estatus->id;
			$usuario->tipousuario_id = $tipoUsuario->id;
			if($usuario->save())
			{
				$model->usuario_id=$usuario->id;
				if($model->save() )
					$this->redirect(array('view','id'=>$model->id));
				else
					$usuario->delete();
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'usuario'=>$usuario,
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
		$usuario = Usuario::model()->findByPk((int)$model->usuario_id);
		$usuario2 =Usuario::model()->findByPk((int)$model->usuario_id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cliente']) && isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Cliente'];
			$usuario->attributes=$_POST['Usuario'];
			if($usuario->save())
			{
				$model->usuario_id=$usuario->id;
				if($model->save() )
					$this->redirect(array('view','id'=>$model->id));
				else
					$usuario2->save();
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'usuario'=>$usuario,
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
		$dataProvider=new CActiveDataProvider('Cliente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];

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
		$model=Cliente::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAutocompletesearch()
	{
		$q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
		//	$criteria->select=array('id', 'nombre');
			$criteria->condition='lower(nombre_empresa) LIKE lower(:nombre_empresa) ';
			$criteria->params=array(':nombre_empresa'=>$q);
			$criteria->limit='10';
			
	        $cursor = Cliente::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre_empresa,  
				                'value' => $valor->nombre_empresa,
				                'id' => $valor->id, );
		}
		echo json_encode($result);
	    Yii::app()->end();
	}
}
