<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ponto_Model extends CI_Model {

    public function do_insert($dados = NULL) {

        if ($dados != NULL):
            $this->db->insert('ponto', $dados);
            $this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso!');
            //redirect('Ponto/create');
        endif;
    }

    public function do_update($dados = NULL) {

        if ($dados != NULL):
            //$condicao = array('funcionarioid'=>$this->session->funcionarioid, 'date(DATA)'=>'date(now())');
            $this->db->update('ponto', $dados, ' funcionarioid ='.$this->session->funcionarioid. ' and date(data) = date(now())');
            $this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso!');
            //redirect('Ponto/create');
        endif;
    }

    public function get_all() {
        return $this->db->get('ponto');
    }
/*
    public function get_byid() {
        if ($this->session->funcionarioid != NULL):
            $sql = 'SELECT * FROM ponto WHERE funcionarioid = '.$this->session->funcionarioid. '';
            $query = $this->db->query($sql, array($this->session->funcionarioid));
            if ($query->num_rows() > 0 && $query->num_rows() == 1):
                return $query;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }*/
    
    public function get_byid($id = NULL){
		if($id != NULL):
			$this->db->where('funcionarioid', $id);
			return $this->db->get('ponto');
		else:	
			return false;
		
		endif;		
	}

    public function bancodeHoras(){
        $sql = "SELECT horaSaida - horaEntrada FROM ponto WHERE funcionarioid = ? AND DATE(DATA) =  '2015-06-22' " ;
        
        
    }    
        
    public function verificaPonto($id) {
        if ($id != NULL):
            $sql = "SELECT * FROM ponto WHERE funcionarioid = ? AND DATE(DATA) = current_date";
            $query = $this->db->query($sql, array($id));
            if ($query->num_rows() > 0 && $query->num_rows() == 1):
                return $query;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    public function verificaRegistroEntrada($id) {
        if ($id != NULL):
            $sql = "SELECT * FROM ponto WHERE funcionarioid = $id AND DATE(DATA) = current_date and horaEntrada is not null";
            $query = $this->db->query($sql, array($id));
            if ($query->num_rows() > 0 && $query->num_rows() == 1):
                return true;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }
    
    public function verificaRegistroAlmoco($id) {
        if ($id != NULL):
            $sql = "SELECT * FROM ponto WHERE funcionarioid = $id AND DATE(DATA) = current_date and horaAlmoco is not null";
            $query = $this->db->query($sql, array($id));
            if ($query->num_rows() > 0 && $query->num_rows() == 1):
                return true;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    public function verificaRegistroAlmocoVolta($id) {
        if ($id != NULL):
            $sql = "SELECT * FROM ponto WHERE funcionarioid = $id AND DATE(DATA) = current_date and horaAlmocoVolta is not null";
            $query = $this->db->query($sql, array($id));
            if ($query->num_rows() > 0 && $query->num_rows() == 1):
                return true;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }
    
    public function verificaRegistroSaida($id) {
        if ($id != NULL):
            $sql = "SELECT * FROM ponto WHERE funcionarioid = $id AND DATE(DATA) = current_date and horaSaida is not null";
            $query = $this->db->query($sql, array($id));
            if ($query->num_rows() > 0 && $query->num_rows() == 1):
                return true;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }
   
}
