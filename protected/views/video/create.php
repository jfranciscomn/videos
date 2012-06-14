<?php
$this->pageCaption='Create Video';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Crear nuevo video';
$this->breadcrumbs=array(
	'Video'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Video', 'url'=>array('index')),
	array('label'=>'Administrar Video', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'formvid'=>$formvid)); ?>