<?php
$this->load->view('telaUteis/header');
$this->load->view('telaUteis/menu');
//$this->load->view('telaUteis/pesquisa');
$this->load->view('telaUteis/menuLeft');
$this->load->view('ponto/'.$tela);
//if($tela!='') $this->load->view($tela);
$this->load->view('telaUteis/footer');