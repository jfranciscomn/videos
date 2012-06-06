	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->password); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->tipousuario_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus_id); ?>
		</td>
	</tr>