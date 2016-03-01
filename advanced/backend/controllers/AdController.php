<?php

namespace backend\controllers;

use Yii;
use backend\models\Ad;
use backend\models\AdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Adver;

/**
 * AdController implements the CRUD actions for Ad model.
 */
class AdController extends BackendBase
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
     * Lists all Ad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ad model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ad();
		$model->create_at=time();
		$model->update_at=time();
		$model->create_uid=Yii::$app->user->identity->id;
		$model->is_show=1;
        if ($model->load(Yii::$app->request->post())) {
			$img = UploadedFile::getInstance($model, 'img');
			if ($img) {
				$file='upload/' . time() . mt_rand(1, 999) . '.' . $img->extension;
				$img->saveAs($file);
				$model->img=$file;
			}
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
			
			$adverlist = Adver::getDropList();
			
            return $this->render('create', [
                'model' => $model,
				'adverlist'=>$adverlist,
            ]);
        }
    }

    /**
     * Updates an existing Ad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$img = UploadedFile::getInstance($model, 'img');
			
            if ($img) {
				$file='upload/' . time() . mt_rand(1, 999) . '.' . $img->extension;
				$img->saveAs($file);
				$model->img=$file;
			}
			
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
			$adverlist = Adver::getDropList();
            return $this->render('update', [
                'model' => $model,
				'adverlist'=>$adverlist,
            ]);
        }
    }

    /**
     * Deletes an existing Ad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
