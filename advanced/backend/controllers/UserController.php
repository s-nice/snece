<?php

namespace backend\controllers;

use Yii;
use backend\models\user;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
		$model->status=10;

        if ($model->load(Yii::$app->request->post())) {
			
			$user=User::find()->where(['username' => $model->username])->one();
			if($user){
				$model->addError('username','用户名已存在.');
				return $this->render('create', [
					'model' => $model,
				]);
			}
			$pwl=strlen($model->password_hash);
			if($pwl<6){
				$model->addError('password_hash','密码不能少于6位.');
				return $this->render('create', [
					'model' => $model,
				]);
			}
			
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
			
			$user=User::find()->where(['username' => $model->username])->one();
			if($user){
				$model->addError('username','用户名已存在.');
				return $this->render('create', [
					'model' => $model,
				]);
			}
			$pwl=strlen($model->password_hash);
			if($pwl<6){
				$model->addError('password_hash','密码不能少于6位.');
				return $this->render('create', [
					'model' => $model,
				]);
			}
			
			$model->updated_at=time();
			
			$new=Yii::$app->security->generatePasswordHash($model->password_hash);
			
			if($new!=$op){
				$model->password_hash=$new;
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
			
			$return=Yii::$app->getSecurity()->validatePassword($model->password_hash, $op);
			
			if($return==true){
				$model->password_hash=Yii::$app->security->generatePasswordHash($model->newpw);
				if ($model->save()) {
					Yii::$app->getSession()->setFlash('success', '密码修改成功！');
				} else {
					Yii::$app->getSession()->setFlash('error', '密码修改失败！');
				}
			} else {
				$model->addError('password_hash', '旧密码不正确！');
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
			
			$avatar = UploadedFile::getInstance($model, 'avatar');

			if ($avatar) {
				$file='upload/' . time() . mt_rand(1, 999) . '.' . $avatar->extension;
				$avatar->saveAs($file);
				$model->avatar=$file;
			}

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
