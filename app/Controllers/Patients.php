<?php namespace App\Controllers;

use App\Models\PatientModel;

class Patients extends BaseController {

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();
	}

    public function index(){
        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->find();
        $data['title'] = 'Lista pacientes';
        $data['msg'] = $this->session->getFlashdata('msg');

        echo view('templates/header', $data);
        echo view('patient/index', $data);
        echo view('templates/footer', $data);
    }

    public function create(){
        
        $data['title'] = 'Cadastrar novo paciente';
        $data['action'] = 'Cadastrar';
        $data['msg'] = '';
        $data['errors'] = '';

        if($this->request->getMethod() ==='post'){

            $patientModel = new PatientModel();

            $dataPatients = $this->request->getPost();
            $dataPatients['cpf'] = replace_fields($dataPatients['cpf']);
            $dataPatients['cns'] = replace_fields($dataPatients['cns']);
            $dataPatients['cep'] = replace_fields($dataPatients['cep']);
            if(valid_cpf($dataPatients['cpf'])){
                if(validateCns($dataPatients['cns'])){
                    if($patientModel->insert($dataPatients)){ 
                        $data['msg'] = '<div class="alert alert-success" role="alert">
                                            paciente inserido com sucesso
                                        </div>';
                        
                    }
                    else{
                        $data['msg'] = '<div class="alert alert-danger" role="alert">
                                            Erro ao inserir paciente
                                        </div>';
                        $data['errors'] = $patientModel->errors();
                    }
                }else{
                    $data['msg'] = '<div class="alert alert-danger" role="alert">
                                    CNS inválido
                                </div>';
                }
                
            }else{
                $data['msg'] = '<div class="alert alert-danger" role="alert">
                                    CPF inválido
                                </div>';
            }
        }

        $userModel = new \App\Models\UserModel();
        $listUsers = $userModel->findAll();
        helper('form');
        $arrayUsers = [];
        foreach($listUsers as $user){
            $arrayUsers[$user->id] = $user->username;
        }
        $data['comboUsers'] = form_dropdown('id_user', $arrayUsers);

        echo view('templates/header', $data);
        echo view('patient/create', $data);
        echo view('templates/footer', $data);


    }

    public function edit($id)
    {
        $data['title'] = 'Editar paciente';
        $data['action'] = 'Editar';
        $data['msg'] = '';
        $data['errors'] = '';
        $patientModel = new PatientModel();
        $patient = $patientModel->find($id);
        

        if($this->request->getMethod() ==='post'){

            $dataPatients = $this->request->getPost();
            $dataPatients['cpf'] = replace_fields($dataPatients['cpf']);
            $dataPatients['cns'] = replace_fields($dataPatients['cns']);
            $dataPatients['cep'] = replace_fields($dataPatients['cep']);
            if(valid_cpf($dataPatients['cpf'])){

                if($patientModel->update($id, $dataPatients)){    
                    $data['msg'] = '<div class="alert alert-success" role="alert">
                                        Paciente editado com sucesso
                                    </div>';
                }
                else{
                    $data['msg'] = '<div class="alert alert-danger" role="alert">
                                        Erro ao editar paciente
                                    </div>';
                    $data['errors'] = $patientModel->errors();
                }
                
            }else{
                $data['msg'] = '<div class="alert alert-danger" role="alert">
                                    CPF inválido
                                </div>';
            }
                
        }

        $userModel = new \App\Models\UserModel();
        $listUsers = $userModel->findAll();
        helper('form');
        $arrayUsers = [];
        foreach($listUsers as $user){
            $arrayUsers[$user->id] = $user->username;
        }
        $data['comboUsers'] = form_dropdown('id_user', $arrayUsers);
        
        $data['patient'] = $patient;

        echo view('templates/header', $data);
        echo view('patient/edit', $data);
        echo view('templates/footer', $data);

    }

    public function delete($id = null)
    {
        if(is_null($id)){
            $this->session->setFlashdata('msg', 'paciente não encontrado');
            return redirect()->to(base_url('pacientes'));
        }

        $patientModel = new PatientModel();

        if($patientModel->delete($id)){
            $this->session->setFlashdata('msg', 'paciente excluido com sucesso');
        }
        else{
            $this->session->setFlashdata('msg', 'Erro ao tentar excluir paciente');
        }
        return redirect()->to(base_url('pacientes'));
    }
}