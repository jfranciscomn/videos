<?php

class ClienteFinalController extends Controller
{
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','proyecto','bloquearVideo'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionBloquearVideo($id)
	{
		$videoporproyecto = VideosPorProyecto::model()->find('id=:id',array(':id'=>$id));
		$estatus = Estatus::model()->find('nombre=:nombre',array(':nombre'=>'Inactivo'));
		$videoporproyecto->estatus_id=$estatus->id;
	//	print_r($estatus->attributes);
	//	print_r($videoporproyecto->attributes);
		return $videoporproyecto->save();
		//$this->redirect(Yii::app()->user->returnUrl);
	}
	
	public function actionProyecto($id)
	{
		//$videosporproyecto = VideosPorProyecto::model()->findAll('proyecto_id=:proyecto_id',array(':proyecto_id'=>$id));
		$proyecto = Proyecto::model()->find('id=:id',array(':id'=>$id));
		
		
		$videosporproyecto = new CActiveDataProvider('VideosPorProyecto', array(
			    'criteria'=>array(
			        'condition'=>'proyecto_id='.$id,
			    ),
			    'pagination'=>array(
			        'pageSize'=>2,
			    ),
			));
		$this->render('proyecto',array('videos'=>$videosporproyecto, 'proyecto'=>$proyecto));
	}
	
	public function actionIndex()
	{
		$usuario = Usuario::model()->find('usuario=:usuario',array(':usuario'=>Yii::app()->user->name));
		$proyectos = new CActiveDataProvider('Proyecto', array(
		    'criteria'=>array(
		        'condition'=>'cliente_id='.$usuario->cliente->id,
		    ),
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
		$this->render('index',array(
			'proyectos'=>$proyectos,
		));
	}
}