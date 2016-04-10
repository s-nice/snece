<?php

/**
 * 后台管理基础类
 */
class AdminBase extends Controller {

	protected $_gets;
	
	public function init() {
		
		$this->_gets = Yii::app()->request;
		if (!Yii::app()->user->id){
			$this->redirect(array('/admin/public/login'));
		}
	}
	
	public $layout='/layouts/widgets';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

}

?>