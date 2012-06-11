<?php
	$cs = Yii::app()->getClientScript();
	$baseUrl=Yii::app()->baseUrl;
	$cs->registerCssFile($baseUrl.'css/video-js.css');
	$cs->registerScriptFile($baseUrl.'js/video.js');
?>

<table class="table table-bordered table-striped">
	<tr style="vertical-align:middle">
		<td class='span2'>
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_id')); ?></b>
		</td>
	</tr>
