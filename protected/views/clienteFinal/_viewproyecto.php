<tr>
	<td>
		<?php 
			$nombre="video".$data->video->id; 
			$urlvideo = Yii::app()->baseUrl .'/recursos/'. $data->video->url;
		?>
		<video id= <?php echo '"'.$nombre.'"'; ?> class="video-js vjs-default-skin" controls width="640" height="264"  preload="auto">
		  <source type="video/mp4" src=<?php echo '"'.$urlvideo.'"'; ?>>
		</video>
		<script>

		  var myPlayer = _V_(<?php echo '"'.$nombre.'"'; ?>);
		  var activo = <?php echo strcmp($data->estatus->nombre,"Activo"); ?>;
			if(activo!=0)
			myPlayer.src([
			      { type: "video/mp4", src: "" }
			    ]);
		 	var bloquearFunc = function(){
				var myPlayer = this;
				var url=<?php echo '"'. $this->createUrl('bloquearVideo',array('id'=>$data->id)) .'"'; ?> ;
				var	xmlHttp = new XMLHttpRequest(); 
		    	xmlHttp.open( "GET", url, true );
		    	xmlHttp.send( null );
				activo = 2;
				myPlayer.src([
				      { type: "video/mp4", src: "" }
				    ]);
		    };
		    myPlayer.addEvent("ended", bloquearFunc);
		
		</script>
	</td>
</tr>