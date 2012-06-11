<?php
$this->pageCaption='Create Cliente';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo cliente';
$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Cliente', 'url'=>array('index')),
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario)); ?>
