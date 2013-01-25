<?php $this->beginContent('//layouts/main'); ?>
<!-- <div class="span-5 last well">
	<div id="sidebar">
	<?php $this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list', // '', 'tabs', 'pills' (or 'list')
		'items'=>$this->menu,
	)); ?>
	</div>sidebar
</div> -->
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<?php $this->endContent(); ?>