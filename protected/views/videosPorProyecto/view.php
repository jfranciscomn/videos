<?php
$this->pageCaption='Ver VideosPorProyecto #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Videos Por Proyecto'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Videos Por Proyecto', 'url'=>array('index')),
	array('label'=>'Crear VideosPorProyecto', 'url'=>array('create')),
	array('label'=>'Actualizar VideosPorProyecto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar VideosPorProyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Videos Por Proyecto', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'proyecto_id',
		'video_id',
		array(
			'name'=>'estatus_id',
			'value'=>$model->estatus->nombre,
			),
	),
)); ?>
