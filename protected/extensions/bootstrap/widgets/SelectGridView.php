<?php

Yii::import('bootstrap.widgets.TbGridView');
/**
 * <pre>
 * $this->widget('SelectGridView', array(
 *     'footer'=>array(
 *         'template'=>'{delete}',
 *         'checkboxName'=>'id', //checkbox的名称
 *         'buttons'=>array(
 *             'delete'=>array(
 *                 'label', //显示名称
 *                 'url', //ajax的url
 *                 'checkboxName', //checkbox的名称，不设置，该值为第一个checkboxName的值。设置后，覆盖第一个的值。
 *                 'params'=>array('p1'=>'v1', 'p2'=>'js:$("#").val();'), //传递的参数，已js:开头为js代码
 *                 'emptyConfirm'=>'您还没有选择！', //没有选择checkbox时的提示，默认为"您还没有选择！"
 *                 'confirm'=>'确定要删除选择的数据吗？', //confirm
 *                 'afterDone', //ajax成功后执行的方法
 *                 'bindClick', //是否绑定事件，只有设置为false时不绑定事件。
 *                 'icon', //按钮中的图标样式
 *                 'html', //其它的html内容
 *                 'options'=>array(), //其它选项
 *                 'class', //组件的类
 *                 'config', //组件的配置参数
 *             ),
 *         ),
 *     ),
 * ));
 * </pre>
 * 扩展CGridView
 * @author Administrator
 *
 */
class SelectGridView extends TbGridView
{

	/**
	 * 新增footer属性
	 */
	public $footer;
	
	/**
	 * 模板
	 */
	private $_fTemplate;
	
	/**
	 * 按钮
	 */
	private $_fButtons = array();
	
	/**
	 * 多选框名称
	 */
	private $_checkboxName = 'id';
	
	public function init()
	{
		parent::init();
		if (is_array($this->footer) && !empty($this->footer))
			$this->initFooter();
	}
	
	public function initFooter()
	{
		if (isset($this->footer['template']))
			$this->_fTemplate = $this->footer['template'];
		if (isset($this->footer['checkboxName']))
			$this->_checkboxName = $this->footer['checkboxName'];
		if (isset($this->footer['buttons']))
			$this->_fButtons = $this->footer['buttons'];
		if (!empty($this->_fButtons))
			foreach ($this->_fButtons as $id=>$button) {
				if(strpos($this->_fTemplate, '{'.$id.'}') === false)
					unset($this->_fButtons[$id]);
			}
		$this->registerFooterScript();
	}
	
	/**
	 * 是否设置Footer
	 */
	public function getHasFooter()
	{
		if (!empty($this->footer))
			return true;
		return false;
	}
	
	/**
	 * 重写GridView的footer方法
	 * 只输出一个td
	 */
    public function renderTableFooter()
    {
    	if($this->dataProvider->totalItemCount > 0) {
	        $hasFooter = $this->getHasFooter();
	        if ($hasFooter) {
	            echo "<tfoot><tr>\n";
	            $clos = 'colspan=' . count($this->columns);
				echo "<td {$clos}>";
				$this->renderFooterContent();
	            echo "</td></tr></tfoot>\n";
	        }
    	}
    }
    
    /**
     * 显示Footer内容
     */
	public function renderFooterContent()
	{
		if (is_string($this->footer))
			echo $this->footer;
		else if(is_array($this->footer)) {
			$tr = array();
			ob_start();
			foreach($this->_fButtons as $id=>$button) {
				$this->renderFooterButton($id, $button);
				$tr['{'.$id.'}'] = ob_get_contents();
				ob_clean();
			}
			ob_end_clean();
			echo strtr($this->_fTemplate, $tr);
		}
	}
	
