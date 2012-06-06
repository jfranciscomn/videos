<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'proyecto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>90)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'cliente_id'); ?>">
		<?php echo $form->labelEx($model,'cliente_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cliente_id'); ?>
			<?php echo $form->error($model,'cliente_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'imagen'); ?>">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<div class="input">
			<?php echo $form->textField($model,'imagen',array('size'=>60,'maxlength'=>182)); ?>
			<?php echo $form->error($model,'imagen'); ?>
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