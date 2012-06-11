<?php
$this->pageCaption='Crear Proyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo proyecto';
$this->breadcrumbs=array(
	'Proyecto'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Proyecto', 'url'=>array('index')),
	array('label'=>'Administrar Proyecto', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
