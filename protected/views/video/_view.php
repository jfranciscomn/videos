	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<video width="320" height="250" controls="controls">
			  <source src="../../../videos/recursos/<?php echo CHtml::encode($data->url); ?>" type="video/mp4" />			  
			</video>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>