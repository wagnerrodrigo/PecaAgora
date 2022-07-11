<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Funcionarios;

/**
 * FuncionariosSearch represents the model behind the search form of `app\models\Funcionarios`.
 */
class FuncionariosSearch extends Funcionarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'cep', 'numero', 'cargos_id'], 'integer'],
            [['nome', 'cpf', 'logradouro', 'cidade', 'estado', 'complemento'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Funcionarios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_funcionario' => $this->id_funcionario,
            'cep' => $this->cep,
            'numero' => $this->numero,
            'cargos_id' => $this->cargos_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'logradouro', $this->logradouro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'complemento', $this->complemento]);

        return $dataProvider;
    }
}
