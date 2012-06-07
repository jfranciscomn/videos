<?php
$this->pageCaption='Video';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Listar video';
$this->breadcrumbs=array(
	'Video',
);


        $ui = new EOAuthUserIdentity(array());
 
        if (!$ui->authenticate()) {
			throw new CHttpException(401, $ui->error);
		} 
    
 
 
 
    

$this->menu=array(
	array('label'=>'Crear Video', 'url'=>array('create')),
	array('label'=>'Administrar Video', 'url'=>array('admin')),
);
?>

<?php $this->widget('ext.custom.widgets.CCustomListView', array(
	'dataProvider'=>$dataProvider,
	'headersview' =>'_headersview',
	'footersview' => '_footersview',
	'itemView'=>'_view',
)); ?>
