<?php
$this->breadcrumbs=array(
	'文章列表'=>array('index'),
	'添加文章',
);

$this->menu=array(
	array('label'=>'文章列表', 'url'=>array('index')),
	array('label'=>'文章管理', 'url'=>array('admin')),
);
?>

<h1>添加文章</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>