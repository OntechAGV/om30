<?php namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'tb_patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'mother_name', 'birthday', 'cpf', 'cns', 'photo', 'id_user',
                                'address', 'number', 'complement', 'city', 'district', 'state', 'country', 'cep'];
    protected $returnType = 'object';
    
    protected $validationRules = [
        'name' => 'required|min_length[4]',
        'mother_name' => 'required|min_length[4]',
        'birthday' => 'required|valid_date',
        'cpf' => 'required|min_length[11]|max_length[11]|numeric',
        'cns' => 'required|min_length[15]|numeric',
        'id_user' => 'required',
        'address' => 'required|min_length[5]',
        'number' => 'required|numeric',
        'city' => 'required',
        'district' => 'required',
        'state' => 'required',
        'country' => 'required',
        'cep' => 'required|numeric',
    ];
    
    protected $validationMessages = [
        'name' => [
            'required' => 'Nome do paciente é obrigatório.',
            'min_length' => 'O nome deve conter no mínimo 4 caracteres.',
        ],
        'mother_name' => [
            'required' => 'Nome da mãe é obrigatório.',
            'min_length' => 'O nome da mãe deve conter no mínimo 4 caracteres.',
        ],
        'birthday' => [
            'required' => 'A data de nascimento é obrigatório.',
            'min_length' => 'Digite uma data de nasciemento válida.',
        ],
        'cpf' => [
            'required' => 'CPF é obrigatório.',
            'min_length' => 'O CPF deve conter no mínimo 11 caracteres.',
            'numeric' => 'O campo CPF deve conter apenas numeros.',
            'is_unique' => 'CPF já existe.',
        ],
        'cns' => [
            'required' => 'CNS é obrigatório.',
            'min_length' => 'O CNS deve conter no mínimo 15 caracteres.',
            'numeric' => 'O campo CNS deve conter apenas numeros.',
            'is_unique' => 'CNS já existe.',
        ],
        'id_user' => ['required' => 'Reponsavel pelo paciente é obrigatório.'],
        'address' => [
            'required' => 'Endereço é obrigatório.',
            'min_length' => 'O endereço deve conter no mínimo 5 caracteres.',
        ],
        'number' => [
            'required' => 'Número é obrigatório.',
            'numeric' => 'O campo Número deve conter apenas numeros.',
        ],
        'city' => [
            'required' => 'Cidade é obrigatório.',
        ],
        'district' => [
            'required' => 'Bairro é obrigatório.',
        ],
        'state' => [
            'required' => 'Estado é obrigatório.',
        ],
        'country' => [
            'required' => 'Pais é obrigatório.',
        ],
        'cep' => [
            'required' => 'CEP é obrigatório.',
            'numeric' => 'CEP deve conter apenas números.
            '
        ],
    ];    
}