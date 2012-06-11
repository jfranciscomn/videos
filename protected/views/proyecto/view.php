<?php
$this->pageCaption='Ver Proyecto #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Proyecto'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Proyecto', 'url'=>array('index')),
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Actualizar Proyecto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proyecto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
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
		array(
			'name'=>'cliente_id',
			'value'=>$model->cliente->nombre_empresa,
			),
		array(
			'name'=>'estatus_id',
			'value'=>$model->estatus->nombre,
			),
	),
)); ?>
