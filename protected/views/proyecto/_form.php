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

	<div class="<?php echo $form->fieldClass($model, 'nombre'); ?>">
			<?php echo $form->labelEx($model,'cliente_id'); ?>
			<div class="input">
				<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
				      'model'=>$model, 
				      'attribute'=>'cliente_id', 
				      'sourceUrl'=>Yii::app()->createUrl('cliente/autocompletesearch'), 
				      'showFKField'=>false,
				      'relName'=>'cliente', // the relation name defined above
				      'displayAttr'=>'nombre_empresa',  // attribute or pseudo-attribute to display
			      
				      'options'=>array(
				          'minLength'=>1, 
				      ),
				 )); ?>
			</div>
			<?php echo $form->error($model,'cliente_id'); ?>
	</div>
	

	<div class="<?php echo $form->fieldClass($model, 'estatus_id'); ?>">
		<?php echo $form->labelEx($model,'estatus_id'); ?>
		<div class="input">
			<?php echo $form->dropDownList($model,'estatus_id',CHtml::listData(Estatus::model()->findAll(), 'id', 'nombre')); ?>
			<?php echo $form->error($model,'estatus_id'); ?>
		</div>
	</div>
	
	<div class="<?php echo $form->fieldClass($model, 'videos'); ?>">
	    <?php echo $form->labelEx($model,'videos'); ?>
		<div class="input">
	    	<?php $this->widget('ext.tokeninput.TokenInput', array(
		        'model' => $model,
		        'attribute' => 'videos',
				
		        //'url' => array('videos/search'),
				'url'=>$this->createUrl('video/search'),
		        'options' => array(
					'prePopulate' => CHtml::listData(VideosPorProyecto::model()->findAll('proyecto_id=:proyecto_id and estatus_id=:estatus_id',
						array(':proyecto_id'=>$model->id,':estatus_id'=>1)), 'video.id', 'video.nombre'),
		        //    'allowCreation' => true,
		            'preventDuplicates' => true,
		          // 'resultsFormatter' => 'js:function(item){ return “<li><p>” + item.name + “</p></li>” }',
		        //    'theme' => 'facebook',
		        )
		    )); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->