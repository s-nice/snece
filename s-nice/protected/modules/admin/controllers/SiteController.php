<?php

class SiteController extends AdminBase
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/widgets';

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionIndex()
	{
		$model = Site::model()->find();
		if($model===NULL){
			$model=new Site();
		}

		if(isset($_POST['Site']))
		{
			$model->attributes=$_POST['Site'];
			if($model->save()){
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Performs the AJAX validation.
	 * @param Site $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='site-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
