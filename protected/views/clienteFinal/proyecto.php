<?php
$this->pageCaption='Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Proyecto';
$this->breadcrumbs=array(
	'Proyecto', $proyecto->nombre
);

$this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$videos,
	'headersview' =>'_headersviewproyecto',
	'footersview' => '_footersview',
	'itemView'=>'_viewproyecto',
)); ?>
