<?php
$this->pageCaption='Proyectos';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Proyectos';
$this->breadcrumbs=array(
	'Proyectos',
);

$this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$proyectos,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
