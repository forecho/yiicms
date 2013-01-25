<?php
	Yii::app()->clientScript->registerCssFile('./editor/themes/default/default.css');
?>
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'post-form',
	//'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textFieldRow($model,'title',array('class'=>'span6','maxlength'=>200)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->dropDownListRow($model,'type_id', Category::model()->getAllCategoryName()); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($model,'create_time', array('value'=>date("Y-m-d H:i:s"))); ?>
	</div>
	
	<div class="row">
		<?php echo $form->textAreaRow($model,'content',array('style'=>'width:90%; height:500px')); ?>
		<?php // echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($model,'keywords',array('class'=>'span6','maxlength'=>200)); ?> 
		<p class="hint ml90">关键词之间使用英文半角逗号(,)分隔</p>
	</div>
	
	<div class="row">
		<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	</div> 
	
	<div class="row">
		<?php echo $form->textFieldRow($model,'author_name',array('size'=>10,'maxlength'=>10,'value'=>Yii::app()->user->name)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->dropDownListRow($model,'status_id', Posts::stateLabels()); ?>
	</div>
	
	<div class="row">
		<?php echo $form->textFieldRow($model,'order_id', array('value'=>'0')); ?>
	</div>

	<div class="row buttons form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit', 
			'type'=>'primary', 
			'label'=>$model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script charset="utf-8" src="./editor/kindeditor.js"></script>
<script type="text/javascript">
KindEditor.ready(function(K) {    
    editor = K.create('#Posts_content', {
        allowFileManager: true,
        resizeType: 1,
        newlineTag: 'p',
        //syncType: '',
        // uploadJson: '<?php echo $this->createUrl('news/upload') ?>'
    });
});
</script>