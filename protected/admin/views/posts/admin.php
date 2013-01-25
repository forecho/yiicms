<?php
switch (strtolower($this->action->id))
{
	case 'admin':
	  $title = Yii::t('admin', 'Published');
	  break;
	case 'draft':
	  $title = Yii::t('admin', 'Draft');
	  break;
	case 'trash':
	  $title = Yii::t('admin', 'Trash');
	  break;
}

$this->breadcrumbs=array(
	Yii::t('admin', 'Posts')=>array('index'),
	$title,
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'List Post'),'url'=>array('index')),
	array('label'=>Yii::t('admin', 'Create Post'),'url'=>array('create')),
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

<h1><?php echo $title;?></h1>
<div class="btn-toolbar">
	<?php
		if($this->action->id == 'trash')
		{
			$this->widget('bootstrap.widgets.TbButton', array(
				'label'=>Yii::t('admin', 'Restore'),
				'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'small', // null, 'large', 'small' or 'mini'
				'htmlOptions'=>array('onclick'=>'GetCheckbox();'),
			)); 
			
			$this->widget('bootstrap.widgets.TbButton', array(
				'label'=>Yii::t('admin', 'Forever Delete'),
				'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'small', // null, 'large', 'small' or 'mini'
				'htmlOptions'=>array('onclick'=>'GetCheckbox();'),
			)); 
		}
		else
		{
			$this->widget('bootstrap.widgets.TbButton', array(
				'label'=>Yii::t('admin', 'Move to Trash'),
				'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
				'size'=>'small', // null, 'large', 'small' or 'mini'
				'htmlOptions'=>array('onclick'=>'GetCheckbox();'),
			)); 
		}
	?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'id'=>'posts-form',
	'selectableRows' => 2,
	'filter'=>$model,
	'columns'=>array(
		array(
			'selectableRows' => 2,
			//'footer' => '<button type="button" onclick="GetCheckbox();" class="btn btn-danger btn-small">批量删除</button>',
			'class' => 'CCheckBoxColumn',
			'headerHtmlOptions' => array('width'=>'33px'),
			'checkBoxHtmlOptions' => array('name' => 'id[]'),
		),
		'id',
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), array("posts/view","id"=>$data->id))',
		),
		'author_name',
		array(
			'name'=>'type_id',
			'filter'=>Category::model()->getCategoryList(),
			'value'=>'$data->typeName->name',
		),
		'create_time',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>
<script type="text/javascript">
/*<![CDATA[*/
<?php 
if($this->action->id == 'trash')
{
	$url = CHtml::normalizeUrl(array('/posts/delall/'));
}
else
{
	$url = CHtml::normalizeUrl(array('/posts/multiTrash/'));
}
?>
var GetCheckbox = function ()
{
	var data=new Array();
	$("input:checkbox[name='id[]']").each(function ()
	{
		if($(this).attr("checked")=='checked')
		{
			data.push($(this).val());
		}
	});
	if(data.length > 0)
	{
		$.post('<?php echo $url;?>',{'id[]':data}, function (data)
		{
			var ret = $.parseJSON(data);						
			if (ret != null && ret.success != null && ret.success)
			{
				$.fn.yiiGridView.update('posts-form');
			}
		});
	}
	else
	{
		alert("请选择!");
	}
}
/*]]>*/
</script>
