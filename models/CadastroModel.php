<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CadastroModel extends Model 
{
   public $nome;
   public $cpf;
   public $logradouro;
   public $cep;
   public $cidade;
   public $estado;
   public $numero;
   public $complemento;
   public $cargo_id;

//    public function rules()
//    {
//     return [['nome','cpf','logradouro'],'required',
//             ['cpf','number']
//         ];
//    }

   public function attributeLabels()
   {
    return [[
        'nome' => 'Nome completo',
        'cpf' => 'Cpf',
        'logradouro' => 'digir o logradouro completo',
        'cep' => 'digite o cep ',
        'cidade' => 'Nome da cidade completo',
        'estado' => 'digite o nome do estado completo',
        'numero' => 'digite o numero',
        'complemento' => 'digite o complemento',
        'cargo_id' => 'digite o cargo'
    ]];
   }
}