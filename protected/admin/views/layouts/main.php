<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin-style.css" />
</head>

<body>

<div class="container" id="page">

	<div id="mainmenu">
	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		'type'=>'null', // null or 'inverse'
		'brand'=> Yii::t('admin', 'Dashboard'),
		'brandUrl'=>array('options/welcome'),
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
			array(
				'class'=>'bootstrap.widgets.TbMenu',
				'items'=>array(
					array('label'=>Yii::t('admin', 'Posts'), 'url'=>'#', 'items'=>array(
						array('label'=>Yii::t('admin', 'All Posts'), 'url'=> array('posts/admin'),'itemOptions'=>array('activeCssClass'=>'active')),
						array('label'=>Yii::t('admin', 'Create Post'), 'url'=> array('posts/create')),
						'---',
						array('label'=>Yii::t('admin', 'Draft'), 'url'=> array('posts/draft')),
						array('label'=>Yii::t('admin', 'Trash'), 'url'=> array('posts/trash')),
					)),
					array('label'=>Yii::t('admin', 'Categories'), 'url'=>'#', 'items'=>array(
						array('label'=>Yii::t('admin', 'All Categories'), 'url'=> array('category/admin')),
						array('label'=>Yii::t('admin', 'Create Category'), 'url'=> array('category/create')),
					)),
					array('label'=>Yii::t('admin', 'Links'), 'url'=>'#', 'items'=>array(
						array('label'=>Yii::t('admin', 'All Links'), 'url'=>'#'),
						array('label'=>Yii::t('admin', 'Create Link'), 'url'=>'#'),
					)),
					array('label'=>Yii::t('admin', 'Tools'), 'url'=>'#'),
					array('label'=>Yii::t('admin', 'Settings'), 'url'=>'#', 'items'=>array(
						array('label'=>Yii::t('admin', 'General Settings'), 'url'=>'#'),
						'---',
						array('label'=>Yii::t('admin', 'Custom Parameters')),
						array('label'=>Yii::t('admin', 'Custom Parameters'), 'url'=>'#'),
						array('label'=>Yii::t('admin', 'Create Custom Parameters'), 'url'=>'#'),
					)),
				),
			),
			
			array(
				'class'=>'bootstrap.widgets.TbMenu',
				'htmlOptions'=>array('class'=>'pull-right'),
				'items'=>array(
					array('label'=>Yii::app()->user->name, 'url'=>'#', 'items'=>array(
						array('label'=>Yii::t('admin', 'Edit Password'), 'url'=> array('user/update&id=1')),
						'---',
						array('label'=>Yii::t('admin', 'Logout'), 'url'=> array('/site/logout')),
					)),
					'---',
					array('label'=>Yii::t('admin', 'Visit Site'), 'url'=>'/'),
				),
			),
		),
	)); ?>
	</div>
	<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    			'links'=>$this->breadcrumbs,
			)); 
		?><!-- breadcrumbs -->
	<?php endif?>
	
	<div class="row">
		<?php echo $content; ?>
	</div>
	
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://www.forecho.com" target="_blank">ForEcho</a>. All Rights Reserved.<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php 
	// echo Yii::t( 'admin', 'Management Center');
	// echo CHtml::link('中文', Yii::app()->createUrl('/', array('lang' => 'zh_cn')));
	// echo CHtml::link('English', Yii::app()->createUrl('/', array('lang' => 'en_us')));
?>
</body>
</html>
