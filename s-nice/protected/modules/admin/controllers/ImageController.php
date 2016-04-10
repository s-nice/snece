<?php

require 'vendor/qiniu-sdk/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class ImageController extends AdminBase {

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->layout = FALSE;
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Image;
		$catlist = Category::getDropList(1);

		if (isset($_POST['Image'])) {
			$model->attributes = $_POST['Image'];
			$model->create_uid = Yii::app()->user->id;
			$model->create_at = time();

			$accessKey = 'alO3SWK6jx4XvPSeUCbhRRb8arS8sivFSQ_zMo1K';
			$secretKey = 'qZlz5D8-Wlj0nUnsRt-qTNit56dVcWb2jK_eVqcK';
			$auth = new Auth($accessKey, $secretKey);
			
			$bucket = 's-nice';

			// 生成上传 Token
			$token = $auth->uploadToken($bucket);

			$img = CUploadedFile::getInstance($model, 'img');
			
			if ($img) {
				$savename = time() . mt_rand(00001, 99999) . '.' . $img->extensionName;
				$model->img = $savename;
				if ($model->validate()) {
					$img->saveAs(Yii::app()->params['uploadPath'] . $savename);
				}
			}
			$filePath = Yii::app()->params['uploadPath'] . $savename;
			// 上传到七牛后保存的文件名
			$key = $savename;

			// 初始化 UploadManager 对象并进行文件的上传。
			$uploadMgr = new UploadManager();

			// 调用 UploadManager 的 putFile 方法进行文件的上传。
			list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
			
			$token = $auth->uploadToken($bucket);

			// 构建 UploadManager 对象
			$uploadMgr = new UploadManager();

			if (file_exists(Yii::app()->params['uploadPath'] . $savename)) {
				unlink(Yii::app()->params['uploadPath'] . $savename);
			}
			
			if ($model->save()) {
				Yii::app()->user->setFlash('success', '信息提交成功！');
			} else {
				Yii::app()->user->setFlash('success', '信息提交失败！');
			}
		}
		$this->render('create', array(
			'model' => $model,
			'catlist'=>$catlist,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		$catlist = Category::getDropList(1);
		
		if (isset($_POST['Image'])) {
			$model->attributes = $_POST['Image'];
			
			if ($model->save()) {
				Yii::app()->user->setFlash('success', '信息提交成功！');
			} else {
				Yii::app()->user->setFlash('success', '信息提交失败！');
			}
		}

		$this->render('update', array(
			'model' => $model,
			'catlist'=>$catlist,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$model=$this->loadModel($id);

		$accessKey = 'alO3SWK6jx4XvPSeUCbhRRb8arS8sivFSQ_zMo1K';
		$secretKey = 'qZlz5D8-Wlj0nUnsRt-qTNit56dVcWb2jK_eVqcK';
		
		//初始化Auth状态：
		$auth = new Auth($accessKey, $secretKey);

		//初始化BucketManager
		$bucketMgr = new BucketManager($auth);

		//你要测试的空间， 并且这个key在你空间中存在
		$bucket = 's-nice';
		$key = $model->img;

		//删除$bucket 中的文件 $key
		$err = $bucketMgr->delete($bucket, $key);
		
		if (file_exists(Yii::app()->params['uploadPath'] . $model->img)) {
			unlink(Yii::app()->params['uploadPath'] . $model->img);
		}
		
		$model->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Image('search');
		
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Image']))
			$model->attributes = $_GET['Image'];
		
		if($model->is_show==0){
			$model->is_show='';
		}
		if($model->pid==0){
			$model->pid='';
		}
		
		$start=array(0=>'全部');
		$catlist = Category::getDropList(1);
		$catlist=$start+$catlist;
		$this->render('admin', array(
			'model' => $model,
			'catlist'=>$catlist,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Image the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Image::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Image $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'image-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
