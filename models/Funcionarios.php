<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionarios".
 *
 * @property int $id_funcionario
 * @property string|null $nome
 * @property string|null $cpf
 * @property string|null $logradouro
 * @property int|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $numero
 * @property string|null $complemento
 * @property int|null $cargos_id
 *
 * @property Cargos $cargos
 */
class Funcionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cep', 'numero', 'cargos_id'], 'integer'],
            [['nome', 'cidade', 'complemento'], 'string', 'max' => 100],
            [['cpf'], 'string', 'max' => 11],
            [['logradouro'], 'string', 'max' => 180],
            [['estado'], 'string', 'max' => 2],
            [['cargos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['cargos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_funcionario' => 'Id Funcionario',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'logradouro' => 'Logradouro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargos_id' => 'Cargos ID',
        ];
    }

    /**
     * Gets query for [[Cargos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargos()
    {
        return $this->hasOne(Cargos::className(), ['id' => 'cargos_id']);
    }
}
