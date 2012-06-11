<?php
$this->pageCaption='Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar proyecto';
$this->breadcrumbs=array(
	'Proyecto',
);

$this->menu=array(
	array('label'=>'Crear Proyecto', 'url'=>array('create')),
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
