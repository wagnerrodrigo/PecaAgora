<?php

namespace app\controllers;

use app\models\Funcionarios;
use app\models\FuncionariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuncionariosController implements the CRUD actions for Funcionarios model.
 */
class FuncionariosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Funcionarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FuncionariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Funcionarios model.
     * @param int $id_funcionario Id Funcionario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_funcionario)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_funcionario),
        ]);
    }

    /**
     * Creates a new Funcionarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Funcionarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_funcionario' => $model->id_funcionario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Funcionarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_funcionario Id Funcionario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_funcionario)
    {
        $model = $this->findModel($id_funcionario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_funcionario' => $model->id_funcionario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Funcionarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_funcionario Id Funcionario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_funcionario)
    {
        $this->findModel($id_funcionario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Funcionarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_funcionario Id Funcionario
     * @return Funcionarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_funcionario)
    {
        if (($model = Funcionarios::findOne(['id_funcionario' => $id_funcionario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
