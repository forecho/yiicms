<?php
$this->breadcrumbs=array(
	'文章列表'=>array('index'),
	'文章管理',
);

$this->menu=array(
	array('label'=>'文章列表', 'url'=>array('index')),
	array('label'=>'添加文章', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('posts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>文章管理</h1>

<p>
你还可以输入比较运算符 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>)开始您的搜索值来指定如何应做的比较。
</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'posts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'author_name',
		'posts_content',
		'posts_title',
		'type_id',
		'status_id',
		/*
		'create_time',
		'update_time',
		'order_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
