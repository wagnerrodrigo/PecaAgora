<?php

namespace app\controllers;

use app\models\CadastroModel;
use app\models\Funcionario;
use app\models\Funcionarios;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class FuncionarioController extends Controller
{
    // public function actionGetFuncionarios($message = 'Funcionario não encontrado'){
    //     return $this->render('funcionario', [
    //         'message' => $message
    //     ]);
    // }

    public function actionSetForm(){

        $cadastroModel = new CadastroModel;
        $post = Yii::$app->request->post();

        if($cadastroModel->load($post)){
            return $this->render('formulario-confirmacao',[
                'model' => $cadastroModel
            ]);
        }

        return $this -> render('formulario', [
            'model' => $cadastroModel
        ]);
    }

    public function actionGetFuncionarios()
    {
       $query = Funcionarios::find();
       $pagination = new Pagination([
            'defaultPageSize' =>2,
            'totalCount' => $query->count()
       ]);

    //    $funcionarios = $query->orderBy('nome')
    //                          ->offset($pagination)
    //                          ->limit($pagination)
    //                          ->all();

        // return $this->render('funcionarios',[
        //     'funcionarios' => $funcionarios,
        //     'pagination' => $pagination
        // ]);                          
    }

    // public function actionGetCargo()
    // {
    //     $cargos = Cargo::find()->all();
    //     echo '<pre>'; print_r($cargos);
    // }
}