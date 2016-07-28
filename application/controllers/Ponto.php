<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ponto extends CI_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->load->library('session');
        $this->load->model('Ponto_Model', 'PontoDAO');
        $this->load->library('table');
    }

    public function index() {
        $dados = array(
            'titulo' => 'Cadastro de Ponto',
            'tela' => 'create',
            'active' => 'create',
        );
        $this->load->view('Ponto', $dados);
    }

    public function create() {
        //Validação do formulario

        $this->form_validation->set_rules('horaEntrada', 'Hora de Entrada', 'trim');
        $this->form_validation->set_rules('horaAlmoco', 'Hora de Almoco', 'trim');
        $this->form_validation->set_rules('horaAlmocoVolta', 'Vsolta do Almoço', 'trim');
        $this->form_validation->set_rules('horaSaida', 'Saida', 'trim');

        if ($this->form_validation->run() == TRUE):

            $dados = elements(array('horaEntrada', 'horaAlmoco', 'horaAlmocoVolta', 'horaSaida'), $this->input->post());


            $funcionario = $this->session->funcionarioid;
            $dados['funcionarioid'] = ($funcionario);
            $horaAlmoco = $dados['horaAlmoco'];
            $horaAlmocoVolta = $dados['horaAlmocoVolta'];
            $horaSaida = $dados['horaSaida'];
            
            if ($this->PontoDAO->verificaRegistroEntrada($funcionario)):
                if ($this->PontoDAO->verificaPonto($funcionario)) {
                    if ($horaAlmoco != NULL || $horaAlmoco != "") {
                        if (!$this->PontoDAO->verificaRegistroAlmoco($funcionario)):
                            $hora = array('horaAlmoco' => $horaAlmoco);
                            $this->PontoDAO->do_update($hora);
                        endif;
                    }elseif ($horaAlmocoVolta != null) {
                        if (!$this->PontoDAO->verificaRegistroAlmocoVolta($funcionario)):
                            $hora = array('horaAlmocoVolta' => $horaAlmocoVolta);
                            $this->PontoDAO->do_update($hora);
                        endif;
                    }elseif ($horaSaida != NULL) {
                        if (!$this->PontoDAO->verificaRegistroSaida($funcionario)):
                            $hora = array('horaSaida' => $horaSaida);
                            $this->PontoDAO->do_update($hora);
                        endif;
                    }
                }else {
                    echo "Validação ok, inserir no bd";
                    $horaEntrada = $dados['horaEntrada'];
                    $newdados = array('horaEntrada' => $horaEntrada, 'funcionarioid' => $funcionario);
                    $this->PontoDAO->do_insert($newdados);
                }
            else:
                $horaEntrada = $dados['horaEntrada'];
                $newdados = array('horaEntrada' => $horaEntrada, 'funcionarioid' => $funcionario);
                $this->PontoDAO->do_insert($newdados);
            endif;

        endif;

        $dados = array(
            'titulo' => 'Cadastro de Ponto',
            'tela' => 'create',
            'active' => 'create',
        );

        $this->load->view('CadastrarPonto', $dados);
    }

   public function retrieve() {
        $dadosFuncionario = $this->PontoDAO->get_byid($this->session->funcionarioid)->result();
        
        $dados = array(
            'titulo' => 'Cadastro de Funcionario com CodeIgniter',
            'tela' => 'retrieve',
            'usuarios' => $dadosFuncionario,
            'active' => 'retrieve',
        );

        $this->load->view('CadastrarPonto', $dados);
    }


}
