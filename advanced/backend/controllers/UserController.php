<?php

namespace backend\controllers;

use Yii;
use backend\models\user;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for user model.
 */
class UserController extends BackendBase
{
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single user model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new user();
		$model->setScenario('default');

        if ($model->load(Yii::$app->request->post())) {
			
			$model->created_at=time();
			$model->updated_at=time();
			$model->auth_key=Yii::$app->security->generateRandomString();
			$model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
			
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$op=$model->password_hash;
        if ($model->load(Yii::$app->request->post())) {
			
			$model->updated_at=time();
			if($model->password_hash!=$op){
				$model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
			}
			
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing user model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = user::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	 /**
     * 修改密码.
     */
    public function actionPw()
    {
		$uid=Yii::$app->user->identity->id;
		
        $model = $this->findModel($uid);
		$op=$model->password_hash;
		$model->setScenario('pw');
		
        if ($model->load(Yii::$app->request->post())) {
			
			Yii::$app->getSecurity()->validatePassword($model->password_hash, $op);
			if($model->password_hash==TRUE){
				$model->password_hash=Yii::$app->security->generatePasswordHash($model->newpw);
			}  else {
				$model->addError('password_hash', '旧密码不正确！');
				return $this->render('pw', [
					'model' => $model,
				]);
			}

			if ($model->save()) {
				Yii::$app->getSession()->setFlash('success', '修改成功！');
			} else {
				Yii::$app->getSession()->setFlash('error', '修改失败！');
			}
		} else {
			$model->password_hash = '';
		}

		return $this->render('pw', [
			'model' => $model,
		]);
	}
	
	 /**
	 * 个人信息修改.
	 */
	public function actionProfile() {
		$uid = Yii::$app->user->identity->id;

		$model = $this->findModel($uid);

		if ($model->load(Yii::$app->request->post())) {
			if( $model->save()){
				Yii::$app->getSession()->setFlash('success', '保存成功！');
			}else{
				Yii::$app->getSession()->setFlash('error', '保存失败！');
			}
		}
		return $this->render('profile', [
			'model' => $model,
		]);
		
	}

}
