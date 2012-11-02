<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div id="notice">
	<ul>
	    
	    <li><strong>注意事项：</strong></li>
	
		<li>1、当您退出管理状态时，建议您点击“退出管理”；</li>
	
		<li>2、在公共场合上网，登录管理页面，退出后请关闭所有窗口；</li>
	
		<li>3、为了您的个人使用安全，请经常更改密码；</li>
	</ul>
	<ul>
		<li><strong>系统信息：</strong></li>
	    <li>※ PHP程式版本：<?PHP echo PHP_VERSION; ?></li>
	    <li>※ ZEND版本：<?PHP echo zend_version(); ?></li>
	    <li>※ 服务器操作系统：<?PHP echo PHP_OS; ?></li>
	    <li>※ 服务器端信息：<?PHP echo $_SERVER['SERVER_SOFTWARE']; ?></li>
	    <li>※ 最大上传限制：<?PHP echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件"; ?></li>	
	    <li>※ 最大执行时间：<?PHP echo get_cfg_var("max_execution_time")."秒"; ?></li>
	    <li>※ 运行占用最大内存：<?PHP echo get_cfg_var("memory_limit")?get_cfg_var("memory_limit"):"无" ?></li>							
	</ul>
</div>