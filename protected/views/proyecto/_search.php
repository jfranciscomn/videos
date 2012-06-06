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
		<?php echo $form->label($model,'nombre'); ?>
		<div class="input">
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>90)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'cliente_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'cliente_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'imagen'); ?>
		<div class="input">
			<?php echo $form->textField($model,'imagen',array('size'=>60,'maxlength'=>182)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'estatus_id'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->