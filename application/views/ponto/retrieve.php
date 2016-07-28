<?php

	if($this->session->flashdata('excluirok')):
			echo '<div class="alert alert-success" role="alert"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  ' .$this->session->flashdata('excluirok') . '</div>';
		endif;
?>
	<br />
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Pontos Efetuados</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="table-responsive"></div>
<?php
	$template = array(
        'table_open' => '<table class="table">'
	);

	$this->table->set_template($template);
	$this->table->set_heading('Funcionario ID', 'Entrada', 'Almoço', 'Volta do Almoço', 'Saida');
	foreach ($usuarios as $linha):
		$this->table->add_row($linha->funcionarioid, $linha->horaEntrada, $linha->horaAlmoco, $linha->horaAlmocoVolta, $linha->horaSaida);
	endforeach;
	
	echo $this->table->generate();
?>
			</div>
 		</div>
 	