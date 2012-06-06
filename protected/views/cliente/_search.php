<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'nombre_empresa'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nombre_empresa',array('size'=>60,'maxlength'=>180)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'nombre_contacto'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nombre_contacto',array('size'=>60,'maxlength'=>90)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'telefono'); ?>
		<div class="input">
			<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'email'); ?>
		<div class="input">
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>90)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'usuario_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'usuario_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->