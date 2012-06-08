<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Los campos marcados con <span class="required">*</span> son requeridos.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'usuario'); ?>">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<div class="input">
			<?php echo $form->textField($model,'usuario',array('size'=>60,'maxlength'=>90)); ?>
			<?php echo $form->error($model,'usuario'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="input">
			<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>90)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>


	<div class="<?php echo $form->fieldClass($model, 'tipousuario_id'); ?>">
		<?php echo $form->labelEx($model,'tipousuario_id'); ?>
		<div class="input">
			<?php echo $form->dropDownList($model,'tipousuario_id',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>
			<?php echo $form->error($model,'tipousuario_id'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'estatus_id'); ?>">
		<?php echo $form->labelEx($model,'estatus_id'); ?>
		<div class="input">
			<?php echo $form->dropDownList($model,'estatus_id',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>
			<?php echo $form->error($model,'estatus_id'); ?>
		</div>
	</div>
	
	

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->