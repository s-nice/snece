<?php

class UserController extends AdminBase
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='/layouts/widgets';
	
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
		$model=new User();

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->create_time=date('Y-m-d H:i:s');
			$model->avatar='/image/default.png';
			
			$condition = array ('condition' => 'user_name=:user_name' , 'params' => array ( 'user_name' => $model->user_name ) );
			$dataRs = User::model()->find($condition);
			if($dataRs){
				Yii::app()->user->setFlash('success','用户名已存在！');
			}else{
			
				$password=trim($model->password);

				if($password && strlen($password)>5){
					$model->password=substr(md5($password),0,20);
				}

				if($model->save()){
					//$this->redirect(array('view','id'=>$model->id));
					Yii::app()->user->setFlash('success','信息提交成功！');
				}else{
					Yii::app()->user->setFlash('success','信息提交失败！');
				}
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

		if(isset($_POST['User']))
		{
			$oldavatar=$model->avatar;
			
			$oldpassword=$model->password;
			
			$model->attributes=$_POST['User'];
			$model->update_time=date('Y-m-d H:i:s');
			
			$password=trim($_POST['User']['password']);
			
			if($password!=$oldpassword){
				$password=substr(md5($password),0,20);
				$model->password=$password;
			}else{
				$model->password=$oldpassword;
			}
			
			$avatar = CUploadedFile::getInstance($model,'avatar');
			if($avatar){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$avatar->extensionName;
				$model->avatar='/'.$savename;
				if($model->validate()){
					$avatar->saveAs($savename);
				}
				if (file_exists($oldavatar)) {
					unlink($oldavatar);
				}
			}
			
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
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
		
		if (file_exists($model->avatar)) {
			unlink($model->avatar);
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
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionProfile(){
		$uid=Yii::app()->user->id;
		$model = $this->loadModel($uid);

		if (isset($_POST['User'])) {
			$oldavatar=$model->avatar;
			
			$model->attributes = $_POST['User'];
			$model->update_time=date('Y-m-d H:i:s');

			$avatar = CUploadedFile::getInstance($model,'avatar');
			if($avatar){
				$savename = 'upload/profile/'.time().mt_rand(00001,99999).'.'.$avatar->extensionName;
				$model->avatar='/'.$savename;
				if($model->validate()){
					$avatar->saveAs($savename);
				}
				if (file_exists($oldavatar)) {
					unlink($oldavatar);
				}
			}else{
				$model->avatar=$oldavatar;
			}
			
			if ($model->save()) {
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
			
		}

		$this->render('profile', array(
			'model' => $model,
		));
	}
	
	public function actionPwd(){
		$uid=Yii::app()->user->id;
		
		$model = $this->loadModel($uid);
		
		$nowpwd=$model->password;
		
		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			
			if($model->oldpwd){
				$oldpwd=substr(md5($model->oldpwd),0,20);
			}
			
			if(!$model->oldpwd || !$model->newpwd1 || !$model->newpwd2){
				Yii::app()->user->setFlash('success','填写不正确！');
			}else if(strlen($model->newpwd1)<6){
				Yii::app()->user->setFlash('success','新密码不能少于6位！');
			}else if($model->newpwd1!=$model->newpwd2){
				Yii::app()->user->setFlash('success','两次密码不一致！');
			}else if($nowpwd!=$oldpwd){
				Yii::app()->user->setFlash('success','旧密码不正确！');
			}else{
				$model->password=substr(md5($model->newpwd1),0,20);
				
				if($model->save()){
					Yii::app()->user->setFlash('success','密码修改成功！');
				}else{
					Yii::app()->user->setFlash('success','密码修改失败！');
				}
			}
		}
		
		$this->render('pwd', array(
			'model' => $model,
		));
	}
	
}
