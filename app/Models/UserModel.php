<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];
    protected $returnType = 'object';

    protected $validationRules = [
        'username' => 'required|min_length[5]',
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Nome login é obrigatório.',
            'min_length' => 'O nome login deve conter no mínimo 5 caracteres.',
        ],
        'email' => [
            'required' => 'Email é obrigatório.',
            'min_length' => 'Digite um email válido',
        ],
        'password' => [
            'required' => 'A senha é obrigatório.',
            'min_length' => 'O senha deve conter no mínimo 6 caracteres.',
        ],
    ];
}