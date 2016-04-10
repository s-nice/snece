<?php

class AdController extends AdminBase
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
		$model=new Ad;
		$adverlist = Adver::getDropList();
		$model->orderid=1;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ad']))
		{
			$model->attributes=$_POST['Ad'];
			$model->create_uid=Yii::app()->user->id;
			$model->update_uid=Yii::app()->user->id;
			$model->create_time=date('Y-m-d H:i:s');
			$model->update_time=date('Y-m-d H:i:s');
			
			if($model->pid==0){
				$model->pid='';
			}
			
			$img =  CUploadedFile::getInstance($model,'img');
			if($img){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img->extensionName;
				$model->img='/'.$savename;
				if($model->validate()){
					$img->saveAs($savename);
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
			'adverlist'=>$adverlist,
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
		$adverlist = Adver::getDropList();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ad']))
		{
			$oldimg=$model->img;
			
			$model->attributes=$_POST['Ad'];
			$model->update_uid=Yii::app()->user->id;
			$model->update_time=date('Y-m-d H:i:s');
			
			if($model->pid==0){
				$model->pid='';
			}
			
			$img =  CUploadedFile::getInstance($model,'img');
			if($img){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img->extensionName;
				$model->img='/'.$savename;
				if($model->validate()){
					$img->saveAs($savename);
				}
				if (file_exists($oldimg)) {
					unlink($oldimg);
				}
			}else{
				$model->img=$oldimg;
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
			'adverlist'=>$adverlist,
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
		
		if (file_exists($model->img)) {
			unlink($model->img);
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
		$model=new Ad('search');
		$adverlist = Adver::getDropList();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ad']))
			$model->attributes=$_GET['Ad'];

		if($model->pid==0){
			$model->pid='';
		}
		
		if($model->is_show==0){
			$model->is_show='';
		}
		
		$this->render('admin',array(
			'model'=>$model,
			'adverlist'=>$adverlist,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ad the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ad::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ad $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
