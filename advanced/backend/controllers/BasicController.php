<?php

namespace backend\controllers;

use Yii;
use backend\models\Basic;
use backend\models\BasicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BasicController implements the CRUD actions for Basic model.
 */
class BasicController extends BackendBase
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
     * Lists all Basic models.
     * @return mixed
     */
    public function actionIndex($pid='')
    {
        $searchModel = new BasicSearch();
		$searchModel->pid=$pid;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$parent=Basic::find()->where(['id' => $pid])->one();
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'parent'=>$parent,
        ]);
    }

    /**
     * Displays a single Basic model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model=$this->findModel($id);
		$parent=Basic::find()->where(['id' => $model->pid])->one();
        return $this->render('view', [
            'model' => $model,
			'parent'=>$parent,
        ]);
    }

    /**
     * Creates a new Basic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid='')
    {
        $model = new Basic();

		$model->pid=$pid;
		
		$parent=Basic::find()->where(['id' => $pid])->one();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'parent' => $parent,
            ]);
        }
    }

    /**
     * Updates an existing Basic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$parent=Basic::find()->where(['id' => $model->pid])->one();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'parent'=>$parent,
            ]);
        }
    }

    /**
     * Deletes an existing Basic model.
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
     * Finds the Basic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Basic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Basic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
