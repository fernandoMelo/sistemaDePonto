<?php
if($this->session->permissao != 1)
    redirect('ponto/create');
	if($this->session->flashdata('excluirok')):
			echo '<div class="alert alert-success" role="alert"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  ' .$this->session->flashdata('excluirok') . '</div>';
		endif;
?>
	<br />
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Funcionários Cadastrados</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="table-responsive"></div>
<?php
	$template = array(
        'table_open' => '<table class="table">'
	);

	$this->table->set_template($template);
	$this->table->set_heading('ID', 'Nome', 'CPF', 'Identidade', 'Salario', 'Carga Horária', 'Email', 'Login', 'Operações');
	foreach ($usuarios as $linha):
		$this->table->add_row($linha->funcionarioid, $linha->nome, $linha->cpf, $linha->identidade, $linha->salario, $linha->cargahoraria, $linha->email, $linha->login, anchor("Funcionario/update/$linha->funcionarioid", 'Editar') . ' - '. anchor("Funcionario/delete/$linha->funcionarioid", 'Deletar'));
	endforeach;
	
	echo $this->table->generate();
?>
			</div>
 		</div>
 	