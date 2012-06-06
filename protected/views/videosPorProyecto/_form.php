<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'videos-por-proyecto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'proyecto_id'); ?>">
		<?php echo $form->labelEx($model,'proyecto_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'proyecto_id'); ?>
			<?php echo $form->error($model,'proyecto_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'video_id'); ?>">
		<?php echo $form->labelEx($model,'video_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'video_id'); ?>
			<?php echo $form->error($model,'video_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_id'); ?>">
		<?php echo $form->labelEx($model,'estatus_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'estatus_id'); ?>
			<?php echo $form->error($model,'estatus_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->