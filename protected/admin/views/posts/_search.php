<div class="wide form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'inlineForm',
	'type'=>'inline',
    'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id', array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>200)); ?>
	<?php echo $form->textFieldRow($model,'author_name',array('size'=>10,'maxlength'=>10)); ?>
	<?php echo $form->textFieldRow($model,'type_id',array('size'=>10,'maxlength'=>200)); ?>
	<?php echo $form->textFieldRow($model,'create_time',array('size'=>10,'maxlength'=>200)); ?>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('admin', 'Search'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->