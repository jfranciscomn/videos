<?php
$this->pageCaption='Actualizar VideosPorProyecto '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Videos Por Proyecto'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Videos Por Proyecto', 'url'=>array('index')),
	array('label'=>'Crear VideosPorProyecto', 'url'=>array('create')),
	array('label'=>'Ver VideosPorProyecto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Videos Por Proyecto', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>