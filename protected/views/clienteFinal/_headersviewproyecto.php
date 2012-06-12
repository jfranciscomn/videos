<?php
	$cs = Yii::app()->getClientScript();
	$baseUrl=Yii::app()->baseUrl;
	$cs->registerCssFile($baseUrl.'/css/video-js.css');
	$cs->registerScriptFile($baseUrl.'/js/video.js');
?>
<table class="table table-bordered table-striped">