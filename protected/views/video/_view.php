	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td class="">
			<div id='outerdiv' style="width:400px; height:300px; overflow-x:hidden;">
				<iframe src="http://player.vimeo.com/video/43557443?color=cecece&api=1" 
				width="400" 
				height="300" 
				frameborder="0" 
				webkitAllowFullScreen 
				mozallowfullscreen 
				allowFullScreen>
				</iframe>
			</div>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus->nombre); ?>
		</td>
	</tr>
	