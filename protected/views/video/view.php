<?php
$this->pageCaption='Ver Video #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Video'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Video', 'url'=>array('index')),
	array('label'=>'Crear Video', 'url'=>array('create')),
	array('label'=>'Actualizar Video', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Video', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Video', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'nombre',
		'url',
		'estatus.nombre',
	),
)); ?>
