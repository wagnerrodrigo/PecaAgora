<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionarios */

$this->title = $model->id_funcionario;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="funcionarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_funcionario' => $model->id_funcionario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_funcionario' => $model->id_funcionario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_funcionario',
            'nome',
            'cpf',
            'logradouro',
            'cep',
            'cidade',
            'estado',
            'numero',
            'complemento',
            'cargos_id',
        ],
    ]) ?>

</div>
