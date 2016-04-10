<?php

class SiteController extends FrontBase
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($pid='')
	{
		$model = new Image();
		$criteria = new CDbCriteria();
		if($pid){
			$criteria->addCondition("is_show=1 and pid=$pid");
		}else{
			$criteria->addCondition("is_show=1");
		}
		
		$criteria->order = 'id desc';
		$imgs = $model->findAll($criteria);
		
		$this->render('index',array(
			'imgs'=>$imgs,
			
		));
	}

	/**
	 * 关于
	 */
	public function actionAbout()
	{
		$page=Page::model()->find('id=:id',array('id'=>1));
		$this->render('about',array('page'=>$page));
	}

	/**
	 * 联系
	 */
	public function actionContact()
	{
		
		$this->render('contact',array(
			
		));
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest){
				echo $error['message'];exit();
			}else{
				$this->render('error', array(
					'error'=>$error,
				));
			}
		}
	}
}