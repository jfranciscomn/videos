<?php
$this->pageCaption='Create VideosPorProyecto';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo videosporproyecto';
$this->breadcrumbs=array(
	'Videos Por Proyecto'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Videos Por Proyecto', 'url'=>array('index')),
	array('label'=>'Administrar Videos Por Proyecto', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>