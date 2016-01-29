<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\Controller;

class AdminBase extends Controller
{
	public $layout='//ace';
	
	public function init() {
		
		if (!isset(Yii::$app->user->identity->username)){
			$this->redirect(array('/admin/site/login'));
		}
	
	}
}
