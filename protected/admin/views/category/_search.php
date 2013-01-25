<div class="wide form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'inlineForm',
	'type'=>'inline',
    'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textFieldRow($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textFieldRow($model,'name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pid'); ?>
		<?php echo $form->textFieldRow($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'path'); ?>
		<?php echo $form->textFieldRow($model,'path',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textFieldRow($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->