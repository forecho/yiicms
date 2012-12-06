<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'欢迎使用ForEcho',
)); ?>
 
	<div id="notice">
		<ul>
			<li><strong>注意事项：</strong></li>
			<li>1、当您退出管理状态时，建议您点击“退出管理”；</li>
			<li>2、在公共场合上网，登录管理页面，退出后请关闭所有窗口；</li>
			<li>3、为了您的个人使用安全，请经常更改密码；</li>
		</ul>
	</div>
 <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Learn more',
    )); ?></p>
 
<?php $this->endWidget(); ?>