<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class FuncionarioModel extends CI_Model{
 	
	public function do_insert($dados=NULL){
		
		if($dados != NULL):
			$this->db->insert('funcionario', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso!');
			redirect('Funcionario/create');
		endif;
	}
	
	public function do_update($dados = NULL, $condicao = NULL){
		if($dados != NULL && $condicao != NULL):
			$this->db->update('funcionario', $dados, $condicao);
			$this->session->set_flashdata('edicaook', 'Cadastro alterado com sucesso!');
			redirect(current_url());
		endif;
	}
	
	public function do_delete($condicao = NULL){
		
		if($condicao != NULL):
			$this->db->delete('funcionario', $condicao);
			$this->session->set_flashdata('excluirok', 'Registro deletado com sucesso!');
		endif;
		
		redirect('Funcionario/retrieve');
	}
	
	public function get_all(){
		return $this->db->get('funcionario');
	}
	
	public function get_byid($id = NULL){
		if($id != NULL):
			$this->db->where('funcionarioid', $id);
			$this->db->limit(1);
			return $this->db->get('funcionario');
		else:	
			return false;
		
		endif;		
	}
        
        public function get_byEmail($email= NULL, $senha = NULL){
		if($email != NULL && $senha != NULL):
                    $sql = "SELECT * FROM funcionario WHERE email = ? AND senha = ?";
                    $query = $this->db->query($sql, array($email, $senha));
			if($query->num_rows() > 0 && $query->num_rows() == 1):
				return $query;
			else:
				return false;
			endif;
		else:	
			return false;
		endif;		
	}
        
        public function selectFuncionario(){
		$query = $this->db->get('funcionario');
		if($query->num_rows() > 0):
			return $query;
		else:
			return false;
		endif;
	
	}
 }
