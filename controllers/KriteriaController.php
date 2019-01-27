<?php

namespace app\controllers;

use Yii;
use app\models\Kriteria;
use app\models\KriteriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Penilaian;
use app\models\PenilaianHapus;

/**
 * KriteriaController implements the CRUD actions for Kriteria model.
 */
class KriteriaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kriteria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Kriteria();

        $searchModel = new KriteriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Kriteria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kriteria();

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            
            if ($model->save()) {
                $this->deletePenilaian();
                $this->actionResetBobot();
            }

        }
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Kriteria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->deletePenilaian();
        $this->actionResetBobot();
    }

    /**
     * Finds the Kriteria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kriteria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kriteria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetKriteria()
    {
        $post_data = Yii::$app->request->post();

        if (!empty($post_data['Kriteria'])) {
            
            foreach ($post_data['Kriteria'] as $key => $post) {
                $model = $this->findModel($key);
                $model->attributes = $post;

                if (!empty($post['bobot'])) {
                    $model->bobot = $post['bobot'] / 100;
                }
            
                $model->save();
            }

        }

        return $this->redirect(['index']);
    }

    public function actionResetBobot()
    {
        $model = Kriteria::find()->all();

        if ($model) {
            foreach ($model as $key => $kriteria) {
                $kriteria->bobot = 0;
                $kriteria->save();
            }
        }

        return $this->redirect(['index']);
    }

    public function deletePenilaian()
    {
        $model_penilaian = Penilaian::find()->all();

        if ($model_penilaian) {
            
            foreach ($model_penilaian as $key => $penilaian) {
                $model_penilaian_hapus = new PenilaianHapus;
                $model_penilaian_hapus->attributes = $penilaian->attributes;

                if ($model_penilaian_hapus->save()) {
                    $penilaian->delete();
                }

            }

        }

    }
}
