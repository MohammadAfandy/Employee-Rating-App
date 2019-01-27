<?php

namespace app\controllers;

use Yii;
use app\models\Penilaian;
use app\models\PenilaianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use app\models\Pegawai;
use app\models\Kriteria;

/**
 * PenilaianController implements the CRUD actions for Penilaian model.
 */
class PenilaianController extends Controller
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
     * Lists all Penilaian models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new PenilaianSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);\
        $penilaian = Penilaian::find()->joinWith(['pegawai'])->all();
        $kriteria = Kriteria::find()->all();

        $nilai = [];

        foreach ($penilaian as $key => $pen) {
            $nilai[$pen->id_penilaian] = json_decode($pen->penilaian, true);
        }
       
        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'penilaian' => $penilaian,
            'kriteria' => $kriteria,
            'nilai' => $nilai,
        ]);
    }

    /**
     * Displays a single Penilaian model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Penilaian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penilaian();

        $data_pegawai_exist = $model->find()->select(['id_pegawai'])->column();
        $pegawais = Pegawai::find()->where(['NOT IN', 'id_pegawai', $data_pegawai_exist])->all();
        $kriteria = Kriteria::find()->all();
        $data_pegawai = [];

        foreach ($pegawais as $key => $pegawai) {
            $data_pegawai[$pegawai->id_pegawai] = $pegawai->nip . ' | ' . $pegawai->nama_pegawai;
        }

        $post_data = Yii::$app->request->post();
        if (!empty($post_data)) {
            $model->load($post_data);
            $model->penilaian = json_encode($post_data['Penilaian']['penilaian']);
            
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['index']);
            }

        }

        return $this->render('create', [
            'model' => $model,
            'data_pegawai' => $data_pegawai,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Updates an existing Penilaian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data_pegawai_exist = $model->find()->select(['id_pegawai'])->column();
        $pegawais = Pegawai::find()->where(['NOT IN', 'id_pegawai', $data_pegawai_exist])->all();
        $kriteria = Kriteria::find()->all();
        $data_pegawai = [];

        foreach ($pegawais as $key => $pegawai) {
            $data_pegawai[$pegawai->id_pegawai] = $pegawai->nip . ' | ' . $pegawai->nama_pegawai;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_penilaian]);
        }

        return $this->render('update', [
            'model' => $model,
            'data_pegawai' => $data_pegawai,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Deletes an existing Penilaian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penilaian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penilaian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penilaian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
