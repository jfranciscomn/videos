<table class="table table-bordered table-striped">
	<tr>
		<td class='span2'>
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?></b>
		</td>
		<?php /*
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?></b>
		</td>*/
		?>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('tipousuario_id')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_id')); ?></b>
		</td>
	</tr>
