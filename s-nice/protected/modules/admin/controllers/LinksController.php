<?php

class LinksController extends AdminBase
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/widgets';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout=FALSE;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Links;

		$model->orderid=1;

		if(isset($_POST['Links']))
		{
			$model->attributes=$_POST['Links'];
			$model->create_uid=Yii::app()->user->id;
			
			$model->create_time=date('Y-m-d H:i:s');
			
			$image =  CUploadedFile::getInstance($model,'logo');
			if($image){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$image->extensionName;
				$model->logo='/'.$savename;
				if($model->validate()){
					$image->saveAs($savename);
				}
			}
			
			if($model->save()){
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Links']))
		{
			$oldlogo=$model->logo;
			
			$model->attributes=$_POST['Links'];
			$model->update_uid=Yii::app()->user->id;
			$model->update_time=date('Y-m-d H:i:s');
			
			$image =  CUploadedFile::getInstance($model,'logo');
			if($image){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$image->extensionName;
				$model->logo='/'.$savename;
				if($model->validate()){
					$image->saveAs($savename);
				}
				if (file_exists($oldlogo)) {
					unlink($oldlogo);
				}
			}else{
				$model->logo=$oldlogo;
			}
			
			if($model->save()){
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		
		if (file_exists($model->logo)) {
			unlink($model->logo);
		}
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Links('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Links']))
			$model->attributes=$_GET['Links'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Links the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Links::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Links $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='links-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
