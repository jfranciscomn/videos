<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'nombre_empresa'); ?>">
		<?php echo $form->labelEx($model,'nombre_empresa'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nombre_empresa',array('size'=>60,'maxlength'=>180)); ?>
			<?php echo $form->error($model,'nombre_empresa'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'nombre_contacto'); ?>">
		<?php echo $form->labelEx($model,'nombre_contacto'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nombre_contacto',array('size'=>60,'maxlength'=>90)); ?>
			<?php echo $form->error($model,'nombre_contacto'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'telefono'); ?>">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<div class="input">
			<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'email'); ?>">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class="input">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>90)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'usuario_id'); ?>">
		<?php echo $form->labelEx($model,'usuario_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'usuario_id'); ?>
			<?php echo $form->error($model,'usuario_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->