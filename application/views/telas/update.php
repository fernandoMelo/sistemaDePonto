<?php
    echo "<br />";
	if(validation_errors() != NULL){
?>

	<br />
	<div class="alert alert-danger" role="alert"> 
		<?php echo validation_errors(); ?>
	</div>
<?php
	}
	$funcionarioid = $this->uri->segment(3);
	if($funcionarioid == NULL) redirect('Funcionario/retrieve');
	
	$query = $this->FuncionarioDAO->get_byid($funcionarioid)->row();
	
	echo form_open("Funcionario/update/$funcionarioid");
	
		
	if($this->session->flashdata('edicaook')):
		echo '<div class="alert alert-success" role="alert"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' .$this->session->flashdata('edicaook') . '</div>';
	endif;
	echo form_label('Nome Completo') . "<br />";
	echo form_input(array('name' => 'nome', 'class' => 'form-control'), set_value('nome', $query->nome), 'autofocus') . "<br />";;
	echo form_label('CPF (*)') . "<br />";
        echo form_input(array('name' => 'cpf', 'class' => 'form-control', 'placeholder' => 'CPF'), set_value('cpf', $query->cpf)) . "<br />";
        echo form_label('Identidade (*)') . "<br />";
        echo form_input(array('name' => 'identidade', 'class' => 'form-control', 'placeholder' => 'Identidade'), set_value('identidade', $query->identidade)) . "<br />"; 	
        echo form_label('Salário (*)') . "<br />";
        echo form_input(array('name' => 'salario', 'class' => 'form-control', 'placeholder' => 'Salário'), set_value('salario', $query->salario)) . "<br />";
        echo form_label('Carga Horária (*)') . "<br />";
        echo form_input(array('name' => 'cargahoraria', 'class' => 'form-control', 'placeholder' => 'Carga Horária'), set_value('cargahoraria', $query->cargahoraria)) . "<br />";
        echo form_label('Email') . "<br />";
	echo form_input(array('name' => 'email', 'class' => 'form-control'), set_value('email', $query->email)) . "<br />";
	echo form_label('Login') . "<br />";
	echo form_input(array('name' => 'login', 'class' => 'form-control'), set_value('login', $query->login)) . "<br />";
	echo form_label("Senha") . "<br />";
	echo form_password(array('name' => 'senha', 'class' => 'form-control'), set_value('senha')) . "<br />";
	echo form_label("Repita a senha") . "<br />";
	echo form_password(array('name' => 'senha2', 'class' => 'form-control'), set_value('senha2')) . "<br /> <br />";
	echo form_hidden('funcionarioid', $query->funcionarioid);
	echo form_submit(array('name' => 'cadastrar', 'class' => 'btn btn-success'), 'Alterar dados'). "<br />";
	
	echo form_close();
