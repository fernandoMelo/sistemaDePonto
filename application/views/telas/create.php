<?php
if($this->session->funcionarioid == NULL)
    redirect('inicio/index');
if($this->session->permissao != 1)
    redirect('ponto/create');

if (validation_errors() != NULL):
    echo ModMensagemUtil::getAlertMensagemClose(ModMensagemUtil::ALERT_DANGER);
    echo validation_errors();
    echo ModMensagemUtil::getCloseAlertMensagem();
endif;

if ($this->session->flashdata('cadastrook')):
    echo ModMensagemUtil::getAlertMensagemClose(ModMensagemUtil::ALERT_SUCCESS);
    echo $this->session->flashdata('cadastrook');
    echo ModMensagemUtil::getCloseAlertMensagem();
endif;
?>

<a name="cadastro"></a>
<div class="panel panel-success">
    <div class="panel-heading">    
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cadastro de Funcionario</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                    echo form_open('Funcionario/create');
                    echo form_label('Nome Completo (*)') . "<br />";
                    echo form_input(array('id' => 'nome', 'name' => 'nome', 'class' => 'form-control', 'placeholder' => 'Nome'), set_value('nome')) . "<br />";
                    echo form_label('CPF (*)') . "<br />";
                    echo form_input(array('id' => 'cpf', 'name' => 'cpf', 'class' => 'form-control', 'placeholder' => 'CPF'), set_value('cpf')) . "<br />";
                    echo form_label('Identidade (*)') . "<br />";
                    echo form_input(array('id' => 'identidade', 'name' => 'identidade', 'class' => 'form-control', 'placeholder' => 'Identidade'), set_value('identidade')) . "<br />";
                    echo form_label('Salário (*)') . "<br />";
                    echo form_input(array('id' => 'salario', 'name' => 'salario', 'class' => 'form-control', 'placeholder' => 'Salário'), set_value('salario')) . "<br />";
                    echo form_label('Carga Horária (*)') . "<br />";
                    echo form_input(array('id' => 'cargahoraria', 'name' => 'cargahoraria', 'class' => 'form-control', 'placeholder' => 'Carga Horária'), set_value('cargahoraria')) . "<br />";
                    echo form_label('Email (*)') . "<br />";
                    echo form_input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email'), set_value('email')) . "<br />";
                    echo form_label('Login (*)') . "<br />";
                    echo form_input(array('name' => 'login', 'class' => 'form-control', 'placeholder' => 'Login'), set_value('login')) . "<br />";
                    echo form_label("Senha (*)") . "<br />";
                    echo form_password(array('name' => 'senha', 'class' => 'form-control', 'placeholder' => 'Senha'), set_value('senha')) . "<br />";
                    echo form_label("Repita a senha (*)") . "<br />";
                    echo form_password(array('name' => 'senha2', 'class' => 'form-control', 'placeholder' => 'Senha'), set_value('senha2')) . "<br /> <br />";
                ?>

                <?php
                    echo DivUtil::openDivRow();
                    echo DivUtil::openDivColMod("col-md-12");
                    echo '<span id="sumit" style="display: inline;float: right;">';
                    echo form_submit(array('name' => 'cadastrar', 'class' => 'btn btn-success'), 'Cadastrar') . "<br />";
                    echo '</span>';
                    echo DivUtil::closeDiv();
                    echo DivUtil::closeDivRow();
                    echo form_close();
                ?>       
            </div>
        </div>
    </div>
</div>

