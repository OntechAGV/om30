<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->session = \Config\Services::session();
	}

    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->find();
        $data['title'] = 'Lista de Usuários';
        $data['msg'] = $this->session->getFlashdata('msg');

        echo view('templates/header', $data);
        echo view('user/index', $data);
        echo view('templates/footer', $data);
    }

    public function create(){

        $data['title'] = 'Cadastro de Usuários';
        $data['action'] = 'Inserir';
        $data['msg'] = '';
        $data['errors'] = '';

        if($this->request->getMethod() ==='post'){
            $userModel = new UserModel();
            $dataUsers = $this->request->getPost();
            if($userModel->insert($dataUsers)){
                $data['msg'] = 'Usuário inserida com sucesso';
            }
            else{
                $data['msg'] = 'Erro ao inserir usuário';
                $data['errors'] = $userModel->errors();
            }
        }

        echo view('templates/header', $data);
        echo view('user\create', $data);
        echo view('templates/footer', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Atualizar usuário';
        $data['action'] = 'Editar';
        $data['msg'] = '';
        $data['errors'] = '';
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if($this->request->getMethod() ==='post'){
            
            $dataUsers = $this->request->getPost();
            if($userModel->update($id, $dataUsers)){
                $data['msg'] = 'Usuário editado com sucesso';
            }
            else{
                $data['msg'] = 'Erro ao editar usuário';
                $data['errors'] = $userModel->errors();
            }
        }
        $data['user'] = $user;

        echo view('templates/header', $data);
        echo view('user\edit', $data);
        echo view('templates/footer', $data);

    }

    public function delete($id = null)
    {
        if(is_null($id)){
            $this->session->setFlashdata('msg', 'Usuário não encontrado');
            return redirect()->to(base_url('users'));
        }

        $userModel = new UserModel();

        if($userModel->delete($id)){
            $this->session->setFlashdata('msg', 'Usuário excluido com sucesso');
        }
        else{
            $this->session->setFlashdata('msg', 'Erro ao tentar excluir usuário');
        }
        return redirect()->to(base_url('administrativo'));
    }
}
