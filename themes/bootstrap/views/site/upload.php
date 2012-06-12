<div class="yiiForm">
<?php echo CHtml::form('', 'post', array('enctype'=>'multipart/form-data')); ?>
 
<?php echo CHtml::errorSummary($form); ?>
 
<div class="simple">
<?php echo CHtml::activeLabel($form,'videos'); ?>
<?php echo CHtml::activeFileField($form, 'video'); ?>
<br/>
<?php echo CHtml::submitButton('Subir'); ?>
</div>
 
<?php echo CHtml::endForm(); ?>
 
</div>