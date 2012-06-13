<tr>
	<td>
		<?php 
			$nombre="video".$data->video->id; 
		
		?>
		<h3> <?php echo $data->video->nombre;?></h3>
		<video id= <?php echo '"'.$nombre.'"'; ?> class="video-js vjs-default-skin" controls width="640" height="264"  preload="auto">
		  <source type="video/mp4" src="">
		</video>
		<script type="text/javascript">

		  var myPlayer<?php echo $data->video->id;?> = _V_(<?php echo '"'.$nombre.'"'; ?>);

		  var ban<?php echo $data->video->id;?> = 1;
		  var iniciar<?php echo $data->video->id;?> =function()
		  {
				var myPlayer = this;
				var url=<?php echo '"'. $this->createUrl('iniciarVideo',array('id'=>$data->id)) .'"'; ?> ;
				var	xmlHttp = new XMLHttpRequest(); 
				xmlHttp.open( "GET", url, false );
		    	xmlHttp.send( null );
				var xmlDoc=xmlHttp.responseXML;
				var x= xmlDoc.getElementsByTagName("video_info");
				var urlVideo = x[0].getElementsByTagName("url")[0].childNodes[0].nodeValue;
				myPlayer.src([
			      	{ type: "video/mp4", src: urlVideo }
			    ]);
		  };
			
		/*	var pauseFunc<?php echo $data->video->id;?> = function(){
				var myPlayer = this;
				var howLongIsThis = myPlayer.duration();
				var whereYouAt = myPlayer.currentTime();
			//	alert(howLongIsThis/2);
				if(ban<?php echo $data->video->id;?>==1 && howLongIsThis>0 && whereYouAt>(howLongIsThis/2)){
					alert("ya entre");
					var url=<?php echo '"'. $this->createUrl('bloquearVideo',array('id'=>$data->id)) .'"'; ?> ;
					var	xmlHttp = new XMLHttpRequest(); 
			    	xmlHttp.open( "GET", url, true );
			    	xmlHttp.send( null );
					xmlHttp.responce;
				
					myPlayer.src([
					      { type: "video/mp4", src: "" }
					    ]);
					ban<?php echo $data->video->id;?>=0;
				}
		    };*/
				
		
		 	var bloquearFunc<?php echo $data->video->id;?> = function(){
				var myPlayer = this;
				var url=<?php echo '"'. $this->createUrl('bloquearVideo',array('id'=>$data->id)) .'"'; ?> ;
				var	xmlHttp = new XMLHttpRequest(); 
		    	xmlHttp.open( "GET", url, true );
		    	xmlHttp.send( null );
				xmlHttp.responce;
				
				myPlayer.src([
				      { type: "video/mp4", src: "" }
				    ]);
		    };
			myPlayer<?php echo $data->video->id;?> .ready( iniciar<?php echo $data->video->id;?> );
		    myPlayer<?php echo $data->video->id;?> .addEvent("ended", bloquearFunc<?php echo $data->video->id;?> );
			//myPlayer<?php echo $data->video->id;?> .addEvent("timeupdate", pauseFunc<?php echo $data->video->id;?> );
		
		</script>
	</td>
</tr>