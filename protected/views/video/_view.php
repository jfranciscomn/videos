	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<video id="example_video_1" class="video-js vjs-default-skin" controls preload="auto" width="350" height="264" poster="" data-setup=''>  
				<source src="../../../videos/recursos/<?php echo CHtml::encode($data->url); ?>" type='video/mp4' />  
				<source src="../../../videos/recursos/<?php echo CHtml::encode($data->url); ?>" type='video/ogg' />
				<source src="../../../videos/recursos/<?php echo CHtml::encode($data->url); ?>" type='video/webm' /> 
			</video>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>