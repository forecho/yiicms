<div id="login">
	<?php
	$this->pageTitle=Yii::app()->name . ' - Login';
	$this->breadcrumbs=array(
		'Login',
	);
	?>

	<h1><a title="基于 ForEcho" href="http://www.forecho.com/">ForEcho</a></h1>
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="row">
			<div class="left rememberMe"style="margin-top: 6px;" >
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>

			<div class="left buttons" style="margin-left: 30px;" >
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'size'=>'small',
					'type'=>'primary',
					'label'=>Yii::t('admin', 'Login'),
					'loadingText'=>'Login...',
					'htmlOptions'=>array('id'=>'buttonStateful'),
				)); ?>
			</div>
			
		</div>

		

	<?php $this->endWidget(); ?>
	</div><!-- form -->

	<div class="row" style="margin-left: 8px; padding-top: 10px;">
		 <p id="backtoblog"><?php //echo CHtml::link('← 回到 '.Yii::app()->name, $this->settings->site_url, array('title'=>'不知道自己在哪？')) ?></p>
	</div>
</div>