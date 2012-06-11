<?php
$this->pageCaption='Videos Por Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar videos por proyecto';
$this->breadcrumbs=array(
	'Videos Por Proyecto',
);

$this->menu=array(
	array('label'=>'Crear VideosPorProyecto', 'url'=>array('create')),
	array('label'=>'Administrar VideosPorProyecto', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