	/**
	 * 显示内容
	 */
	public function renderFooterButton($id, $button)
	{
		if (!is_array($button)) {
			echo $button;
			return;
		}
		//是否显示
		if (isset($button['visible']) && !$button['visible'])
  			return;
  		//外层标签
  		if (!isset($button['wrapTag']) || empty($button['wrapTag']))
  			$button['wrapTag'] = 'span';
  		$wrapId = $this->id . '_tfoot_span_' . $id;
  		echo "<{$button['wrapTag']} id='{$wrapId}' style='float:left; margin-right:7px;'>";
  		//是否引用其它插件
		if (isset($button['class']) && isset($button['config']))
			$this->widget($button['class'], $button['config']);
		else {
			//自定义的button
			$label = isset($button['label']) ? $button['label'] : $id;
			$url = isset($button['url']) ? $button['url'] : '#';
			$options = isset($button['options']) ? $button['options'] : array('class'=>'btn');
			if(!isset($options['title']))
				$options['title']=$label;
			if (isset($button['icon']))
				$label = "<i class='{$button['icon']}'></i> " . $label;
			//其它html
			if (isset($button['html']))
				echo $button['html'];
			echo CHtml::link($label, $url, $options);
		}
		echo "</{$button['wrapTag']}>";
	}
	
	/**
	 * 注册事件
	 */
	public function registerFooterScript()
	{
		$js = array();
		foreach($this->_fButtons as $id=>$button) {
			$this->initFooterScript($button);
			if (isset($button['click'])) {
				$function = CJavaScript::encode($button['click']);
				$target_id = $this->id . '_tfoot_span_' . $id;
				$js[] = "jQuery('#{$target_id} a').live('click',$function);";
			}
		}
		if($js !== array())
			Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$this->id, implode("\n",$js));
	}
	
	/**
	 * 事件方法
	 */
	private function initFooterScript(&$button)
	{
		if (!isset($button['bindClick']) || $button['bindClick']) {
			$jsContent = '';
			if (!isset($button['checkboxName']) || empty($button['checkboxName']))
				$button['checkboxName'] = $this->_checkboxName;
			if (!isset($button['emptyConfirm']) || empty($button['emptyConfirm']))
				$button['emptyConfirm'] = '您还没有选择！';
			$button['emptyConfirm'] = CJavaScript::encode($button['emptyConfirm']);
			$jsContent =<<<EOT
	var ids = $("input:checkbox[name='{$button['checkboxName']}[]']:checked").serialize();
	if (ids.length <= 0) {
		alert({$button['emptyConfirm']});
		return false;
	}
	url = $.param.querystring(url, ids);
EOT;
			if(isset($button['confirm']) && !empty($button['confirm']))
				$jsContent .="\r\n\tif(!confirm(".CJavaScript::encode($button['confirm']).")) return false;";
			//参数	
			if(isset($button['params']) && is_array($button['params'])) {
				foreach ($button['params'] as $key=>$val) {
					if (strpos($val, 'js:') !== false) {
						$val = substr($val, 3);
						$jsContent .= "\r\n\tdata.{$key}={$val}";
					} else 
						$jsContent .= "\r\n\tdata.{$key}='{$val}';";
				}
			}
			if(Yii::app()->request->enableCsrfValidation) {
				$csrfTokenName = Yii::app()->request->csrfTokenName;
				$csrfToken = Yii::app()->request->csrfToken;
				$csrf = "\n\t\tdata:{ '$csrfTokenName':'$csrfToken' },";
			} else
				$csrf = '';
			if(!isset($button['afterDone']) || empty($button['afterDone']))
				$button['afterDone'] = 'function(){}';
			$button['click']=<<<EOD
js:function() {
	var url = $(this).attr('href');
{$jsContent};
	var th=this;
	var afterDone={$button['afterDone']};
	$.fn.yiiGridView.update('{$this->id}', {
		type:'POST',
		url:url,{$csrf}
		success:function(data) {
			$.fn.yiiGridView.update('{$this->id}');
			afterDone(th,true,data);
		},
		error:function(XHR) {
			return afterDone(th,false,XHR);
		}
	});
	return false;
}
EOD;
		}
	}
}
?>