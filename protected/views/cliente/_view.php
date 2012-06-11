	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre_empresa); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre_contacto); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->telefono); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->email); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->usuario->usuario); ?>
		</td>
	</tr>