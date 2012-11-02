<?php
$this->breadcrumbs=array(
	'文章管理',
);

$this->menu=array(
	array('label'=>'添加文章', 'url'=>array('create')),
	array('label'=>'文章管理', 'url'=>array('admin')),
);
?>

<h1>文章列表</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
