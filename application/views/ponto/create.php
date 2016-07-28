<?php
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
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cadastro de Ponto</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                
                    $consulta = $this->PontoDAO->verificaPonto($this->session->funcionarioid);
                    $horaEntrada = "enabled";
                    $horaAlmoco = "enabled";
                    $horaAlmocoVolta = "enabled";
                    $horaSaida = "enabled";
                    
                    $campoEntrada = "enabled";
                    $campoAlmoco = "enabled";
                    $campoAlmocoVolta = "enabled";
                    $campoSaida = "enabled";
                    if ($consulta != false):
                        foreach ($consulta->result() as $value) {
                            if ($value->horaEntrada != NULL):
                                $horaEntrada = "disabled";
                                $campoEntrada = "disabled";
                            endif;
                        }
                    endif;
                    
                    if ($consulta != false):
                        foreach ($consulta->result() as $value) {
                            if ($value->horaAlmoco != NULL || $value->horaAlmoco != ""):
                              //  echo $value->horaAlmoco;
                                $horaAlmoco = "disabled";
                                $campoAlmoco = "disabled";
                            endif;
                        }
                    endif;
                    
                    if ($consulta != false):
                        foreach ($consulta->result() as $value) {
                            if ($value->horaAlmocoVolta != NULL):
                                $horaAlmocoVolta = "disabled";
                                $campoAlmocoVolta = "disabled";
                            endif;
                        }
                    endif;
                    
                    if ($consulta != false):
                        foreach ($consulta->result() as $value) {
                            if ($value->horaSaida != NULL):
                                $horaSaida = "disabled";
                                $campoSaida = "disabled";
                            endif;
                        }
                    endif;
                    
                    echo form_open('Ponto/create');
                    date_default_timezone_set('America/Sao_Paulo');                /* echo form_label('Hora de Entrada (*)') . "<br />"; */
                    $horaAtual = date('H:i:s');
                    
                        echo "<div class = 'form-group col-md-8' align = 'center'>";
                        echo '<INPUT TYPE="hidden" NAME="horaEntrada" VALUE="' . $horaAtual . '" '.$campoEntrada .'='. $campoEntrada.'>';
                        //echo $this->session->funcionarioid;
                       // echo $horaEntrada;
                        echo form_submit(array('name' => 'entrada',$horaEntrada => $horaEntrada, 'class' => 'btn btn-success'), 'Entrada');
                            echo '<INPUT TYPE="hidden" NAME="horaAlmoco" VALUE="' . $horaAtual . '" '.$campoAlmoco .'='. $campoAlmoco.'>';
                        echo form_submit(array('name' => 'almoco', $horaAlmoco => $horaAlmoco, 'class' => 'btn btn-success'), 'Almoço');    
                            echo '<INPUT TYPE="hidden" NAME="horaAlmocoVolta" VALUE="' . $horaAtual . '" '.$campoAlmocoVolta .'='. $campoAlmocoVolta.'>';
                        echo form_submit(array('name' => 'almocoVolta', $horaAlmocoVolta => $horaAlmocoVolta, 'class' => 'btn btn-success'), 'Volta Almoço');
                            echo '<INPUT TYPE="hidden" NAME="horaSaida" VALUE="' . $horaAtual . '" '.$campoSaida .'='. $campoSaida.'>';
                        echo form_submit(array('name' => 'saida', $horaSaida => $horaSaida, 'class' => 'btn btn-success'), 'Saída');
                    echo "</div>";
                    ?>

                <?php
                echo DivUtil::openDivRow();
                echo DivUtil::openDivColMod("col-md-12");
                echo DivUtil::closeDiv();
                echo DivUtil::closeDivRow();
                echo form_close();
                ?>       
            </div>
        </div>
    </div>
</div>

