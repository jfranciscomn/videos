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
				'actions'=>array('index','proyecto','bloquearVideo','iniciarVideo'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	function test_array_walkr( &$item, $key )
	   	{
	        // do what you want to do here - in this example we will 
	        // check to see if $item is an array. If it is, we will 
	        // check to see if the key '.hide' exists. If this exists, 
	        // we will set the entire array to NULL;
	        if( is_array($item) && array_key_exists('.hide', $item) )
	        {
	            $item = NULL;
	        }

	        // this is the code that causes the recursive effect
	        // we do this after, to allow for any changes to $item
	        // to be included in the next recursive call...
	        if( is_array($item) )
	        {
	            array_walk($item, __FUNCTION__);
	        }
	    }
	
	public function actionIniciarVideo($id)
	{
		$videoporproyecto = VideosPorProyecto::model()->find('id=:id',array(':id'=>$id));
		$estatus = Estatus::model()->find('nombre=:nombre',array(':nombre'=>'Activo'));
		$urlvideo="";
		
		if($videoporproyecto->proyecto->cliente->usuario->usuario==Yii::app()->user->name
			&& $videoporproyecto->estatus_id==$estatus->id)
		{
			$urlvideo=Yii::app()->baseUrl .'/recursos/'.$videoporproyecto->video->url;	
			
		}
		$xml = new SimpleXMLElement('<video_info/>');
		$xml->addChild("url",$urlvideo);
		
		header('Content-type: application/xml');
		echo $xml->asXML();
	    Yii::app()->end();

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