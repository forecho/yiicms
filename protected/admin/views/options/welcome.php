<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Welcome'),
);?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>CHtml::encode(Yii::app()->name),
)); ?>
 
	<div id="notice">
		<p><?php echo date('Y-m-d H:i:s');?></p>
		<p>
			<?php echo Yii::t('admin', 'View All Posts', array('{count}'=>$postCount));?>
			<a class="btn btn-primary btn-small" href=""><?php echo Yii::t('admin','View');?></a>
		</p>
		
	</div>
 
<?php $this->endWidget(); ?>