<?php
$this->pageCaption='Actualizar Video '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Video'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Video', 'url'=>array('index')),
	array('label'=>'Crear Video', 'url'=>array('create')),
	array('label'=>'Ver Video', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Video', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>