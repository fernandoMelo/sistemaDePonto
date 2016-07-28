<?php
$this->load->view('telaUteis/header');
$this->load->view('telaUteis/menu');
//$this->load->view('telaUteis/pesquisa');
$this->load->view('telaUteis/menuLeft');
if($tela!='')$this->load->view('telas/'.$tela);
//$this->load->view('telas/'.$tela);
//if($tela!='') $this->load->view($tela);
$this->load->view('telaUteis/footer');
//if($tela!='') $this->load->view($tela);
//$this->load->view('telaUteis/footer');