<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Funcionario extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->load->library('session');
        $this->load->model('FuncionarioModel', 'FuncionarioDAO');
        $this->load->library('table');
    }

    public function index() {
        $dados = array(
            'titulo' => 'Cadastro de Funcionário',
            'tela' => 'create',
            'active' => 'create',
        );
        $this->load->view('Funcionario', $dados);
    }

    public function create() {
        //Validação do formulario
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|max_length[16]|ucwords');
        $this->form_validation->set_rules('identidade', 'Identidade', 'trim|required|max_length[15]|ucwords');
        $this->form_validation->set_rules('salario', 'Salario', 'trim|required');
        $this->form_validation->set_rules('cargahoraria', 'Carga Horária', 'trim|required');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[funcionario.email]');
        $this->form_validation->set_rules('login', 'LOGIN', 'trim|required|max_length[25]|strtolower|is_unique[funcionario.login]');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');
        $this->form_validation->set_message('matches', 'O campo %s está dirente do campo %s');
        $this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|strtolower|matches[senha]');
        if ($this->form_validation->run() == TRUE):
            $dados = elements(array('nome', 'cpf', 'identidade', 'salario', 'cargahoraria', 'email', 'login', 'senha'), $this->input->post());
            $dados['senha'] = md5($dados['senha']);
            $this->FuncionarioDAO->do_insert($dados);
            echo "Validação ok, inserir no bd";

        endif;
        $dados = array(
            'titulo' => 'Cadastro de Funcionário',
            'tela' => 'create',
            'active' => 'create',);
        $this->load->view('Funcionario', $dados);
    }

    public function retrieve() {

        $dados = array(
            'titulo' => 'Cadastro de Funcionario com CodeIgniter',
            'tela' => 'retrieve',
            'usuarios' => $this->FuncionarioDAO->get_all()->result(),
            'active' => 'retrieve',
        );

        $this->load->view('Funcionario', $dados);
    }

    public function update() {
        //Validação do formulario
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|max_length[16]|ucwords');
        $this->form_validation->set_rules('identidade', 'Identidade', 'trim|required|max_length[13]|ucwords');
        $this->form_validation->set_rules('salario', 'Salario', 'trim|required');
        $this->form_validation->set_rules('cargahoraria', 'Carga Horária', 'trim|required');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');
        $this->form_validation->set_message('matches', 'O campo %s está dirente do campo %s');
        $this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|strtolower|matches[senha]');

        if ($this->form_validation->run() == TRUE):
            $dados = elements(array('nome', 'cpf', 'identidade', 'salario', 'cargahoraria', 'email', 'login', 'senha'), $this->input->post());
            $dados['senha'] = md5($dados['senha']);
            //$this->Funcionario->do_insert($dados);
            $this->FuncionarioDAO->do_update($dados, array('funcionarioid' => $this->input->post('funcionarioid')));
            echo "Validação ok, inserir no bd";

        endif;


        $dados = array(
            'titulo' => 'Funcionario &raquo Update',
            'tela' => 'update',
            'active' => 'update',
        );
        $this->load->view('Funcionario', $dados);
    }

    public function delete() {

        if ($this->input->post('funcionarioid') > 0):
            $this->FuncionarioDAO->do_delete(array('funcionarioid' => $this->input->post('funcionarioid')));
        endif;

        $dados = array(
            'titulo' => 'Funcionario &raquo Delete',
            'tela' => 'delete',
            'active' => 'delete',
        );
        $this->load->view('Funcionario', $dados);
    }

    public function login() {
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email');
        $this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');

        if ($this->form_validation->run() == TRUE) {
            $dados = elements(array('email', 'senha'), $this->input->post());
            $dados['senha'] = md5($dados['senha']);

            $funcionario = $this->FuncionarioDAO->get_byEmail($dados['email'], $dados['senha']);

            if ($funcionario != false):
                foreach ($funcionario->result() as $linha):
                    $funcionarioid = $linha->funcionarioid;
                    $nome = $linha->nome;
                    $email = $linha->email;
                    $permissao = $linha->status;
                endforeach;
                $novousuario = array(
                    'funcionarioid' => $funcionarioid,
                    'nome' => $nome,
                    'email' => $email,
                    'esta_logado' => TRUE,
                    'permissao' => $permissao
                );
                $this->session->set_userdata($novousuario);
                redirect('Funcionario/create');
            else:
                $this->session->set_flashdata('usuarioinvalido', 'Email ou senha invalido. Tente novamente!');
                redirect('inicio/');
            endif;
        }else {
            $this->session->set_flashdata('usuarioinvalido', 'Os campos não foram preenchidos corretamente ou podem está vazios!');
            redirect('/');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('inicio/');
    }

}
