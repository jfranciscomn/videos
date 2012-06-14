<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/c/video.js"></script>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
						<?php 
						$items=array();
						if(!Yii::app()->user->isGuest && Usuario::model()->isSuperUser(Yii::app()->user->name)){
							$items=array(	
								array('label'=>'Clientes', 'url'=>array('cliente/index')),
								array('label'=>'Proyectos', 'url'=>array('/proyecto/index')),
								array('label'=>'Videos', 'url'=>array('/video/index')),
								array('label'=>'Usuarios', 'url'=>array('/usuario/index')),
								//array('label'=>'Subir Videos', 'url'=>array('/site/upload')),
								//array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							);
						}
						$items[]=array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest);
								
						$this->widget('ext.custom.widgets.BMenu',array(
							'items'=>$items,
							 'activateParents'=>true,
							'activeCssClass'=>'',
							'htmlOptions'=>array(
								'class'=>'nav nav-pills',
							),
						)); ?>
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>Yii::app()->user->name, 'url'=>array('site/profile'), 'visible'=>!Yii::app()->user->isGuest),
							array(
								'label'=>'Cerrar Sesión', 
								'url'=>array('/site/logout'), 
								'visible'=>!Yii::app()->user->isGuest, 
								'htmlOptions'=>array('class'=>'btn'))
						),
						'htmlOptions'=>array(
							'class'=>'nav pull-right',
						),
					)); ?>
			</div>
		</div>
	</div>
	
	<div class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('BBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>' / ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>
	
	<?php echo $content; ?>
	
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; <?php echo date('Y'); ?> by Constructora Ricma.<br/>
			Todos los derechos reservados.<br/>
			<?php echo 'Powered by Cidesoft' ?></p>
		</div>
	</footer>
</body>
</html>